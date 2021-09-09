<?php require_once("../navbar.php");
$id = $_GET['id'];
$user = $user->get_user_by_id($id);
?>

<div class="container">
    <form action="../include/control.php" enctype="multipart/form-data" method="post">

        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Edit Profile</h1>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">Title</label>

                    <input id="title" type="text" class="" name="title" value="<?php echo $user['title']; ?>" autocomplete="title" autofocus>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">Description</label>

                    <input id="description" type="text" class=""  name="description" value="<?php echo $user['description']; ?>" autocomplete="description" autofocus>

                </div>

                <div class="form-group row">
                    <label for="url" class="col-md-4 col-form-label">URL</label>

                    <input id="url" type="text" class="" name="url" value="<?php echo $user['url']; ?>" autocomplete="url" autofocus>

                </div>

                <div class="row">
                    <label for="photo" class="col-md-4 col-form-label">Profile Image</label>

                    <input type="file" class="form-control-file" id="photo" name="photo">

                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="row pt-4">
                    <button type="submit" name="save_profile" class="btn btn-primary">Save Profile</button>
                </div>

            </div>
        </div>
    </form>
</div>
<?php require_once("../basic/footer.php"); ?>
