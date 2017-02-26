<div class="atasAdmin">
	<div class="judul">Tampilkan Semua Siswa</div>
	<div id="backIndex"><</div>
</div>
<div class="isiSiswa" id="isiSemuaSiswa">
	<table>
		<tr>
			<th class="nis">NIS</th><th>Nama</th><th>Username</th><th class="kcl">S</th><th class="kcl">I</th>
			<th class="kcl">A</th><th class="kcl">Masuk</th><th class="kls">Kelas</th><th class="kcl">Aksi</th>
		</tr>
		<?php
		error_reporting(1);
		$batas = 5;
		$halaman = $_GET['page'];
		if(empty($halaman)) {
			$posisi = 0;
			$halaman = 1;
		}else {
			$posisi = ($halaman-1) * $batas;
		}
		$q = $_GET['q'];
		if(empty($q)) {
		$sql = mysqli_query($konek, "SELECT * FROM siswa ORDER BY nis ASC LIMIT $posisi,$batas");
		while($siswa = mysqli_fetch_array($sql)) {
			echo "<tr>".
				 "<td>{$siswa['nis']}</td>".
				 "<td>{$siswa['nama']}</td>".
				 "<td>{$siswa['username']}</td>".
				 "<td>{$siswa['S']} x</td>".
				 "<td>{$siswa['I']} x</td>".
				 "<td>{$siswa['A']} x</td>".
				 "<td>{$siswa['totalMasuk']}</td>".
				 "<td>{$siswa['kelas']}</td>".
				 "<td><a href='hapus_siswa.php?nis={$siswa['nis']}&ref=semua'><button class='tblHapus'>X</button></a></td>";
			echo "</tr>";
		}
		echo "</table>";
		?>
		<div class="pagingSiswa">
		<?php
		$jmldata = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM siswa WHERE 1"));
		$jmlhlmn = ceil($jmldata/$batas);
		if($halaman > 1) {
			$previous = $halaman-1;
			echo "<a href='siswa.php?tampilkan=semua&page=1' id='paging'><<</a> <a href='siswa.php?tampilkan=semua&page=$previous' id='paging'><</a> ";
		}else {
			echo "";
		}
		for ($d=1; $d <= $jmlhlmn; $d++) { 
			if($d != $halaman) {
				echo "<a href='siswa.php?tampilkan=semua&page=$d' id='paging'>$d</a> ";
			}else {
				echo "<span id='paging' class='pageSkrg'><b>$d</b></span> ";
			}
		}
		if($halaman < $jmlhlmn) {
			$next = $halaman+1;
			echo "<a href='siswa.php?tampilkan=semua&page=$next' id='paging'>></a> <a href='siswa.php?tampilkan=semua&page=$jmlhlmn' id='paging'>>></a>";
		}else {
			echo "";
		}
		}else {
			$style = 'style="display:none;"';
			$cari = mysqli_query($konek, "SELECT * FROM siswa WHERE nama LIKE '%$q%'");
			while($res = mysqli_fetch_array($cari)) {
				echo "<tr>".
				 "<td>{$res['nis']}</td>".
				 "<td>{$res['nama']}</td>".
				 "<td>{$res['username']}</td>".
				 "<td>{$res['S']} x</td>".
				 "<td>{$res['I']} x</td>".
				 "<td>{$res['A']} x</td>".
				 "<td>{$res['totalMasuk']}</td>".
				 "<td>{$res['kelas']}</td>".
				 "<td><a href='hapus_siswa.php?nis={$res['nis']}&ref=semua'><button class='tblHapus'>X</button></a></td>";
				echo "</tr>";	
			}
		}
		?>
	</div>
</div>
</table>
</div>
<div id="tblTambahSiswa">+</div>
<div class='bawahSiswa'>
	<div class="isiCari" <?php echo $style; ?>>Masukkan Nama untuk mencari...</div>
	<input type="text" class="cariBox" id="q" value="<?php echo $q; ?>"><button id="tblCari">CARI</button>
</div>

<div id="formTmbhSiswa">
	<form action="tambah_siswa.php" method="post">
		<h2>Tambah Siswa</h2>
		<div id="isiNamaTmbh">Nama Siswa...</div>
		<input type="text" id="namaTmbh" name="nama" class="boxTmbh">
		<div id="isiUsernameTmbh">Username Siswa...</div>
		<input type="text" id="usernameTmbh" name="username" class="boxTmbh">
		<div id="isiKlsTmbh">Kelas...</div>
		<input type="text" id="klsTmbh" name="kelas" class="boxTmbh">
		<input type="submit" name="tmbhSiswa" class="tmbhSiswa" value="TAMBAHKAN">
	</form>
</div>