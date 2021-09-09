<?php
require_once("users.php");
require_once("posts.php");

if(isset($_POST['register'])){
  $username = $_POST['username'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pw = $_POST['password'];
  $pw_confirm = $_POST['password_repeat'];
  $user->register($username, $name, $email, $pw, $pw_confirm);
}
if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $user->login($email, $password);
}
if(isset($_POST['save_profile'])){
  $id = $_POST['id'];
  $user->edit_profile($id);
  header("Location: ../profile/profile.php?profile_id=".$id);
}
if(isset($_POST['create_post'])){
  $user_id = $_POST['user_id'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $post->create_post($user_id, $title, $description);
}
if(isset($_POST['Follow'])){
  $user_id = $_POST['user_id'];
  $profile_id = $_POST['profile_id'];
  $user->follow($user_id, $profile_id);
}
if(isset($_POST['Unfollow'])){
  $user_id = $_POST['user_id'];
  $profile_id = $_POST['profile_id'];
  $user->unfollow($user_id, $profile_id);
}
 ?>
