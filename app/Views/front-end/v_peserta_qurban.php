<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Data
                <?= $judul ?>
            </h3>
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