<?php
include_once 'validate.php';
include_once 'db.php';

Class User{
    
    public function change_pass_withCode($pass, $code, $user)
    {
        $conn = new DB();
        $con = $conn->connect_to_db();
        $result = [false,'',''];
        session_start();
        session_regenerate_id();
        // check seurity code
        $sec_digit = $_SESSION['generated_code'];
        if(($code)==($sec_digit))
        {
            // change pass code ...
            if($stmt1 = $con->prepare("UPDATE user set pass = ? WHERE email = ?"))
            {
                $stmt1->bind_param("ss",$pass,$user);
                $stmt1->execute();
                 //if success
                $result[0] = true;
                $_SESSION['generated_code'] = NULL;
            }
            else
            {
                //if failed
                $result[2] = 'Databse failed!';
      
            }

        }
        else
        {
            // pass code not match
                $result[1] = 'Security code is incorrect';
        }
        
        $con->close();
        return $result;
        
    }

    public function change_address($address,$email)
    {
        $conn = new DB();
        $con = $conn->connect_to_db();
        $result = [false,''];

            // change pass code ...
            if($stmt1 = $con->prepare("UPDATE user set address = ? WHERE email = ?"))
            {
                $stmt1->bind_param("ss",$address,$email);
                $stmt1->execute();
                 //if success
                 $numOfRow = $con->affected_rows;
                if($numOfRow>0) 
                {
                    $result[0] = true;
                    $_SESSION['address']=$address;       
                }
                else
                {
                    $result[1] ='Database failed';
                }
            }
            else
            {
                //if failed
                $result[1] = 'Databse failed!';
      
            }
        $con->close();
        return $result;
    }
    public function change_phone($phone,$email){
        $conn = new DB();
        $con = $conn->connect_to_db();
        $result = [false,''];

            // change tell ...
            if($stmt1 = $con->prepare("UPDATE user set tell = ? WHERE email = ?"))
            {
                $stmt1->bind_param("ss",$phone,$email);
                $stmt1->execute();
                 //if success
                 $numOfRow = $con->affected_rows;
                if($numOfRow>0) 
                {
                    $result[0] = true;
                    $_SESSION['tell']=$phone;       
                }
                else
                {
                    $result[1] ='Database failed';
                }
         
            }
            else
            {
                //if failed
                $result[1] = 'Databse failed!';
      
            }
        $con->close();
        return $result; 
    }
    public function change_image(){
        
    }

}

?>