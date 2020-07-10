<?php
// only allow POST request to access this page
if($_SERVER['REQUEST_METHOD']!== 'POST')
{
     header('Location:../index.php');
}
else
{
session_start();
session_regenerate_id();
// check token
    if((!isset($_POST['_token'])) || (!isset($_SESSION['_token'])) || ($_POST['_token']!== $_SESSION['_token']))
    {
        die('invalid request');
    }
    //token ok
    else
    {
        include_once 'validate.php';
        include_once 'db.php';
        //database connection 
        $conn = new DB();
        $con = $conn->connect_to_db();
        // registration and validation result array
        $registerResult = $validateResult = $finalResult = [];
        //validation for input fields
        $val = new Validate();
        $name = ($val->validateAnyname($_POST['name']))== true? $_POST['name']: false;
        $tell = ($val->validtePhone($_POST['tell']))== true? $_POST['tell']:false;
        $email = ($val->validateEmail($_POST['email']))==true? $_POST['email']:false;
        $address = ($val->validateAnyname($_POST['address']))== true? $_POST['address']:false;
        $password = ($val->validatePass($_POST['password']))== true?password_hash($_POST['password'], PASSWORD_DEFAULT): false;
        /* check if all input fields are validated and has value */
        if(($name)&&($tell)&&($email)&&($address)&&($password))
        {
            //set validation result
            $validateResult = ['validate result' => true];
             // check if account exists by name and email
            if ($stmt = $con->prepare("SELECT id, pass FROM user WHERE (email = ?) OR (name = ?)")) 
            {
                // Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
                $stmt->bind_param('ss', $email,$name);
                $stmt->execute();
                $stmt->store_result();
                // Store the result so we can check if the account exists in the database.
                if ($stmt->num_rows > 0) {
                    // email or name already exists
                    $registerResult = ['reg result' => false,
                    'msg'=>'Email or Name already exists, please choose different name and email!'];
                    } 
                else{
                        // Username doesnt exists, create new account
                        // send confirmation email
                        $uniqId =strval(random_int(100000,999999));
                        $from    = 'integralproject1988@gmail.com';
                        $subject = 'Account Activation Required';
        
                        $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
                        $activate_link = 'http://localhost/lang_inst v-3.0/inc/activate.php?email=' . $email . '&code=' . $uniqId;
                        $message = '<p>Please click the following link to activate your account: <a href="' . $activate_link . '">' . $activate_link . '</a></p>';
                        $isSent = mail($email, $subject, $message, $headers);
                        if($isSent)
                        {
                            if ($stmt = $con->prepare('INSERT INTO user (pass, name, tell, email, address, act_code) VALUES (?, ?, ?, ?, ?, ?)')) 
                            {
                                $stmt->bind_param('ssssss',$password,$name,$tell,$email,$address,$uniqId);
                                $stmt->execute();
                                // registration success
                                $registerResult = ['reg result' => true,
                                'msg'=>'Registration Successful. Check your email to activate your account!'];
                                // set default user image
                                $dest = "../images/user_profile_images/".$email.".jpg";
                                copy("../images/user_profile_images/default.jpg",$dest);
                            } 
                            else 
                            {
                                // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
                                $registerResult = ['reg result' => false,
                                'msg'=>'database error !'];
                            }
                        }
                        else
                        {
                                   // email was not sent
                            $registerResult = ['reg result' => false,
                            'msg'=>'Registration failed: confirmation email could not be sent!'];
                        }    
        
                }
            }       
            else {
                // db error
               $registerResult = ['reg result' => false,
               'msg'=>'database error !'];
            }
        }
        else
        {
            $validateResult = ['validate result' => false,
            'name'=>$name,
            'tell'=>$tell,
            'email'=>$email,
            'address'=>$address,
            'password'=>$password
            ];
        }
        // return reg and valid array to front end
        $finalResult = [$validateResult,$registerResult];
        echo json_encode($finalResult);
        /* $stmt->close(); */
        $con->close();
    }
}


?>