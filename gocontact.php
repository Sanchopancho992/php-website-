<?php
require 'templates/server.php';
?>

   <?php include 'templates/navbar.php'; ?>
<style>
input
{
width: 90%;
    padding: 8px;
    font-size: 1em;
    font-weight: 400;
    border: 1px solid #D6D6D6;
    outline: none;
    color: #5d5959;
    margin-bottom: 2em;
}
</style>
<!--content-->
<div class="container">
<form  method="post" action="pay.php" >
		<div class="account">

		<div class="account-pass">
		<div class="col-md-8 account-top">
		 <div class="account">
            <h1>Fill in the information</h1>
            <div class="account-pass">
                <!-- Prompt message -->
        
                <div class="col-md-8 account-top">
                
                    
                    <div>
				
                        <span>Telephone</span>
						<br>
                        <input name="tel" type="text" id="pwd" pattern="^[0-9\-]+$" required>
                    </div>
                    <!-- Address input -->
                    
                    <div>
				
                        <span>Recipient</span>
						<br>
                        <input name="name" type="text" id="pwd"  required>
                    </div>
					
                    <div>
                        <span>Address</span>
							<br>
                        <input name="address" type="text" id="pwd2" placeholder="Adresse">
                    </div>
                    
                    <!-- Credit card number input -->
					<br>
                    <div>
                        <span>Credit Card</span>
                        <input name="cardtest" type="text" id="pwd2" placeholder="ID Number">
                    </div>
                    	<br>
                    <div>
                        <span>Password</span>
                        <input name="cardtest" type="password" id="pwd2" placeholder="ID Number">
                    </div>
                    <center><input type="submit" name="Submit" value="Pay"  style="width:80px"/></center><br>                   
                </div>
            </div>
        </div>
		</div>
		
	</div>
	</div>
</form> 
<br>
<br>
<br>
<br>
<br>
</div>
  <?php include 'templates/footer.php'; ?>

