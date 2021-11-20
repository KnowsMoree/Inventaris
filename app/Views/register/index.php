<?= $this->extend('layout/formTem'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-body">
            <h1>Register</h1>

            <form action="<?= base_url(); ?>/register/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" name="username" id="username" placeholder="Nama Anda" value="<?= old('username'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('username'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label for="nama" class="form-label">Nama</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" placeholder="masukan nama lengkap anda" value="<?= old('nama'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-12">
                        <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" name="password" id="password" placeholder="Password Anda" value="<?= old('password'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('password'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label for="password_conf" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-12">
                        <input type="password" class="form-control <?= ($validation->hasError('password_conf')) ? 'is-invalid' : ''; ?>" name="password_conf" id="password_conf" placeholder="Ulangi Password Anda" value="<?= old('password_conf'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('password_conf'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label for="level" class="col-sm-2 col-form-label">Level :</label>
                    <div class="col-sm-12">
                        <select class="form-select form-select-sm <?= ($validation->hasError('level')) ? 'is-invalid' : ''; ?> " id="level" name="level" autofocus value="<?= old('level'); ?>"" aria-label=" Default select example" name="level" id="level">
                            <option value="U03" selected>Peminjam</option>
                            <option value="U01">Administrator</option>
                            <option value="U02">Manajemen</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('level'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="foto" class="col-sm-2 col-form-label">foto</label>
                    <div class="col-sm-4">
                        <img src="/img/default.png" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control <?= ($validation->hasError('foto') ? 'is-invalid' : ''); ?>" id="foto" name="foto" onchange="previewImg()">
                            <label class="input-group-text" for="foto">Avatar</label>
                            <div class="invalid-feedback">
                                <?= $validation->getError('foto'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn mt-3 regis">Register</button>
                <button type="button" class="btn bg-danger mt-2 p-1">
                    <a href="<?= base_url(); ?>/home" class="btn text-center">Kembali</a>
                </button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>