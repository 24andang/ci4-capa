<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h1 class="my-3">Tabel Capa
        <?php
        if ($sumber == 'lainLain') {
            echo "Lain-lain";
        } elseif ($sumber == 'auditInternal') {
            echo "Audit Internal";
        } elseif ($sumber == 'pengkajianMutu') {
            echo "Pengkajian Mutu";
        } elseif ($sumber == 'nonConformance') {
            echo "Non Conformance";
        } elseif ($sumber == 'penangananKeluhan') {
            echo "Penanganan Keluhan";
        } elseif ($sumber == 'analisisResiko') {
            echo "Analisis Resiko";
        } else {
            echo "Audit Badan / Balai POM";
        };
        ?>
    </h1>

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
            <a class="btn btn-success" href="/capa/index/1/<?= $sumber; ?>">Excel</a>
        </div>
        <div class="col-6">
            <form class="my-2 my-lg-0 row d-flex justify-content-end" method="get" action="">
                <input class="form-control mr-sm-2 col-8" type="text" placeholder="Cari Data Capa" name="keyword">
                <button class="btn btn-info my-2 my-sm-0" type="submit" name="submit">Cari</button>
            </form>
        </div>
    </div>

    <div class="dropdown mb-2">
        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <div class="row mx-auto">
                <div class="col-3">
                    <a href="/capa/index/0/bpom" class="<?= $sumber == 'bpom' ? 'font-weight-bolder' : 'text-secondary'; ?>">Audit Badan / Balai POM</a>
                </div>
                <div class="col-3">
                    <a href="/capa/index/0/auditInternal" class="<?= $sumber == 'auditInternal' ? 'font-weight-bolder' : 'text-secondary'; ?>">Audit Internal</a>
                </div>
                <div class="col-3">
                    <a href="/capa/index/0/pengkajianMutu" class="<?= $sumber == 'pengkajianMutu' ? 'font-weight-bolder' : 'text-secondary'; ?>">Pengkajian Mutu</a>
                </div>
                <div class="col-3">
                    <a href="/capa/index/0/nonConformance" class="<?= $sumber == 'nonConformance' ? 'font-weight-bolder' : 'text-secondary'; ?>">Non Conformance</a>
                </div>
                <div class="col-3">
                    <a href="/capa/index/0/penangananKeluhan" class="<?= $sumber == 'penangananKeluhan' ? 'font-weight-bolder' : 'text-secondary'; ?>">Penanganan Keluhan</a>
                </div>
                <div class="col-3">
                    <a href="/capa/index/0/analisisResiko" class="<?= $sumber == 'analisisResiko' ? 'font-weight-bolder' : 'text-secondary'; ?>">Analisis Resiko</a>
                </div>
                <div class="col-3">
                    <a href="/capa/index/0/lainLain" class="<?= $sumber == 'lainLain' ? 'font-weight-bolder' : 'text-secondary'; ?>">Lain-lain</a>
                </div>
            </div>
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