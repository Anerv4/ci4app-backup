<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="page-content">
        <div class="heading-section">
          <h4><em>Form Edit</em> Data Komik</h4>
          <?php
            // d($genre) ;
            // $im = count($genre);
            // d($im); //jumlah data field yang ada di dalam tabel genre 
            // d($komik['genre']);  //data yang masih terimplode dari tabel komik field genre
            $arrImp = $komik['genre']; //data yang masih menggabungkan string dari isnert an saat membuat create genre
            $arrExp = explode(',',$arrImp);  //data yang sudah dipecah menjadi array(terexplode)
            // d($arrExp); //data yang sudah terexplode

            ?> 
        </div>
        <div class="container">
          <form action="/komik/update/<?= $komik['idKomik']; ?>" method="post" class="row" enctype="multipart/form-data" id="form"> <?= csrf_field(); ?>
            <div class="col-lg-6">
              <div class="user-details">
                <input type="hidden" name="slug" value="<?= $komik['slug']; ?>">
                <input type="hidden" name="sampulLama" value="<?= $komik['sampul']; ?>">
                <div class="input-box">
                  <label for="label" class="col-sm-2 col-form-label mt-5"><h5><em>Judul</em></h5></label>
                  <input type="text" placeholder="Masukkan Judul" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" value="<?= (old('judul')) ? old('judul') : $komik['judul']; ?>" autofocus>
                  <div class="invalid-feedback">
                    <?= $validation->getError('judul'); ?>
                  </div>
                </div>
                <div class="input-box">
                  <label for="label" class="col-sm-2 col-form-label mt-5"><h5><em>Penulis</em></h5></label>
                  <input type="text" placeholder="Masukkan penulis" class="form-control <?= ($validation->hasError('penulis')) ? 'is-invalid' : ''; ?>" id="penulis" name="penulis" value="<?= (old('penulis')) ? old('penulis') : $komik['penulis']; ?>">
                  <div class="invalid-feedback">
                    <?= $validation->getError('penulis'); ?>
                  </div>
                </div>
                <div class="input-box">
                  <label for="label" class="col-sm-2 col-form-label mt-5"><h5><em>Penerbit</em></h5></label>
                  <input type="text" placeholder="Masukkan penerbit" class="form-control <?= ($validation->hasError('penerbit')) ? 'is-invalid' : ''; ?>" id="penerbit" name="penerbit" value="<?= (old('penerbit')) ? old('penerbit') : $komik['penerbit']; ?>">
                  <div class="invalid-feedback">
                    <?= $validation->getError('penerbit'); ?>
                  </div>
                </div>
                <div class="input-box">
                  <div class="form-group col-lg-12">
                    <label for="myMultiselect" class="col-sm-2 col-form-label mt-5" ><h5><em>Genre</em></h5></label>
                    <div id="myMultiselect" class="multiselect">
                      <div id="mySelectLabel" class="selectBox" onclick="toggleCheckboxArea()">
                        <select class="form-select">
                          <option><?= $komik['genre']; ?></option>
                        </select>
                        <div class="overSelect"></div>
                      </div>
                      <div id="mySelectOptions" >
                        <?php foreach($genre as $g) :?>
                        <?php 
                          $checkedStatus = "";
                          // $im = implode(',',$g['nama_genre']);
                          // d($im);
                          if(in_array($g['nama_genre'],$arrExp)){
                            $checkedStatus="checked";
                          }
                        ?>
                        <label for="label"><input type="checkbox" id="" name="genre[]" onchange="checkboxStatusChange()" value="<?= $g['nama_genre'] ; ?>" <?php echo $checkedStatus; ?>  class="<?= ($validation->hasError('genre')) ? 'is-invalid' : ''; ?>"/> <?= $g['nama_genre']; ?></label>
                        <?php endforeach; ?>
                        <div class="invalid-feedback">
                          <?= $validation->getError('genre'); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="input-box mb-20">
                  <label for="label" class="col-sm-2 col-form-label mt-5"><h5><em>Sinopsis</em></h5></label>
                  <input type="text" placeholder="Masukkan sinopsis" class="form-control <?= ($validation->hasError('sinopsis')) ? 'is-invalid' : ''; ?>" id="sinopsis" name="sinopsis" value="<?= (old('sinopsis')) ? old('sinopsis') : $komik['sinopsis']; ?>">
                  <div class="invalid-feedback">
                    <?= $validation->getError('sinopsis'); ?>
                  </div>
                </div>
                <div class="main-button button-submit ">
                  <a href="javascript:;" class="col-lg-12" onclick="document.getElementById('form').submit();">Submit</a>
                </div>
                <div class="main-button button-submit ">
                  <a href="/komik" class="col-lg-12">Kembali</a>
                </div>
                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
              </div>
            </div>
            <div class="col-lg-6">
              <div class="user-details">
                <div class="input-box">
                  <div class="col-lg-12">
                    <img src="/img/<?= $komik['sampul']; ?>" class="img-thumbnail img-preview mt-5">
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