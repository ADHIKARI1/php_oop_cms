<?php
require_once("includes/header.php"); 
if(!$session->is_signed_in()) redirect_to("login.php");
?>
<?php
$photos = Photo::find_all();
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
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Photos
                            <small> Statistics Overview</small>
                        </h1>
                        <div class="col-md-12">
                            <table class="table table-hover">
                                <thead>                                                                    
                                    <tr>
                                        <th>Photo</th>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Size</th>
                                    </tr>                                
                                </thead>
                                <tbody>
                                    <?php foreach ($photos as $photo) :  ?>  
                                    <tr>
                                        <td>
                                            <img src="<?php echo $photo->picture_path(); ?>" width="135" height=="90">
                                            <div class="pictures_links"> 
                                                <a href="delete_photo.php/?id=<?php echo $photo->id; ?>">Delete</a>
                                                <a href="">Edit</a>                                                            
                                                <a href="">View</a>
                                            </div>
                                        </td>
                                        <td><?php echo $photo->id; ?></td>
                                        <td><?php echo $photo->title; ?></td>
                                        <td><?php echo $photo->type; ?></td>
                                        <td><?php echo $photo->size; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>                  
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
            </div>              
            <!-- /.container-fluid -->     
        </div>
        <!-- /#page-wrapper -->

    <?php include("includes/footer.php"); ?>