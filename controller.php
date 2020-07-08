<?php
// receives request from client and return results back to client
//receives databse query request
// only allow POST request to access this page
if($_SERVER['REQUEST_METHOD']!== 'POST')
{
    header('Location:index.php');
}
if(!isset($_POST['req_type']))
{
    header('Location:index.php');
}
include_once 'inc/validate.php';
include_once 'inc/db.php';
include 'inc/user.php';
$val = new validate();
$request_type =($val->validateAnyName($_POST['req_type']))==true? $_POST['req_type']: false;
$connection= new DB();
// switch between different request types
switch($request_type) 
{
    case 'select course title':
        if(!isset($_POST['id']))
        {
            die('Invalid Request');
        }
        $id = ($val->validateAnyName($_POST['id']))==true? $_POST['id'].'%':false;
        $result = $connection->getCourseName($id);
        echo $result;
    break;
    case 'select course level':
        if(!isset($_POST['id']))
        {
            die('Invalid Request');
        }
        $id = ($val->validateAnyName($_POST['id']))==true ?$_POST['id']:false;
        $result = $connection->getCourseLevel($id);
        echo $result;
    break;    
    case 'select course fees': 
     
        if(!isset($_POST['level']))
        {
            die('Invalid Request');
        }
        $level = ($val->validateAnyName($_POST['level']))==true?$_POST['level']:false;
        $title = ($val->validateAnyName($_POST['title']))==true? $_POST['title']:false;
        $result = $connection->getCourseFees($level,$title);
        echo $result;
    break;
    case 'make payment for course':
        session_start();
        session_regenerate_id();
        
        $_sign_up_payment=[false,'','','','','','','','','','',''];
        if($_SERVER['REQUEST_METHOD']==='POST'){
            if((!isset($_POST['_token'])) || (!isset($_SESSION['_token'])) || ($_POST['_token']!== $_SESSION['_token']))
            {
                $_sign_up_payment= [false,'refresh'];
            }
            else
            {
                // course info from user selected form inputs
        
                $course_name = ($val->validateAnyName($_POST['course_name']))==true? $_POST['course_name']:false;
                $course_level=($val->validateAnyName($_POST['course_level']))==true? $_POST['course_level']:false;
                $price=($val->validateDigits($_POST['price']))==true? $_POST['price']:false;
                $user_id=($val->validateAnyName($_POST['user_id']))==true? $_POST['user_id']:false;
                // user input for payment form
                $nameOncard=($val->validateAnyName($_POST['nameOncard']))==true? $_POST['nameOncard']:false;
                $cardNum =  ($val->validateDigits($_POST['cardNum'])) == true ? $_POST['cardNum'] : false;
                $exp_month=($val->validateDigits($_POST['exp_month']))==true? $_POST['exp_month']:false;
                $exp_year=($val->validateDigits($_POST['exp_year']))==true?$_POST['exp_year']:false;
                $cvv=($val->validateDigits($_POST['cvv']))==true?$_POST['cvv']:false;
                $pin=($val->validateDigits($_POST['pin']))==true?$_POST['pin']:false;
                $_token=($val->validateDigits($_POST['_token']))==true? $_POST['_token']:false;
                
                //if all inputes are validated
                if($course_name&&$course_level&&$price&&$user_id
                &&$nameOncard&&$cardNum&&$exp_month&&$exp_year
                &&$cvv&&$pin&&$_token)
                {
                    //make a payment and sign up
                    $_sign_up_payment = $connection->signup_and_pay(
                        $user_id,$course_name,$course_level,$price,
                        $nameOncard,$cardNum,$exp_month,$exp_year,
                        $cvv,$pin);
                }
                else
                {
                    //display error for input validation
                    $_sign_up_payment[1]=($course_name)==false? 'Value of course name is not valid!<br>!':'';
                    $_sign_up_payment[2]=($course_level)==false?'Value of course level is not valid!<br>':'';
                    $_sign_up_payment[3]=($price)==false?'Value of price is not valid!<br>':'';
                    $_sign_up_payment[4]=($user_id)==false?'Value of user id is not valid!<br>':'';
                    $_sign_up_payment[5]=($nameOncard)==false?"Value of 'Full name' is not valid!<br>":'';
                    $_sign_up_payment[6]=($cardNum)==false?'Value of card number is not valid!<br>':'';
                    $_sign_up_payment[7]=($exp_month)==false?'Value of expire month is not valid!<br>':'';
                    $_sign_up_payment[8]=($exp_year)==false?'Value of expire year is not valid!<br>':'';
                    $_sign_up_payment[9]=($cvv)==false?'Value of cvv is not valid!<br>':'';
                    $_sign_up_payment[10]=($pin)==false?'Value of pin is not valid!<br>':'';
                    $_sign_up_payment[11]=($_token)==false?'Value of token is not valid!<br>':'';
                }
            }
        }
        echo json_encode($_sign_up_payment); 
    break;
    case 'get payment info':
        if(!isset($_POST['user_id']))
        {
            die('Invalid Request');
        }
        $user_id = ($val->validateAnyName($_POST['user_id']))==true?$_POST['user_id']:false;

        $result= $connection->get_payment_info($user_id);
        echo $result;
    break;
    case 'get class list':
        if(!isset($_POST['user_id']))
        {
            die('Invalid Request');
        }
        $user_id = ($val->validateAnyName($_POST['user_id']))==true?$_POST['user_id']:false;
        $result = $connection->get_class_list($user_id);
        echo $result;
    break;
    case 'get class list teacher':
        if(!isset($_POST['user_id']))
        {
            die('Invalid Request');
        }
        $user_id = ($val->validateAnyName($_POST['user_id']))==true?$_POST['user_id']:false;
        $result = $connection->get_class_list_teacher($user_id);
        echo $result;
    break;
    case 'send reset pass code':
        
        $rand_index = random_int(1,1000000);
        session_start();
        session_regenerate_id();
        $_SESSION['generated_code'] = $rand_index;
        // email uniqe code to user
        $email = $_POST['email'];
        $from = 'integralproject1988@gmail.com';
        $subject = 'Password reset code';
        $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
        $message = '<p>YOUR PASSWORD RESET CODE IS : <b>'.$rand_index.'</b></p>';
        $isSend = mail($email, $subject, $message, $headers);
        if($isSend){echo "Please check your email for Reset Password Code";}else{echo "Unable to send activation email";}
           break;

    case 'change password with code':

        $theUser = new User();
        $changPassResult = [false,'','',''];

        //validate user inputs
        $sec_code = ($val->validateDigits($_POST['code']))==true? $_POST['code']:false;
        $newPass = ($val->validatePass($_POST['pass']))==true?password_hash($_POST['pass'],PASSWORD_DEFAULT):false;
        $userName = ($val->validateEmail($_POST['email']))==true?$_POST['email']:false;
        //if all is valid
        if(($sec_code) && ($newPass) && ($userName))
        {
            $changPassResult = $theUser->change_pass_withCode($newPass,$sec_code,$userName);
     
        }
        else
        {
           if($sec_code==false){$changPassResult[1]='The security code invalid';}
           if($newPass==false){$changPassResult[2]= 'Password invalid : must be between 5 to 20 characters, numbers and letter only';}
           if($userName==false){$changPassResult[3]='Username is incorrect';}
        }

       echo json_encode($changPassResult);
    break;       
    case 'edit user account':
        $edit_result=[false,'','',''];
        /* check values */

        $phone = ($val->validateDigits($_POST['phone']))==true?$_POST['phone']:false;
        $address = ($val->validateAnyName($_POST['address']))==true?$_POST['address']:false;
        $password = ($val->validatePass($_POST['password']))==true?$_POST['password']:false;

        if($phone && $address && $password)
        {
            //check user password
            session_start();
            session_regenerate_id();
            $user = new User();
            if(password_verify($password,$_SESSION['password']))
            {
                if($phone !== $_SESSION['tell'])
                {
                    // update phone
                    $update_result = $user->change_phone($phone,$_SESSION['email']);
                    if($update_result[0])
                    {
                        $edit_result[0]= true;
                        $edit_result[1] = 'Phone number updated';  
                    }
                    else
                    {
                        $edit_result[1] ='Phone number update failed';
                    }

                }
                if($address !== $_SESSION['address'])
                {
                    // update address 
                    $update_result = $user->change_address($address,$_SESSION['email']);
                    if($update_result[0])
                    {
                        $edit_result[0]= true;
                        $edit_result[2] = 'Address updated';  
                    }
                    else
                    {
                        $edit_result[2] ='Address update failed';
                    }
                }

            }
            else
            {
                $edit_result[3]='Incorrect password';
            }

        }
        else
        {
            if($phone==false){$edit_result[1]="Phone is invalid !";}
            if($address==false){$edit_result[2]="Address is invalid !";}
            if($password==false){$edit_result[3]="Password is invalid !";}
        }
         echo json_encode($edit_result);

    break;
    case 'get test list':
        $result = $connection->get_avail_test();
        echo $result;
    break;
    case 'make payment for test':
        session_start();
        session_regenerate_id();
        $test_signup_payment=[false,'','','','','','','','',''];
        if($_SERVER['REQUEST_METHOD']==='POST'){
            if((!isset($_POST['_token'])) || (!isset($_SESSION['_token'])) || ($_POST['_token']!== $_SESSION['_token']))
            {
                $test_signup_payment=[false,'Error:'];
            }
            else
            {
                // user info
                $user_id=($val->validateAnyName($_POST['user_id']))==true? $_POST['user_id']:false;
                $nameOncard=($val->validateAnyName($_POST['nameOncard']))==true? $_POST['nameOncard']:false;
                $cardNum=($val->validateDigits($_POST['card_num'])) == true ? $_POST['card_num'] : false;
                $exp_month=($val->validateDigits($_POST['exp_month']))==true? $_POST['exp_month']:false;
                $exp_year=($val->validateDigits($_POST['exp_year']))==true?$_POST['exp_year']:false;
                $cvv=($val->validateDigits($_POST['cvv']))==true?$_POST['cvv']:false;
                $pin=($val->validateDigits($_POST['pin']))==true?$_POST['pin']:false;
                //test info
                $price=($val->validateDigits($_POST['price']))==true? $_POST['price']:false;
                $test_id=($val->validateDigits($_POST['test_id']))==true? $_POST['test_id']:false;
                           
                //if all inputes are validated
                if($user_id&&$test_id&&$price&&$nameOncard&&$cardNum&&$exp_month&&$exp_year
                &&$cvv&&$pin)
                {
                    //make a payment and signup for the test
                                    
                    $test_signup_payment = $connection->test_signup_pay(
                        $user_id,$test_id,$price,$nameOncard,$cardNum,$exp_month,$exp_year
                        ,$cvv,$pin);
                }
                else
                {
                    //display error for input validation
                    $test_signup_payment[1]=($user_id)==false? 'Value of user id is not valid!<br>':'';
                    $test_signup_payment[2]=($price)==false?'Value of price is not valid!<br>':'';
                    // display error for payment info
                    if(!$nameOncard ||!$cardNum || !$exp_month || !$exp_year || !$cvv ||!$pin)
                    {
                        $test_signup_payment[3]="Please check bank card information and try again!<br>";

                    }
                }
            }
        }
        echo json_encode($test_signup_payment);
    break;
    case 'get test results':
        if(!isset($_POST['user_id']))
        {
            die('Invalid Request');
        }
        $user_id = ($val->validateAnyName($_POST['user_id']))==true?$_POST['user_id']:false;
        $result = $connection->get_test_result($user_id);
        echo $result;
    break;
    case 'get certificate list':
        if(!isset($_POST['user_id']))
        {
            die('Invalid Request');
        }
        $user_id = ($val->validateAnyName($_POST['user_id']))==true?$_POST['user_id']:false;
        $result = $connection->get_cert_list($user_id);
        echo $result;
    break;
    case 'make payment for certifcate':
        session_start();
        session_regenerate_id();
        $cert_signup_payment=[false,''];
        if($_SERVER['REQUEST_METHOD']==='POST'){
            if((!isset($_POST['_token'])) || (!isset($_SESSION['_token'])) || ($_POST['_token']!== $_SESSION['_token']))
            {
                $cert_signup_payment=[false,'Error:'];
            }
            else
            {
                // user info
                $user_id=($val->validateAnyName($_POST['user_id']))==true? $_POST['user_id']:false;
                $nameOncard=($val->validateAnyName($_POST['nameOnCard']))==true? $_POST['nameOnCard']:false;
                $cardNum=($val->validateDigits($_POST['card_num'])) == true ? $_POST['card_num'] : false;
                $exp_month=($val->validateDigits($_POST['exp_month']))==true? $_POST['exp_month']:false;
                $exp_year=($val->validateDigits($_POST['exp_year']))==true?$_POST['exp_year']:false;
                $cvv=($val->validateDigits($_POST['cvv']))==true?$_POST['cvv']:false;
                $pin=($val->validateDigits($_POST['pin']))==true?$_POST['pin']:false;
                //cert info
                $price=($val->validateDigits($_POST['price']))==true? $_POST['price']:false;
                $cert_id=($val->validateDigits($_POST['cert_id']))==true? $_POST['cert_id']:false;
                           
                //if all inputes are validated
                if($user_id&&$cert_id&&$price&&$nameOncard&&$cardNum&&$exp_month&&$exp_year
                &&$cvv&&$pin)
                {          
                    $cert_signup_payment = $connection->cert_signup_pay(
                        $user_id,$cert_id,$price,$nameOncard,$cardNum,$exp_month,$exp_year
                        ,$cvv,$pin);
                }
                else
                {
                    //display error for input validation
                    $cert_signup_payment[1]=($user_id)==false? 'Value of user id is not valid!<br>':'';
                    $cert_signup_payment[2]=($price)==false?'Value of price is not valid!<br>':'';
                    // display error for payment info
                    if(!$nameOncard ||!$cardNum || !$exp_month || !$exp_year || !$cvv ||!$pin)
                    {
                        $cert_signup_payment[3]="Please check bank card information and try again!<br>";

                    }
                }
            }
        }
        echo json_encode($cert_signup_payment);

    break;
    case 'change user image':
        //file upload result
        $uploadres =[false,""];
        // validate file type sent
        //allowed file types
        $arr_file_types = ['image/png','image/jpg', 'image/jpeg'];
        if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
            $uploadres[1] ="File type not supported";
        }
        else
        {
            //check file size
            if($_FILES['file']['size']>40000)
            {
                $uploadres[1] ="File size not supported";
            }
            else
            {
                // rename image file name to user id and save to directory
                session_start();
                session_regenerate_id();
                $uploads_dir = 'images/user_profile_images';
                $tmp_name = $_FILES["file"]["tmp_name"];
                $name = basename($_SESSION['email'].".jpg");
                
                if(move_uploaded_file($tmp_name, "$uploads_dir/$name"))
                {
                    $uploadres[0]=true;
                    $uploadres[1]="Upload success";
                }
                else
                {
                    $uploadres[1] ="Unable to save image";
                }
                
            }
        }
        echo json_encode($uploadres);
        break;
    default:
    break;
}
?>