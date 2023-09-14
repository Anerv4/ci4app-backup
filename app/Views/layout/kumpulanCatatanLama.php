<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Tambah Data Komik</h2>
            <!-- kita cetak validation lalu kita ambil semua error yang tampil -->
            <form action="/komik/save" method="post" enctype="multipart/form-data">
              <!-- tambahkan satu atribut dalam form nya yaitu "enctype" lalu "multipart/form-data" 
            ini supaya form kalian bisa bekerja inputan biasa dan inputan file / jadi bisa bekerja dengan get/post dan files -->

              <!-- csrf adalah (cross side resource forgery) -->
              <?= csrf_field(); ?> 
              <!-- jadi buat apa ini?
              menjaga agar form nya hanya bisa diinputkan lewat halaman ini saja,
              jadi kalo ada orang lain yang ngebajak form nya pakai aplikasi yang dia punya maka form
              nya itu tidak akan mau,karena form nya harus di halaman ini saja -->
                <div class="row mb-3">
    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
    <div class="col-sm-10">
      <!-- kita bikin operasi ternary( ternary itu adalah if dan else dalam satu baris) 
      tanda kurung " () " menggambarkan "jika" 
      kasih tanda tanya " ? " lalu jika "true" ngapain titik dua " '' " jika false titik dua " : " ngapain-->
      <!-- cara membacanya adalah "jika didalam validation itu ada error untuk input/elemen ('judul'/name dari input tersebut) kasih tanda tanya Jika true jadikan/cetak form tersebut menjadi is-invalid,Jika false jadikan/cetak string kosong (jadi tidak usah diisi apa apa)" -->
      <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : '' ; ?>" id="judul" name="judul" autofocus>
      <!-- buat nampilin kesalahan invalid ada sebuah div yang namanya "invalid-feedback/valid-feedback" langsung dari bootstrap ,jadi kerennya bootstrap sudah mengatur kalau ada class "is-invalid/is-valid" muncul, lalu bootstrapakan memunculkan div "invalid-feedback/valid-feedback" , tapi kalau tidak ada class "is-invalid/is-valid" div "invalid-feedback/valid-feedback" tidak akan muncul  -->
      <div class="invalid-feedback">
        <?= $validation->getError('judul'); ?>
      </div>
    </div>
  </div>
  <div class="row mb-3">
    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('penulis')) ? 'is-invalid' : '' ; ?>" id="penulis" name="penulis" value="<?= old('penulis'); ?>">
      <!-- fitur old('nama inputnya') bisa digunakan apabila sudah mengirim session -->
      <div class="invalid-feedback">
        <?= $validation->getError('penulis'); ?>
      </div>
    </div>
  </div>
  <div class="row mb-3">
    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('penerbit')) ? 'is-invalid' : '' ; ?>" id="penerbit" name="penerbit" value="<?= old('penerbit'); ?>">
      <div class="invalid-feedback">
        <?= $validation->getError('penerbit'); ?>
      </div>
    </div>
  </div>
  <div class="row mb-3">
    <label for="sinopsis" class="col-sm-2 col-form-label">Sinopsis</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('sinopsis')) ? 'is-invalid' : '' ; ?>" id="sinopsis" name="sinopsis" value="<?= old('sinopsis'); ?>">
      <div class="invalid-feedback">
        <?= $validation->getError('sinopsis'); ?>
      </div>
    </div>
  </div>
  <div class="row mb-3">
    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
    <div class="col-sm-2">
      <img src="/img/default.png" class="img-thumbnail img-preview">
    </div>
    <div class="col-sm-8">
      <div class="input-group mb-3">
        <input type="file" class="form-control <?= ($validation->hasError('sampul')) ? 'is-invalid' : '' ; ?>" id="sampul" name="sampul" onchange="previewImg()">
        <div class="invalid-feedback">
          <?= $validation->getError('sampul'); ?>
        </div>
        <label class="input-group-text" for="sampul">Pilih Gambar...</label>
      </div>
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">Tambah Data</button>
</form>
        </div>
    </div>
</div>




<div class="col-lg-6">
                <div class="login-form">
                  <form action="#" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>

                    <div class="input__item">
                      <label for="label" class="col-sm-2 col-form-label mt-5"><h5><em>Judul</em></h5></label>
                      <input type="text" placeholder="Masukkan Judul" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" autofocus>
                        <div class="invalid-feedback">
                          <?= $validation->getError('judul'); ?>
                        </div>                      
                    </div>
                    <div class="input-item">
                      <label for="penulis" class="col-sm-2 col-form-label"><h5><em>Penulis</em></h5></label>
                      <input type="text" placeholder="Masukkan Nama Penulis"class="form-control <?= ($validation->hasError('penulis')) ? 'is-invalid' : '' ; ?>" id="penulis" name="penulis" value="<?= old('penulis'); ?>">
                        <div class="invalid-feedback">
                          <?= $validation->getError('penulis'); ?>
                        </div>
                    </div>
                    <div class="input-item">
                      <label for="penerbit" class="col-sm-2 col-form-label"><h5><em>Penerbit</em></h5></label>
                      <input type="text" placeholder="Masukkan Nama Penerbit" class="form-control <?= ($validation->hasError('penerbit')) ? 'is-invalid' : '' ; ?>" id="penerbit" name="penerbit" value="<?= old('penerbit'); ?>">
                        <div class="invalid-feedback">
                          <?= $validation->getError('penerbit'); ?>
                        </div>
                    </div>
                    <div class="input-item">
                      <label for="sinopsis" class="col-sm-2 col-form-label"><h5><em>Sinopsis</em></h5></label>
                      <input type="text" placeholder="Masukkan Nama sinopsis" class="form-control <?= ($validation->hasError('sinopsis')) ? 'is-invalid' : '' ; ?>" id="sinopsis" name="sinopsis" value="<?= old('sinopsis'); ?>">
                        <div class="invalid-feedback">
                          <?= $validation->getError('sinopsis'); ?>
                        </div>
                    </div>
                    
                    
                  </form>
                </div>                
              </div>
              <div class="col-lg-6">
                <div class="login__social__links">
                  <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">
                      <div class="input-item">
                        <div class="col-lg-12">
                          <img src="/img/default.png" class="img-thumbnail img-preview">
                        </div>
                        <div class="input-group">
                        <input type="file" class="form-control <?= ($validation->hasError('sampul')) ? 'is-invalid' : '' ; ?>" id="sampul" name="sampul" onchange="previewImg()">
                          <div class="invalid-feedback">
                            <?= $validation->getError('sampul'); ?>
                          </div>
                          <label class="input-group-text" for="sampul">Pilih Gambar...</label>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>




              <!-- lanjuttan -->
              <div class="signup spad">
          <div class="container">
            <div class="row">
              <div class="login-form">
                <form action="#" method="post" enctype="multipart/form-data">
                  <?= csrf_field(); ?>
                  <div class="col-lg-6">
                    <div class="input-item">
                      <label for="label" class="col-sm-2 col-form-label mt-5"><h5><em>Judul</em></h5></label>
                        <input type="text" placeholder="Masukkan Judul" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" autofocus>
                          <div class="invalid-feedback">
                            <?= $validation->getError('judul'); ?>
                          </div>                      
                      </div>
                      <div class="input-item">
                        <label for="penulis" class="col-sm-2 col-form-label"><h5><em>Penulis</em></h5></label>
                        <input type="text" placeholder="Masukkan Nama Penulis"class="form-control <?= ($validation->hasError('penulis')) ? 'is-invalid' : '' ; ?>" id="penulis" name="penulis" value="<?= old('penulis'); ?>">
                          <div class="invalid-feedback">
                            <?= $validation->getError('penulis'); ?>
                          </div>
                      </div>
                      <div class="input-item">
                        <label for="penerbit" class="col-sm-2 col-form-label"><h5><em>Penerbit</em></h5></label>
                        <input type="text" placeholder="Masukkan Nama Penerbit" class="form-control <?= ($validation->hasError('penerbit')) ? 'is-invalid' : '' ; ?>" id="penerbit" name="penerbit" value="<?= old('penerbit'); ?>">
                          <div class="invalid-feedback">
                            <?= $validation->getError('penerbit'); ?>
                          </div>
                      </div>
                      <div class="input-item">
                        <label for="sinopsis" class="col-sm-2 col-form-label"><h5><em>Sinopsis</em></h5></label>
                        <input type="text" placeholder="Masukkan Nama sinopsis" class="form-control <?= ($validation->hasError('sinopsis')) ? 'is-invalid' : '' ; ?>" id="sinopsis" name="sinopsis" value="<?= old('sinopsis'); ?>">
                          <div class="invalid-feedback">
                            <?= $validation->getError('sinopsis'); ?>
                          </div>
                      </div>
                    </div> <!-- col-lg-6 sebelah kiri -->
                    <div class="col-lg-6">
                      <div class="login__social__links">
                        <div class="login-form">
                          <div class="input-item">
                            <div class="col-lg-12">
                              <img src="/img/default.png" class="img-thumbnail img-preview">
                            </div>
                            <div class="input-group">
                              <input type="file" class="form-control <?= ($validation->hasError('sampul')) ? 'is-invalid' : '' ; ?>" id="sampul" name="sampul" onchange="previewImg()">
                              <div class="invalid-feedback">
                                <?= $validation->getError('sampul'); ?>
                              </div>
                              <label class="input-group-text" for="sampul">Pilih Gambar...</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> <!-- col-lg-6 sebelah kanan -->
                  </div>
                </form>
              </div>
            </div>
          </div>










          <div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Ubah Data Komik</h2>
            <!-- kita cetak validation lalu kita ambil semua error yang tampil -->
            <form action="/komik/update/<?= $komik['id']; ?>" method="post" enctype="multipart/form-data">

              <!-- csrf adalah (cross side resource forgery) -->
              <?= csrf_field(); ?> 
              <!-- jadi buat apa ini?
              menjaga agar form nya hanya bisa diinputkan lewat halaman ini saja,
              jadi kalo ada orang lain yang ngebajak form nya pakai aplikasi yang dia punya maka form
              nya itu tidak akan mau,karena form nya harus di halaman ini saja -->
              <input type="hidden" name="slug" value="<?= $komik['slug']; ?>">
              <input type="hidden" name="sampulLama" value="<?= $komik['sampul']; ?>">
                <div class="row mb-3">
    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
    <div class="col-sm-10">
      <!-- kita bikin operasi ternary( ternary itu adalah if dan else dalam satu baris) 
      tanda kurung " () " menggambarkan "jika" 
      kasih tanda tanya " ? " lalu jika "true" ngapain titik dua " '' " jika false titik dua " : " ngapain-->
      <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : '' ; ?>" id="judul" name="judul" value="<?= (old('judul')) ? old('judul') : $komik['judul']; ?>" autofocus>
      <div class="invalid-feedback">
        <?= $validation->getError('judul'); ?>
      </div>
    </div>
  </div>
  <div class="row mb-3">
    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('penulis')) ? 'is-invalid' : '' ; ?>" id="penulis" name="penulis" value="<?= (old('penulis')) ? old('penulis') : $komik['penulis']; ?>">
      <!-- fitur old('nama inputnya') bisa digunakan apabila sudah mengirim session -->
      <div class="invalid-feedback">
        <?= $validation->getError('penulis'); ?>
      </div>
    </div>
  </div>
  <div class="row mb-3">
    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('penerbit')) ? 'is-invalid' : '' ; ?>" id="penerbit" name="penerbit" value="<?= (old('penerbit')) ? old('penerbit') : $komik['penerbit']; ?>">
      <div class="invalid-feedback">
        <?= $validation->getError('penerbit'); ?>
      </div>
    </div>
  </div>
  <div class="row mb-3">
    <label for="sinopsis" class="col-sm-2 col-form-label">Sinopsis</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('sinopsis')) ? 'is-invalid' : '' ; ?>" id="sinopsis" name="sinopsis" value="<?= (old('sinopsis')) ? old('sinopsis') : $komik['sinopsis']; ?>">
      <div class="invalid-feedback">
        <?= $validation->getError('sinopsis'); ?>
      </div>
    </div>
  </div>
  <div class="row mb-3">
    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
    <div class="col-sm-2">
      <img src="/img/<?= $komik['sampul']; ?>" class="img-thumbnail img-preview">
    </div>
    <div class="col-sm-8">
      <div class="input-group mb-3">
        <input type="file" class="form-control <?= ($validation->hasError('sampul')) ? 'is-invalid' : '' ; ?>" id="sampul" name="sampul" onchange="previewImg()">
        <div class="invalid-feedback">
          <?= $validation->getError('sampul'); ?>
        </div>
        <label class="input-group-text" for="sampul">Pilih Gambar..</label>
      </div>
    </div>
  </div>



  <!-- komik Populer tabel -->
  <div class="container">
    <div class="row">
        <div class="col">
          <a href="/pages/create" class="btn mt-3 " style="background-color: #8d93ab; color: #fdff8a;">Tambah Data Komik Populer</a>
            <h1 class="mt-2" >Daftar Komik Populer</h1>
            <?php if(session()->getFlashdata('pesan')) : ?>
              <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </symbol>
              </svg>
              <!-- <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 " role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                  An example success alert with an icon
                </div>
              </div> -->
              <div class="alert alert-success" role="alert">
                <svg class="bi flex-shrink-0 " role="img" style="width: 30; height: 30;" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <?= session()->getFlashdata('pesan'); ?>
              </div>
              <?php endif; ?>
        <table class="table table-striped mt-3 border">
  <thead class="">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Sampul</th>
      <th scope="col">Judul</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1;?>
    <?php foreach ($komikpopuler as $k):?>
    <tr>
      <th scope="row"><?= $i++; ?></th>
      <td><img src="/imgPopuler/<?= $k['sampul']; ?>" alt="" class="sampul" ></td>
      <td><?= $k['judul']; ?></td>
      <td>
        <a href="/pages/<?= $k['slug']; ?>" class="btn btn-success">Detail</a>
      </td>
    </tr>
    <?php endforeach; ?>
    
  </tbody>
</table>
        </div>
    </div>
</div>


<!-- komik Populer detail -->
<div class="container">
    <h2 class="mt-2 detail">Detail Komik Populer</h2>
    <div class="row">
        <div class="col">
        <div class="card mb-3 mt-2" id="card">
  <div class="row g-0">
    <div class="col-md-3">
      <img src="/imgPopuler/<?= $komikpopuler['sampul']; ?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-7">
      <div class="card-body">
        <h5 class="card-title"><?= $komikpopuler['judul']; ?></h5>
        <p class="card-text"><b>Penulis: </b><?= $komikpopuler['penulis']; ?></p>
        <p class="card-text"><small class="text-muted"><b>Penerbit: </b><?= $komikpopuler['penerbit']; ?></small></p>
        <p class="card-text"><small class="text-muted"><b>Sinopsis: </b><?= $komikpopuler['sinopsis']; ?></small></p>

        <a href="/pages/edit/<?= $komikpopuler['slug']; ?>" class="btn btn-warning">Edit</a>

        <form action="/pages/delete/<?= $komikpopuler['id']; ?>" method="post" class="d-inline">
          <?= csrf_field(); ?>
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')">Delete</button>
        </form>

        <a href="/pages/populer" class="d-block p-2 mt-2" style="width: 195px;">Kembali ke Daftar Komik</a>
      </div>
    </div>
  </div>
</div>
        </div>
    </div>
</div>



<!-- komik populer edit  -->
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Ubah Data Komik Populer</h2>
            <!-- kita cetak validation lalu kita ambil semua error yang tampil -->
            <form action="/pages/update/<?= $komikpopuler['id']; ?>" method="post" enctype="multipart/form-data">

              <!-- csrf adalah (cross side resource forgery) -->
              <?= csrf_field(); ?> 
              <!-- jadi buat apa ini?
              menjaga agar form nya hanya bisa diinputkan lewat halaman ini saja,
              jadi kalo ada orang lain yang ngebajak form nya pakai aplikasi yang dia punya maka form
              nya itu tidak akan mau,karena form nya harus di halaman ini saja -->
              <input type="hidden" name="slug" value="<?= $komikpopuler['slug']; ?>">
              <input type="hidden" name="sampulLama" value="<?= $komikpopuler['sampul']; ?>">
                <div class="row mb-3">
    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
    <div class="col-sm-10">
      <!-- kita bikin operasi ternary( ternary itu adalah if dan else dalam satu baris) 
      tanda kurung " () " menggambarkan "jika" 
      kasih tanda tanya " ? " lalu jika "true" ngapain titik dua " '' " jika false titik dua " : " ngapain-->
      <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : '' ; ?>" id="judul" name="judul" value="<?= (old('judul')) ? old('judul') : $komikpopuler['judul']; ?>" autofocus>
      <div class="invalid-feedback">
        <?= $validation->getError('judul'); ?>
      </div>
    </div>
  </div>
  <div class="row mb-3">
    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('penulis')) ? 'is-invalid' : '' ; ?>" id="penulis" name="penulis" value="<?= (old('penulis')) ? old('penulis') : $komikpopuler['penulis']; ?>">
      <!-- fitur old('nama inputnya') bisa digunakan apabila sudah mengirim session -->
      <div class="invalid-feedback">
        <?= $validation->getError('penulis'); ?>
      </div>
    </div>
  </div>
  <div class="row mb-3">
    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('penerbit')) ? 'is-invalid' : '' ; ?>" id="penerbit" name="penerbit" value="<?= (old('penerbit')) ? old('penerbit') : $komikpopuler['penerbit']; ?>">
      <div class="invalid-feedback">
        <?= $validation->getError('penerbit'); ?>
      </div>
    </div>
  </div>
  <div class="row mb-3">
    <label for="sinopsis" class="col-sm-2 col-form-label">Sinopsis</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('sinopsis')) ? 'is-invalid' : '' ; ?>" id="sinopsis" name="sinopsis" value="<?= (old('sinopsis')) ? old('sinopsis') : $komikpopuler['sinopsis']; ?>">
      <div class="invalid-feedback">
        <?= $validation->getError('sinopsis'); ?>
      </div>
    </div>
  </div>
  <div class="row mb-3">
    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
    <div class="col-sm-2">
      <img src="/imgPopuler/<?= $komikpopuler['sampul']; ?>" class="img-thumbnail img-preview">
    </div>
    <div class="col-sm-8">
      <div class="input-group mb-3">
        <input type="file" class="form-control <?= ($validation->hasError('sampul')) ? 'is-invalid' : '' ; ?>" id="sampul" name="sampul" onchange="previewImg()">
        <div class="invalid-feedback">
          <?= $validation->getError('sampul'); ?>
        </div>
        <label class="input-group-text" for="sampul">Pilih Gambar..</label>
      </div>
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary"> Ubah Data</button>
</form>
        </div>
    </div>
</div>


<!-- komik populer create -->
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Tambah Data Komik Populer</h2>
            <!-- kita cetak validation lalu kita ambil semua error yang tampil -->
            <form action="/pages/save" method="post" enctype="multipart/form-data">
              <!-- tambahkan satu atribut dalam form nya yaitu "enctype" lalu "multipart/form-data" 
            ini supaya form kalian bisa bekerja inputan biasa dan inputan file / jadi bisa bekerja dengan get/post dan files -->

              <!-- csrf adalah (cross side resource forgery) -->
              <?= csrf_field(); ?> 
              <!-- jadi buat apa ini?
              menjaga agar form nya hanya bisa diinputkan lewat halaman ini saja,
              jadi kalo ada orang lain yang ngebajak form nya pakai aplikasi yang dia punya maka form
              nya itu tidak akan mau,karena form nya harus di halaman ini saja -->
                <div class="row mb-3">
    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
    <div class="col-sm-10">
      <!-- kita bikin operasi ternary( ternary itu adalah if dan else dalam satu baris) 
      tanda kurung " () " menggambarkan "jika" 
      kasih tanda tanya " ? " lalu jika "true" ngapain titik dua " '' " jika false titik dua " : " ngapain-->
      <!-- cara membacanya adalah "jika didalam validation itu ada error untuk input/elemen ('judul'/name dari input tersebut) kasih tanda tanya Jika true jadikan/cetak form tersebut menjadi is-invalid,Jika false jadikan/cetak string kosong (jadi tidak usah diisi apa apa)" -->
      <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : '' ; ?>" id="judul" name="judul" autofocus value="<?= old('judul'); ?>">
      <!-- buat nampilin kesalahan invalid ada sebuah div yang namanya "invalid-feedback/valid-feedback" langsung dari bootstrap ,jadi kerennya bootstrap sudah mengatur kalau ada class "is-invalid/is-valid" muncul, lalu bootstrapakan memunculkan div "invalid-feedback/valid-feedback" , tapi kalau tidak ada class "is-invalid/is-valid" div "invalid-feedback/valid-feedback" tidak akan muncul  -->
      <div class="invalid-feedback">
        <?= $validation->getError('judul'); ?>
      </div>
    </div>
  </div>
  <div class="row mb-3">
    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('penulis')) ? 'is-invalid' : '' ; ?>" id="penulis" name="penulis" value="<?= old('penulis'); ?>">
      <!-- fitur old('nama inputnya') bisa digunakan apabila sudah mengirim session -->
      <div class="invalid-feedback">
        <?= $validation->getError('penulis'); ?>
      </div>
    </div>
  </div>
  <div class="row mb-3">
    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('penerbit')) ? 'is-invalid' : '' ; ?>" id="penerbit" name="penerbit" value="<?= old('penerbit'); ?>">
      <div class="invalid-feedback">
        <?= $validation->getError('penerbit'); ?>
      </div>
    </div>
  </div>
  <div class="row mb-3">
    <label for="sinopsis" class="col-sm-2 col-form-label">Sinopsis</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('sinopsis')) ? 'is-invalid' : '' ; ?>" id="sinopsis" name="sinopsis" value="<?= old('sinopsis'); ?>">
      <div class="invalid-feedback">
        <?= $validation->getError('sinopsis'); ?>
      </div>
    </div>
  </div>
  <div class="row mb-3">
    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
    <div class="col-sm-2">
      <img src="/img/default.png" class="img-thumbnail img-preview">
    </div>
    <div class="col-sm-8">
      <div class="input-group mb-3">
        <input type="file" class="form-control <?= ($validation->hasError('sampul')) ? 'is-invalid' : '' ; ?>" id="sampul" name="sampul" onchange="previewImg()">
        <div class="invalid-feedback">
          <?= $validation->getError('sampul'); ?>
        </div>
        <label class="input-group-text" for="sampul">Pilih Gambar...</label>
      </div>
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">Tambah Data</button>
</form>
        </div>
    </div>
</div>