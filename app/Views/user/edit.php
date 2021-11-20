<?= $this->extend('layout/formTem'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-body">
            <h1>Form Ubah barang</h1>

            <form action="<?= base_url(); ?>/user/update/<?= $user['id_user']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="fotoLama" value="<?= $user['foto']; ?>">
                <input type="hidden" name="password" value="<?= $user['password']; ?>">
                <div class="row">
                    <label for="id_user" class="col-sm-2 col-form-label">ID user</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control <?= ($validation->hasError('id_user')) ? 'is-invalid' : ''; ?>" name="id_user" id="id_user" placeholder="Nama Anda" value="<?= (old('id_user')) ? old('id_user') : $user['id_user']; ?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" name="username" id="username" placeholder="Nama Anda" value="<?= (old('username')) ? old('username') : $user['username']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('username'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label for="nama" class="form-label">Nama</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" placeholder="masukan nama lengkap anda" value="<?= (old('nama')) ? old('nama') : $user['nama']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label for="level" class="col-sm-2 col-form-label">Level :</label>
                    <div class="col-sm-12">
                        <select class="form-select form-select-sm <?= ($validation->hasError('level')) ? 'is-invalid' : ''; ?> " id="level" name="level" autofocus value="<?= (old('level')) ? old('level') : $user['level']; ?>" aria-label=" Default select example" name="level" id="level">
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
                        <img src="/img/<?= $user['foto']; ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control <?= ($validation->hasError('foto') ? 'is-invalid' : ''); ?>" id="foto" value="<?= (old('foto')) ? old('foto') : $user['foto']; ?>" name="foto" onchange="previewImg()">
                            <label class="input-group-text" for="foto">Avatar</label>
                            <div class="invalid-feedback">
                                <?= $validation->getError('foto'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn mt-3 regis">Ubah</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>