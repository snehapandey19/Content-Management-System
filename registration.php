 <?php include "includes/db.php"; ?>
 <?php include "includes/header.php"; ?>

<?php 

    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];


        if(!empty($username) && !empty($email) && !empty($password))
        {
             $username=mysqli_real_escape_string($connection,$username);
        $email=mysqli_real_escape_string($connection,$email);
        $password=mysqli_real_escape_string($connection,$password);

        $password=password_hash($password,PASSWORD_BCRYPT,array('cost'=>12));
        // $query="SELECT randSalt FROM users";
        // $select_randsalt_query=mysqli_query($connection,$query);
        // if(!$select_randsalt_query){
        //     die("query failed".mysqli_error($connection));
        // }
        // $row=mysqli_fetch_array($select_randsalt_query);

        // $salt='$2y$10$iusesomecrazystrings22';

         // $salt=$row['randSalt'];

         // $password=crypt($password,$salt);

         $query="INSERT INTO users(username, user_email,user_password,user_role)";
         $query.="VALUES('{$username}','{$email}','{$password}','admin')";
         $register_user_query=mysqli_query($connection,$query);
         if(!$register_user_query){
            die("query failed".mysqli_error($connection).' '.mysqli_errno($connection));
         }
        // echo "password=".$password;
         $message="your registration has been submitted";
         echo $password;
        }
        else
        {
            $message="Fields cannot be empty";
        }


       

        }
        else
        {
            $message="";
        }
    


 ?>



<!-- Navigation -->
<?php include "includes/navigation.php" ?>

<!--  CONTENT
----------------------------------------------------------->
<div class="container">
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                    <h1>Register</h1>
                    
                    <!-- NOTIFIES USER OF SUCCESSFUL REGISTRATION; ELSEIF THERE IS A ERROR MESSAGE IT IS DISPLAYED -->
                    

                        

                    
                   
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">



                        <h6 class="text-center"><?php echo $message; ?><h6>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            <div class="input-group">
                                <label for="show-password">
                                    <input type="checkbox" id="show-password" />
                                    Show Password
                                </label>
                            </div>
                        </div>
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<hr>
<!----------------------------------------------------------  
--  END CONTENT -->  

<?php include "includes/footer.php" ?>