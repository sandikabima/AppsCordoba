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
                    <th>Nama</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1; foreach($kategori as $kt) : ?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?= $kt->nama?></td>
                    <td>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?=$kt->id?>">
                    <i class="fas fa-edit"></i>
                    </button>
                      <a href="<?= base_url('kategori/delete/' .$kt->id)?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini')"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            </tfoot>
           <?php endforeach ?>
        </table>
    </div>
</div>

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
      <form action="<?= base_url('kategori/tambah_aksi')?>" method="post">
        <div class="form-group">
            <label for="">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control">
            <?= form_error('nama', '<div class="text-small text-danger">', '</div>'); ?>
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



<?php foreach ($kategori as $kt) : ?>
<div class="modal fade" id="exampleModal<?=$kt->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('kategori/edit/'.$kt->id) ?>" method="post">
        <div class="form-group">
            <label for="">Kode Barang</label>
            <input type="text" name="nama_kategori" class="form-control" value="<?= $kt->nama?>">
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


