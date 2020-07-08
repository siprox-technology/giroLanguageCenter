<?php
include_once "db.php";
include_once "validate.php";
// db connection
$conn = new DB();
$con = $conn->connect_to_db();
//validate get info
$val = new Validate();
$email = ($val->validateEmail($_GET['email']))==true? $_GET['email']:false;
$passCode = ($val->validateActivationCode($_GET['code']))== true? $_GET['code']:false;
if(($email)&&($passCode))
{
    if ($stmt = $con->prepare('SELECT * FROM user WHERE email = ? AND act_code = ?')) {
        $stmt->bind_param('ss', $email, $passCode);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database.
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            // Account exists with the requested email and code.
            if ($stmt = $con->prepare('UPDATE user SET act_code = ? WHERE email = ? AND act_code = ?')) {
                // Set the new activation code to 'activated', this is how we can check if the user has activated their account.
                $newcode = 'activated';
                $stmt->bind_param('sss', $newcode, $email, $passCode);
                $stmt->execute();
                // link to redirect to activation result page
                header("Location:../activationResult.php?act_result=Your Account is activated!");
            }
        } else {
                header("Location:../activationResult.php?act_result=The account is already activated or doesn\'t exist!");
        }
    }
    else{
        header("Location:../activationResult.php?act_result=Activation failed");
    }
}
else{
    header("Location:../activationResult.php?act_result=Activation process Failed");
}    
?>