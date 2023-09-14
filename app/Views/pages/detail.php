<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="page-content">
        <div class="gaming-library">
          <div class="heading-section">
            <h4><em>Detail Pop</em>uler Komik</h4>
          </div>
        <section class="anime-details">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="/imgPopuler/<?= $komikpopuler['sampul']; ?>">
                            <!-- <div class="comment"><i class="fa fa-comments"></i> 11</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div> -->
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3><?= $komikpopuler['judul']; ?></h3>
                                <span><?= $komikpopuler['penulis']; ?>|<?= $komikpopuler['penerbit']; ?></span>
                            </div>
                            <div class="anime__details__rating">
                                <div class="rating">
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star-half-o"></i></a>
                                </div>
                                <span>1.029 Votes</span>
                            </div>
                            <p><?= $komikpopuler['sinopsis']; ?></p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Type:</span> Manga</li>
                                            <li><span>Studios:</span> <?= $komikpopuler['penerbit']; ?></li>
                                            <li><span>Date aired:</span> ????????</li>
                                            <li><span>Status:</span> ????????</li>
                                            <li><span>Genre:</span> Action, Adventure, Fantasy, Magic</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Scores:</span> ????????</li>
                                            <li><span>Rating:</span> ????????</li>
                                            <li><span>Duration:</span> ????????</li>
                                            <li><span>Quality:</span> ????????</li>
                                            <li><span>Views:</span> ????????</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="anime__details__btn">
                                <a href="/pages/edit/<?= $komikpopuler['slug']; ?>" class="edit-btn"><i class="fa fa-heart-o"></i> Edit</a>
                                <form action="/pages/delete/<?= $komikpopuler['id']; ?>" method="post" class="hapus-btn">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="delete-btn" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')">Delete</button>
                                </form>
                                <a href="/pages/populer" class="kembali-btn"><span>Kembali</span> <i
                                    class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>