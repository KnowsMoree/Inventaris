<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <?php if (session()->getFlashdata('logged')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h5>Hallo, <?php echo session()->get('nama'); ?></h5>
            </hr />
            <?php echo session()->getFlashdata('logged'); ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-sm-6 col-12">
            <div class="container bg-white rounded-20 p-5">
                <div class="row mb-5">
                    <div class="col">
                        <h2 class="fw-bold">data pinjaman</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col">No</div>
                    <div class="col">Nama barang</div>
                    <div class="col">peminjam</div>
                </div>
                <?php $i = 1; ?>
                <?php foreach ($pinjamBarang as $us) : ?>
                    <div class="row mt-3 p-2 border-dark border-bottom">
                        <div class="col"><?= $i++; ?></div>
                        <div class="col"><?= $us['barang_pinjam']; ?></div>
                        <div class="col"><?= $us['peminjam']; ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="col-sm-6 col-12">
            <div class="container bg-white rounded-20 p-5">
                <div class="row mb-5">
                    <div class="col">
                        <h2 class="fw-bold">data user</h2>
                    </div>
                </div>

                <div class="row fw-bold text-center">
                    <div class="col-1">No</div>
                    <div class="col">Nama</div>
                    <div class="col">Level</div>
                </div>
                <?php $i = 1; ?>
                <?php foreach ($user as $us) : ?>
                    <div class="row mt-3 p-2 border-dark text-center border-bottom">
                        <div class="col-1"><?= $i++; ?></div>
                        <div class="col"><?= $us['nama']; ?></div>
                        <div class="col"><?= $us['level']; ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>