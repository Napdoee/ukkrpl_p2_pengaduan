<div class="content-header">
    <div class="container">
        <h1>Dashboard</h1>
    </div>
</div>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-tie"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Petugas</span>
                        <span class="info-box-number">
                            <?= $db->query("SELECT COUNT(*) as JmlPetugas FROM petugas")[0]['JmlPetugas'] ?>

                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Masyarakat</span>
                        <span class="info-box-number">
                            <?= $db->query("SELECT COUNT(*) as JmlMasyarakat FROM masyarakat")[0]['JmlMasyarakat'] ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-file"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Pengaduan</span>
                        <span class="info-box-number">
                            <?= $db->query("SELECT COUNT(*) as JmlPengaduan FROM pengaduan")[0]['JmlPengaduan'] ?>

                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-file"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Pengaduan terpending</span>
                        <span class="info-box-number">
                            <?= $db->query("SELECT jmlPengaduan() as jmlPengaduan")[0]['jmlPengaduan'] ?>

                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-lightblue">
                    <div class="card-header">
                        <h3 class="card-title">Data Pengaduan</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>
</div>