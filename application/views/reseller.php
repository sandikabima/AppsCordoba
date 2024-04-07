<?= $this->session->flashdata('pesan');?>
<div class="card">
              <div class="card-header">
                <!-- <a href="<?=base_url('reseller/tambah')?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a> -->
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-plus"></i> Tambah
                </button>
              </div>
              <!-- /.card-header -->
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
                  <?php $no=1; foreach($reseller as $rsl) : ?>
                  <tr>
                    <td><?=$no++?></td>
                    <td><?= $rsl->kode?></td>
                    <td><?= $rsl->nama?></td>
                    <td>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?=$rsl->id?>">
                    <i class="fas fa-edit"></i>
                    </button>
                      <a href="<?= base_url('reseller/delete/' .$rsl->id)?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini')"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  </tfoot>
                  <?php endforeach ?>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


<!-- Modal Edit -->
<!-- Button trigger modal -->
<!-- Modal -->
<?php foreach ($reseller as $rsl) : ?>
<div class="modal fade" id="exampleModal<?=$rsl->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('reseller/edit/'.$rsl->id) ?>" method="post">
        <div class="form-group">
            <label for="">Kode Barang</label>
            <input type="text" name="kode_barang" class="form-control" value="<?= $rsl->kode?>">
        </div>

        <div class="form-group">
            <label for="">Produk Reseller</label>
            <input type="text" name="produk_reseller" class="form-control" value="<?= $rsl->nama?>">
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


<!-- Modal Simpan-->
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
      <form action="<?= base_url('reseller/tambah_aksi')?>" method="post">
        <div class="form-group">
            <label for="">Kode Barang</label>
            <input type="text" name="kode_barang" class="form-control">
            <?= form_error('kode_barang', '<div class="text-small text-danger">', '</div>'); ?>
        </div>

        <div class="form-group">
            <label for="">Produk Reseller</label>
            <input type="text" name="produk_reseller" class="form-control">
            <?= form_error('produk_reseller', '<div class="text-small text-danger">', '</div>'); ?>
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

