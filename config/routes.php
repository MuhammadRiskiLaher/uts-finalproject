<?php

include('Csrf.php');
include '../Controllers/Controller_siswa.php';
include '../Controllers/Controller_kelas.php';
include '../Controllers/Controller_spp.php';
// include '../controller/controller_petugas.php';
// include '../controller/controller_pembayaran.php';
//membuat objek dari class



//membuat variabel dari GET URL
 $function = $_GET['function'];

//decision variabel create_siswa
if ($function == "create_siswa") {

	$db_siswa = new Controller_siswa();

// 	//validasi token csrf
	if (validation() == true) {
		$db_siswa->POSTData(
			$_POST['nisn'],
			$_POST['nis'],
			$_POST['nama'],
			$_POST['id_kelas'],
			$_POST['alamat'],
			$_POST['no_telp'],
			$_POST['id_spp']
		);
	}

	header("location:../Views/View_siswa.php");
	}

	//decision variabel PUT_siswa
	elseif ($function == "put_siswa") {

		$db = new Controller_siswa();
		//validasi token csrf
		if (validation() == true) {
			$db->PUTData(
			$_POST['nisn'],
			$_POST['nis'],
			$_POST['nama'],
			$_POST['id_kelas'],
			$_POST['alamat'],
			$_POST['no_telp'],
			$_POST['id_spp'] 
		);

		}
		header("location:../Views/View_siswa.php");
	}

	//decision variabel delete_siswa
	elseif ($function == "delete_siswa") {
		$db = new Controller_siswa();
		$nisn = base64_decode($_GET['nisn']);
		$db->DELETEData($nisn);
		header("location:../Views/View_siswa.php");
	}else{echo "error";}



//kelas
if ($function == "create_kelas") {
	$db_kelas = new Controller_kelas();
	// validasi token csrf
	if (validation() == true) {
		$db_kelas->POSTData(
			$_POST['id_kelas'],
			$_POST['nama_kelas'],
			$_POST['kompetensi_keahlian']
		);
	}

	header("location:../Views/View_kelas.php");
	}

//decision variabel PUT_kelas
elseif ($function == "put_kelas") {

    $db = new Controller_kelas();
    //validasi token csrf
    if (validation() == true) {
        $db->PUTData(
            $_POST['id_kelas'],
            $_POST['nama_kelas'],
            $_POST['kompetensi_keahlian']
        );
    }
    header("location:../Views/View_kelas.php");
}

//decision variabel delete_kelas
elseif ($function == "delete_kelas") {
    $db = new Controller_kelas();
    $id_kelas = base64_decode($_GET['id_kelas']);
    $db->DELETEData($id_kelas);
    header("location:../Views/View_kelas.php");
} else {
    echo "error";
}

	

	//spp
	if ($function == "create_spp") {
	$db_spp = new Controller_spp();
	//validasi token csrf
	// if (validation() == true) {
		$db_spp ->POSTData(
			$_POST['id_spp'],
			$_POST['tahun'],
			$_POST['nominal']
		);
	// }

	header("location:../Views/View_spp.php");
	}

	//decision variabel PUT_spp
	elseif ($function == "put_spp") {
		
		$db = new Controller_spp();
		//validasi token csrf
		// if (validation() == true) {
			$db->PUTData(
			$_POST['id_spp'],
			$_POST['tahun'],
			$_POST['nominal'] 
		);

		// }
		header("location:../Views/View_spp.php");
	}

	//decision variabel delete_spp
	elseif ($function == "delete_spp") {
		$db = new Controller_spp();
		$id_spp = base64_decode($_GET['id_spp']);
		$db->DELETEData($id_spp);
		header("location:../Views/View_spp.php");
	}else{echo "error";}


	// //petugas
	// if ($function == "create_petugas") {
	
	// $db_petugas = new controller_petugas();

	// //validasi token csrf
	// // if (validation() == true) {
	// 	$db_petugas->POSTData(
	// 		$_POST['id_petugas'],
	// 		$_POST['username'],
	// 		$_POST['password'],
	// 		$_POST['nama_petugas'],
	// 		$_POST['level']
	// 	);
	// // }

	// header("location:../views/view_petugas.php");
	// }

	// //decision variabel PUT_petugas
	// elseif ($function == "put_petugas") {

	// 	$db_petugas = new controller_petugas();
	// 	//validasi token csrf
	// 	// if (validation() == true) {
	// 		$db_petugas->PUTData(
	// 		$_POST['id_petugas'],
	// 		$_POST['username'],
	// 		$_POST['password'],
	// 		$_POST['nama_petugas'],
	// 		$_POST['level']
	// 	);

	// 	// }
	// 	header("location:../views/view_petugas.php");
	// }

	// //decision variabel delete_petugas
	// elseif ($function == "delete_petugas") {
	// 	$db_petugas = new controller_petugas();
	// 	$id_petugas = base64_decode($_GET['id_petugas']);
	// 	$db_petugas->DELETEData($id_petugas);
	// 	header("location:../views/view_petugas.php");
	// }else{echo "error";}



	// //pembayaran
	// if ($function == "create_pembayaran") {
	
	// $db_pembayaran = new controller_pembayaran();

	// //validasi token csrf
	// // if (validation() == true) {
	// 	$db_pembayaran->POSTData(
	// 		$_POST['id_pembayaran'],
	// 		$_POST['id_petugas'],
	// 		$_POST['nisn'],
	// 		$_POST['tgl_bayar'],
	// 		$_POST['bulan_dibayar'],
	// 		$_POST['tahun_dibayar'],
	// 		$_POST['id_spp'],
	// 		$_POST['jumlah_bayar']
	// 	);
	// // }

	// header("location:../views/view_pembayaran.php");
	// }

	// //decision variabel PUT_siswa
	// elseif ($function == "put_pembayaran") {

	// 	$db_pembayaran = new controller_pembayaran();
	// 	//validasi token csrf
	// 	// if (validation() == true) {
	// 		$db_pembayaran->PUTData(
	// 		$_POST['id_pembayaran'],
	// 		$_POST['id_petugas'],
	// 		$_POST['nisn'],
	// 		$_POST['tgl_bayar'],
	// 		$_POST['bulan_dibayar'],
	// 		$_POST['tahun_dibayar'],
	// 		$_POST['id_spp'],
	// 		$_POST['jumlah_bayar']
	// 	);

	// 	// }
	// 	header("location:../views/view_pembayaran.php");
	// }

	// //decision variabel delete_siswa
	// elseif ($function == "delete_pembayaran") {
	// 	$db_pembayaran = new controller_pembayaran();
	// 	$id_pembayaran = base64_decode($_GET['id_pembayaran']);
	// 	$db_pembayaran->DELETEData($id_pembayaran);
	// 	header("location:../views/view_pembayaran.php");
	// }else{echo "error";}