    <?php include 'templates/navbar.php'; 
	
	require 'templates/server.php';
	?>
	
<center><h2>Order Status</h2>
<!-- top-brands -->
	   <?php
$u_id=$_SESSION["uid"];
$sql="select * from orders where username = '$u_id' ";
//echo $sql;
$query=mysqli_query($conn,$sql);
?>
<div class="women-set1">
<center>
         <table width="800px" height="47" border="1" align="center" cellpadding="0" cellspacing="0" class="border">
          <tr>
           <th>Order number</th>
                  
                    <th>Order time</th>
             <th>Recipient</th>
			 <th>Phone</th>
			 <th>Address</th>
                    <th>Details</th>
                   
                    
            </tr>
           <?php
  	while($rows=mysqli_fetch_assoc($query))
	{
	?>
          <tr>
           <td height="26" align="center" class="td_bg"><?php echo $rows["orderid"]?></td>
     <td height="26" align="center" class="td_bg"><?php echo $rows["sname"]?></td>
	  <td height="26" align="center" class="td_bg"><?php echo $rows["tel"]?></td>
	   <td height="26" align="center" class="td_bg"><?php echo $rows["address"]?></td>
    <td align="center" class="td_bg"><?php echo $rows["time"]?></td>
    
    <td align="center" class="td_bg"><a href="order_Detail.php?id=<?php echo $rows["orderid"]?>" class="trlink">Details</a></td>
  
  </tr>
	<?php
	}
  ?>
             </td>
            </tr>
          <?
			
			?>
        </table>
       </div>
	 </div>
   </div>
<!-- //newsletter -->

	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
        w3ls1.render();

        w3ls1.cart.on('w3sb1_checkout', function (evt) {
        	var items, len, i;

        	if (this.subtotal() > 0) {
        		items = this.items();

        		for (i = 0, len = items.length; i < len; i++) {
        			items[i].set('shipping', 0);
        			items[i].set('shipping2', 0);
        		}
        	}
        });
    </script>  
	<!-- //cart-js -->  
	<div class="top-brands">
	
<!-- //top-brands -->
<!-- newsletter -->
	

	<center> </center>
</body>
</html>