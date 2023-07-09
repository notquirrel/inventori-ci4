<?= $this->extend("template") ?>

<?= $this->section("title") ?>
Data Barang Masuk
<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Data Barang Masuk</h5>
    </div>
    <div class="card-body">
    <?php 
        if (session()->getFlashdata("barangmasuk")) {
    ?>
    <div class="alert alert-warning">
        <?= session()->getFlashdata('barangmasuk') ?>
    </div>
    <?php
        }
    ?>
    <?php 
        if (session()->getFlashdata("pesan")) {
    ?>
    <div class="alert alert-warning">
        <?= session()->getFlashdata('pesan') ?>
    </div>
    <?php
        }
    ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover text-dark" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="bg-gradient-dark text-white text-center">
                        <th>No</th>
                        <th>Transaction ID</th>
                        <th>Tanggal</th>
                        <th>Product</th>
                        <th>Jumlah Masuk</th>
                        <?php
                            if((session()->admin_role) == "admin"){
                        ?>
                        <th>Action</th>
                        <?php
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $no = 0;
                    foreach ($rows as $row) {
                    $no++;
                ?>
                <tr>
                    <td class="text-center"><?= $no ?></td>
                    <td class="text-center"><?= $row->transactionID ?></td>
                    <td class="text-center"><?= $row->tanggal ?></td>
                    <td class="text-center"><?= $row->productID ?></td>
                    <td class="text-center"><?= $row->jumlah_masuk ?></td>
                    <?php
                        if((session()->admin_role) == "admin"){
                    ?>
                    <td class="text-center">
                    <a href="<?= base_url('barangmasuk/'.$row->transactionID.'/edit') ?>" class="btn btn-success btn-sm"><i class="fas fa-fw fa-pencil"></i></a>
                    <a href="<?= base_url('barangmasuk/'.$row->transactionID.'/'.$row->productID.'/'.$row->jumlah_masuk.'/hapus') ?>" class="btn btn-danger btn-sm" 
                    onclick="return confirm('Yakin hapus transaksi <?= $row->transactionID ?>?')"><i class="fas fa-fw fa-trash"></i></a>
                    </td>
                </tr>
                <?php
                    }
                }
                ?>
                </tbody>
            </table>
            <?php
                if((session()->admin_role) == "admin"){
            ?>
            <a href="<?= base_url('tambah_barangmasuk') ?>" class="btn btn-primary btn-sm">Tambah</a>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>