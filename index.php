<?php include_once "includes/header.php"; ?>
<?php include_once "includes/navigation.php"; ?>

<?php
$page = !empty($_GET['page']) ? $_GET['page'] : 1;

$items_per_page = 4;

$items_count = Photo::count_all();

$paginate = new Paginate($page, $items_per_page, $items_count);

$sql = "SELECT * FROM photos ";
$sql .= "LIMIT {$items_per_page} ";
$sql .= "OFFSET {$paginate->offset()} ";

$photos = Photo::find_by_query($sql);
//echo $sql;
//$photos = Photo::find_all();

?>



    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
                <div class="row">
                <?php foreach ($photos as $photo):  ?>                
                    <div class="col-xs-6 col-md-6">
                       <a class="thumbnail" href="photo.php?id=<?php echo $photo->id; ?>">
                        <img class="home-page-photo" src="admin/<?php echo $photo->picture_path(); ?>" alt="">
                       </a>
                    </div>                 
                <?php endforeach;     ?>
                </div>
                <div class="row">
                    <ul class="pagination"> 
                    <?php
                    if($paginate->page_total() > 1){
                        if($paginate->has_next()){
                    ?>                       
                        <li class="next">
                            <a href="index.php?page=<?php echo $paginate->next(); ?>">Next &rarr;</a>
                        </li> 
                    <?php 
                        } } 
                        for ($i=1; $i <= $paginate->page_total(); $i++) {                      
                    ?>
                    <li <?php if($i == $paginate->current_page) echo "class='active'"; ?> ><a  href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php 
                    }                   
                    if($paginate->page_total() > 1){
                        if($paginate->has_previous()){
                    ?>    
                        <li class="previous">
                            <a href="index.php?page=<?php echo $paginate->previous(); ?>"index.php?page=<?php $paginate->next() ?>>&larr; Previous</a>
                        </li> 
                    <?php } } ?>                     
                    </ul>
                </div>               
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php //include_once "includes/sidebar.php"; ?>

        </div>
    </div>
        <!-- /.row -->

      <?php include_once "includes/footer.php"?>


