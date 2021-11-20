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
                <div class="row mb-5">
                    <div class="col">
                        <h2 class="fw-bold">data user</h2>
                    </div>
                </div>

                <div class="row fw-bold text-center">
                    <div class="col-1">No</div>
                    <div class="col">Nama</div>
                    <div class="col">Level</div>
                    <div class="col">Action</div>
                </div>
                <?php $i = 1; ?>
                <?php foreach ($user as $us) : ?>
                    <div class="row my-4 p-2 border-dark text-center border-bottom">

                        <div class="col-1"><?= $i++; ?></div>
                        <div class="col"><?= $us['nama']; ?></div>
                        <div class="col"><?= $us['level']; ?></div>
                        <div class="col">
                            <button class="btn px-1">
                                <a href="/user/<?= $us['id_user']; ?>">
                                    <i class="fas fa-eye text-dark"></i>
                                </a>
                            </button>
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
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>