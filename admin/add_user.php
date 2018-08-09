<?php
require_once("includes/header.php"); 
if(!$session->is_signed_in()) redirect_to("login.php");
?>
<?php


    $user = new User() ;
    if (isset($_POST['create'])) {
        if ($user) {

            $user->username = $_POST['username'];
            $user->password = $_POST['password'];
            $user->first_name = $_POST['first_name'];
            $user->last_name = $_POST['last_name'];

            $user->set_file($_FILES['user_image']);
            $user->save_data();

            
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
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <label for="file">Picture</label>
                                <input type="file" name = "user_image" >
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name = "username" class="form-control" >
                            </div>                            
                            <div class="form-group">
                                <label for="caption">First Name</label>
                                <input type="text" name = "first_name" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="caption">Last Name</label>
                                <input type="text" name = "last_name" class="form-control" >
                            </div>   
                            <div class="form-group">
                                <label for="caption">Password</label>
                                <input type="password" name = "password" class="form-control" >
                            </div>  
                             <div class="form-group">                               
                                <input type="submit" name = "create" class="btn btn-primary pull-right" >
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