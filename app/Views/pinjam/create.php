<?= $this->extend('layout/formTem'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-body">
            <h1>Form Peminjaman</h1>
            <form action="<?= base_url(); ?>/pinjam/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <label for="peminjam" class="col-sm-2 col-form-label">Nama peminjam:</label>
                    <div class="col-sm-12">
                        <select class="form-select form-select-sm <?= ($validation->hasError('peminjam')) ? 'is-invalid' : ''; ?> " id="peminjam" name="peminjam" autofocus value="<?= old('peminjam'); ?>"" aria-label=" Default select example" name="peminjam" id="peminjam">
                            <?php foreach ($user as $user) : ?>
                                <option value="<?= $user['id_user']; ?>"><?= $user['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('peminjam'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label for="barang_pinjam" class="col-sm-2 col-form-label">Nama Barang: </label>
                    <div class="col-sm-12">
                        <select class="form-select <?= ($validation->hasError('barang_pinjam')) ? 'is-invalid' : ''; ?> " id="barang_pinjam" name="barang_pinjam" autofocus value="<?= old('barang_pinjam'); ?>"" aria-label=" Default select example" name="barang_pinjam" id="barang_pinjam">
                            <?php foreach ($barang as $b) : ?>
                                <option value="<?= $b['id_barang']; ?>"><?= $b['nama_barang']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('barang_pinjam'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label for="jml_pinjam" class="col-sm-2 col-form-label">Jumlah pinjam:</label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control <?= ($validation->hasError('jml_pinjam')) ? 'is-invalid' : ''; ?> " id="jml_pinjam" name="jml_pinjam" autofocus value="<?= old('jml_pinjam'); ?>" min="1">
                        <div class="invalid-feedback">
                            <?= $validation->getError('jml_pinjam'); ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn mt-3 regis">Pinjam</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>