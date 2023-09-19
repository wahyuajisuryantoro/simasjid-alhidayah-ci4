<?php
foreach ($kas as $key => $value) {
    $pemasukan[] = $value['kas_masuk'];
    $pengeluaran[] = $value['kas_keluar'];
}
$saldokasmasjid = array_sum($pemasukan) - array_sum($pengeluaran);

foreach ($kassosial as $key => $value) {
    $pemasukan_sosial[] = $value['kas_masuk'];
    $pengeluaran_sosial[] = $value['kas_keluar'];
}
$saldokassosial = array_sum($pemasukan_sosial) - array_sum($pengeluaran_sosial)

    ?>
<div class="col-lg-6 col-12">
    <!-- small box -->
    <div class="small-box bg-primary">
        <div class="inner">
            <h5>Saldo Kas Masjid</h5>
            <h3>Rp.
                <?= number_format($saldokasmasjid, 0) ?>,-
            </h3>
        </div>
        <div class="icon">
            <i class="fas fa-money-bill-wave"></i>
        </div>
        <a href="<?= base_url('KasMasjid') ?>" class="small-box-footer">Rincian<i
                class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-6 col-12">
    <!-- small box -->
    <div class="small-box bg-success">
        <div class="inner">
            <h5>Saldo Kas Sosial</h5>
            <h3>Rp.
                <?= number_format($saldokassosial, 0) ?>,-
            </h3>
        </div>
        <div class="icon">
            <i class="fas fa-hand-holding-heart"></i>
        </div>
        <a href="<?= base_url('KasSosial') ?>" class="small-box-footer">Rincian<i
                class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<!-- Rekap Kas Masjid Bulan Sekarang -->
<div class="col-lg-6 col-12">
<div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Rekap Kas Masjid Bulan <?= date('M Y') ?> </h3>
            <div class="card-tools">
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table text-sm">
                <thead>
                    <tr>
                        <th width="50px">NO</th>
                        <th width="100px">Tanggal</th>
                        <th>Keterangan</th>
                        <th>Kas Masuk</th>
                        <th>Kas Keluar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($kasmasjid as $key => $value) {
                        ?>
                        <tr class="<?= $value['status'] == 'masuk' ? 'text-success' : 'text-danger' ?>">
                            <td>
                                <?= $no++ ?>
                            </td>
                            <td>
                                <?= $value['tanggal'] ?>
                            </td>
                            <td>
                                <?= $value['ket'] ?>
                            </td>
                            <td class="text-right">Rp.
                                <?= number_format($value['kas_masuk'], 0) ?>
                            </td>
                            <td class="text-right">Rp.
                                <?= number_format($value['kas_keluar'], 0) ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Rekap Kas Sosial Bulan Sekarang -->
<div class="col-lg-6 col-12">
<div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Rekap Kas Sosial Bulan <?= date('M Y') ?> </h3>
            <div class="card-tools">
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table text-sm">
                <thead>
                    <tr>
                        <th width="50px">NO</th>
                        <th width="100px">Tanggal</th>
                        <th>Keterangan</th>
                        <th>Kas Masuk</th>
                        <th>Kas Keluar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($kas_s as $key => $value) {
                        ?>
                        <tr class="<?= $value['status'] == 'masuk' ? 'text-success' : 'text-danger' ?>">
                            <td>
                                <?= $no++ ?>
                            </td>
                            <td>
                                <?= $value['tanggal'] ?>
                            </td>
                            <td>
                                <?= $value['ket'] ?>
                            </td>
                            <td class="text-right">Rp.
                                <?= number_format($value['kas_masuk'], 0) ?>
                            </td>
                            <td class="text-right">Rp.
                                <?= number_format($value['kas_keluar'], 0) ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>