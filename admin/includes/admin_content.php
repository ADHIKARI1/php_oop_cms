          <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin <small>Dashboard</small>
                        </h1>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $session->count; ?></div>
                                        <div>New Views</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
            
                                  <span class="pull-left">View Details</span> 
                               <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> 
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                     <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-photo fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo Photo::count_all(); ?></div>
                                        <div>Photos</div>
                                    </div>
                                </div>
                            </div>
                            <a href="photos.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Total Photos in Gallery</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>


                     <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo User::count_all(); ?>

                                        </div>

                                        <div>Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Total Users</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                      <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo Comment::count_all(); ?>

                                        </div>
                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Total Comments</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>


            </div> <!--First Row-->
            <div class="row"><div id="piechart" style="width: 900px; height: 500px;"></div></div>
                         <?php 
                            /*$sql = "SELECT * FROM users WHERE id = 23";
                            $res = $db->query($sql);
                            $user = mysqli_fetch_array($res);
                            echo $user['username'];*/

                            //$user = new User();
                            //$res = $user->find_all_users();
                            /*$res = User::find_all_users();// call for static methode 
                            while($row = mysqli_fetch_array($res))
                            {
                               echo $row['username']."</br>";
                            }*/
                            /*$res = User::find_user_by_id(23);      
                            $user = User::instantation($res);                   
                            echo $user->username;*/
                            
                            /*$res = User::find_all_users();
                            //var_dump($res);
                            //print_r($res);
                            foreach ($res as $key ) {
                                echo $key->first_name."</br>";
                            }*/
                            /*$res = Photo::find_by_id(8);                                                
                            echo $res->type;*/

                           /* $user = new User();
                            $user->username = "bijja";
                            $user->password = "123469";
                            $user->first_name = "john";
                            $user->last_name = "Dane";

                            $user->create();
                            echo $user->id;*/

                            /*$res = User::find_user_by_id(26);                         
                            $res->username = "kosa"; 
                            $res->password = "15858iko";
                            $res->first_name = "bokkaoko";                           
                           // echo  $res->username;
                            $res->update();*/

                            /*$res = User::find_user_by_id(30);
                            $res->delete();*/

                           /* $res = User::find_user_by_id(25);
                            $res->username="hmm k";
                            $res->save();*/

                            /*$res = new User();
                            $res->username="pakka";
                            $res->save();*/

                            /*$arr = array("a", "b", "c");
                            echo implode("|", $arr);*/

                            /*$res = User::find_all();
                            foreach($res as $user)
                            {
                               echo $user->username."</br>";
                            }*/
                           /* $photo = Photo::find_all();
                            foreach($photo as $pic)
                            {
                               echo $pic->description."</br>";
                            }*/

                            /*$photo = new Photo();
                            $photo->title = "lemon";
                            $photo->description = "owwww";
                             $photo->alternate_text = "iobaa";
                            $photo->type = "image/jpg";                           
                            $photo->size = 112225;
                            $photo->create();*/
                            // echo INCLUDES_PATH;                       
                        ?>       
                                  
                        
                    </div>
                </div>
                <!-- /.row -->
            </div>              
            <!-- /.container-fluid -->