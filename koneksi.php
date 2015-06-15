<?php
//membuat class databse
class database {
    // properti
    private $dbHost = "localhost";
    private $dbUser = "root";
    private $dbName = "Biodata";

    // method koneksi MySQL
    function connectMySQL() {
        mysql_connect($this->dbHost, $this->dbUser);
        mysql_select_db($this->dbName) or die("Database tidak ada!");
    }

    // method tambah data (insert)	
    function tambahPeminjaman($nama,$NIM,$Tgl_Peminjaman,$Tgl_Kembali,$Nama_Lab,$Nama_Barang,$Keterangan) {
	
        $query = "INSERT INTO Peminjaman(nama,NIM,Tgl_Peminjaman,Tgl_Kembali,Nama_Lab,Nama_Barang,Keterangan) VALUES ('$nama','$NIM','$Tgl_Peminjaman','$Tgl_Kembali','$Nama_Lab', '$Nama_Barang', '$Keterangan')";
        $hasil = mysql_query($query);

        if ($hasil)
		  echo "<div class='alert alert-block alert-success'><strong><i></i> DATA BERHASIL DI SIMPAN</strong></div>";

        else
         echo "<div class='alert alert-block alert-danger'><strong><i></i> DATA GAGAL DI UPDATE</strong></div>";
		}
	

    // method tampil data 	
    function tampilPeminjaman() {
        $query = mysql_query("SELECT * FROM Peminjaman ORDER BY id");
        while ($row = mysql_fetch_array($query))
            $data[] = $row;
        return $data;
    }

    // method hapus data
    function hapusPeminjaman($id_b) {
        $query = mysql_query("DELETE FROM Peminjaman WHERE id='$id_b'");
		if ($query)
		    echo "<div class='alert alert-block alert-success'><strong><i></i> Data Peminjaman dengan ID " . $id_b . " sudah dihapus</strong></div>";
		else
			 echo "<div class='alert alert-block alert-danger'><strong><i></i>GAGAL DI HAPUS</strong></div>";
    }

    // method membaca data Peminjaman
    function bacaDataPeminjaman($field, $id_b) {
        $query = "SELECT * FROM Peminjaman WHERE id = '$id_b'";
        $hasil = mysql_query($query);
        $data = mysql_fetch_array($hasil);
        if ($field == 'nama')
            return $data['nama'];
		else if ($field == 'NIM')
            return $data['NIM'];
		else if ($field == 'Tgl_Peminjaman')
            return $data['Tgl_Peminjaman'];
        else if ($field == 'Tgl_Kembali')
            return $data['Tgl_Kembali'];
        else if ($field == 'Nama_Lab')
            return $data['Nama_Lab'];
		else if ($field == 'Nama_Barang')
            return $data['Nama_Barang'];
		else if ($field == 'Keterangan')
            return $data['Keterangan'];
    }

    // method untuk proses update data Peminjaman
    function updateDataPeminjaman($id_b, $nama,$NIM,$Tgl_Peminjaman,$Tgl_Kembali,$Nama_Lab,$Nama_Barang,$Keterangan) {
        $query = "UPDATE Peminjaman SET nama='$nama',NIM='$NIM',Tgl_Peminjaman='$Tgl_Peminjaman', Tgl_Kembali ='$Tgl_Kembali', Nama_Lab='$Nama_Lab', Nama_Barang='$Nama_Barang', Keterangan='$Keterangan' WHERE id='$id_b'";
        $hasilupdate=mysql_query($query);
		
        if ($hasilupdate)
		    echo "<div class='alert alert-block alert-success'><strong><i></i> DATA BERHASIL DI UPDATE</strong></div>";
        else
            echo "<div class='alert alert-block alert-danger'><strong><i></i> DATA GAGAL DI UPDATE</strong></div>e";
    }

}
?>
