<?= $this->extend('layout/template'); ?>

<?php  ?>

<?= $this->section('content'); ?>
<div class="container">
    <h1 class="my-3">Tabel Capa</h1>
    <?php
    if (null == (session()->getFlashdata('pesan'))) {
        $status = 'hidden';
        $btn = 'hidden';
        $span = '<span></span>';
    } else {
        $status = 'alert alert-info alert-dismissible fade show';
        $btn = 'button';
        $span = '<span aria-hidden="true">&times;</span>';
    }
    ?>

    <div class="<?= $status; ?>" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
        <button type="$btn" class="close" data-dismiss="alert" aria-label="Close">
            <?= $span; ?>
        </button>
    </div>

    <div class="d-flex justify-content-between mb-3 row">
        <div class="col4">
            <a class="btn btn-info" href="/capa/tambah">Tambah Data Capa</a>
        </div>
        <div class="col-6">
            <form class="my-2 my-lg-0 row d-flex justify-content-end" method="get" action="">
                <input class="form-control mr-sm-2 col-8" type="text" placeholder="Cari Data Capa" name="keyword">
                <button class="btn btn-info my-2 my-sm-0" type="submit" name="submit">Cari</button>
            </form>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">TEMUAN / PENYIMPANGAN <br>
                    (Non-compliance)</th>
                <th scope="col">KT</th>
                <th scope="col">Detail</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 + (5 * $currentPage) - 5; ?>
            <?php foreach ($capa as $c) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $c['temuan']; ?></td>
                    <td><?= $c['kt']; ?></td>
                    <td>
                        <a href="/capa/detail/<?= $c['id']; ?>" class="btn btn-outline-info">Detail</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $pager->links('capa', 'bootstrap_paginasi'); ?>
</div>

<?= $this->endSection(); ?>