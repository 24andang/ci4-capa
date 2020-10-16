<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <h1 class="my-3">Form Ubah Data Capa</h1>
    <ul class="nav justify-content-end my-2">
        <li class="nav-item">
            <a class="nav-link mx-1" href="/capa/detail/<?= $capa['id']; ?>">Kembali</a>
        </li>
    </ul>
    <form action="/capa/updateCapa" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $capa['id']; ?>">
        <div class="form-group row">
            <label for="temuan" class="col-sm-2 col-form-label">Temuan</label>
            <div class="col-sm-10 form-group">
                <textarea rows="3" class="form-control" id="temuan" name="temuan" <?= session()->get('id') !== $capa['ca_pic'] ? 'readonly' : ''; ?>><?= $capa['temuan']; ?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="kt" class="col-sm-2 col-form-label">KT</label>
            <div class="col-sm-10 form-group">
                <select class="form-control" id="kt" name="kt" <?= session()->get('id') !== $capa['ca_pic'] ? 'readonly' : ''; ?>>
                    <option <?= ($capa['kt'] == 'Minor') ? "selected" : '' ?>>Minor</option>
                    <option <?= ($capa['kt'] == 'Mijor') ? "selected" : '' ?>>Major</option>
                    <option <?= ($capa['kt'] == 'Critical') ? "selected" : '' ?>>Critical</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="persyaratan" class="col-sm-2 col-form-label">Persyaratan</label>
            <div class="col-sm-10 form-group">
                <textarea rows="3" class="form-control" id="persyaratan" name="persyaratan" <?= session()->get('id') !== $capa['ca_pic'] ? 'readonly' : ''; ?>><?= $capa['persyaratan']; ?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="kondisi" class="col-sm-2 col-form-label">KONDISI SAAT INI</label>
            <div class="col-sm-10 form-group">
                <textarea rows="3" class="form-control" id="kondisi" name="kondisi" <?= session()->get('id') !== $capa['ca_pic'] ? 'readonly' : ''; ?>><?= $capa['kondisi']; ?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="gap" class="col-sm-2 col-form-label">GAP</label>
            <div class="col-sm-10 form-group">
                <textarea rows="3" class="form-control" id="gap" name="gap" <?= session()->get('id') !== $capa['ca_pic'] ? 'readonly' : ''; ?>><?= $capa['gap']; ?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="rootcause" class="col-sm-2 col-form-label">Rootcause Analysis</label>
            <div class="col-sm-10 form-group">
                <textarea rows="3" class="form-control" id="rootcause" name="rootcause" <?= session()->get('id') !== $capa['ca_pic'] ? 'readonly' : ''; ?>><?= $capa['rootcause']; ?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="ca" class="col-sm-2 col-form-label">Corrective Action(CA)</label>
            <div class="col-sm-10 form-group">
                <textarea rows="3" class="form-control" id="ca" name="ca" <?= session()->get('id') !== $capa['ca_pic'] ? 'readonly' : ''; ?>><?= $capa['ca']; ?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="ca_deadtime" class="col-sm-2 col-form-label">Deadtime</label>
            <div class="col-sm-10 form-group">
                <input type="date" class="form-control" id="ca_deadtime" name="ca_deadtime" value="<?= $capa['ca_deadtime']; ?>" <?= session()->get('id') !== $capa['ca_pic'] ? 'readonly' : ''; ?>>
            </div>
        </div>
        <div class="form-group row">
            <label for="ca_pic" class="col-sm-2 col-form-label">PIC</label>
            <div class="col-sm-10 form-group">
                <input type="text" rows="3" class="form-control" id="ca_pic" name="ca_pic" value="<?= $capa['ca_pic']; ?>" readonly></input>
            </div>
        </div>
        <div class="form-group row">
            <label for="ca_bukti" class="col-sm-2 col-form-label">Foto Bukti</label>
            <div class="col-sm-10 form-group">
                <input type="file" name="ca_bukti" id="ca_bukti" value="<?= $capa['ca_bukti']; ?>" <?= session()->get('id') !== $capa['ca_pic'] ? 'readonly' : ''; ?>>
            </div>
        </div>
        <div class="form-group row">
            <label for="ca_status" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10 form-group">
                <select class="form-control" id="ca_status" name="ca_status" <?= session()->get('id') !== $capa['ca_pic'] ? 'readonly' : ''; ?>>
                    <option <?= ($capa['ca_status'] == 'Open') ? "selected" : '' ?>>Open</option>
                    <option <?= ($capa['ca_status'] == 'Close') ? "selected" : '' ?>>Close</option>
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
                <input type="date" class="form-control" id="pa_deadtime" name="pa_deadtime" value="<?= $capa['pa_deadtime']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="pa_pic" class="col-sm-2 col-form-label">PIC</label>
            <div class="col-sm-10 form-group">
                <input type="text" rows="3" class="form-control" id="pa_pic" name="pa_pic"></input>
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
                    <option <?= ($capa['pa_status'] == 'Open') ? "selected" : '' ?>>Open</option>
                    <option <?= ($capa['pa_status'] == 'Close') ? "selected" : '' ?>>Close</option>
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
                <button type="submit" class="btn btn-primary">Ubah Data Capa</button>
                <button type="reset" class="btn btn-danger">Hapus Semua</button>
            </div>
        </div>
    </form>
</div>


<?= $this->endSection(); ?>