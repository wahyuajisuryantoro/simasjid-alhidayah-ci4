<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Data
                <?= $judul ?>
            </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-tambah">
                    <i class="fas fa-plus"></i> Tambah
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
                        <th>Tahun</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($tahun as $key => $value) {
                        ?>
                        <tr>
                            <td>
                                <?= $no++ ?>
                            </td>
                            <td>
                                <?= $value['tahun_h'] ?> H /
                                <?= $value['tahun_m'] ?>M
                                <?= date('Y') == $value['tahun_m'] ? ' <span class="right badge badge-success">Aktif</span>' : '' ?>
                            </td>
                            <td>
                                <button class="btn btn-flat btn-sm btn-warning" data-toggle="modal"
                                    data-target="#modal-edit<?= $value['id_tahun'] ?>"><i
                                        class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-flat btn-sm btn-danger" data-toggle="modal"
                                    data-target="#modal-delete<?= $value['id_tahun'] ?>"><i
                                        class="fas fa-trash"></i></button>
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
                <h4 class="modal-title">Tambah
                    <?= $judul ?>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('Tahun/InsertData') ?>
                <div class="form-group">
                    <label>Tahun Hijiriah</label>
                    <input type="number" min="1445" value="1445" class="form-control" name="tahun_h" required>
                </div>

                <div class="form-group">
                    <label>Tahun Masehi</label>
                    <input type="number" min="2023" value="2023" class="form-control" name="tahun_m" required>
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

<!-- modal edit -->
<?php foreach ($tahun as $key => $value) { ?>
    <div class="modal fade" id="modal-edit<?= $value['id_tahun'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit
                        <?= $judul ?>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('Tahun/UpdateData/' . $value['id_tahun']) ?>
                    <div class="form-group">
                        <label>Tahun Hijiriah</label>
                        <input type="number" min="1445" value="<?= $value['tahun_h'] ?>" class="form-control" name="tahun_h"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Tahun Masehi</label>
                        <input type="number" min="2023" value="<?= $value['tahun_m'] ?>" class="form-control" name="tahun_m"
                            required>
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


    <!-- modal Delete-->
    <div class="modal fade" id="modal-delete<?= $value['id_tahun'] ?>">
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
                    Apakah Ingin Menghapus Data Tahun ? <br>
                    <b>
                        <?= $value['tahun_h'] ?> H /
                        <?= $value['tahun_m'] ?>M
                    </b>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <a href="<?= base_url('Tahun/DeleteData/' . $value['id_tahun']) ?>" type="submit"
                        class="btn btn-danger">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>