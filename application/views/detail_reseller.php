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
                    <th>Detail</th>
                    <th>Harga Jual</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1; foreach($detail_reseller as $dr) : ?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?= $dr->kode?></td>
                    <td><?= $dr->detail?></td>
                    <td><?= $dr->nama?></td>
                    <td><?= $dr->harga?></td>
                    <td>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?=$dr->id?>">
                    <i class="fas fa-edit"></i>
                    </button>
                      <a href="<?= base_url('detail_reseller/delete/' .$dr->id)?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini')"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            </tfoot>
           <?php endforeach ?>
        </table>
    </div>
</div>


<!-- modal simpan -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('detail_reseller/tambah_aksi')?>" method="post">
        <div class="form-group">
            <label for="">Kode </label>
            <input type="text" name="kode_barang" class="form-control">
            <?= form_error('kode_barang', '<div class="text-small text-danger">', '</div>'); ?>
        </div>

        <div class="form-group">
            <label for="">Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control">
            <?= form_error('nama_produk', '<div class="text-small text-danger">', '</div>'); ?>
        </div>

        <div class="form-group">
            <label for="">Harga Jual</label>
            <input type="text" name="harga_jual" class="form-control">
            <?= form_error('harga_jual', '<div class="text-small text-danger">', '</div>'); ?>
        </div>
    
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>


<?php foreach ($detail_reseller as $dr) : ?>
<div class="modal fade" id="exampleModal<?=$dr->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('detail_reseller/edit/'.$dr->id) ?>" method="post">
        <div class="form-group">
            <label for="">Kode Barang</label>
            <input type="text" name="kode_barang" class="form-control" value="<?= $dr->kode?>" readonly>
        </div>

        <div class="form-group">
            <label for="">Detail Produk</label>
            <input type="text" name="nama_produk" class="form-control" value="<?= $dr->nama?>">
        </div>

        <div class="form-group">
            <label for="">Harga Jual</label>
            <input type="text" name="harga_jual" class="form-control" value="<?= $dr->harga?>">
        </div>

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Edit</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>

<?php endforeach ?>

