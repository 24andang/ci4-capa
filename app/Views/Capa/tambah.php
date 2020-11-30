<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <h1 class="my-3">Form Tambah Data Capa</h1>
    <ul class="nav justify-content-end my-2">
        <li class="nav-item">
            <a class="nav-link mx-1" href="/capa">Kembali</a>
        </li>
    </ul>
    <form action="/capa/save" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="kt" class="col-sm-2 col-form-label">Sumber</label>
            <div class="col-sm-10 form-group">
                <select class="form-control" id="sumber" name="sumber">
                    <option value="bpom">Audit Balai / Badan POM</option>
                    <option value="auditInternal">Audit Internal</option>
                    <option value="pengkajianMutu">Pengkajian Mutu</option>
                    <option value="nonConformance">Non Conformance</option>
                    <option value="penangananKeluhan">Penanganan Keluhan</option>
                    <option value="analisisResiko">Analisis Resiko</option>
                    <option value="lainLain">Lain-lain</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="temuan" class="col-sm-2 col-form-label">Temuan</label>
            <div class="col-sm-10 form-group">
                <textarea rows="3" class="form-control" id="temuan" name="temuan"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="kt" class="col-sm-2 col-form-label">KT</label>
            <div class="col-sm-10 form-group">
                <select class="form-control" id="kt" name="kt">
                    <option value="Minor">Minor</option>
                    <option value="Major">Major</option>
                    <option value="Critical">Critical</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="persyaratan" class="col-sm-2 col-form-label">Persyaratan</label>
            <div class="col-sm-10 form-group">
                <textarea rows="3" class="form-control" id="persyaratan" name="persyaratan"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="kondisi" class="col-sm-2 col-form-label">KONDISI SAAT INI</label>
            <div class="col-sm-10 form-group">
                <textarea rows="3" class="form-control" id="kondisi" name="kondisi"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="gap" class="col-sm-2 col-form-label">GAP</label>
            <div class="col-sm-10 form-group">
                <textarea rows="3" class="form-control" id="gap" name="gap"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="rootcause" class="col-sm-2 col-form-label">Rootcause Analysis</label>
            <div class="col-sm-10 form-group">
                <textarea rows="3" class="form-control" id="rootcause" name="rootcause"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="ca" class="col-sm-2 col-form-label">Corrective Action(CA)</label>
            <div class="col-sm-10 form-group">
                <textarea rows="3" class="form-control" id="ca" name="ca"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="ca_deadtime" class="col-sm-2 col-form-label">Deadtime</label>
            <div class="col-sm-10 form-group">
                <input type="date" class="form-control" id="ca_deadtime" name="ca_deadtime">
            </div>
        </div>
        <div class="form-group row">
            <label for="ca_pic" class="col-sm-2 col-form-label">PIC</label>
            <div class="col-sm-10 form-group">
                <input type="text" rows="3" class="form-control" id="ca_pic" name="ca_pic" value="<?= session()->get('id'); ?>" readonly></input>
                <!-- <input type="text" rows="3" class="form-control" id="ca_pic" name="ca_pic"></input> -->
            </div>
        </div>
        <input type="hidden" name="ca_departemen" id="ca_departemen" value="<?= $userLogIn['departemen']; ?>"></input>
        <div class="form-group row">
            <label for="ca_bukti" class="col-sm-2 col-form-label">Foto Bukti</label>
            <div class="col-sm-10 form-group">
                <input type="file" name="ca_bukti" id="ca_bukti">
            </div>
        </div>
        <div class="form-group row">
            <label for="ca_status" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10 form-group">
                <select class="form-control" id="ca_status" name="ca_status">
                    <option value="Open">Open</option>
                    <option value="Close">Close</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="pa" class="col-sm-2 col-form-label">Preventive Action(PA)</label>
            <div class="col-sm-10 form-group">
                <textarea rows="3" class="form-control" id="pa" name="pa"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="pa_deadtime" class="col-sm-2 col-form-label">Deadtime</label>
            <div class="col-sm-10 form-group">
                <input type="date" class="form-control" id="pa_deadtime" name="pa_deadtime">
            </div>
        </div>
        <div class="form-group row">
            <label for="pa_pic" class="col-sm-2 col-form-label">PIC</label>
            <div class="col-sm-10 form-group">
                <!-- <input type="text" rows="3" class="form-control" id="pa_pic" name="pa_pic"></input> -->
                <select class="form-control" name="pa_pic" id="pa_pic">
                    <?php foreach ($user as $u) : ?>
                        <option value="<?= $u['id']; ?>"><?= $u['id']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="pa_bukti" class="col-sm-2 col-form-label">Foto Bukti</label>
            <div class="col-sm-10 form-group">
                <input type="file" name="pa_bukti" id="pa_bukti">
            </div>
        </div>
        <div class="form-group row">
            <label for="pa_status" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10 form-group">
                <select class="form-control" id="pa_status" name="pa_status">
                    <option value="Open">Open</option>
                    <option value="Close">Close</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="hasil" class="col-sm-2 col-form-label">Hasil</label>
            <div class="col-sm-10 form-group">
                <input type="text" rows="3" class="form-control" id="hasil" name="hasil"></input>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Tambah Data Capa</button>
                <button type="reset" class="btn btn-danger">Ulangi</button>
            </div>
        </div>
    </form>
</div>


<?= $this->endSection(); ?>