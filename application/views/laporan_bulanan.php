         <?php
        $bulan=$this->session->flashdata('bulan');
        $tahun=$this->session->flashdata('tahun');
        if ($bulan == '01') {
          $nama_bulan = 'Januari';
        }
        elseif ($bulan == '02') {
          $nama_bulan = 'Februari';
        }
        elseif ($bulan == '03') {
          $nama_bulan = 'Maret';
        }
        elseif ($bulan == '04') {
          $nama_bulan = 'April';
        }
        elseif ($bulan == '05') {
          $nama_bulan = 'Mei';
        }
        elseif ($bulan == '06') {
          $nama_bulan = 'Juni';
        }
        elseif ($bulan == '07') {
          $nama_bulan = 'Juli';
        }
        elseif ($bulan == '08') {
          $nama_bulan = 'Agustus';
        }
        elseif ($bulan == '09') {
          $nama_bulan = 'September';
        }
        elseif ($bulan == '10') {
          $nama_bulan = 'Oktober';
        }
        elseif ($bulan == '11') {
          $nama_bulan = 'November';
        }
        elseif ($bulan == '12') {
          $nama_bulan = 'Desember';
        }
        ?>
        <!-- page content -->

        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-users"></i> Data Retensi Per Bulan</h2>
                    <ul class="nav navbar-right panel_toolbox">

                      <form method="post" action="<?php echo base_url(); ?>Laporan/print_bulanan/">
                        <input type="hidden" name="bulan" value="<?php echo $bulan;?>">
                        <input type="hidden" name="tahun" value="<?php echo $tahun;?>">
                        <button type="submit" class="btn btn-success"><i class="fa fa-print"></i> Print Laporan</button>
                      </form>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <p>
                     <h1>Laporan Bulanan </h1>
                      <form class="form-inline" data-parsley-validate method="post" action="<?php echo base_url();?>Laporan/carilaporan_bulan">
                      <div class="form-group">
                        <label for="ex3">Pilih Bulan dan Tahun :</label>
                        <select name="bulan" class="form-control">
                            <option>Pilih Bulan</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                          </select>
                      </div>
                      <div class="form-group">
                        <select name="tahun" class="form-control">
                            <option>Pilih Tahun</option>
                            <option value="2025">2025</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                            <option value="2009">2009</option>
                            <option value="2008">2008</option>
                            <option value="2007">2007</option>
                            <option value="2006">2006</option>
                            <option value="2005">2005</option>
                            <option value="2004">2004</option>
                            <option value="2003">2003</option>
                            <option value="2002">2002</option>
                            <option value="2001">2001</option>
                            <option value="2000">2000</option>
                          </select>
                      </div>
                      <button type="submit" class="btn btn-success">Cari</button>
                    </form>
                    </p>

                      <div class="ln_solid"></div>
                    <!-- start project list -->
                    <h1><center>Laporan Data Inaktif </center></h1>
                    <p>Laporan : <?php echo $nama_bulan ; ?> <?php echo $tahun ; ?></p>
                    <table id="" class="table table-bordered">
                    <!--<table id="datatable-responsive" class="table table-bordered">-->
                      <thead>
                        <tr>
                          <th style="width: 1%">No.</th>
                          <th style="width: 20%">No Rekam Medis</th>
                          <th>Tanggal Terakhir Berobat</th>
                          <th>Kadaluarsa</th>
                          <th>No Rak</th>
                          <th>Status</th>
                          <th>Status Tindak Lanjut</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $no = 1;
                      foreach ($bulanan->result() as $data_bulanan) {
                      ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td>
                            <a><?php echo $data_bulanan->no_rekammedis; ?></a>
                          </td>
                          <td>
                            <?php echo $data_bulanan->berobat_terakhir; ?>
                          </td>
                          <td>
                            <?php echo $data_bulanan->tgl_inaktif; ?>
                          </td>
                          <td class="project_progress">
                            <?php echo $data_bulanan->no_rak; ?>
                          </td>
                          <td class="project_progress">
                          <?php 
                          if ($data_bulanan->tindak_lanjut != '') {
                            echo "<button type='button' class='btn btn-success btn-xs'>Sudah Tindak Lanjut</button>";
                          }
                          else
                          {
                            echo "<button type='button' class='btn btn-warning btn-xs'>Belum Tindak Lanjut</button>";
                          }
                          ?>
                          </td>
                          <td>
                            <button type="button" class="btn btn-warning btn-xs">Inaktif</button>
                          </td>
                        </tr>
                        <?php
                        }
                          ?>
                      </tbody>
                    </table>
                    <!-- end project list -->

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

       