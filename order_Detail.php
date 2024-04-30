    <?php include 'templates/navbar.php'; 
	
	require 'templates/server.php';
	?>
	
          

          <?php
	$id=$_GET["id"];
	$sql="select * from orders where orderid=$id";
	$rs=mysqli_query($conn,$sql);
	$rows=mysqli_fetch_assoc($rs);
	$username=$rows["username"];
	$orderid=$rows["orderid"];
	$sql="select * from users where user_ID='$username'";
	$rs=mysqli_query($conn,$sql);
	$rows=mysqli_fetch_assoc($rs);
?>
<table width="99%" border="0" align="center" cellpadding="2" cellspacing="1" class="layui-table layui-form">
  <tr>
    <th height="27" colspan="2" class="bg_tr"><?php echo $id?>No. order management</th>
  </tr>


  
  <tr>
    <th colspan="2" class="td_bg">Order product list</th>
  </tr>
  <tr>
    <td colspan="2" class="td_bg"><table width="80%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC" class="layui-table layui-form">
      <tr>
        <th height="25" bgcolor="#C8D0CD">Product Number</th>
        <th height="25" bgcolor="#C8D0CD">Product Name</th>
	
        <th height="25" bgcolor="#C8D0CD">Quantity</th>
        <th height="25" bgcolor="#C8D0CD">Unit Price</th>
        <th height="25" bgcolor="#C8D0CD">Total Price</th>
      </tr>
      <?php
	  	$sql="select * from orderdetail where orderid=$orderid";
		//echo $sql;
		$sum=0;
		$rs=mysqli_query($conn,$sql);
		while($rows=mysqli_fetch_assoc($rs))
		{
		?>
		<tr>
        <td height="25" align="center" bgcolor="#FFFFFF"><?php echo $rows["orderdetailid"]?></td>
        <td height="25" align="center" bgcolor="#FFFFFF"><?php
			$goodsid=$rows["goodsid"];
			$sql="select * from products where product_ID=$goodsid";
			//echo $sql;
			$rs_goods=mysqli_query($conn,$sql);
			$rows_goods=mysqli_fetch_assoc($rs_goods);
			echo $rows_goods["name"];
		?></td>

        <td height="25" align="center" bgcolor="#FFFFFF"><?php echo $rows["amount"]?></td>
        <td height="25" align="center" bgcolor="#FFFFFF"><?php echo $rows_goods["price"]?></td>
        <td height="25" align="center" bgcolor="#FFFFFF"><?php echo $rows["amount"]*$rows_goods["price"]?></td>
      </tr>
		<?php
		$sum+=$rows["amount"]*$rows_goods["price"];
		}
	  ?>
      <tr>
        <td height="25" colspan="5" align="center" bgcolor="#FFFFFF">Total Price: <?php echo $sum?></td>
        </tr>
    </table></td>
  </tr>
  
</table>
        </div>
    </div>
</div>
  <?php include 'templates/footer.php'; ?>
</body>
</html>

