<div class="col-md-12">
    <?php
    foreach ($kas as $key => $value) {
        $pemasukan[] = $value['kas_masuk'];
    }
    ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-info"></i>Total Pemasukan Kas Masjid</h5>
        <h3> Rp.
            <?= number_format(array_sum($pemasukan), 0) ?>
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
            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }
            ?>
            <table class="table" id="example1">
                <thead>
                    <tr>
                        <th width="50px">NO</th>
                        <th width="100px">Tanggal</th>
                        <th>Keterangan</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($kas as $key => $value) {
                        ?>
                        <tr>
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
                            <td class="text-center">
                            <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-edit<?= $value['id_kas_masjid'] ?>"><i class="fas fa-pencil-alt"></i></button>
                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-delete<?= $value['id_kas_masjid'] ?>"><i class="fas fa-trash"></i></button>
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


<!-- modal tambah -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header bg-success">
                <h4 class="modal-title">Tambah Data Kas Masuk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('KasMasjid/InsertKasMasuk') ?>
                <div class="form-group">
                    <label for="">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <input name="ket" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Jumlah(Rp.)</label>
                    <input type="number" min="0" name="kas_masuk" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Simpan</button>
                <?php echo form_close() ?>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- modal edit -->
<?php foreach ($kas as $key => $value) { ?>
    <div class="modal fade" id="modal-edit<?= $value['id_kas_masjid'] ?>">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header bg-success">
                <h4 class="modal-title">Edit Data Kas Masuk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('KasMasjid/UpdateKasMasuk/' . $value['id_kas_masjid']) ?>
                <div class="form-group">
                    <label for="">Tanggal</label>
                    <input type="date" name="tanggal" value="<?= $value['tanggal'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <input name="ket" value="<?= $value['ket'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Jumlah(Rp.)</label>
                    <input type="number" min="0" name="kas_masuk" value="<?= $value['kas_masuk'] ?>" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Simpan</button>
                <?php echo form_close() ?>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php } ?>

<!-- modal hapus -->
<?php foreach ($kas as $key => $value) { ?>
    <div class="modal fade" id="modal-delete<?= $value['id_kas_masjid'] ?>">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header bg-success">
                <h4 class="modal-title">Edit Data Kas Masuk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Yakin Ingin Menghapus Data ? <b><?= $value['ket'] ?></b>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                <a href="<?= base_url('KasMasjid/DeleteKasMasuk/' .$value['id_kas_masjid']) ?>" class="btn btn-danger">Hapus</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php } ?>

