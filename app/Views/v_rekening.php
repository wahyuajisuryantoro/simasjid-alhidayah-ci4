<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Data <?= $judul ?></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-tambah">
                    <i class="fas fa-plus"></i> Tambah
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php if (session()->getFlashdata('pesan')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('pesan') ?>
                </div>
            <?php endif; ?>
            <table class="table" id="example1">
                <thead>
                    <tr>
                        <th width="50px">NO</th>
                        <th width="50px"></th>
                        <th>Rekening</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($rek as $key => $value) {
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <i class="fas fa-money-check fa-3x text-success"></i>
                            </td>
                            <td>
                                <h4><b><?= $value['nama_bank'] ?></b></h4>
                                <h5><?= $value['no_rek'] ?></h5>
                                a.n : <?= $value['atas_nama'] ?>
                            </td>
                            <td>
                                <button class="btn btn-flat btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit<?= $value['id_rekening'] ?>">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button class="btn btn-flat btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete<?= $value['id_rekening'] ?>">
                                    <i class="fas fa-trash"></i>
                                </button>
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

<!-- modal tambah-->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah <?= $judul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('Rekening/InsertData') ?>
                <div class="form-group">
                    <label>Nama Bank</label>
                    <input class="form-control" name="nama_bank" required>
                </div>
                <div class="form-group">
                    <label>No Rekening</label>
                    <input class="form-control" name="no_rek" required>
                </div>
                <div class="form-group">
                    <label>Atas Nama</label>
                    <input class="form-control" name="atas_nama" required>
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
</div>

<!-- modal edit -->
<?php foreach ($rek as $key => $value): ?>
    <div class="modal fade" id="modal-edit<?= $value['id_rekening'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit <?= $judul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('Rekening/UpdateData/' . $value['id_rekening']) ?>
                    <div class="form-group">
                        <label>Nama Bank</label>
                        <input class="form-control" name="nama_bank" value="<?= $value['nama_bank'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>No Rekening</label>
                        <input class="form-control" name="no_rek" value="<?= $value['no_rek'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Atas Nama</label>
                        <input class="form-control" name="atas_nama" value="<?= $value['atas_nama'] ?>" required>
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
    </div>
<?php endforeach; ?>

<!-- modal Delete -->
<?php foreach ($rek as $key => $value): ?>
    <div class="modal fade" id="modal-delete<?= $value['id_rekening'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $judul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Ingin Menghapus Data ?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <a href="<?= base_url('Rekening/DeleteData/' . $value['id_rekening']) ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach; ?>
