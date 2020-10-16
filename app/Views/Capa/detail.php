<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <h1 class="my-3">Detail</h1>
    <ul class="nav justify-content-end my-2">
        <li class="nav-item">
            <a class="nav-link mx-1" href="/capa">Kembali</a>
        </li>
    </ul>
    <div class="row mx-lg-n5">
        <div class="col-3 py-3 px-lg-5 border bg-light font-weight-bolder">TEMUAN / PENYIMPANGAN (Non-compliance)</div>
        <div class="col-9 py-3 px-lg-5 border bg-light"><?= $capa['temuan']; ?></div>
    </div>
    <div class="row mx-lg-n5">
        <div class="col-3 py-3 px-lg-5 border bg-light font-weight-bolder">KT</div>
        <div class="col-9 py-3 px-lg-5 border bg-light"><?= $capa['kt']; ?></div>
    </div>
    <div class="row mx-lg-n5">
        <div class="col-3 py-3 px-lg-5 border bg-light font-weight-bolder">Persyaratan</div>
        <div class="col-9 py-3 px-lg-5 border bg-light"><?= $capa['persyaratan']; ?></div>
    </div>
    <div class="row mx-lg-n5">
        <div class="col-3 py-3 px-lg-5 border bg-light font-weight-bolder">KONDISI SAAT INI</div>
        <div class="col-9 py-3 px-lg-5 border bg-light"><?= $capa['kondisi']; ?></div>
    </div>
    <div class="row mx-lg-n5">
        <div class="col-3 py-3 px-lg-5 border bg-light font-weight-bolder">GAP</div>
        <div class="col-9 py-3 px-lg-5 border bg-light"><?= $capa['gap']; ?></div>
    </div>
    <div class="row mx-lg-n5">
        <div class="col-3 py-3 px-lg-5 border bg-light font-weight-bolder">Rootcause Analysis</div>
        <div class="col-9 py-3 px-lg-5 border bg-light"><?= $capa['rootcause']; ?></div>
    </div>
    <div class="row mx-lg-n5">
        <div class="col-3 py-3 px-lg-5 border bg-light font-weight-bolder">Corrective Action (CA)</div>
        <div class="col-9 py-3 px-lg-5 border bg-light"><?= $capa['ca']; ?></div>
    </div>
    <div class="row mx-lg-n5">
        <div class="col-3 py-3 px-lg-5 border bg-light font-weight-bolder">Deadtime</div>
        <div class="col-9 py-3 px-lg-5 border bg-light"><?= $capa['ca_deadtime']; ?></div>
    </div>
    <div class="row mx-lg-n5">
        <div class="col-3 py-3 px-lg-5 border bg-light font-weight-bolder">PIC</div>
        <div class="col-9 py-3 px-lg-5 border bg-light"><?= $capa['ca_pic']; ?></div>
    </div>
    <div class="row mx-lg-n5">
        <div class="col-3 py-3 px-lg-5 border bg-light font-weight-bolder">Foto Bukti</div>
        <div class="col-9 py-3 px-lg-5 border bg-light"><img src="/img/<?= (($capa['ca_bukti']) == null) ? 'npc.jpg' : $capa['ca_bukti']; ?>"></div>
    </div>
    <div class="row mx-lg-n5">
        <div class="col-3 py-3 px-lg-5 border bg-light font-weight-bolder">Status</div>
        <div class="col-9 py-3 px-lg-5 border bg-light"><?= $capa['ca_status']; ?></div>
    </div>
    <div class="row mx-lg-n5">
        <div class="col-3 py-3 px-lg-5 border bg-light font-weight-bolder">Preventive Action (PA)</div>
        <div class="col-9 py-3 px-lg-5 border bg-light"><?= $capa['pa']; ?></div>
    </div>
    <div class="row mx-lg-n5">
        <div class="col-3 py-3 px-lg-5 border bg-light font-weight-bolder">Deadtime</div>
        <div class="col-9 py-3 px-lg-5 border bg-light"><?= $capa['pa_deadtime']; ?></div>
    </div>
    <div class="row mx-lg-n5">
        <div class="col-3 py-3 px-lg-5 border bg-light font-weight-bolder">PIC</div>
        <div class="col-9 py-3 px-lg-5 border bg-light"><?= $capa['pa_pic']; ?></div>
    </div>
    <div class="row mx-lg-n5">
        <div class="col-3 py-3 px-lg-5 border bg-light font-weight-bolder">Foto Bukti</div>
        <div class="col-9 py-3 px-lg-5 border bg-light"><img src="/img/<?= (($capa['pa_bukti']) == null) ? 'npc.jpg' : $capa['pa_bukti']; ?>"></div>
    </div>
    <div class="row mx-lg-n5">
        <div class="col-3 py-3 px-lg-5 border bg-light font-weight-bolder">Status</div>
        <div class="col-9 py-3 px-lg-5 border bg-light"><?= $capa['pa_status']; ?></div>
    </div>
    <div class="row mx-lg-n5">
        <div class="col-3 py-3 px-lg-5 border bg-light font-weight-bolder">Hasil</div>
        <div class="col-9 py-3 px-lg-5 border bg-light"><?= $capa['hasil']; ?></div>
    </div>

    <a class="btn btn-info mx-1 my-2" href="/capa/update/<?= $capa['id']; ?>">Ubah</a>
    <form action="/capa/delete" method="post" class="d-inline">
        <input type="hidden" name="idHidden" value="<?= $capa['id']; ?>">
        <button type="submit" onclick="return confirm('Anda yakin akan menghapusnya ?')" class="btn btn-danger mx-1 my-2">Hapus</a>
    </form>
</div>


<?= $this->endSection(); ?>