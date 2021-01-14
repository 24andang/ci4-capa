<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h1 class="my-3">Form Ubah Data User</h1>
    <ul class="nav justify-content-end my-2">
        <li class="nav-item">
            <a class="nav-link mx-1" href="/user/user">Kembali</a>
        </li>
    </ul>
    <form action="/user/update/<?= $user['id']; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10 form-group">
                <input type="text" class="form-control" id="id" name="id" value="<?= $user['id']; ?>" maxlength="3"></input>
            </div>
        </div>
        <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10 form-group">
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>"></input>
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10 form-group">
                <input type="password" class="form-control" id="password" name="password" value="<?= $enkripsi->decrypt(base64_decode($user['password'])); ?>"></input>
            </div>
        </div>
        <div class="form-group row">
            <label for="departemen" class="col-sm-2 col-form-label">Departemen</label>
            <div class="col-sm-10 form-group">
                <select class="form-control" id="departemen" name="departemen">
                    <?php foreach ($dept as $d) : ?>
                        <option value="<?= $d['id']; ?>" <?= $d['id'] == $user['departemen'] ? 'selected' : '' ?>>( <?= $d['id']; ?> ) <?= $d['departemen']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="level" class="col-sm-2 col-form-label">Level</label>
            <div class="col-sm-10 form-group">
                <select class="form-control" id="level" name="level">
                    <option value="0" <?= $user['level'] == 0 ? 'selected' : '' ?>>Member</option>
                    <option value="1" <?= $user['level'] == 1 ? 'selected' : '' ?>>Admin</option>
                    <option value="2" <?= $user['level'] == 2 ? 'selected' : '' ?>>Super Admin</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Ubah Data User</button>
                <button type="reset" class="btn btn-danger">Ulangi</button>
            </div>
        </div>
    </form>
</div>


<?= $this->endSection(); ?>