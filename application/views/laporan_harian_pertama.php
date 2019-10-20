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
                    
                    <!-- end project list -->

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

       