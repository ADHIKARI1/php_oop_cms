<?php
include_once("includes/init.php"); 
if(!$session->is_signed_in()) redirect_to("login.php");
?>

<?php

$var = basename($_SERVER['HTTP_REFERER']);
$new_var = substr($var, 0, strpos($var, "."));


if (empty($_GET['id'])) {
    
		 redirect_to("comments.php");
}
$comment = Comment::find_by_id($_GET['id']);
if ($comment) {
    $comment->delete();
    if($new_var=="comment_photo")
    	redirect_to("comment_photo.php?id={$comment->photo_id}");
	else
		 redirect_to("comments.php");
}
else
{
    
		 redirect_to("comments.php");
}







?>


        