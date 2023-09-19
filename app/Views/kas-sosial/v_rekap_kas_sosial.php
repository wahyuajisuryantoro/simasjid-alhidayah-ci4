<div class="col-md-12">
    <?php
    foreach ($kas as $key => $value) {
        $pemasukan[] = $value['kas_masuk'];
        $pengeluaran[] = $value['kas_keluar'];
    }
    $saldoakhir = array_sum($pemasukan) - array_sum($pengeluaran)
        ?>
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-info"></i>Saldo Kas Masjid</h5>
        Pemasukan : Rp.
        <?= number_format(array_sum($pemasukan), 0) ?>
        <br>
        Pengeluaran : Rp.
        <?= number_format(array_sum($pengeluaran), 0) ?>
        <hr>
        <h3>Saldo Akhir : Rp.
            <?= number_format($saldoakhir, 0) ?>
        </h3>
    </div>
</div>
<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Data
                <?= $judul ?>
            </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-tambah"><i
                        class="fas fa-plus"></i> Tambah
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table" id="example1">
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
                    foreach ($kas as $key => $value) {
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