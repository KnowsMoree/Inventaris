<?= $this->extend('layout/formTem'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h1>Login</h1>
            <!-- alert berhasil daftar  -->
            <!-- <div class="alert alert-success d-flex align-items-center" role="alert">
                    <span class="material-icons">
                        check_circle
                    </span>
                    <div class="isi-alert">
                        Register berhasil
                    </div>
                </div> -->
            <!-- alert salah password  -->
            <!-- <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <span class="material-icons">
                        dangerous
                    </span>
                    <div class="isi-alert">
                        Username/Password yang dimasukan salah
                    </div>
                </div> -->
            <?php if (session()->getFlashdata('regis')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo session()->getFlashdata('regis'); ?>
                </div>
            <?php endif; ?>
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <form action="<?= base_url(); ?>/login/auth" method="post">
                <?= csrf_field(); ?>
                <div class="row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-12">
                        <input required name="username" type="text" class="form-control" id="username" placeholder="Nama Anda">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-12">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password Anda">
                    </div>
                </div>
                <button type="submit" class="btn mt-3 login">Login</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>