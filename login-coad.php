<?php
    require 'config/function.php';

    if(isset($_POST['loginBtn']))
    {
        $email =validate($_POST['email']);
        $password =validate($_POST['password']);

        if($email != '' && $password !='') 
        {
            $query="SELECT * FROM admin WHERE email='$email' LIMIT 1";
            $result =mysqli_query($conn,$query);
            if($result){

                if(mysqli_num_rows($result) == 1){

                    $row =mysqli_fetch_assoc($result);
                    $hashPassword=$row['password'];

                    if(!password_verify($password,$hashPassword)){
                        redirct('login.php','Invalid Email Address ');  
                    }
                    $_SESSION['loggedIn']=true;
                    $_SESSION['loggedInUser']=[
                        'user_id' => $row['id'],
                        'name' => $row['name'],
                        'email' => $row['email'],
                        'phone' => $row['phone'],

                    ];
                    redirct('admin/index.php','Logged in succsessfully ');
                    

                }else{
                    redirct('login.php','Invalid Email Address ');
                }

            }else{

            }
        }
        else{
            redirct('login.php','All Fields are requred !');
        }
    }
?>