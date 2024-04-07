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
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1; foreach($umum as $um) : ?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?= $um->kode?></td>
                    <td><?= $um->nama?></td>
                    <td>
                    
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="">
                    <i class="fas fa-edit"></i>
                    </button>
                      <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini')"><i class="fas fa-trash"></i></a>

                    </td>
                </tr>
            <?php endforeach ?>
            </tfoot>
        </table>
    </div>
</div>