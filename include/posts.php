<?php
require_once("database.php");
require_once("control.php");

class Posts{
  public $post_id;
  public $title;
  public $user_id;
  public $description;
  public $date;
  public $photo;

  public function create_post($user_id, $title, $description){
    global $database;
    $photo_dir = "../posts/photos/";
    $this->user_id = $user_id;
    $this->title = mysqli_real_escape_string($database->connection, $title);
    $this->description = mysqli_real_escape_string($database->connection, $description);
    if($_FILES['photo']['name'] !== ""){
      $this->photo = $_FILES['photo']['name'];
      $filetmpname = $_FILES['photo']['tmp_name'];
      move_uploaded_file($filetmpname, $photo_dir.$this->photo);
      $sql = "INSERT INTO posts(user_id,title,description,date,photo) VALUES ('".$this->user_id."','".$this->title."','".$this->description."', now(), '".$this->photo."') ";
      $database->connection->query($sql);
      return (mysqli_affected_rows($database->connection) == 1) ? true : false;
      header("Location: ../profile/profile.php?profile_id=".$this->user_id);
    }else{
      header("Location: ../posts/create_post.php?user_id=".$this->user_id."&err=1");
    }
  }
  public function get_post_by_id($id){
    global $database;
    $sql = "SELECT * FROM posts WHERE id = '".$id."'";
    $query = mysqli_query($database->connection, $sql) or die(mysqli_error($database->connection));
    if(mysqli_num_rows($query) > 0){
      return $res = mysqli_fetch_array($query);
    }
  }
  public function edit_post($id){
    global $database;
    $this->post_id = $id;
    $this->title = $_POST['title'];
    $this->description = $_POST['description'];
    $sql = "UPDATE posts SET title='".$this->title."', description='".$this->description."' WHERE id='".$this->post_id."'";
    $database->connection->query($sql);
    return (mysqli_affected_rows($database->connection) == 1) ? true : false;
  }
  public function get_posts_for_user($id){
    global $database;
    $this->user_id = $id;
    $sql = "SELECT * FROM posts WHERE user_id = '".$this->user_id."'";
    $result = $database->connection->query($sql);
    return $result;
  }
  public function posts_count($profile_id){
    global $database;
    $this->profile_id = $profile_id;
    $sql = "SELECT id FROM posts WHERE user_id = '".$this->profile_id."'";
    $query = mysqli_query($database->connection, $sql) or die(mysqli_error($database->connection));
    return $query->num_rows;
  }
}
$post = new Posts();
 ?>
