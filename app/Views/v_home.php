
<div class="col-md-8">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="slider/slide1.jpg" class="d-block w-100" alt="masjid1">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Surat Al Mujadalah ayat 11</h5>
                    <p>“Hai orang-orang beriman apabila dikatakan kepadamu: “Berlapang-lapanglah dalam majelis”, maka lapangkanlah niscaya Allah akan memberi kelapangan untukmu. Dan apabila dikatakan: “Berdirilah kamu”, maka berdirilah, niscaya Allah akan meninggikan orang-orang yang beriman di antaramu dan orang-orang yang diberi ilmu pengetahuan beberapa derajat. Dan Allah Maha Mengetahui apa yang kamu kerjakan.” (QS.  Surat Al-Mujadalah ayat: 11).</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="slider/slide2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Surat Thaha ayat 114</h5>
                    <p>Maka Maha Tinggi Allah Raja Yang sebenar-benarnya, dan janganlah kamu tergesa-gesa membaca Al quran sebelum disempurnakan mewahyukannya kepadamu, dan katakanlah: “Ya Tuhanku, tambahkanlah kepadaku ilmu pengetahuan”.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="slider/slide3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Surat Ali Imran ayat 18</h5>
                    <p>Allah menyatakan bahwasanya tidak ada Tuhan melainkan Dia (yang berhak disembah), Yang menegakkan keadilan. Para Malaikat dan orang-orang yang berilmu (juga menyatakan yang demikian itu). Tak ada Tuhan melainkan Dia (yang berhak disembah), Yang Maha Perkasa lagi Maha Bijaksana.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>
    <br>
</div>

<div class="col-lg-3">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">
                <?= $waktu['data']['lokasi'] ?>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="height: 510px">
            <ul class="products-list product-list-in-card pl-2 pr-2">
                <li class="item">
                    <div class="product-img">
                        <i class="far fa-clock fa-3x text-success"></i>
                    </div>
                    <div class="product-info">
                        <a class="product-title"> Subuh </a>
                        <span class="product-description">
                            <?= $waktu['data']['jadwal']['subuh'] ?>
                        </span>
                    </div>
                </li>
                <li class="item">
                    <div class="product-img">
                        <i class="far fa-clock fa-3x text-success"></i>
                    </div>
                    <div class="product-info">
                        <a class="product-title"> Dhuha </a>
                        <span class="product-description">
                            <?= $waktu['data']['jadwal']['dhuha'] ?>
                        </span>
                    </div>
                </li>
                <li class="item">
                    <div class="product-img">
                        <i class="far fa-clock fa-3x text-success"></i>
                    </div>
                    <div class="product-info">
                        <a class="product-title"> Dzuhur </a>
                        <span class="product-description">
                            <?= $waktu['data']['jadwal']['dzuhur'] ?>
                        </span>
                    </div>
                </li>
                <li class="item">
                    <div class="product-img">
                        <i class="far fa-clock fa-3x text-success"></i>
                    </div>
                    <div class="product-info">
                        <a class="product-title"> Ashar </a>
                        <span class="product-description">
                            <?= $waktu['data']['jadwal']['ashar'] ?>
                        </span>
                    </div>
                </li>
                <li class="item">
                    <div class="product-img">
                        <i class="far fa-clock fa-3x text-success"></i>
                    </div>
                    <div class="product-info">
                        <a class="product-title"> Maghrib </a>
                        <span class="product-description">
                            <?= $waktu['data']['jadwal']['maghrib'] ?>
                        </span>
                    </div>
                </li>
                <li class="item">
                    <div class="product-img">
                        <i class="far fa-clock fa-3x text-success"></i>
                    </div>
                    <div class="product-info">
                        <a class="product-title"> Isya </a>
                        <span class="product-description">
                            <?= $waktu['data']['jadwal']['isya'] ?>
                        </span>
                    </div>
                </li>
            </ul>
            <div class="text-center">
                <b class="text-center">
                    <?= $waktu['data']['jadwal']['tanggal'] ?>
                </b>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
</div>


<?php
foreach ($kas_m as $key => $value) {
    $pemasukan_m[] = $value['kas_masuk'];
    $pengeluaran_m[] = $value['kas_keluar'];
}
$saldo_m = array_sum($pemasukan_m) - array_sum($pengeluaran_m);

foreach ($kas_s as $key => $value) {
    $pemasukan_s[] = $value['kas_masuk'];
    $pengeluaran_s[] = $value['kas_keluar'];
}
$saldo_s = array_sum($pemasukan_s) - array_sum($pengeluaran_s)

?>
<div class="lg-12">
    <div class="row">
        <div class="col-md-6">
            <div class="info-box">
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-money-bill-wave"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Saldo Kas Masjid</span>
                    <span class="info-box-number">
                        Rp . <?= number_format($saldo_m, 0) ?>
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-hand-holding-heart"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Saldo Kas Sosial</span>
                    <span class="info-box-number">
                        Rp . <?= number_format($saldo_s, 0) ?>
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->