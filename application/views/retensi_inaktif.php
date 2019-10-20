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
                    <h2><i class="fa fa-users"></i> Data Rekam Medis</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <p>.</p>

                    <!-- start project list -->
                    <table id="datatable-responsive" class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">No.</th>
                          <th style="width: 20%">No Rekam Medis</th>
                          <th>Tanggal Terakhir Berobat</th>
                          <th>Kadaluarsa</th>
                          <th>No Rak</th>
                          <th>Status</th>
                          <th style="width: 20%">#Edit</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      //awal menampilkan data
                      $no = 1;
                      foreach ($rekammedis->result() as $data_rekammedis) {
                      ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td>
                            <a><?php echo $data_rekammedis->no_rekammedis; ?></a>
                          </td>
                          <td>
                            <?php echo $data_rekammedis->berobat_terakhir; ?>
                            <!--tindak lanjut data-->
                                    <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".<?php echo $no; ?>"><i class="fa fa-pencil"></i>  </a>
                                    <div class="modal fade <?php echo $no; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                            </button>
                                            <h3 class="modal-title" id="myModalLabel2">Ubah Data Tanggal</h3>
                                          </div>
                                          <div class="modal-body">
                                          <p>Berikut adalah halaman untuk merubah data tanggal terkahir berkuinjung pasien</p>
                                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="</<?php echo base_url()  ?>/Dretensi/ubah_berobat">
                                            <input type='hidden' class="form-control" readonly="readonly" value="<?php echo $data_rekammedis->no_rekammedis; ?>" />
                                            <div class="form-group">
                                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Berobat Terakhir di Database</label>
                                              <div class="col-md-6 col-sm-6 col-xs-12">
                                                  <input type='text' class="form-control" readonly="readonly" value="<?php echo $data_rekammedis->berobat_terakhir; ?>" />
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Ubah Tanggal Berobat Terakhir</label>
                                              <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class='input-group date' id='myDatepicker2'>
                                                  <input type='text' class="form-control" name="berobat_terakhir" />
                                                  <span class="input-group-addon">
                                                     <span class="glyphicon glyphicon-calendar"></span>
                                                  </span>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                            <button type="button" class="btn btn-primary">Simpan</button>
                                          </div>

                                            </form>
                                        </div>
                                      </div>
                                    </div>
                                    <!--akhir tindak lanjut data-->
                          </td>
                          <td>
                            <?php echo $data_rekammedis->tgl_inaktif; ?>
                          </td>
                          <td class="project_progress">
                            <?php echo $data_rekammedis->no_rak; ?>
                          </td>
                          <td><button type='button' class='btn btn-warning btn-xs'>Inaktif</button>";</td>
                          <td>
                            <!--<a href="lihat-atlet.php" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>-->
                            <!--tindak lanjut data-->
                                    <?php
                                    //awal kondisi tindak lanjut
                                    if ($status == 0 ) {
                                    ?>
                                    <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".<?php echo $data_rekammedis->no_rekammedis; ?>"><i class="fa fa-pencil"></i> Tindak Lanjut </a>
                                    <?php
                                    }//akhir kondisi tindak lanjut
                                    ?>
                                    <div class="modal fade <?php echo $data_rekammedis->no_rekammedis; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel2">Tindak Lanjut Data IN Aktif</h4>
                                          </div>
                                          <div class="modal-body">
                                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url() ; ?>/Dretensi/tindak_lanjut">
                                            <input type='hidden' class="form-control" readonly="readonly" value="<?php echo $data_rekammedis->no_rekammedis; ?>" />
                                            <div class="form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Data</label>
                                              <div class="col-md-6 col-sm-6 col-xs-12">
                                                Di Musnahkan/Buang:
                                              <input type="radio" class="flat" name="tindak_lanjut" id="genderM" value="buang" checked="" required /> <br/>Di Simpan :
                                              <input type="radio" class="flat" name="tindak_lanjut" id="genderF" value="simpan" />
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan <span class="required">*</span>
                                              </label>
                                              <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea class="form-control" rows="3" name="ket_inaktif"></textarea>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                            <button type="button" class="btn btn-primary">Simpan</button>
                                          </div>

                                            </form>
                                        </div>
                                      </div>
                                    </div>
                                    <!--akhir tindak lanjut data-->
                            <a href="<?php echo base_url() ?>Dretensi/edit/<?php echo $data_rekammedis->no_rekammedis; ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="<?php echo base_url() ?>Dretensi/hapus/<?php echo $data_rekammedis->no_rekammedis; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                          </td>
                        </tr>
                        <?php
                      }
                        //akhir menampilkan data 
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

       