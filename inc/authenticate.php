<?php
// only allow POST request to access this page
session_start();
session_regenerate_id();
if($_SERVER['REQUEST_METHOD']!== 'POST')
{
    header('location:../index.php');
}
else
{
    if(isset($_SESSION['loggedin']))
    {
        switch ($_SESSION['active_status']) {
            case '0':
                echo 'login Success(Not active)';
                break;
            case '1': 
                echo 'login Success(Student)';
                break;
            case '2':
                echo 'login Success(Teacher)';
            break;
            //
            default:
                // code...
                break;
        }
    }
    else
    {
        if((!isset($_POST['_token'])) || 
        (!isset($_SESSION['_token'])) || ($_POST['_token']!== $_SESSION['_token']))
        { 
            /* another page with wrong token value is trying to hajack 
            the session */
            /* False error msg to prevent session hijacking */
            echo "Database Error!";
        }
        else
        {
            include_once 'validate.php';
            include_once 'db.php';
            // check token
            // database connection
            $connection = new DB();
            $con = $connection->connect_to_db();
            //validating POST data
            $val = new Validate();
            $email = ($val->validateEmail($_POST['email']))==true? $_POST['email']:false;
            $password = ($val->validatePass($_POST['password']))==true? $_POST['password']: false;
            
            // check if email and pass are true and  valid
            if(($email) && ($password)){
                if ($stmt = $con->prepare("SELECT id,pass,name,tell,email,address,active_status FROM user WHERE email = ?")) {
                    $stmt->bind_param('s', $email);
                    $stmt->execute();
                    // Store the result so we can check if the account exists in the database.
                    $stmt->store_result();
                    if ($stmt->num_rows > 0) {
                        $stmt->bind_result($id, $pass, $name,$tell,$email,$address,$active_status);
                        $stmt->fetch();
                        // Account exists, now we verify the password.
                        if (password_verify($password, $pass)) {
                            // Verification success! User has loggedin!
                            // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
                            session_regenerate_id();
                            $_SESSION['loggedin'] = TRUE;
                            $_SESSION['user_id'] = $id;
                            $_SESSION['password'] = $pass;
                            $_SESSION['name'] = $name;
                            $_SESSION['tell'] = $tell;
                            $_SESSION['email'] = $email;
                            $_SESSION['address'] = $address;
                            $_SESSION['active_status'] = $active_status;
                            $_SESSION['LAST_ACTIVITY'] = time();
                            switch ($_SESSION['active_status']) {
                                case '0':
                                    echo 'login Success(Not active)';
                                    break;
                                case '1': 
                                    echo 'login Success(Student)';
                                    break;
                                case '2':
                                    echo 'login Success(Teacher)';
                                break;
                                //
                                default:
                                    // code...
                                    break;
                            }
                        
                        } else {
                            echo 'Incorrect password!';
                        }
                    } else {
                        echo 'Incorrect username!';
                    }
                    $stmt->close();
                }
                else{
                    echo 'Database Error!';
                }  
            }
            else
            {
                echo 'Value of username or password is incorrect';
            }
            $con->close();
        }
    }
}


?>