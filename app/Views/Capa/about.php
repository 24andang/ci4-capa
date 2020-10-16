<?= $this->extend('/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>About</h1>
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header">Capaweb Ver. 1.0</div>
                <div class="card-body">
                    <h5 class="card-title">Information & Technology</h5>
                    <p class="card-text">
                        PT. Dion Farma Abadi <br>
                        &copy;2020
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>