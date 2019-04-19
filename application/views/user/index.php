<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="card" style="width: 16rem;">
        <img class="card-img-top" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title text-center"><?= $user['name']; ?></h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><?= $user['email'] ?></li>
            <li class="list-group-item">Member Since <?= date('d F Y', $user['date_created']); ?></li>
        </ul>
        <div class="card-body">
            <a href="<?= base_url('user/edit'); ?>" class="card-link">Update Profile</a>
        </div>
    </div>

</div>

</div>