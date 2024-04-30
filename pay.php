<?php
require 'templates/server.php';

?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<?php
error_reporting(0);
session_start();
	if($_SESSION['uid']=="")
	{
		header("location:index.php");
		exit();
	}
	$name=$_POST['name'];
$tel=$_POST['tel'];
$address=$_POST['address'];

	$user=$_SESSION['uid'];
	//$goods=$_SESSION["goodsArray"];
	$time=date("Y-m-d H:i:s");
	$sql="insert into orders (username,flag,time,sname,tel,address) values ('$user',0,'$time','$name','$tel','$address')";
	mysqli_query($conn,$sql);

$orderid=mysqli_insert_id($conn);   ;
	$tsql="select *  from cart_table  where user_ID=$user";
	//echo $tsql;
	$rs = mysqli_query($conn, $tsql);
	  while ($item = mysqli_fetch_assoc($rs)) 
	{
		$quantity=$item['quantity'];
		$pid=$item['product_ID'];
		$sql3="insert into orderdetail (orderid,goodsid,amount) values ('$orderid','$pid','$quantity')";
		echo $sql3;
		mysqli_query($conn,$sql3);
		$csql="update products set stock=stock-".$quantity." where product_ID=".$pid;
		//echo $csql;
		mysqli_query($conn,$csql);
		
	}
	$dsql="delete from cart_table where user_ID=$user";
	mysqli_query($conn,$dsql);
	echo "<script language=javascript>alert('Successfully ordered!');window.location='index.php'</script>";
?>
