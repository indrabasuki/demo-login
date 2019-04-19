<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Halaman Login</h1>
                                </div>
                                <!-- flashdata -->
                                <?= $this->session->flashdata('message'); ?>

                                <form class="user" action="<?= base_url('auth'); ?>" method="post">
                                    <div class="form-group">
                                        <input type="text" placeholder="Masukkan Email Anda" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                                        <?= form_error('email', ' <small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" placeholder="Masukkan Password Anda" class="form-control form-control-user" name="password" id="password" placeholder="Enter Password">
                                        <?= form_error('password', ' <small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>

                                </form>

                                <hr>
                                <div class="text-center">
                                    <a class="large" href="<?= base_url('auth/registrasi'); ?>">Buat Akun Baru</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="alert alert-primary" role="alert">
                <p>
                    <h5>Untuk demo bisa gunakan akun demo </h5>
                </p>
                email :demo@gmail.com | password :demo123
                <p>atau bisa mendaftar !!!</p>
            </div>
        </div>

    </div>

</div>