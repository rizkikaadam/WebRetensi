         <?php
        $tahun=$this->session->flashdata('tahun');
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
                    <h2><i class="fa fa-users"></i> Data Retensi Per Tahun</h2>
                    <ul class="nav navbar-right panel_toolbox">

                      <form method="post" action="<?php echo base_url(); ?>Laporan/print_tahunan/">
                        <input type="hidden" name="tahun" value="<?php echo $tahun;?>">
                        <button type="submit" class="btn btn-success"><i class="fa fa-print"></i> Print Laporan</button>
                      </form>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <p>
                     <h1>Laporan Tahunan </h1>
                      <form class="form-inline" data-parsley-validate method="post" action="<?php echo base_url();?>Laporan/carilaporan_tahun">
                      <div class="form-group">
                        <label for="ex3">Pilih Tahun :</label>
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
                    <p>Laporan : <?php echo $tahun ; ?></p>
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
                      foreach ($tahunan->result() as $data_bulanan) {
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

       