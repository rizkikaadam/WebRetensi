       
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
                    <h2><i class="fa fa-users"></i> Data Retensi Harian</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li>
                    <li><a href="<?php echo base_url(); ?>Laporan/print/<?php echo $tanggal_input; ?>"><button type="button" class="btn btn-success"><i class="fa fa-print"></i> Print Laporan</button></a>
                      </li>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <p>
                     <h1>Laporan Harian </h1>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>Laporan/carilaporan_harian">
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-2">Tanggal<span class="required">*</span></label>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <div class='input-group date' id='myDatepicker21'>
                            <input type='text' class="form-control" name="tanggal" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Cari</button>
                        </div>
                      </div>
                      <div class="form-group">
                        
                      </div>
                      </form>
                    </p>

                      <div class="ln_solid"></div>
                    <!-- start project list -->
                    <h1><center>Laporan Data Inaktif </center></h1>
                    <p>Tanggal : <?php echo $tanggal_input; ?></p>
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
                      foreach ($harian->result() as $data_harian) {
                      ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td>
                            <a><?php echo $data_harian->no_rekammedis; ?></a>
                          </td>
                          <td>
                            <?php echo $data_harian->berobat_terakhir; ?>
                          </td>
                          <td>
                            <?php echo $data_harian->tgl_inaktif; ?>
                          </td>
                          <td class="project_progress">
                            <?php echo $data_harian->no_rak; ?>
                          </td>
                          <td class="project_progress">
                          <?php 
                          if ($data_harian->tindak_lanjut != '') {
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

       