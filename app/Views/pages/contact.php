<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Contact</h2>
            <!-- kita loopingkan menggunakan foreach -->
            <?php foreach ($alamat as $a): ?>
                <ul>
                    <!-- 'tipe','alamat','kota' itu berasal dari controller Pages method contact() -->
                    <li>Tipe: <?= $a['tipe']; ?></li>
                    <li>Alamat: <?= $a['alamat']; ?></li>
                    <li>Kota: <?= $a['kota']; ?></li>
                </ul>
                <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>