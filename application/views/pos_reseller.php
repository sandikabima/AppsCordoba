<?= $this->session->flashdata('pesan');?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
            <div class="card card-primary">
            
            <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; foreach($keranjang as $kera) : ?>
                    <tr>
                      <td><?=$kera->nama?> <?=$kera->detail?></td>
                      <td><?=$kera->qty?></td>
                      <td><?=number_format($kera->harga, 0, ",", ".");?></td>
                      <td>
                      <a href="<?= base_url('pos_reseller/delete/' .$kera->id)?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini')"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php endforeach ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th></th>
                    <th>Total</th>
                    <?php foreach($total as $t) : ?>
                    <th><?='Rp.' .number_format($t->total, 0, ",", ".");?></th>
                    <?php endforeach ?>
                    <th></th>
                  </tr>
                  </tfoot>
                </table>
              </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="nav-icon fas fa-solid fa-cash-register"></i> Bayar</button>
                </div>
            </div>
        </div>
        <div class="col-md-7">
        <div class="card">
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; foreach($pos_reseller as $pr) : ?>
                  <tr>
                    <td><?=$no++?></td>
                    <td><?=$pr->detail?>-<?=$pr->nama?></td>
                    <td id="harga"><?= 'Rp.' .number_format($pr->harga, 0, ",", ".");?></td>
                    <td>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?=$pr->id?>">
                    <i class="fa-solid fas fa-cart-plus"></i>
                    </button>
                    </td>
                  </tr>
                  <?php endforeach ?>
                  </tfoot>
                </table>
              </div>
            </div>
        </div>
    </div>
    </div>



<?php foreach ($pos_reseller as $pr) : ?>
<div class="modal fade" id="exampleModal<?=$pr->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="<?= base_url('pos_reseller/tambah_aksi')?>" method="post">
        <div class="form-row">
          <div class="col-5">
            <div class="form-group">
              <label for="">Nama Produk</label>
              <input type="text" name="kode" class="form-control" value="<?= $pr->kode?>" hidden>
              <input type="text" name="nama" class="form-control" value="<?= $pr->detail?>" readonly>
            </div>
          </div>
          <div class="col-3">
            <div class="form-group">
              <label for="">Detail Produk</label>
              <input type="text" name="detail" class="form-control" value="<?= $pr->nama?>" readonly>
            </div>
          </div>

          <div class="col">
            <div class="form-group">
              <label for="">Harga</label>
              <input type="text" name="harga" class="form-control" value="<?= $pr->harga?>" readonly>
            </div>
          </div>

          <div class="col">
            <div class="form-group">
              <label for="">Qty</label>
              <input type="number" name="qty" class="form-control" value="1">
              <input type="text" name="faktur" class="form-control" value="<?php foreach ($faktur as $fak) : ?> <?= $fak->faktur?><?php endforeach ?>" hidden>
            </div>
          </div>
        </div>

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fas fa-cart-plus"></i> Keranjang</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>

<?php endforeach ?>


<!-- bayar -->
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

      <form action="<?= base_url('pos_reseller/belanja')?>" method="post">
        <div class="form-row">

          <div class="col-12">
          <div class="small-box bg-info">
              <div class="inner">
                <p><?php foreach ($faktur as $fak) : ?> <?= $fak->faktur?><?php endforeach ?> | <?= date('d-m-Y')?></p>
               
                <?php foreach($total as $t) : ?>
                  <h2>Rp.<?= number_format($t->total, 0, ",", ".");?></h2>
                <?php endforeach ?>
              </div>
            </div>
          </div>
        </div>

          <div class="col-6">
            <div class="form-group">
              <label for="">Costumer</label>
              <input type="text" name="faktur" class="form-control" value="<?php foreach ($faktur as $fak) : ?> <?= $fak->faktur?><?php endforeach ?>" hidden>
                <input type="text" name="tanggal" class="form-control" value="<?= date('d-m-Y')?>" hidden>
                <input type="text" name="total" class="form-control" value="<?= $t->total?>" hidden>
              <input type="text" name="nama" class="form-control" placeholder="Nama Pembeli">
            </div>
          </div>

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fas fa-save"></i> Save</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
