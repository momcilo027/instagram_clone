<?php require_once("../navbar.php");
$profile_id = $_GET['profile_id'];
$user_id = $_GET['user_id'];
$user_profile = $user->get_user_by_id($profile_id);
$posts = $post->get_posts_for_user($profile_id);
$follow = $user->is_following($user_id,$profile_id);
$followers = $user->followers_count($profile_id);
$following = $user->following_count($profile_id);
$posts_count = $post->posts_count($profile_id);
?>

<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="../profile_pictures/<?php echo $user_profile['photo']; ?>" class="rounded-circle w-100 h-100">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class="h4">username</div>

                    <form class="" action="../include/control.php" method="post">
                      <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                      <input type="hidden" name="profile_id" value="<?php echo $profile_id; ?>">
                      <?php if($user_id !== $profile_id): ?>
                        <button type="submit"
                        name="<?php if($follow == true){
                       echo "Unfollow";
                     }else{
                       echo "Follow";
                     }; ?>"
                        class="btn btn-<?php if($follow == true){
                          echo "dark";
                        }else{
                          echo "primary";
                        }
                          ?> ml-3"
                           ><?php if($follow == true){
                          echo "Unfollow";
                        }else{
                          echo "Follow";
                        }; ?></button>
                      <?php endif; ?>
                    </form>
                </div>


                    <?php if($user_id == $profile_id): ?>
                      <a href="../posts/create_post.php?user_id=<?php echo $profile_id; ?>">Add New Post</a>
                    <?php endif; ?>


            </div>

            <?php if($user_id == $profile_id): ?>
              <a href="edit_profile.php?id=1">Edit Profile</a>
            <?php endif; ?>


            <div class="d-flex">
                <div class="pr-5"><strong><?php echo $posts_count; ?></strong> posts</div>
                <div class="pr-5"><strong><?php echo $followers; ?></strong> followers</div>
                <div class="pr-5"><strong><?php echo $following; ?></strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold"><?php echo $user_profile['title']; ?></div>
            <div><?php echo $user_profile['description']; ?></div>
            <div><a href="#"><?php echo $user_profile['url']; ?></a></div>
        </div>
    </div>

    <div class="row pt-5">
      <?php foreach($posts as $post): ?>

            <div class="col-4 pb-4">
                <a href="../posts/post.php?user_id=<?php echo $user_id; ?>&profile_id=<?php echo $profile_id; ?>&post_id=<?php echo $post['id']; ?>">
                    <img src="../posts/photos/<?php echo $post['photo']; ?>" class="w-100">
                </a>
            </div>
      <?php endforeach; ?>
    </div>
</div>
<?php require_once("../basic/footer.php"); ?>
