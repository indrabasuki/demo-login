<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Buat Akun baru</h1>
                        </div>
                        <form class="user" method="post" action="<?= base_url('auth/registrasi') ?>">
                            <div class="form-group ">
                                <input type="text" class="form-control form-control-user" id="name" placeholder="Nama Lengkap" name="name" value="<?= set_value('name'); ?>">
                                <?= form_error('name', ' <small class="text-danger">', '</small>'); ?>

                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" placeholder="Email" name="email" value="<?= set_value('email'); ?>">
                                <?= form_error('email', ' <small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                    <?= form_error('password1', ' <small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                                    <?= form_error('password2', ' <small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <button type="submit" name="register" class="btn btn-primary btn-user btn-block">
                                Register Akun
                            </button>

                        </form>
                        <hr>

                        <div class="text-center">
                            <a class="large" href="<?= base_url('auth'); ?>">Sudah punya Akun? Login Lah...!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>