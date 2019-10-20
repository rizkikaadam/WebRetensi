<?php
foreach ($rekammedis->result() as $data_rekammedis) {
  $no_rekammedis=$data_rekammedis->no_rekammedis;
  $nama = $data_rekammedis->nama;
  $tempat = $data_rekammedis->tempat;
  $tgl_lahir = $data_rekammedis->tgl_lahir;
  $jk = $data_rekammedis->jk;
  $agama = $data_rekammedis->agama;
  $pendidikan = $data_rekammedis->pendidikan;
  $alamat = $data_rekammedis->alamat;
  $berobat_terakhir = $data_rekammedis->berobat_terakhir;
}

?>

<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-edit"></i> Form Edit Data Rekam Medis</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <!-- Smart Wizard -->
                    <p>Berikut ini adalah halaman untuk menambahkan rekam medis kedalam database.</p>
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>Dretensi/editdata_proses">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No Rekam Medis <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="no_rekammedis" value="<?php echo $no_rekammedis; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="nama" value="<?php echo $nama ; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tempat Lahir <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" required="required" class="form-control col-md-7 col-xs-12" name="tempat" value="<?php echo $tempat;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Lahir Dalam Database <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type='text' class="form-control" readonly="readonly" value="<?php echo $tgl_lahir;?>" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Lahir <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class='input-group date' id='myDatepicker2'>
                            <input type='text' class="form-control" name="tgl_lahir" value="<?php echo $tgl_lahir;?>" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span> 
                          </div>
                        </div>
                      </div>
                      <?php
                      //kondisi jenis kelamin
                      if ($jk == 'L') {
                        ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          Laki-laki:
                        <input type="radio" class="flat" name="jk" id="genderM" value="L" checked="" required /> <br/>Perempuan :
                        <input type="radio" class="flat" name="jk" id="genderF" value="W" />
                        </div>
                      </div>
                      <?php  
                      }else
                      {?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          Laki-laki:
                        <input type="radio" class="flat" name="jk" id="genderM" value="L"  required /> <br/>Perempuan :
                        <input type="radio" class="flat" name="jk" id="genderF" value="W" checked="" />
                        </div>
                      </div>
                      <?php
                      }//akhir kondisi jenis kelamin
                      ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Agama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="agama" value="<?php echo $agama;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pendidikan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="pendidikan" value="<?php echo $pendidikan;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control" rows="3" name="alamat"><?php echo $alamat; ?></textarea>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="reset">Batal</button>
                          <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                      </div>
                      </form>
                    <!-- End SmartWizard Content -->
                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>      
        <!-- /page content -->