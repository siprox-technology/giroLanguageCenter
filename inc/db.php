<?php
include_once 'payment-api.php';
// class database
class DB{
        //database properites
        private $DATABASE_HOST = 'localhost';
        private $DATABASE_USER = 'siproxte_giro';
        private $DATABASE_PASS = '123456sip@giroabvg';
        private $DATABASE_NAME = 'siproxte_giro';
        // connection to db
        public function connect_to_db()
        {
            // Try and connect using the info above.
            $con = mysqli_connect($this->DATABASE_HOST, $this->DATABASE_USER, $this->DATABASE_PASS, $this->DATABASE_NAME);
                if (mysqli_connect_errno()) {
                // If there is an error with the connection, stop the script and display the error.
                    die ('Failed to connect to MySQL: ' . mysqli_connect_error());
                }
                else{
                     return $con;
                }
        }
        //return course names based on their product ids
        public function getCourseName($course_id){
            $con = $this->connect_to_db();            
            // Prepare our SQL
            $stmt = $con->prepare("SELECT distinct title from course where id like ? ");
            $stmt->bind_param('s',$course_id);
            $stmt->execute();
            $result = $stmt->get_result();
            for($i=0; $i<$result->num_rows; $i++)
            {
            $course_names[$i] = $result->fetch_array(MYSQLI_NUM);
            }
            $stmt->close();
            $con->close();
            return json_encode($course_names);
        }
        //return language course level based on selected language course title
        public function getCourseLevel($course_name){
            $con = $this->connect_to_db();            
            // Prepare our SQL
            $stmt = $con->prepare("SELECT distinct language_level from course where title = ? ");
            $stmt->bind_param('s',$course_name);
            $stmt->execute();
            $result = $stmt->get_result();
            for($i=0; $i<$result->num_rows; $i++)
            {
               $course_levels[$i] = $result->fetch_array(MYSQLI_NUM);
            }
            $stmt->close();
            $con->close();
            return json_encode($course_levels);
        }
        // return course fee based on course title and level 
        public function getCourseFees($course_level,$course_title){
            $con = $this->connect_to_db();            
            // Prepare our SQL
            $stmt = $con->prepare("SELECT tuition from course where title = ? and language_level = ? ");
            $stmt->bind_param('ss',$course_title,$course_level);
            $stmt->execute();
            $result = $stmt->get_result();
            for($i=0; $i<$result->num_rows; $i++)
            {
               $course_fees[$i] = $result->fetch_array(MYSQLI_NUM);
            }
            $stmt->close();
            $con->close();
            return json_encode($course_fees);
        }
        public function signup_and_pay($userId,$courseTitle,
        $courseLevel,$coursePrice,$CardName,
        $cardNumber,$expMonth,$expYear,$CVV,$pinCode){
            //result array
            $con = $this->connect_to_db();
            $signup_result =[false];
            //get course_id
            $stmt4 = $con->prepare("SELECT id FROM course WHERE title = ? AND language_level = ?");
            $stmt4->bind_param('ss',$courseTitle,$courseLevel);
            $stmt4->execute();
            $y = $stmt4->get_result();

            for($i=0; $i<$y->num_rows; $i++)
            {
                $course_id[$i] = $y->fetch_array(MYSQLI_NUM);
            }
            $courseId =strval($course_id[0][0]);

            //check if user hasnt signedup up for this class
            if($stmt = $con->prepare("SELECT FK_course_id_signed_course FROM
            signed_up_course WHERE FK_user_id_signed_user = ? AND
            FK_course_id_signed_course = ? AND 
             status = '0'"))
            {
                $stmt->bind_param('ss',$userId,$courseId);
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows >0 )
                {
                    //user already signed up for this course
                    $signup_result =[false,'You aleardy signed up for this course and it is not finished!'];
                }
                else
                {
                    //user can sign up for this course

                    //make a payment to api
                    $newTransAct = new Payment_Api();
                    $paymetRes = $newTransAct->make_payment($CardName, $cardNumber,
                    $expMonth,$expYear,
                    $CVV,$coursePrice,$pinCode);
                    //if payment is success
                    if ($paymetRes[0]==true)
                    {
                        //insert payment info into db 
                        if($stmt1= $con->prepare("INSERT INTO payment (user_id,course_title,last_four_digit,nameOnCard,Date,time,amount,reference_num)
                        VALUES (?,?,?,?,?,?,?,?)"))
                        {
                            $last4Digit = substr($cardNumber,12);
                            $dateNow = date("Y-m-d");
                            $timeNow =date("h:i:sa");
                            $stmt1->bind_param('isssssis',$userId,$courseTitle,
                            $last4Digit,$CardName,$dateNow,$timeNow,$coursePrice,
                            $paymetRes[1]);
                            $stmt1->execute();
                            //make sure insert is success
                            $x =$stmt1->affected_rows;
                            if($x>0)
                            {
                            //update user status from 0 to 1 if not updated before
                            //and insert to signed up class list table
                                if($stmt2 = $con->prepare("INSERT INTO signed_up_course(
                                FK_course_id_signed_course,FK_user_id_signed_user
                                ) VALUES(?,?)")) 
                                {
                                    if($stsm3 =$con->prepare("UPDATE user SET active_status = if(active_status = '0','1','1')
                                    WHERE id = ?"))
                                    {
                                        //insert data to sign up table and update user status if 0
                                        $stmt2->bind_param('ss',$courseId,$userId);
                                        $stmt2->execute();
                                        $stsm3->bind_param('i',$userId);
                                        $stsm3->execute();
                                        $signup_result = [true,'Payment and signup successfull',$paymetRes[1],$dateNow];
                                    }
                                    else
                                    {
                                        //update user status failed
                                        $signup_result =[false,'Error : unable to update user status.'];
                                    }
                                }
                                else
                                {
                                    //insert into signup table failed
                                    $signup_result =[false,'Error : unable to save user signup info.'];
                                }

                            }
                            else
                            {
                            //payment failed
                             $signup_result =[false,'Error : unable to save payment info.'];
                            }
                        }
                        else
                        {
                            //insert to payment table failed
                            $signup_result =[false,'Error : unable to save payment info.'];
                        }
                        
                    }
                    else
                    {
                        //payment failed
                        $signup_result =[false,'Payment transaction failed. Check card details.'];
                    }
                }
            }
            else
            {
                //database error
                $signup_result =[false,'Database error'];
            }
            return $signup_result;
        }
        public function get_payment_info($user_id)
        {
            $con = $this->connect_to_db();            
            // Prepare our SQL
            $stmt = $con->prepare("SELECT id,reference_num,Date,time,FK_user_id_payment_user from siproxte_giro.payment where FK_user_id_payment_user = ?");
            $stmt->bind_param('s',$user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            for($i=0; $i<$result->num_rows; $i++)
            {
               $payments[$i] = $result->fetch_array(MYSQLI_NUM);
            }
            $stmt->close();
            $con->close();
            return json_encode($payments);
        }
        public function get_class_list($user_id) 
        {
            //SET COURSE LIST ARRAY
            $course_list[]="";
            $con = $this->connect_to_db();            
            // Prepare our SQL
            $stmt = $con->prepare(
            "SELECT title,language_level,start_date,
            duration,day,time,room_no,
            (select name from siproxte_giro.user where 
            id = course.FK_teacher_id_course_user) as teacher_name
            ,status,grade FROM 
            siproxte_giro.course inner join siproxte_giro.timetable
            on (course.id = timetable.FK_course_id_timetable_course) 
            inner join
            siproxte_giro.signed_up_course on
            (course.id = signed_up_course.FK_course_id_signed_course) where
            FK_user_id_signed_user = ? order by start_date");
            $stmt->bind_param('s',$user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            for($i=0; $i<$result->num_rows; $i++)
            {
               $course_list[$i] = $result->fetch_array(MYSQLI_NUM);
            }
            $stmt->close();
            $con->close();
            return json_encode($course_list);
        }
        public function get_class_list_teacher($user_id)/* here */
        {
            //SET COURSE LIST ARRAY
            $course_list[]="";
            $con = $this->connect_to_db();            
            // Prepare our SQL
            $stmt = $con->prepare(
            "SELECT course.id,course.title, course.language_level,
            timetable.start_date,timetable.duration,timetable.day,timetable.room_no,status
            from course
            inner join timetable
            on course.id = timetable.FK_course_id_timetable_course
            inner join signed_up_course
            on course.id = signed_up_course.FK_course_id_signed_course
            and course.FK_teacher_id_course_user = ?
            order by start_date");
            $stmt->bind_param('s',$user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            for($i=0; $i<$result->num_rows; $i++)
            {
               $course_list[$i] = $result->fetch_array(MYSQLI_NUM);
            }
            $stmt->close();
            $con->close();
            return json_encode($course_list);
        }
        public function get_avail_test()
        {
            $con = $this->connect_to_db();            
            // Prepare our SQL
            $stmt = $con->prepare(
            "SELECT id, name,fee,date,time,address
            FROM test");
            $stmt->execute();
            $result = $stmt->get_result();
            for($i=0; $i<$result->num_rows; $i++)
            {
               $test_list[$i] = $result->fetch_array(MYSQLI_NUM);
            }
            $stmt->close();
            $con->close();
            return json_encode($test_list);
        }
        public function test_signup_pay($user_id,$test_id,$testPrice,
        $CardName,$cardNumber,$expMonth,$expYear,$CVV,$pinCode)
        {
            //result array
            $con = $this->connect_to_db();
            $signup_result =[false];

            // check to see if user already signed up for test
            if($stmt = $con->prepare("SELECT count(FK_user_id_test_list_user) as numOFStudents,
            (SELECT capacity from test where id =?)as capacity,
            (select id from test_student_list where FK_user_id_test_list_user=? AND
            FK_test_id_list_test = ? ) as w
            FROM siproxte_giro.test_student_list where FK_test_id_list_test=?"))
            {
                $stmt->bind_param('ssss',$test_id,$user_id,$test_id,$test_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_array(MYSQLI_NUM);
                // check the user hasnt signedup yet and test capacity isnt full
                if($row[0]==$row[1]  ||  $row[2]!=null)
                {
                    //user already signed up for this test
                    $signup_result =[false,'You aleardy signed up for this test or test capacity is full!'];
                }
                else
                {
                    //make a payment to external api
                    $newTransAct = new Payment_Api();
                    $paymetRes = $newTransAct->make_payment($CardName, $cardNumber,
                    $expMonth,$expYear,
                    $CVV,$testPrice,$pinCode);
                    //if payment is success
                    if ($paymetRes[0]==true)
                    {
                        //insert payment info into db 
                        if($stmt1= $con->prepare("INSERT INTO payment (user_id,
                        last_four_digit,
                        nameOnCard,Date,time,amount,reference_num,test_id)
                        VALUES (?,?,?,?,?,?,?,?)"))
                        {
                            $last4Digit = substr($cardNumber,12);
                            $dateNow = date("Y-m-d");
                            $timeNow =date("h:i:sa");
                            $stmt1->bind_param('issssssi',$user_id,
                            $last4Digit,$CardName,$dateNow,$timeNow,$testPrice,
                            $paymetRes[1],$test_id);
                            $stmt1->execute();
                            //make sure insert is success
                            $x =$stmt1->affected_rows;
                            if($x>0)
                            {   //insert to student test list
                                if($stmt2=$con->prepare("INSERT INTO test_student_list
                                (FK_test_id_list_test,FK_user_id_test_list_user)
                                VALUES (?,?)")){
                                    $stmt2->bind_param('ss',$test_id,$user_id);
                                    $stmt2->execute();
                                    //making sure insert is success
                                    $x=$stmt2->affected_rows; //HERE set database max row number for student test list
                                    if($x>0){
                                        $signup_result = [true,'Payment and signup successfull',
                                        $paymetRes[1],$testPrice,$dateNow,$user_id,$test_id];
                                    }
                                    else
                                    {
                                        //payment failed
                                        $signup_result =[false,'Error : unable to save user into test list'];
                                    }
                                }
                                else
                                {
                                    //insert into test_student_list table failed
                                    $signup_result =[false,'Error : unable to save user into test list'];
                                }
                            }
                            else
                            {
                                //payment failed
                                $signup_result =[false,'Error : unable to save payment info.'];
                            }
                        }
                        else
                        {
                            //insert to payment table failed
                            $signup_result =[false,'Error : unable to save payment info.'];
                        }
                        
                    }
                    else
                    {
                        //payment failed
                        $signup_result =[false,'Payment transaction failed. Check card details.'];
                    }
                }
            }
            else
            {
                //database error
                $signup_result =[false,'Database error'];
            }
            return $signup_result;
            $con->close();
        }
        public function get_test_result($user_id){
            //SET test LIST ARRAY
            $test_list[]="";
            $con = $this->connect_to_db();            
            // Prepare our SQL
            $stmt = $con->prepare(
            "SELECT distinct name,type,level,date,result 
            from test inner join test_student_list
            on test.id = test_student_list.FK_test_id_list_test 
            and 
            FK_test_id_list_test in 
            (select FK_test_id_list_test from 
            test_student_list where FK_user_id_test_list_user = ?)");
            $stmt->bind_param('s',$user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            for($i=0; $i<$result->num_rows; $i++)
            {
                $test_list[$i] = $result->fetch_array(MYSQLI_NUM);
            }
            $stmt->close();
            $con->close();
            return json_encode($test_list);
        }
        public function get_cert_list($user_id){
            $cert_list=[];
            $con = $this->connect_to_db();            
            // Prepare our SQL
            $stmt = $con->prepare(
            "SELECT * FROM siproxte_giro.certificate where FK_user_id_cert_user= ?");
            $stmt->bind_param('s',$user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            for($i=0; $i<$result->num_rows; $i++)
            {
               $cert_list[$i] = $result->fetch_array(MYSQLI_NUM);
            }
            $stmt->close();
            $con->close();
            return json_encode($cert_list);
        }
        public function cert_signup_pay($user_id,$cert_id,$price,
        $nameOncard,$cardNum,$exp_month,$exp_year
        ,$cvv,$pin)
        {
            //result array
            $cert_payment_result=[false];
            $con = $this->connect_to_db();
            // make a payment to external api
            $newTransAct = new Payment_Api();
            $paymetRes = $newTransAct->make_payment($nameOncard, $cardNum,
            $exp_month,$exp_year,
            $cvv,$price,$pin);
            //if success
            if($paymetRes[0]==true)
            {
                //insert payment info into db 
                if($stmt1= $con->prepare("INSERT INTO payment (user_id,
                last_four_digit,
                nameOnCard,Date,time,amount,reference_num,cert_id)
                VALUES (?,?,?,?,?,?,?,?)"))
                {
                    $last4Digit = substr($cardNum,12);
                    $dateNow = date("Y-m-d");
                    $timeNow =date("h:i:sa");
                    $stmt1->bind_param('issssssi',$user_id,
                    $last4Digit,$nameOncard,$dateNow,$timeNow,$price,
                    $paymetRes[1],$cert_id);
                    $stmt1->execute();
                    //make sure insert is success
                    $x =$stmt1->affected_rows;
                    if($x>0)
                    {  //insert into certificate req list
                        if($stmt2=$con->prepare("INSERT INTO cert_req_list
                        (FK_cert_id_list_cert,fee)
                        VALUES (?,?)")){
                            $stmt2->bind_param('ss',$cert_id,$price);
                            $stmt2->execute();
                            $cert_payment_result=[true,'Payment successfull',
                            $paymetRes[1],$price,$dateNow,$user_id,$cert_id];
                        }
                        else
                        {
                            //insert into certificate req  table failed
                            $cert_payment_result =[false,'Error : unable to save request'];

                        }


                    }
                    else
                    {
                        //payment failed
                        $cert_payment_result =[false,'Error : unable to save payment info.'];

                    }
                }
                else
                {
                    //insert to payment table failed
                    $cert_payment_result =[false,'Error : unable to save payment info.'];
                }
            }
            else
            {
                //payment failed
                $cert_payment_result =[false,'Payment transaction failed. Check card details.'];

            }
            return $cert_payment_result;
            $con->close();
        }
    }
?>