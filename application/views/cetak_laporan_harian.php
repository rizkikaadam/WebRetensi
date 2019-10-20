<?php
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
    header ("Content-type: application/x-msexcel");
    header ("Content-Disposition: attachment; filename=cetak-laporan-excel.xls");
    ?>
<!DOCTYPE html>
<html>
 
<head>
  <title><?=$title?></title>
  <style>
  table{
      border-collapse: collapse;
      width: 100%;
      margin: 0 auto;
  }
  table th{
      border:1px solid #000;
      padding: 3px;
      font-weight: bold;
      text-align: center;
  }
  table td{
      border:1px solid #000;
      padding: 3px;
      vertical-align: top;
  }
  </style>
</head>
<body>
<h1><center>Laporan Data Inaktif </center></h1>
                    <p>Tanggal : <?php echo $tanggal_input; ?></p>
                    <table>
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
                          <td>
                            <?php echo $data_harian->no_rak; ?>
                          </td>
                          <td>
                          <?php 
                          if ($data_harian->tindak_lanjut != '') {
                            echo "Sudah Tindak Lanjut";
                          }
                          else
                          {
                            echo "Belum Tindak Lanjut";
                          }
                          ?>
                          </td>
                          <td>
                            Inaktif
                          </td>
                        </tr>
                        <?php
                        }
                          ?>
                      </tbody>
                    </table>
 
</body>
</html>