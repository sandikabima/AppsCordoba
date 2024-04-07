<div class="col-md-6">
    <div class="card">
        <form action="<?= base_url('laporan/cetak_laporan_tanggal') ?>" method="post">
        <div class="card-body">
        
        <div class="row">
        <div class="col-sm-6">

        <div class="form-group">
        <label></label>
        <input type="date" class="form-control" name="start_date">
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
        <label></label>
        <input type="date" class="form-control" name="end_date">
        </div>
        </div>
        </div>
        </div>   
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-print"></i> Print</button>
        </div>
        </form>
    </div>
</div>