kasih tau bahwa halamn ini akan menggunakan file template yang ada difolder layout
<?= $this->extend('layout/template'); ?> <!-- 'layout'adalah nama folder sedangkan 'template' adalah nama file nya -->


<!-- kasih tau ini adalah section yang namanya 'content' (diambil dari layout/template.php) -->
<?= $this->section('content'); ?>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body{
        height: 100%;
        width:100%;
        /* border:2px solid red; */
        
    }
    .box{
      /* display:flex; */
      border: 2px solid white;
      /* width: 1250px; */
      align-items:center;
      /* justify-content:center; */
    }

    .container {
        display:flex;
        /* width: */
        align-items:center;
        justify-content: center;
        border: 2px solid white;
        margin-top:10px;
        /* border-radius:12px; */
        overflow: hidden;
    }
    .container-tabel{
      display: block;
      align-items:center;
      justify-content: center;
      margin:auto;
      width: 1250px;
      border: 2px solid red;
    }
    .carousel{
        height: 400px;
        width:100%;
        display: block;
        overflow: hidden;
        border-radius: 12px;
        border:3px solid white;
        transition-delay:5s ease-in-out ;
        margin:8px;
        align-items:center;
        display: block;
        background-size: cover;

    }
    /* .carousel-control-prev span,
    .carousel-control-next span{
        padding: 5px;
        color: #000;
        background: #fff;
        border-radius: 8px;
        font-size: 1.5rem;
    } */
    /* .carousel-item
    {
      border-radius:12px;
    } */
    .carousel-item img{
        width: 100%;
        height:100%;
        position: relative;
        /* border-radius:12px; */

        /* bottom:20px; */
        /* background-size: cover; */
    }
    .container-card{
      display: grid;
      grid-template-columns:repeat(auto-fill, 300px) ;
      flex-wrap: wrap;
      align-items: center;
      justify-content: center;
      align-items: center;
      margin-top: 15px;
      border: 2px solid yellow;
      
      
      /* margin-top: 30px; */
      /* padding: ; */
    }
    .container-card .card{
      margin: 10px;
      transition: 0.50s;
      /* width: 100%; */
      /* height: 210px; */
    }
    .container-card .card:hover{
      transform: scale(1.05);
      /* box-shadow: 0px 0px 5px 0px black; */
      box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
    }
    .container-card .card .card-body{
      width: 100%;
      height:80px;

    }
    .container-card .card img{
      width:100%;
      height:400px;
    }
    .populer-komik{
      display:block;
      margin-left: 50px;
    }
    .populer-komik p{
      color: #FFE15D;
      font-family: 'Times New Roman', Times, serif;
      font-size: 30px;
    }
   
    .populer-komik p i{
      color: orangered;
      margin-right: 15px;
    }
    .list-komik {
      display:block;
      margin-left: 10px;
    }
    .list-komik p{
      background: #FFE15D;
      background-size: 400% auto;
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      animation: shadow 3s linear infinite;
      font-family: 'Times New Roman', Times, serif;
      font-size: 30px;
}
@keyframes shadow {
    0%{
        rotate: 0%;
        /* background-position: 0% 50%; */
        text-shadow: 0 0 12px #ffffff ;
    }
    50%{
        rotate: 180%;
        /* background-position: 100% 50%; */
        text-shadow: 0 0 12px black ;

    }
    100%{
      rotate:360%;
      text-shadow: 0 0 12px #ffffff;
    }
}
    /* .carousel .carousel-caption{
        width: 40%;
        border-radius: 25px;
        background-color: ;
        color: black;
        text-transform: uppercase;

    } */
</style>
<div class="box">
<div class="container">
    <div class="row">
        <div class="col">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="true">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/imgHome/NarutoCoverHome.jpg" class="d-block w-100" style="width: 800px; height: 400px;" alt="...">
      <!-- <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div> -->
    </div>
    <div class="carousel-item">
      <img src="/imgHome/OnePieceCoverHome.jpg" class="d-block w-100" alt="...">
      <!-- <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div> -->
    </div>
    <div class="carousel-item">
      <img src="/imgHome/SoloLevelingCoverHome.jpg" class="d-block w-100" alt="...">
      <!-- <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div> -->
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="fas fa-chevron-left"></span>
    <!-- <div class="fas fa-chevron-left"></div> -->
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="fas fa-chevron-right"></span>
    <!-- <div class="fas fa-chevron-right"></div> -->
  </button>
</div>

            </div>            
        </div>
    </div>

    <div class="populer-komik " id="populer">
      <!-- <span class ="fas fa-fire"></span> -->
      <p><i class="fas fa-fire"></i>Populer Komik</p>
      <div class="container-card ">
        <?php foreach ($komikpopuler as $k ) : ?>
          <div class="card d-inline-block " style="width: 18rem;">
    <img src="/imgPopuler/<?= $k['sampul']; ?>" class="card-img-top" alt="...">
    <div class="card-body ">
      <h5 class="card-title"><?= $k['judul']; ?></h5>
      <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
      <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
    </div>
  </div>
  <?php endforeach; ?>
</div>

<!-- <div class="card d-inline-block" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card d-inline-block" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div> -->
<div class="list-komik " id="populer">
      <!-- <span class ="fas fa-fire"></span> -->
      <p>List Komik</p>
    </div>
</div>
<div class="container-tabel">
  <div class="row">
    <div class="col">
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
          <?php foreach ($komik as $k):?>
          <tr>
            <th scope="row"><?= $i++; ?></th>
            <td><img src="/img/<?= $k['sampul']; ?>" alt="" class="sampul" ></td>
            <td><?= $k['judul']; ?></td>
            <td>
              <a href="/komik/<?= $k['slug']; ?>" class="btn btn-success">Detail</a>
            </td>
          </tr>
          <?php endforeach; ?>
          
        </tbody>
      </table>

        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>