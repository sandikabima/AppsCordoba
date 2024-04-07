<?= $this->session->flashdata('pesan');?>
<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah</button>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Produk</th>
                    <th>Detail Reseller</th>
                    <th>Harga Jual</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1; foreach($detail_umum as $du) : ?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?= $du->kode?></td>
                    <td><?= $du->detail?></td>
                    <td><?= $du->nama?></td>
                    <td><?= $du->harga?></td>
                    <td>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="">
                    <i class="fas fa-edit"></i>
                    </button>
                      <a href="<?= base_url('detail_reseller/delete/' .$du->id)?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini')"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            </tfoot>
           <?php endforeach ?>
        </table>
    </div>
</div>