<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-3">Detail User</h2>
            <div class="card">
                <div class="text-center">
                    <img src="/img/<?= $user['foto']; ?>" class="card-img-top rounded-circle " style="height: 150px; width: 150px;" alt="avatar">
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $user['nama']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">@<?= $user['username']; ?></h6>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Level: <?= $user['level']; ?></li>
                </ul>
                <div class="card-body">
                    <form action="/user/<?= $user['id_user']; ?>" method="POST" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-white" onclick="return confirm('yaqueen?');"><i class="fas fa-trash text-danger"></i></button>
                    </form>
                    <a href="/user/edit/<?= $user['id_user']; ?>">
                        <i class="fas fa-pencil-alt text-warning"></i>
                    </a>
                    <br><br>
                    <a href="/user" class="btn btn-dark">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>