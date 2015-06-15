<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>LAB INFORMATIKA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	
    <!-- Le styles -->
	    <link href="assets/css/bootstrap.css" rel="stylesheet" media="screen">
        <link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
		 <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="assets/ico/favicon.png">
                                   <style type="text/css">
<!--
.style3 {font-size: 20px}
-->
                                   </style>
</head>

  <body>
 <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="LABORATORIUM"></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="#">Home</a></li>
			  <li class="active"><a href="#">Peminjaman</a></li>
              <li class="active"><a href="#">Barang</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

	<div class="container">
<?php
// memanggil file koneksi
include 'koneksi.php';

// instance objek db
$db = new database();

// koneksi ke MySQL via method
$db->connectMySQL();

// proses hapus data
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'hapus') {
        // baca ID dari parameter ID Peminjaman yang akan dihapus
        $id = $_GET['id_b'];

        // proses hapus data Peminjaman berdasarkan ID via method
        $db->hapusPeminjaman($id);
    } elseif ($_GET['aksi'] == 'tambah') {
        echo"<br>
<form method=POST action='?aksi=tambahPeminjaman'>
<table cellpadding='0' cellspacing='0' border='0' class='table table-striped table-bordered' >
<tr><td>Nama</td><td><input type=text name='nama'></td></tr>
<tr><td>NIM</td><td><input type=text name='NIM'></td></tr>
<tr><td>Tgl_Peminjaman</td><td><input type=text name='Tgl_Peminjaman' ></td></tr>
<tr><td>Tgl_Kembali</td><td><input type=text name='Tgl_Kembali'></td></tr>
<tr><td>Nama_Lab</td><td><input type=text name='Nama_Lab'></td></tr>
<tr><td>Nama_Barang</td><td><input type=text name='Nama_Barang'></td></tr>
<tr><td>Keterangan</td><td><input type=text name='Keterangan'></td></tr>
<tr><td></td><td><button type='submit' class='btn btn-primary'>SIMPAN</button></td></tr>
</table>
</form>
";
    } elseif ($_GET['aksi'] == 'tambahPeminjaman') {
        $nama = $_POST['nama'];
		$NIM = $_POST['NIM'];
		$Tgl_Peminjaman = $_POST['Tgl_Peminjaman'];
        $Tgl_Kembali = $_POST['Tgl_Kembali'];
        $Nama_Lab = $_POST['Nama_Lab'];
		$Nama_Barang = $_POST['Nama_Barang'];
		$Keterangan = $_POST['Keterangan'];
		
        $db->tambahPeminjaman($nama,$NIM,$Tgl_Peminjaman, $Tgl_Kembali, $Nama_Lab, $Nama_Barang, $Keterangan);
    }
// proses edit data
    else if ($_GET['aksi'] == 'edit') {
        // baca ID Peminjaman yang akan di edit
        $id = $_GET['id_b'];

// menampilkan form edit Peminjaman pakai method bacaPeminjaman()
        ?>	

        <form class="form-horizontal" method="post" action="<?php $_SERVER['PHP_SELF'] ?>?aksi=update">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" >
                <tr><td>Nama</td><td>:</td>
                    <td><input type="text" name="nama" value="<?php echo $db->bacaDataPeminjaman('nama', $id); ?>"></td>
                </tr>
				
				<tr><td>NIM</td><td>:</td>
                    <td><input type="text" name="NIM" value="<?php echo $db->bacaDataPeminjaman('NIM', $id); ?>"></td>
                </tr>
				
				<tr><td>Tgl_Peminjaman</td><td>:</td>
                    <td><input type="text" name="Tgl_Peminjaman" value="<?php echo $db->bacaDataPeminjaman('Tgl_Peminjaman', $id); ?>"></td>
                </tr>
				
                <tr><td>Tgl_Kembali</td><td>:</td>
                    <td><input type="text" name="Tgl_Kembali" value="<?php echo $db->bacaDataPeminjaman('Tgl_Kembali', $id); ?>"></td>
                </tr>
				 
                <tr><td>Nama_Lab</td><td>:</td>
                    <td><input type="text" name="Nama_Lab" value="<?php echo $db->bacaDataPeminjaman('Nama_Lab', $id); ?>"></td>
                </tr>

				<tr><td>Nama_Barang</td><td>:</td>
                    <td><input type="text" name="Nama_Barang" value="<?php echo $db->bacaDataPeminjaman('Nama_Barang', $id); ?>"></td>
                </tr>	

				<tr><td>Keterangan</td><td>:</td>
                    <td><input type="text" name="Keterangan" value="<?php echo $db->bacaDataPeminjaman('Keterangan', $id); ?>"></td>
                </tr>				
            </table>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <td><button type='submit' class='btn btn-primary'>UPDATE</button></td>
        </form>

        <?php
    } else if ($_GET['aksi'] == 'update') {
        // proses update data Peminjaman
        $id_b = $_POST['id'];
        $nama = $_POST['nama'];
		$NIM = $_POST['NIM'];
		$Tgl_Peminjaman = $_POST['Tgl_Peminjaman'];
        $Tgl_Kembali = $_POST['Tgl_Kembali'];
        $Nama_Lab = $_POST['Nama_Lab'];
		$Nama_Barang = $_POST['Nama_Barang'];
		$Keterangan = $_POST['Keterangan'];

        // update data via method
        $db->updateDataPeminjaman($id_b,$nama,$NIM,$Tgl_Peminjaman,$Tgl_Kembali,$Nama_Lab,$Nama_Barang,$Keterangan);
    }
}

// buat array data Peminjaman dari method tampilPeminjaman()
$arrayPeminjaman = $db->tampilPeminjaman();

echo"</table> <br> <a href='?aksi=tambah'><button type='submit' class='btn btn-primary'>TAMBAH</button></a>";
echo "<table cellpadding='0' cellspacing='0' border='0' class='table table-striped table-bordered' >
      <tr><th>No</th>
           <th>Nama</th>
           <th>NIM</th>
		    <th>Tgl_Peminjaman</th>
			 <th>Tgl_Kembali</th>
           <th>Nama_Lab</th>
		   <th>Nama_Barang</th>
		   <th>Keterangan</th>
           <th>Aksi</th>
       </tr>";
$i = 1;
foreach ($arrayPeminjaman as $data) {
    echo "<tr><td>" . $i . "</td> 
          	   <td>" . $data['nama'] . "</td>
			   <td>" . $data['NIM'] . "</td>
			   <td>" . $data['Tgl_Peminjaman'] . "</td>
               <td>" . $data['Tgl_Kembali'] . "</td>
               <td>" . $data['Nama_Lab'] . "</td>
			   <td>" . $data['Nama_Barang'] . "</td>
			   <td>" . $data['Keterangan'] . "</td>
               <td><a class='btn btn-info btn-sm' href='" . $_SERVER['PHP_SELF'] . "?aksi=edit&id_b=" . $data['id'] . "'>Edit</a> 
                   <a class='btn btn-danger btn-sm' href='" . $_SERVER['PHP_SELF'] . "?aksi=hapus&id_b=" . $data['id'] . "'>Hapus</a></td>
            </tr>";
    $i++;
}

echo "</table>";
?>
</div>

	<div class="row-fluid">
			<div class="span12">
			  <div class="row-fluid">
				<div class="alert alert-info">
				  <h2 class="style3">JURUSAN TEKNIK INFORMATIKA</h2>
				  <p class="style3">UNIVERSITAS NEGERI SURABAYA</p>
				  <p class="text-info">UAS Internet Pemograman</p>
				  <p><a href="http://if.unesa.ac.id">www.if.unesa.ac.id</a>&nbsp<?php echo date("Y");?></p>
				</div>
				<!--/span-->
			  </div><!--/row-->
			</div><!--/span-->
	</div><!--/row-->


    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>

  </body>
</html>