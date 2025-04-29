<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Dashboard User</h3>
        </div>
        <div class="card-body">
            <p>Selamat datang, <strong><?= esc(session('name')) ?></strong> (<?= esc(session('username')) ?>)</p>
            <p><?= esc($roleMessage) ?></p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>