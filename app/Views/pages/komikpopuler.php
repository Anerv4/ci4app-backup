<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<title><?= $title; ?></title>

<!-- Bootstrap core CSS -->
<link href="/cyborgAssets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


<!-- Additional CSS Files -->
<link rel="stylesheet" href="/cyborgAssets/assets/css/fontawesome.css">
<link rel="stylesheet" href="/cyborgAssets/assets/css/templatemo-cyborg-gaming.css">
<link rel="stylesheet" href="/cyborgAssets/assets/css/owl.css">
<link rel="stylesheet" href="/cyborgAssets/assets/css/animate.css">
<link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
<link rel="stylesheet" href="/animeAssets/css/elegant-icons.css" type="text/css">

<!--

TemplateMo 579 Cyborg Gaming

https://templatemo.com/tm-579-cyborg-gaming

-->
<!-- Css Anime Template Styles -->
<!-- <link rel="stylesheet" href="animeAssets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="animeAssets/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="animeAssets/css/elegant-icons.css" type="text/css">
<link rel="stylesheet" href="animeAssets/css/plyr.css" type="text/css">
<link rel="stylesheet" href="animeAssets/css/nice-select.css" type="text/css">
<link rel="stylesheet" href="animeAssets/css/owl.carousel.min.css" type="text/css">
<link rel="stylesheet" href="animeAssets/css/slicknav.min.css" type="text/css">
<link rel="stylesheet" href="animeAssets/css/style.css" type="text/css"> -->
  
</head>
<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="/" class="logo">
                        <img src="/cyborgAssets/assets/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Search End ***** -->
                    <div class="search-input">
                      <form id="search" action="/pages/populer" method="post">
                        <input type="text" placeholder="Type Something" id='searchText' name="keyword" onkeypress="handle" value="<?= $keyword; ?>" />
                        <i class="fa fa-search"></i>
                      </form>
                    </div>
                    <!-- ***** Search End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="/" class="navbar-item" id="home">Home</a></li>
                        <li><a href="/pages/about" class="navbar-item" id="about">Gallery</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                            <!-- perlu diaktifkan dulu agar dropdown nya aktif -->
                            Fitur Admin
                            </a>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/komik" id="daftarKomik">Tabel Daftar Komik</a></li>
                            <li><a class="dropdown-item" href="/pages/populer" id="daftarKomikPopuler">Tabel Daftar Komik Populer</a></li>
                            <!-- <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                            </ul>
                        </li>
                        <li><a href="streams.html">Streams</a></li>
                        <li><a href="profile.html">Profile <img src="/cyborgAssets/assets/images/profile-header.jpg" alt=""></a></li>
                    </ul>   
                    <a class='menu-trigger'>
                        <span >Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">
          <div class="col-lg-12">
            <div class="main-button">
              <a href="/pages/create">Tambah Data Komik Populer</a>
            </div>
            <!-- Session Flesh data -->
            <?php if(session()->getFlashdata('pesan')) : ?>
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
                </svg>
                <div class="alert alert-success" role="alert">
                  <svg class="bi flex-shrink-0 " role="img" style="width: 30; height: 30;" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <?= session()->getFlashdata('pesan'); ?>
                </div>
              <?php endif; ?>
          </div>
          <!-- ***** Gaming Library Start ***** -->
          <div class="gaming-library">
            <div class="col-lg-12">
              <div class="heading-section">
                <h4><em>Populer</em> Library</h4>
              </div>
              <?php $i = 1 + (10 * ($currentPage -1));?>
              <?php foreach ($komikpopuler as $k) :?>
              <div class="item">
                <ul>
                  <li><img src="/imgPopuler/<?= $k['sampul']; ?>" alt="" class="templatemo-item"></li>
                  <li><h4>Judul</h4><span><?= $k['judul']; ?></span></li>
                  <li><h4>Genre</h4><span>Action</span></li>
                  <li><h4>Slug</h4></h4><span><?= $k['slug']; ?></span></li>
                  <li><h4>Currently</h4><span>Downloaded</span></li>
                  <li><div class="main-border-button"><a href="/pages/<?= $k['slug']; ?>">Detail</a></div></li>
                </ul>
              </div>
              <?php endforeach; ?>
              <!-- <div class="item last-item">
                <ul>
                  <li><img src="assets/images/game-03.jpg" alt="" class="templatemo-item"></li>
                  <li><h4>CS-GO</h4><span>Sandbox</span></li>
                  <li><h4>Date Added</h4><span>21/04/2036</span></li>
                  <li><h4>Hours Played</h4><span>892 H 14 Mins</span></li>
                  <li><h4>Currently</h4><span>Downloaded</span></li>
                  <li><div class="main-border-button border-no-active"><a href="#">Donwloaded</a></div></li>
                </ul>
              </div> -->
            </div>
            <!-- ***** Paginate Start ***** -->
            <div class="paginate">
              <i class="kanan">Showing <?= 1 + (10 * ($currentPage -1)); ?> of <?= $hasil; ?> entries </i>
              <?= $pager->links('komik','komik_pagination'); ?>
            </div>
            <!-- ***** Paginate End ***** -->
            <div class="col-lg-12">
              <div class="main-button">
                <div class="page-up">
                  <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Gaming Library End ***** -->

<footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2036 <a href="#">Cyborg Gaming</a> Company. All rights reserved. 
          
          <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">TemplateMo</a>  Distributed By <a href="https://themewagon.com" target="_blank" >ThemeWagon</a></p>
        </div>
      </div>
    </div>
  </footer>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="/cyborgAssets/vendor/jquery/jquery.min.js"></script>
    <script src="/cyborgAssets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="/cyborgAssets/assets/js/isotope.min.js"></script>
    <script src="/cyborgAssets/assets/js/owl-carousel.js"></script>
    <script src="/cyborgAssets/assets/js/tabs.js"></script>
    <script src="/cyborgAssets/assets/js/popup.js"></script>
    <script src="/cyborgAssets/assets/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- Swwet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/js/myscript.js"></script>

    <!-- Js Anime Template Plugins -->
    <script src="/animeAssets/js/jquery-3.3.1.min.js"></script>
    <script src="/animeAssets/js/bootstrap.min.js"></script>
    <script src="/animeAssets/js/player.js"></script>
    <script src="/animeAssets/js/jquery.nice-select.min.js"></script>
    <script src="/animeAssets/js/mixitup.min.js"></script>
    <script src="/animeAssets/js/jquery.slicknav.js"></script>
    <script src="/animeAssets/js/owl.carousel.min.js"></script>
    <script src="/animeAssets/js/main.js"></script>
    
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
