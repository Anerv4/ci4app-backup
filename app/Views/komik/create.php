<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="page-content">
        <div class="heading-section">
          <h4><em>Form Tambah</em> Data Komik</h4>
        </div>
        <div class="container">
          <form action="/komik/save" method="post" class="row" enctype="multipart/form-data" id="form"> <?= csrf_field(); ?>
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
                <div class="input-box">
                  <!-- Halobangi ini tak tambain -->
                  <div class="form-group col-lg-12">
                      <label for="myMultiselect" class="col-sm-2 col-form-label mt-5" ><h5><em>Genre</em></h5></label>
                      <div id="myMultiselect" class="multiselect">
                        <div id="mySelectLabel" class="selectBox" onclick="toggleCheckboxArea()">
                          <select class="form-select">
                            <option>somevalue</option>
                          </select>
                          <div class="overSelect"></div>
                        </div>
                        <div id="mySelectOptions" class="<?= ($validation->hasError('genre')) ? 'is-invalid' : ''; ?>">
                          <?php foreach($genre as $g) :?>
                          <label for="label"><input type="checkbox" id="genre" name="genre[]" onchange="checkboxStatusChange()" value="<?= $g['nama_genre']; ?>" /> <?= $g['nama_genre']; ?></label>
                          <?php endforeach; ?>
                          <!-- <label for="Adventure"><input type="checkbox" id="Adventure" name="genre[]" onchange="checkboxStatusChange()" value="Adventure" /> Adventure</label>
                          <label for="Comedy"><input type="checkbox" id="Comedy" name="genre[]" onchange="checkboxStatusChange()" value="Comedy" /> Comedy</label>
                          <label for="Drama"><input type="checkbox" id="Drama" name="genre[]" onchange="checkboxStatusChange()" value="Drama" /> Drama</label>
                          <label for="Demons"><input type="checkbox" id="Demons" name="genre[]" onchange="checkboxStatusChange()" value="Demons" /> Demons</label>
                          <label for="Fantasy"><input type="checkbox" id="Fantasy" name="genre[]" onchange="checkboxStatusChange()" value="Fantasy" /> Fantasy</label>
                          <label for="Harem"><input type="checkbox" id="Harem" name="genre[]" onchange="checkboxStatusChange()" value="Harem" /> Harem</label>
                          <label for="Historical"><input type="checkbox" id="Historical" name="genre[]" onchange="checkboxStatusChange()" value="Historical" /> Historical</label>
                          <label for="Horror"><input type="checkbox" id="Horror" name="genre[]" onchange="checkboxStatusChange()" value="Horror" /> Horror</label>
                          <label for="Magic"><input type="checkbox" id="Magic" name="genre[]" onchange="checkboxStatusChange()" value="Magic" /> Magic</label>
                          <label for="Martial Arts"><input type="checkbox" id="Martial-Arts" name="genre[]" onchange="checkboxStatusChange()" value="Martial Arts" /> Martial Arts</label>
                          <label for="Isekai"><input type="checkbox" id="Isekai" name="genre[]" onchange="checkboxStatusChange()" value="Isekai" /> Isekai</label>
                          <label for="Mystery"><input type="checkbox" id="Mystery" name="genre[]" onchange="checkboxStatusChange()" value="Mystery" /> Mystery</label>
                          <label for="Psychological"><input type="checkbox" id="Psychological" name="genre[]" onchange="checkboxStatusChange()" value="Psychological" /> Psychological</label>
                          <label for="Romance"><input type="checkbox" id="Romance" name="genre[]" onchange="checkboxStatusChange()" value="Romance" /> Romance</label>
                          <label for="Sci-fi"><input type="checkbox" id="Sci-fi" name="genre[]" onchange="checkboxStatusChange()" value="Sci-fi" /> Sci-fi</label>
                          <label for="School"><input type="checkbox" id="School" name="genre[]" onchange="checkboxStatusChange()" value="School" /> School</label>
                          <label for="Sports"><input type="checkbox" id="Sports" name="genre[]" onchange="checkboxStatusChange()" value="Sports" /> Sports</label>
                          <label for="Supernatural"><input type="checkbox" id="Supernatural" name="genre[]" onchange="checkboxStatusChange()" value="Supernatural" /> Supernatural</label>
                          <label for="Super Power"><input type="checkbox" id="Super-Power" name="genre[]" onchange="checkboxStatusChange()" value="Super Power" /> Super Power</label>
                          <label for="Webtoons"><input type="checkbox" id="Webtoons" name="genre[]" onchange="checkboxStatusChange()" value="Webtoons" /> Webtoons</label>
                          <div class="invalid-feedback">
                          </div> -->
                        </div>
                      </div>
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
                  <a href="/komik" class="col-lg-12">Kembali</a>
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