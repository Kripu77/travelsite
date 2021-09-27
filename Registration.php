<?php 
 include("header.php");
    include("navbar.php");
   
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Raleway:wght@400&display=swap" rel="stylesheet">
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap/css/bootstrap.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="css/bootstrap/js/bootstrap.min.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='Registration.css'>
      <script src="./Registration.js"></script>
</head>
<body>
    <div class="RegistrationForm">
        <form action="registerUser.php" method="POST">
            <span class="Heading text-primary">Registration Form</span><br><br>
            <input type="text" name="fName" id="Full Name" placeholder="First Name" maxlength="50" onkeydown="return TextInputValidate(event.key)">
            <input type="text" name="lName" id="Full Name" placeholder="Last Name" maxlength="50" onkeydown="return TextInputValidate(event.key)">
            <div class="RegFormFieldSet">
                <label class=" text-primary">Contact Details</label>
                <input type="text" name="mobile" id="MobileNumber" placeholder="Mobile Number" onkeydown="return NumInputValidate(event.key)">
                <input type="email" name="email" placeholder="Email Id" onkeydown="return EmailInputValidate(event.key)">
            </div>
            <div class="RegFormFieldSet">
                <label class=" text-primary">Account Details</label>
                <input type="password" name="password" maxlength="25" placeholder="Password">
                <input type="text" name="confirmPassword" maxlength="25" placeholder="Confirm Password">
            </div>
            <div class="RegFormFieldSet">
                <label class=" text-primary">Address Details</label>
                <input type="text" name="AddressLine1" placeholder="Address Line 1" maxlength="50" onkeydown="return AlphaNumInputValidate(event.key)">
                <input type="text" name="City" placeholder="City" maxlength="22" onkeydown="return TextInputValidate(event.key)">
                <input type="text" name="PostalCode" id="Pincode" placeholder="Postal Code" onkeydown="return PinInputValidate(event.key)">
                <input type="text" name="Country" id="Pincode" placeholder="Country" onkeydown="return PinInputValidate(event.key)">
            </div>
            <input type="submit" value="Submit">
        </form>
    </div>
    <p id="MessageBox"></p>
    <?php include("footer.php"); ?>
</body>
</html>