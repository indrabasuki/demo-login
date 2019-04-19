<div class="container-fluid">
    <h3><?= $tittle; ?></h3>

    <div class="row">
        <div class="col-lg-8">
            <?= form_open_multipart(); ?>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input readonly type="text" class="form-control" id="email" name="email" value="<?= $user['email'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="neme" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>">
                    <?= form_error('name', ' <small class="text-danger">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2">Image</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?> " class="img-thumbnail">
                        </div>
                        <div class="col-sm-8">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Upload file Image</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-grup row justify-content-end">
                <div class="col-sm-10">
                    <button class="btn btn-success" type="submit">Edit Profile</button>
                </div>
            </div>
            </form>
        </div>
    </div>

</div>