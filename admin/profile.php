<?php include "includes/admin_header.php"  ; ?>
    <?php
    if(isset($_SESSION['username'])){
        $username= $_SESSION['username'];

        $query="SELECT * FROM users WHERE username='{$username}'";
        $select_user_profile_query=mysqli_query($connection,$query);
        while($row=mysqli_fetch_array($select_user_profile_query)){
             $user_id= $row['user_id'];
                            $username= $row['username'];
                            $user_password=$row['user_password'];
                            $user_firstname=$row['user_firstname'];
                            $user_lastname=$row['user_lastname'];
                            $user_email=$row['user_email'];
                            // $user_image=$row['user_image'];
                            $user_role=$row['user_role'];
                        
        }
    }
    ?>


    <?php
        if(isset($_GET['edit_user'])){
        $the_user_id=$_GET['edit_user'];
        $query= "SELECT * FROM users WHERE user_id=$the_user_id";
        $select_users_query=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($select_users_query ))
            {
                $user_id= $row['user_id'];
                $username= $row['username'];
                $user_password=$row['user_password'];
                $user_firstname=$row['user_firstname'];
                $user_lastname=$row['user_lastname'];
                $user_email=$row['user_email'];
                $user_image=$row['user_image'];
                $user_role=$row['user_role'];

            }
    }
  if(isset($_POST['edit_user']))
  {
    //$user_id=$_POST['user_id'];
    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    $user_role=$_POST['user_role'];

    // $post_image=$_FILES['image']['name'];
    // $post_image_temp=$_FILES['image']['tmp_name'];

    $username=$_POST['username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
  


//    move_uploaded_file($post_image_temp, "../images/$post_image");
 $query="UPDATE users SET user_firstname='{$user_firstname}',user_lastname='{$user_lastname}',user_role='{$user_role}',username='{$username}',user_email='{$user_email}',user_password='{$user_password}' WHERE username='{$username}' ";
                    

    $edit_user_query =mysqli_query($connection,$query);
    confirm($edit_user_query);
  
  }
?>


    <div id="wrapper">

        <?php include "includes/admin_navigation.php"  ; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Author</small>
                        </h1>


            <form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label for="title">Firstname</label>
      <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
      <label for="post_status">Lastname</label>
      <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
    </div>

    <select name="user_role" id="">
      <option value="subscriber"><?php echo $user_role; ?></option>
      <?php
      if($user_role == 'admin'){
      echo "<option value='subscriber'>subscriber</option>";
    }
    else
    {
       echo "<option value='admin'>admin</option>";
    }
    ?>

     <!--  <option value="admin">Admin</option>
      <option value="subscriber">Subscriber</option> -->
    </select>

    

    <!-- <div class="form-group">
      <label for="post_image">Post Image</label>
      <input type="file" name="image">
    </div> -->

    <div class="form-group">
      <label for="post_tags">Username</label>
      <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
    </div>
    <div class="form-group">
      <label for="post_tags">Email</label>
      <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
    </div>

    <div class="form-group">
      <label for="post_tags">Password</label>
      <input type="password" class="form-control" value="<?php echo $user_password; ?>" name="user_password">
    </div>

    <div class="form-group">
      <input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">
    </div>
  </form>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"; ?>