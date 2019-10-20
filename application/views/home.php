<?php
$jumlah_rekammedis=$hitung_rekammedis->num_rows();
$jumlah_rekammedis_aktif=$hitung_rekammedis_aktif->num_rows();
$jumlah_rekammedis_inaktif=$hitung_rekammedis_inaktif->num_rows();
$jumlah_rekammedis_tindak_lanjut=$hitung_rekammedis_tindak_lanjut->num_rows();
?>
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-plus-square"></i></div>
                  <div class="count"><?php echo $jumlah_rekammedis; ?></div>
                  
                  <p>Data Rekam Medis</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-file"></i></div>
                  <div class="count"><?php echo $jumlah_rekammedis_aktif; ?></div>
                  
                  <p>Data Rekam Medis Aktif</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-exclamation"></i></div>
                  <div class="count"><?php echo $jumlah_rekammedis_inaktif; ?></div>
                  
                  <p>Data Rekam Medis In Aktif</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-pencil-square-o"></i></div>
                  <div class="count"><?php echo $jumlah_rekammedis_tindak_lanjut; ?></div>
                  
                  <p>InAktif Belum Tindak Lanjut</p>
                </div>
              </div>
            </div>
            <div class="bs-example" data-example-id="simple-jumbotron">
                    <div class="jumbotron">
                      <h1>Selamat Datang!</h1>
                      <p>Sistem Informasi Retensi</p>
                    </div>
                  </div>
          </div>
        </div>
        <!-- /page content -->