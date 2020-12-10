<?php  
require_once 'config.php';
session_start(); 

    class dbfunction extends Config {  
          
        public function UserRegister($name, $email, $mobile, $password, $security_question, $security_answer)
        {  
                $password = md5($password);
                
                $qr = mysqli_query($this->con,"INSERT INTO tbl_user(name, email, mobile, email_approved, active, is_admin, sign_up_date, password, security_question, security_answer) values('$name','$email','$mobile','1', '1', '0', NOW(),'$password', '$security_question', '$security_answer')") or die(mysqli_error());  
                return $qr;                 
        }  
        public function Login($email, $password){  
            $password = md5($password);
            $res = mysqli_query($this->con,"SELECT * FROM tbl_user WHERE email = '$email' AND password = '$password'");  
            $user_data = mysqli_fetch_array($res);   
            $result= mysqli_num_rows($res) ;
              
            if ($result == 1)   
            {  
                $_SESSION['login'] = true;  
                $_SESSION['uid'] = $user_data['id'];  
                $_SESSION['name'] = $user_data['name'];  
                $_SESSION['email'] = $user_data['email'];
                $_SESSION['is_admin'] = $user_data['is_admin'];
                if ($_SESSION['is_admin'] == '1') 
                {
                       header('location:admin/index.php');
                }  
                else {  
                   
                    echo "<script>alert('You are successfully logged in..Please verify yourself');</script>";
                    header('refresh:0; url=index.php');
                }
            }  
            else  
            {  
                return '0';  
            }  
        }  
        public function isUserExist($email){ 
            $errors = '';  
            $qr = mysqli_query($this->con,"SELECT * FROM tbl_user WHERE email = '".$email."'");  
             $row = mysqli_num_rows($qr);  
            if($row > 0){  
             
                      $errors= "Username already exists";
                      return $errors;
                    
            }  
        }  
    }  
?>  