<?php
include_once("includes/init.php"); 
if(!$session->is_signed_in()) redirect_to("login.php");
?>

<?php


if (empty($_GET['id'])) {
    redirect_to("users.php");
}
$user = User::find_by_id($_GET['id']);
if ($user) {
    $user->delete_user();
    $session->message("The {$user->id} user has been deleted!");
    redirect_to("users.php");
}
else
{
    redirect_to("users.php");
}







?>
        