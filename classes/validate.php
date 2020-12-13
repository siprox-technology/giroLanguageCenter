<?php
//validation and security for input feilds
class Validate{
    public function validateEmail($email){
     // check email for correct characters
     if(filter_var($email,FILTER_VALIDATE_EMAIL))
        {
        $email = str_split($email);
        $pattern =["!","#","$","%","^","&","*","(",")","=","+","'\'","|","{","}","~",":",";","<",">","?","/","'",","];
        $result = array_intersect($email,$pattern);
            if (empty($result)){
                return true;
            } 
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }    
    }
    public function validateAnyname($txt){
        // check txt for corect characters
        $txt = str_split($txt);
        $pattern =["!","#","@","_",";","$","%","^","&","*","(",")","=","+","'\'","|","{","}","~",":","<",">","?","/","'"];
        $result = array_intersect($txt,$pattern);
            if (empty($result)){
                return true;
            } 
            else
            {
                return false;
            }
    } 
    public function validtePhone($phone){
        // check phone for corect digits for english phone number
        $phone = str_split($phone);
        $pattern =["1","2","3","4","5","6","7","8","9",
        "0","+"];
        $result = array_diff($phone,$pattern);
            if (empty($result)){
                return true;
            } 
            else
            {
                return false;
            }
    }
    // check number fields for being just numbers
    public function validateDigits($num){
        $num = str_split($num);
        $pattern =["1","2","3","4","5","6","7","8","9",
        "0"];
        $result = array_diff($num,$pattern);
            if (empty($result)){
                return true;
            } 
            else
            {
                return false;
            }
    }
    /* between 5 to 20 characters and numbers and letters only*/
    public function validatePass($pass){
        if (strlen($pass) > 20 || strlen($pass) < 5) {
            return false;
        }
          // check password for letters and digits only
          $pass = str_split($pass);
          $pattern =["!","#","@","_","-",";","$","%","^","&","*","(",")","=","+","'\'","|","{","}","~",":","<",">","?","/","'"];
          $result = array_intersect($pass,$pattern);
          if (empty($result)){
            return true;
        } 
        else
        {
            return false;
        }   
    }
    public function sanitizePass($pass){
        return $this->sanitizeString($pass);
    }
    // validate and asnitize activation code
    public function validateActivationCode($code){
        if (((strlen($code) != 6)) || ($this->validateAnyname($code) == false)) {
            return false;
        }
        else{
            return true;
        }
    }
    private function sanitizeString($var){
        if (get_magic_quotes_gpc()) {
            $var = stripslashes($var);
        } 
        //getting rid of any slashes in the string
            $var = strip_tags($var); // removes any tags and angle bracket
            $var = htmlentities($var); // to remove any html from string
            return $var;
    }
    // Creadit card form validation
    // validation for card number
    public function validateCardNumber($number){
        if ((strlen($number) == 16) &&($this->validateAnyname($number,"card number") !== false))
        {
            return true;
        }
        else
        {
           /*  echo "Error: Card number must be 16 numbers and digits only "; */
            return false;
        }
    }
}
?>