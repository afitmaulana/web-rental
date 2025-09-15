
<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="dashboard-grid">
    <div class="card-group">
        <div class="card card-green">
            <h3>KATALOG KOSTUM</h3>
            <p><?= $total_kostum ?></p>
        </div>
        <div class="card card-blue">
            <h3>KATALOG PROPS</h3>
            <p><?= $total_props ?></p>
        </div>
        <div class="card card-orange">
            <h3>TOTAL TRANSAKSI</h3>
             <p><?= $total_transaksi ?></p>
        </div>
        <div class="card card-red">
            <h3>TOTAL MEMBER</h3>
             <p><?= $total_member ?></p>
        </div>
    </div>
    
    <div class="main-panel">
        <div class="panel-placeholder">
            <p>Main Data Panel</p>
        </div>
    </div>

    <div class="side-panel">
        <h3>Statistik Rental</h3>
        <div class="chart-placeholder">
            <img src="https://i.ibb.co/6wmTz4Q/stats.png" alt="stats chart" border="0" style="width:100%;">
        </div>
    </div>

    <div class="bottom-panel-1">
        <div class="panel-placeholder">
            <p>Bottom Panel 1</p>
        </div>
    </div>
    <div class="bottom-panel-2">
        <div class="panel-placeholder">
            <p>Bottom Panel 2</p>
        </div>
    </div>

</div>
<?= $this->endSection() ?>