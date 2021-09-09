<?php require_once("../navbar.php");
$user_id = $_GET['user_id'];
if(!empty($_GET['err'])){
  $err = $_GET['err'];
}else{
  $err = 0;
}
?>
<div class="container">
    <form action="../include/control.php" enctype="multipart/form-data" method="post">


        <div class="row">
          <div class="col-12 text-center">
            <?php if($err == 1): ?>
              <p style="color:red;">Please choose a photo.</p>
            <?php endif; ?>
          </div>
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Add New Post</h1>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">Post Title</label>

                    <input id="title"
                           type="text"
                           class="form-control"
                           name="title"
                           value=""
                           autocomplete="caption" autofocus>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">Post Description</label>

                    <textarea id="description" class="form-control" name="description" rows="8" cols="80"></textarea>

                </div>

                <div class="row">
                    <label for="photo" class="col-md-4 col-form-label">Post Image</label>

                    <input type="file" class="form-control-file" id="photo" name="photo">
                </div>
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

                <div class="row pt-4">
                    <button type="submit" name="create_post" class="btn btn-primary">Add New Post</button>
                </div>

            </div>
        </div>
    </form>
</div>
<?php require_once("../basic/footer.php"); ?>
