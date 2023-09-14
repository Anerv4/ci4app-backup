<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <!-- dari Controller Pages  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- My CSS -->
    <link rel="stylesheet" href="/css/styleNew.css"> 
    </head>
    <body>
      <nav class="navbar navbar-expand-lg shadow-lg p-3   ">
          <div class="container-fluid">
              <div class="navbar-brand"><h5>CodeIgniter CRUD</h5></div>
              <!-- <a class="navbar-brand" href="#">CodeIgniter CRUD</a> -->
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse " id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                  <li class="nav-item">
                  <!-- <a class="nav-link" href="(<)?=base_url('/'); ?>">About me</a> -->
                  <!-- contoh diatas untuk pengguna localhost/xampp -->
                  <a class="nav-link active" aria-current="page" href="/">Home</a>
                  <!-- conth diatas untuk pengguna php spark serve -->
                  </li>
                  <li class="nav-item">
                  <a class="nav-link " href="/pages/about">About me</a></li>
                  <!-- contoh diatas untuk pengguna php spark serve -->

                  <li class="nav-item">
                  <a class="nav-link" href="/pages/contact">Contact</a></li>
                  <!-- contoh diatas untuk pengguna php spark serve -->

                  <!-- <li class="nav-item">
                  <a class="nav-link" href="/komik">Komik</a></li> -->
                  <!-- contoh diatas untuk pengguna php spark serve -->
                  <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                      <!-- perlu diaktifkan dulu agar dropdown nya aktif -->
                      Fitur Admin
                  </a>
                  <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="/komik">Tabel Daftar Komik</a></li>
                      <li><a class="dropdown-item" href="/pages/populer">Tabel Daftar Komik Populer</a></li>
                      <!-- <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                  </ul>
                  </li>

                  
                  <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                      <!-- perlu diaktifkan dulu agar dropdown nya aktif -->
                      Baca Online
                  </a>
                  <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="/komik/bacakomik">Komik</a></li>
                      <li><a class="dropdown-item" href="/komik/bacanovel">Novel</a></li>
                      <!-- <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                  </ul>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link " href="/orang">Orang</a></li>
                  <!-- contoh diatas untuk pengguna php spark serve -->
              </ul>
              <form action="" class="d-flex" role="search" method="post" autocomplete="off" >
                  
                  <input class="form-control me-2" name="keyword" type="search" placeholder="Search" aria-label="Search" value="<?= $keyword; ?>">
                  <button class="btn btn-outline-success bg-success text-white" type="submit">Search</button>
                  

              </form>
              </div>
          </div>
      </nav>
      <div class="container">
          <div class="row">
              <div class="col">
                <!-- <a href="/komik/create" class="btn mt-3 " style="background-color: #8d93ab; color: #fdff8a;">Tambah Data Komik</a> -->
                <h1 class="mt-2" >Daftar Orang</h1>
                <table class="table table-striped mt-3 border">
                  <thead class="">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Alamat</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1 + (10 * ($currentPage -1));?>
                    <?php foreach ($orangPaginate as $o):?>
                    <tr>
                      <th scope="row"><?= $i++; ?></th>
                      <td><?= $o['nama']; ?></td>
                      <td><?= $o['alamat']; ?></td>
                      <td>
                        <a href="" class="btn btn-success">Detail</a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <!-- membuat pagination -->
                
                <div class="paginate">
                  <i class="kanan">Showing <?= 1 + (10 * ($currentPage -1)); ?> to <?=$i-1;?> of <?= $hasil; ?> entries </i>
                  <?= $pager->links('orang','orang_pagination'); ?>
                </div>
                <!--$pager->links('tabel di database','nama file yang dibuat di Folder Views ');  -->
              </div> 
          </div>
      </div>
  


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
      function previewImg() {
        const sampul = document.querySelector('#sampul');
        const sampulLabel = document.querySelector('.form-control');
        const imgPreview = document.querySelector('.img-preview');
  
        sampulLabel.textContent = sampul.files[0].name;
  
        const fileSampul = new FileReader();
        fileSampul.readAsDataURL(sampul.files[0]);
  
        fileSampul.onload = function(e) {
          imgPreview.src = e.target.result;
        }
        
      }


    </script>
  </body>
</html>
