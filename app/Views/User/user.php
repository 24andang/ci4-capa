<?= $this->extend('/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Data User Capaweb</h1>

            <div class="d-flex justify-content-between mb-3 row">
                <div class="col4">
                    <a href="/user/tambah" class="btn btn-info">Tambah User</a>
                </div>
                <div class="col-6">
                    <form class="my-2 my-lg-0 row d-flex justify-content-end" method="get" action="">
                        <input class="form-control mr-sm-2 col-8" type="text" placeholder="Cari Data User" name="keyword">
                        <button class="btn btn-info my-2 my-sm-0" type="submit" name="submit">Cari</button>
                    </form>
                </div>
            </div>

            <div class="<?= session()->getFlashdata('item') ? 'alert alert-info' : '' ?>" role="alert">
                <?= session()->getFlashdata('item'); ?>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">DEPARTEMEN</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($user as $u) : ?>
                        <tr class="">
                            <th scope="row"><?= $i++; ?></th>
                            <td>
                                <?= $u['id']; ?> <br>
                                <small class="font-italic <?= $u['level'] == 1 ? 'text-success border border-success rounded-pill' : ''; ?> <?= $u['level'] == 2 ? 'text-danger border border-danger rounded-pill' : ''; ?> px-2"><?= $u['level'] == 1 ? 'Admin' : ''; ?> <?= $u['level'] == 2 ? 'Super Admin' : ''; ?></small>
                            </td>
                            <td><?= $u['nama']; ?></td>
                            <td><?= $u['departemen']; ?></td>
                            <td>
                                <a href="/user/ubah/<?= $u['id']; ?>" class="btn btn-info">Ubah</a>
                                <form action="/user/delete" method="post" class="d-inline">
                                    <input type="hidden" name="id" value="<?= $u['id']; ?>">
                                    <button class="btn btn-danger" onclick="return confirm('User akan dihapus ?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>