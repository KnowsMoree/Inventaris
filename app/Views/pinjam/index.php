<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-sm-12 col-12">
            <div class="container bg-white rounded-20 p-5">
                <div class="row mb-4">
                    <div class="col">
                        <h2 class="fw-bold">data pinjaman</h2>
                    </div>
                    <div class="col">
                        <a href="<?= base_url(); ?>/pinjam/create">
                            <button class="btn btn-plus float-end">
                                <i class="fas fa-plus" style="color: #3554d1"></i>
                            </button>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col">No</div>
                    <div class="col">Nama barang</div>
                    <div class="col">peminjam</div>
                    <div class="col">Action</div>
                </div>
                <?php $i = 1; ?>
                <?php foreach ($pinjamBarang as $us) : ?>
                    <div class="row my-4 p-2 border-dark border-bottom">
                        <div class="col"><?= $i++; ?></div>
                        <div class="col"><?= $us['barang_pinjam']; ?></div>
                        <div class="col"><?= $us['peminjam']; ?></div>
                        <div class="col">
                            <button class="btn px-1">
                                <a href="/pinjam/<?= $us['id_pinjam']; ?>">
                                    <i class="fas fa-eye text-dark"></i>
                                </a>
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- <button class="btn px-1">
                                    <a href="">
                                        <i class="fas fa-pencil-alt text-warning"></i>
                                    </a>
                                </button>
                                <button class="btn px-1">
                                    <a href="">
                                        <i class="fas fa-trash text-danger"></i>
                                    </a>
                                </button> -->
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>