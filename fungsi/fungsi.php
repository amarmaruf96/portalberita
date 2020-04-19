<?php

function nama($parameter){
	$data=mysql_fetch_array(mysql_query("select nama_lengkap from admin where id_admin='$parameter'"));
	return $data[0];
}

function random()
{
echo rand(0,999);	
}

function msgbox($msg,$url){
	echo "<script>windows.alert('$smg'); windows.location=('$url');</script>";
}

function rdir($url){
	header("location:$url");
}
//fungsi untuk menampilkan status
function status($parameter){
	if ($parameter) 
	{
		$status="Aktif";
	}
	else
	{
		$status="Non Aktif";
	}

	return $status;
}

//membuat angka menjadi format rupiah
function rupiah($parameter){
	$rupiah="<sup>IDR</sup>".number_format($parameter,0,',','.');
return $rupiah;
}


//fungsi selisih waktu
function selisihwaktu($waktupembuatan){//memasukan parameter waktupembuatan
	$waktusekarang=date("Y-m-d H:i:s");

	$datetime1= new DateTime($waktusekarang); //penggunaan class Datetime yg sudah ada di php
	$datetime2= new Datetime($waktupembuatan);
	$interval=$datetime1->diff($datetime2);
	$selisih=$interval->format('%R%a');
	return $selisih;// mengubha nilai parameter menjadi nilai selisih

}


// merubah waktu ke dalam format Indonesia
function tgl_ina($parameter){ //ini untuk mengubah format 2015-06-15 ke dalam format 15 Juni 2015
	$thn=substr($parameter, 0,4) ;//ini untuk mengubah format 2015-06-15 ke dalam format 15 Juni 2015
	$b=substr($parameter, 5,2);//mengambil 2 digit, index 5 adalah angka 0 dari 06
	$tgl=substr($parameter,-2);//mengambil 2 digit dari kanan

	if ($b==1) {
		$bln="Januari";
	}
	elseif ($b==2) {
		$bln="Februari";
	}
	elseif ($b==3) {
		$bln="Maret";
	}
	elseif ($b==4) {
		$bln="April";
	}
	elseif ($b==5) {
		$bln="Mei";
	}
	elseif ($b==6) {
		$bln="Juni";
	}
	elseif ($b==7) {
		$bln="Juli";
	}
	elseif ($b==8) {
		$bln="Agustus";
	}
	elseif ($b==9) {
		$bln="September";
	}
	elseif ($b==10) {
		$bln="Oktober";
	}
	elseif ($b==11) {
		$bln="November";
	}
	elseif ($b==12) {
		$bln="Desember";
	}
$tanggal=$tgl." ".$bln." ".$thn;

return $tanggal;
}

// function mengubah format
function tgl_ina2($parameter1){ //ini untuk mengubah format 2015-06-15 17:00:00 ke dalam format 15/06/2015
$parameter2=substr($parameter1,0,10);//10 digit dari kiri,ini untuk peroleh nilai 2015-06-15 dari nilai 2015-06-15 17:00:00
$parameter3=substr($parameter1,-8);  //10 digit dari kanan,ini untuk peroleh 17:00:00 dari nilai  2015-06-15 17:00:00

$thn=substr($parameter2,2,2); //menngambil 2 digit dari kiri, 2 adalah index ketiga dari tahun (angka 1 dari 2015), 2 banyaknya digit yg diambil
$bln=substr($parameter2,5,2);
$tgl=substr($parameter2,-2); //mengambil 2 digit dari kanan

$tanggal=$tgl. "/".$bln."/".$thn;
$jam=$parameter3;
$waktu=$tanggal." .:::. ".$jam;

return $waktu;
}



// copy-paste-edit dari yg atas, kegunaaan dari function ini adalah untuk penyusunan laporan
function tgl_ina3($parameter){ //ini untuk mengubah format 2015-06-15 17:00:00 ke dalam format 15/06/2015

$thn=substr($parameter,2,2); //menngambil 2 digit dari kiri, 2 adalah index ketiga dari tahun (angka 1 dari 2015), 2 banyaknya digit yg diambil
$bln=substr($parameter,5,2);
$tgl=substr($parameter,-2); //mengambil 2 digit dari kanan

$tanggal=$tgl. "/".$bln."/".$thn;
$jam=$parameter3;
$waktu=$tanggal;

return $waktu;
}


// fungsi hari
//mengubah hari bahasa inggiris ke dalam bahasa indonesia
function hari_ina($day){
	if ($day=="Monday") {
		$hari="Senin";
	}
	elseif ($day=="Tuesday") {
		$hari="Selasa";
	}
	elseif ($day=="Wednesday") {
		$hari="Rabu";
	}
	elseif ($day=="Thursday") {
		$hari="Kamis";
	}
	elseif ($day=="Friday") {
		$hari="Jumat";
	}
	elseif ($day=="Saturday") {
		$hari="Sabtu";
	}
	elseif ($day=="Sunday") {
		$hari="Minggu";
	}

	return $hari;
}


// fugsi jangka waktu
 function jangkawaktu($waktu1,$waktu2)
{
	$start_date= new DateTime($waktu1);
	$end_date=new DateTime($waktu2);
	$interval=$start_date->diff($end_date);
	$selisih=$interval->d;
	$jangkawaktu=$selisih+1; // ditambah 1 karena yg dihitung bukan selisih hari,
	//tapi jangka waktu, dari tgl 11 sampai 13 adalah 3 hari.
	//bukan 13-11= 2 hari
	return $jangkawaktu;
}
?>
