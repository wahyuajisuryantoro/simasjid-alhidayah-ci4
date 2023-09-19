<div class="col-md-4">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Rekening Saluran Donasi</h3>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table" id="example1">
                <tbody>
                    <?php
                    foreach ($rek as $key => $value) {
                        ?>
                        <tr>
                            <td>
                                <i class="fas fa-money-check fa-3x text-success"></i>
                            </td>
                            <td>
                                <h4><b>
                                        <?= $value['nama_bank'] ?>
                                    </b></h4>
                                <h5>
                                    <?= $value['no_rek'] ?>
                                </h5>
                                a.n :
                                <?= $value['atas_nama'] ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<div class="col-md-8">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Konfirmasi Donasi</h3>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php if (session()->getFlashdata('pesan')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('pesan') ?>
                </div>
            <?php endif; ?>
            <?php echo form_open_multipart('Home/KirimDonasi') ?>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Rekening Tujuan</label>
                        <select name="id_rekening" class="form-control">
                            <option value="">--Pilih Rekening Tujuan</option>
                            <?php foreach ($rek as $key => $value) { ?>
                                <option value="<?= $value['id_rekening'] ?>"><?= $value['nama_bank'] ?> | <?= $value['no_rek'] ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Jenis Donasi Untuk :</label>
                        <select name="jenis_donasi" class="form-control">
                            <option value="Masjid">Masjid</option>
                            <option value="Sosial">Sosial</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Nama Bank Pengirim</label>
                <input class="form-control" name="nama_bank" required>
            </div>
            <div class="form-group">
                <label>No Rekening Pengirim</label>
                <input class="form-control" name="no_rek" required>
            </div>
            <div class="form-group">
                <label>Nama Pengirim</label>
                <input class="form-control" name="nama_pengirim" required>
            </div>
            <div class="form-group">
                <label>Jumlah Donasi (Rp.)</label>
                <input type="number" class="form-control" name="jumlah" required>
            </div>
            <div class="form-group">
                <label>Unggah Bukti Transfer</label>
                <input type="file" class="form-control" name="bukti" accept="image/*" required>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-success"> <i class="fas fa-paper-plane"> </i>Kirim</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>