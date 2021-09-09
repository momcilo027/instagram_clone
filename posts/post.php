<?php require_once("../navbar.php");
$post_id = $_GET['post_id'];
$profile_owner = $_GET['profile_id'];
$user_id = $_GET['user_id'];
$post_info = $post->get_post_by_id($post_id);
$user_info = $user->get_user_by_id($profile_owner);
$follow = $user->is_following($user_id,$profile_owner);
?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="photos/<?php echo $post_info['photo']; ?>" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div>
                            <div class="d-flex align-items-center pb-3">
                              <div class="pr-3">
                                  <img src="../profile_pictures/<?php echo $user_info['photo']; ?>" class="rounded-circle w-100" style="max-width: 40px;">
                              </div>
                              <div class="class="font-weight-bold"">
                                <a href="../profile/profile.php?profile_id=<?php echo $profile_owner; ?>">
                                    <span class="text-dark"><?php echo $user_info['username']; ?></span>
                                </a>
                              </div>
                              <div class="">
                                <form class="" action="../include/control.php" method="post">
                                  <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                  <input type="hidden" name="profile_id" value="<?php echo $profile_owner; ?>">
                                  <?php if($user_id !== $profile_owner): ?>
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
                            </div>

                    </div>
                </div>

                <hr>

                <p>
                    <span class="font-weight-bold">
                        <a href="../profile/profile.php?profile_id=<?php echo $profile_owner; ?>">
                            <span class="text-dark"><?php echo $user_info['username']; ?></span>
                        </a>
                    </span> <?php echo $post_info['title']; ?>
                </p>
                <p>
                    <span class="">
                        <?php echo $post_info['description']; ?>
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>
<?php require_once("../basic/footer.php"); ?>
