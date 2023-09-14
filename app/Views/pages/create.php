<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="page-content">
        <div class="heading-section">
          <h4><em>Form Tambah</em> Data Komik Populer</h4>
        </div>
        <div class="container">
          <form action="/pages/save" method="post" class="row" enctype="multipart/form-data" id="form"> <?= csrf_field(); ?>
            <div class="col-lg-6">
              <div class="user-details">
                <div class="input-box">
                  <label for="label" class="col-sm-2 col-form-label mt-5"><h5><em>Judul</em></h5></label>
                  <input type="text" placeholder="Masukkan Judul" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" autofocus>
                  <div class="invalid-feedback">
                    <?= $validation->getError('judul'); ?>
                  </div>
                </div>
                <div class="input-box">
                  <label for="label" class="col-sm-2 col-form-label mt-5"><h5><em>Penulis</em></h5></label>
                  <input type="text" placeholder="Masukkan penulis" class="form-control <?= ($validation->hasError('penulis')) ? 'is-invalid' : ''; ?>" id="penulis" name="penulis" >
                  <div class="invalid-feedback">
                    <?= $validation->getError('penulis'); ?>
                  </div>
                </div>
                <div class="input-box">
                  <label for="label" class="col-sm-2 col-form-label mt-5"><h5><em>Penerbit</em></h5></label>
                  <input type="text" placeholder="Masukkan penerbit" class="form-control <?= ($validation->hasError('penerbit')) ? 'is-invalid' : ''; ?>" id="penerbit" name="penerbit" >
                  <div class="invalid-feedback">
                    <?= $validation->getError('penerbit'); ?>
                  </div>
                </div>
                <div class="input-box mb-20">
                  <label for="label" class="col-sm-2 col-form-label mt-5"><h5><em>Sinopsis</em></h5></label>
                  <input type="text" placeholder="Masukkan sinopsis" class="form-control <?= ($validation->hasError('sinopsis')) ? 'is-invalid' : ''; ?>" id="sinopsis" name="sinopsis" >
                  <div class="invalid-feedback">
                    <?= $validation->getError('sinopsis'); ?>
                  </div>
                </div>
                <div class="main-button button-submit ">
                  <a href="javascript:;" class="col-lg-12" onclick="document.getElementById('form').submit();">Submit</a>
                </div>
                <div class="main-button button-submit ">
                  <a href="/pages/populer" class="col-lg-12">Kembali</a>
                </div>
                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
              </div>
            </div>
            <div class="col-lg-6">
              <div class="user-details">
                <div class="input-box">
                  <div class="col-lg-12">
                    <img src="/img/default.png" class="img-thumbnail img-preview mt-5">
                  </div>
                    <input type="file" class="form-control <?= ($validation->hasError('sampul')) ? 'is-invalid' : '' ; ?>" id="sampul" name="sampul" onchange="previewImg()">
                    <div class="invalid-feedback">
                      <?= $validation->getError('sampul'); ?>
                    </div>
                    <label class="input-group-text" for="sampul">Pilih Gambar...</label>
                </div>
              </div>
            </div>
          </form>
        </div>

        </div> <!-- page-content end -->
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>