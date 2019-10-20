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
                      <li><a href="<?php echo base_url(); ?>Laporan/print"><button type="button" class="btn btn-success"><i class="fa fa-print"></i> Print Laporan</button></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <p>
                     <h1>Laporan Mingguan </h1> <h3> Tanggal :  </h3>

                    </p>

                    <!-- start project list -->
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
                        <tr>
                          <td>1</td>
                          <td>
                            <a>10111396</a>
                          </td>
                          <td>
                            12-11-2011
                          </td>
                          <td>
                            12-11-2016
                          </td>
                          <td class="project_progress">
                            96
                          </td>
                          <td class="project_progress">
                            <button type="button" class="btn btn-success btn-xs">Sudah Tindak Lanjut</button>
                            <button type="button" class="btn btn-warning btn-xs">Belum Tindak Lanjut</button>
                          </td>
                          <td>
                            <button type="button" class="btn btn-warning btn-xs">Inaktif</button>
                          </td>
                        </tr>
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

       