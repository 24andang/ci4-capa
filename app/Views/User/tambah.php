<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h1 class="my-3">Form Tambah User</h1>
    <ul class="nav justify-content-end my-2">
        <li class="nav-item">
            <a class="nav-link mx-1" href="/user/user">Kembali</a>
        </li>
    </ul>
    <form action="/user/save" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10 form-group">
                <input type="text" class="form-control" id="id" name="id" maxlength="3"></input>
            </div>
        </div>
        <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10 form-group">
                <input type="text" class="form-control" id="nama" name="nama"></input>
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10 form-group">
                <input type="password" class="form-control" id="password" name="password"></input>
            </div>
        </div>
        <div class="form-group row">
            <label for="departemen" class="col-sm-2 col-form-label">Departemen</label>
            <div class="col-sm-10 form-group">
                <select class="form-control" id="departemen" name="departemen">
                    <?php foreach ($dept as $d) : ?>
                        <option value="<?= $d['id']; ?>">( <?= $d['id']; ?> ) <?= $d['departemen']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="level" class="col-sm-2 col-form-label">Level</label>
            <div class="col-sm-10 form-group">
                <select class="form-control" id="level" name="level">
                    <option value="0">Member</option>
                    <option value="1">Admin</option>
                    <option value="2">Super Admin</option>
                </select>
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