          <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin <small>Statistics Overview</small>
                        </h1>
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
                            echo $user->username;
                            */
                            /*$res = User::find_all_users();
                            //var_dump($res);
                            //print_r($res);
                            foreach ($res as $key ) {
                                echo $key->first_name."</br>";
                            }*/
                            $res = User::find_user_by_id(22);                                                
                            echo $res->username;

                           
                        ?>       
                                  
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