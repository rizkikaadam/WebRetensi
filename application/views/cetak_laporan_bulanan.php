<?php
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
    header ("Content-type: application/x-msexcel");
    header ("Content-Disposition: attachment; filename=cetak-laporan-excel.xls");
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
                    <p>Laporan : <?php echo $bulan; ?> <?php echo $tahun; ?></p>
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
                      foreach ($bulanan->result() as $data_harian) {
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