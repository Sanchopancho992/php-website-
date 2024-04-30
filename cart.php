<?php

require 'templates/server.php';
$username = mysqli_real_escape_string($conn, $_SESSION['username']);
$uid =  mysqli_real_escape_string($conn, $_SESSION['uid']);
// Check if user is logged in
if (!isset($_SESSION['username'])) {
    echo "Not logged in";
    exit(); // If you are not logged in, subsequent code will not be executed.
}

if (isset($_GET['method'])) {
    $method = mysqli_real_escape_string($conn, $_GET['method']);
}
else {
    $method = "view";
}


if ($method == "update") {
    $num = mysqli_real_escape_string($conn, $_POST['amount']);
    $cid = mysqli_real_escape_string($conn, $_GET['carid']);
    $nsql = "UPDATE cart_table SET quantity=$num WHERE cart_ID=$cid";
    //echo $nsql;
    mysqli_query($conn, $nsql);
    //header('location:cart.php');
    //$sql=
} else if ($method == "add") {
    $pid = mysqli_real_escape_string($conn, $_GET['id']);
    $csql = "SELECT * FROM cart_table WHERE product_ID=$pid  AND  user_ID='$uid'";
    //echo $csql;
    $crs = mysqli_query($conn, $csql);
    if (mysqli_num_rows($crs) == 0) {
        $isql = "INSERT INTO cart_table values(null,'$uid','$pid',1)";
        mysqli_query($conn, $isql);
    }



    //echo $sql;

} else  if ($method == "delete") {
    $cid = $_GET['carid'];
    $nsql = "DELETE FROM cart_table  WHERE cart_ID=$cid";
    //echo $nsql;
    mysqli_query($conn, $nsql);
} else if ($method == "view") {
}

$sql = "SELECT * from cart_table 
        INNER JOIN products ON products.product_ID = cart_table.product_ID 
        WHERE user_id = '$uid' 
        ORDER BY cart_id DESC";
$rs = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Shopping Cart</title>
    <link rel="stylesheet" href="css/layui.css">
    <link rel="stylesheet" href="css/cart.css">

</head>

<body onload="total()">
    <?php include 'templates/navbar.php'; ?>
    <h1>Your Shopping Cart</h1>
    <div class="cartList">

        <table class="layui-table layui-form" id="first">
            <thead>
                <tr>
                    <th>Brand</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Specifications</th>
                    <th>Quantity</th>
                    <th>Manage</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($item = mysqli_fetch_assoc($rs)) {
                ?>
                    <tr>
                        <td><?= htmlspecialchars($item['brand']) ?></td>
                        <td><?= htmlspecialchars($item['name']) ?></td>
                        <td><?= htmlspecialchars($item['category']) ?></td>
                        <td>


                            <input type="text" name="price" value="<?= htmlspecialchars($item['price']) ?> " style="border: none;
    background: transparent;
    width: 45px;
    text-align: center;">
                        </td>
                        <td><?= htmlspecialchars($item['specifications']) ?></td>
                        <td>
                            <form action="cart.php?method=update&carid=<?= htmlspecialchars($item['cart_ID']) ?>" method="post">
                                <li><input type="text" name="amount" id="test" value="<?= htmlspecialchars($item['quantity']) ?>"> <input type="submit" value="fresh"></li>
                            </form>

                        </td>



                        <td><a href="cart.php?carid=<?= htmlspecialchars($item['cart_ID']) ?>&method=delete">delete</a></td>
                    </tr>
                <?php
                }

                ?>

            </tbody>
        </table>
        <ol>
            <form action="#" method="post">
                <li id="totalPrice">&nbsp;</li>
<input type="button" name="Submit" value="order" onclick="location.href='gocontact.php'">
            </form>
        </ol>
</body>

</html>


<script>
    function total() {

        var counts = document.getElementsByName("amount");


        var prices = document.getElementsByName("price");

        var sumMoney = 0;

        for (var i = 0; i < counts.length; i++) {

            sumMoney += (parseFloat(prices[i].value) * Math.pow(10, 2) * parseInt(counts[i].value) / Math.pow(10, 2));
        }


        document.getElementById("totalPrice").innerHTML = "$: " + sumMoney;

    }


    //Add to favorites
    function save() {
        if (confirm("Are you sure you want to add it to your collection?")) {
            alert("Collection successful!");
        }

    }
    //Delete
    function delete1() {
        if (confirm("Are you sure you want to delete it?")) {
            var del = document.getElementById("first");
            del.parentNode.removeChild(del);
            alert("successfully deleted! !");
        }
    }
</script>