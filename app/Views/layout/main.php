<?= $this->include('layout/header') ?>
<?= $this->include('layout/sidebar') ?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <section class="content pt-3 px-3">
        <?= $this->renderSection('content') ?>
    </section>
</div>

<?= $this->include('layout/footer') ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>