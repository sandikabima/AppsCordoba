<?= $this->session->flashdata('pesan');?>
<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Faktur</th>
                    <th>Costumer</th>
                    <th>Total Bayar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1; foreach($faktur as $fr) : ?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?= $fr->tanggal?></td>
                    <td><?= $fr->faktur?></td>
                    <td><?= $fr->costumer?></td>
                    <td><?= 'Rp.' .number_format($fr->total, 0, ",", ".");?></td>
                    <td>

                    <a href="<?= base_url('faktur/faktur/'). $fr->faktur ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fas fa-print"></i></a>

                    
                    <a href="<?= base_url('faktur/delete/' .$fr->id)?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini')"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach ?>
            </tfoot>
        </table>
    </div>
</div>