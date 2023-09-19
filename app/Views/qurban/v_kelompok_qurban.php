<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Data
                <?= $judul ?>
            </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-tambah"><i
                        class="fas fa-plus"></i> Tambah Kelompok
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
            <div class="row">
                <?php
                foreach ($kelompok as $key => $value) { ?>

                    <div class="col-md-6">
                        <div class="card card-outline card-success">
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                                <?= $value['nama_kelompok'] ?>
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                        data-target="#tambah-peserta<?= $value['id_kelompok'] ?>"><i
                                            class="fas fa-plus"></i>
                                        Tambah peserta
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama Peserta</th>
                                        <th>Biaya</th>
                                        <th></th>
                                    </tr>
                                    <?php
                                    $db = \Config\Database::connect();
                                    $peserta = $db->table('tbl_peserta_kelompok')
                                        ->where('id_kelompok', $value['id_kelompok'])
                                        ->get()->getResultArray();
                                    $no = 1;
                                    $totalBiaya = 0; // Inisialisasi total biaya
                                
                                    foreach ($peserta as $key => $peserta) {
                                        ?>
                                        <tr>
                                            <td> <?= $no++ ?> </td>
                                            <td> <?= $peserta['nama_peserta'] ?> </td>
                                            <td>Rp. <?= number_format($peserta['biaya'], 0) ?></td>
                                            <td>
                                                <a href="<?= base_url('PesertaQurban/DeletePeserta/' .$value['id_tahun'] . '/' . $peserta['id_peserta']) ?>" onclick="return confirm(' Hapus Peserta')">
                                            <i class="fas fa-times text-danger"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                        $totalBiaya += $peserta['biaya']; // Menambahkan biaya ke totalBiaya
                                    } ?>
                                    <tr class="text-success">
                                        <td></td>
                                        <td></td>
                                        <td> <b>Total Biaya</b>: Rp. <?= $peserta == null ? '0' : number_format($totalBiaya, 0) ?> </td>
                                    </tr>
                                </table>
                            </div>

                            <!-- /.card-footer -->
                            <div class="card-footer">
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#delete-kelompok<?= $value['id_kelompok'] ?>"><i class="fas fa-trash"></i>
                                    Hapus Kelompok
                                </button>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- modal tambah-->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kelompok </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('PesertaQurban/InsertKelompok') ?>
                <input type="number" value="<?= $tahun['id_tahun'] ?>" name="id_tahun" hidden>
                <div class="form-group">
                    <label>Nama Kelompok</label>
                    <input class="form-control" name="nama_kelompok" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php
foreach ($kelompok as $key => $value) { ?>
    <!-- Modal Delete Kelompok -->
    <div class="modal fade" id="delete-kelompok<?= $value['id_kelompok'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete
                        <?= $judul ?>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Ingin Menghapus Data <br>
                    <b>
                        <?= $value['nama_kelompok'] ?>
                    </b>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <a href="<?= base_url('PesertaQurban/DeleteKelompok/' . $tahun['id_tahun'] . '/' . $value['id_kelompok']) ?>"
                        type="submit" class="btn btn-danger">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- Modal Tambah Peserta -->
    <div class="modal fade" id="tambah-peserta<?= $value['id_kelompok'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> Tambah Peserta <?= $value['nama_kelompok'] ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('PesertaQurban/InsertPeserta') ?>
                    <input type="number" value="<?= $tahun['id_tahun'] ?>" name="id_tahun" hidden>
                    <input value="<?= $value['id_kelompok'] ?>" name="id_kelompok" hidden>
                    <div class="form-group">
                        <label>Nama Peserta</label>
                        <input class="form-control" name="nama_peserta" required>
                    </div>
                    <div class="form-group">
                        <label>Biaya</label>
                        <input value="0" min="0" type="number" class="form-control" name="biaya" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <?php echo form_close() ?>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

<?php } ?>