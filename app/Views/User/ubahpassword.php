<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h1 class="my-3">Form Ubah Data User</h1>
    <ul class="nav justify-content-end my-2">
        <li class="nav-item">
            <a class="nav-link mx-1" href="/user/user">Kembali</a>
        </li>
    </ul>
    <div class="alert alert-danger" role="alert">
        <?= session()->getFlashdata('item'); ?>
    </div>
    <form action="/user/updatepassword" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10 form-group">
                <input type="text" class="form-control" id="id" name="id" value="<?= $user['id']; ?>" maxlength="3" readonly></input>
            </div>
        </div>
        <div class="form-group row">
            <label for="passwordlama" class="col-sm-2 col-form-label">Password Lama</label>
            <div class="col-sm-10 form-group">
                <input type="password" class="form-control" id="passwordlama" name="passwordlama"></input>
            </div>
        </div>
        <div class="form-group row">
            <label for="passwordbaru" class="col-sm-2 col-form-label">Password Baru</label>
            <div class="col-sm-10 form-group">
                <input type="password" class="form-control" id="passwordbaru" name="passwordbaru"></input>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Ubah Password</button>
                <button type="reset" class="btn btn-danger">Ulangi</button>
            </div>
        </div>
    </form>
</div>


<?= $this->endSection(); ?>