<?php
require_once("includes/header.php"); 
if(!$session->is_signed_in()) redirect_to("login.php");
?>
<?php

if (empty($_GET['id'])) {
   redirect_to("users.php");
}   

$user = User::find_by_id($_GET['id']);
if (isset($_POST['update'])) {

    if ($user) {

        $user->username = $_POST['username'];
        $user->password = $_POST['password'];
        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];

        if (empty($_FILES['user_image'])) {
            $user->save();
        }
        else
        {
            $user->set_file($_FILES['user_image']);       
            $user->save_data();
        }

        

        
    }
}





?>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            
          <?php include("includes/top_nav.php"); ?>
            
            
            
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            
            <?php include("includes/side_nav.php"); ?>
            
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    
                        <h1 class="page-header">
                            users                            
                        </h1>
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="col-md-4">
                            <img class="img-responsive"  src="<?php echo $user->image_path(); ?>" width="200" height="200">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="file">Picture</label>
                                <input type="file" name = "user_image" >
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name = "username" class="form-control" value="<?php echo $user->username; ?>">
                            </div>                            
                            <div class="form-group">
                                <label for="caption">First Name</label>
                                <input type="text" name = "first_name" class="form-control" value="<?php echo $user->first_name; ?>">
                            </div>
                            <div class="form-group">
                                <label for="caption">Last Name</label>
                                <input type="text" name = "last_name" class="form-control" value="<?php echo $user->last_name; ?>">
                            </div>   
                            <div class="form-group">
                                <label for="caption">Password</label>
                                <input type="password" name = "password" class="form-control" value="<?php echo $user->password; ?>">
                            </div>  
                             <div class="form-group">                               
                                <input type="submit" name = "update" class="btn btn-primary pull-right" value="Update">
                                <a class="btn btn-warning pull-left" href="delete_user.php?id=<?php echo $user->id; ?>">Delete</a>
                            </div>                                                                             
                        </div>

                        
                        </form>                        
                    </div>
                </div>
                <!-- /.row -->
            </div>              
            <!-- /.container-fluid -->     
       
        <!-- /#page-wrapper -->

    <?php include("includes/footer.php"); ?>