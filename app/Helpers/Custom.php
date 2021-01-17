<?php

use App\Pengaturan;

function profil()
{
    return Pengaturan::where('id','1')->first();
}



function tgl_indo($tgl, $tampil_hari = FALSE)
{
    $nama_hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
    $nama_bulan = array(
        1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
        "September", "Oktober", "November", "Desember");
    $tahun = substr($tgl, 0, 4);
    $bulan = $nama_bulan[(int)substr($tgl, 5, 2)];
    $tanggal = substr($tgl, 8, 2);
    $text = "";
    if ($tampil_hari) {
        $urutan_hari = date('w', mktime(0, 0, 0, substr($tgl, 5, 2), $tanggal, $tahun));
        $hari = $nama_hari[$urutan_hari];
        $text .= $hari . ", ";
    }
    $text .= $tanggal . " " . $bulan . " " . $tahun;
    return $text;
}

function hari_tgl_indo($tgl, $tampil_hari = TRUE)
{
    $nama_hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
    $nama_bulan = array(
        1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
        "September", "Oktober", "November", "Desember");
    $tahun = substr($tgl, 0, 4);
    $bulan = $nama_bulan[(int)substr($tgl, 5, 2)];
    $tanggal = substr($tgl, 8, 2);
    $text = "";
    if ($tampil_hari) {
        $urutan_hari = date('w', mktime(0, 0, 0, substr($tgl, 5, 2), $tanggal, $tahun));
        $hari = $nama_hari[$urutan_hari];
        $text .= $hari . " , ";
    }
    $text .= $tanggal . " " . $bulan . " " . $tahun;
    return $text;
}

function bulan($tgl)
{
    $nama_bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
        "September", "Oktober", "November", "Desember");
    return $nama_bulan[(int)substr($tgl, 5, 2)];
}


function monthsArray()
{
    return array(
        1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
        "September", "Oktober", "November", "Desember");
}


function dateTime($dateTime)
{
    $date = substr($dateTime, 0, 10);
    $dateReformat = tgl_indo($date);
    $time = substr($dateTime, -8, 5);
    return array('date' => $dateReformat, 'time' => $time);
}


function romawi($bulan)
{
    if ($bulan == "1") {
        $result = "I";
    } else if ($bulan == "2") {
        $result = "II";
    } else if ($bulan == "3") {
        $result = "III";
    } else if ($bulan == "4") {
        $result = "IV";
    } else if ($bulan == "5") {
        $result = "V";
    } else if ($bulan == "6") {
        $result = "VI";
    } else if ($bulan == "7") {
        $result = "VII";
    } else if ($bulan == "8") {
        $result = "VIII";
    } else if ($bulan == "9") {
        $result = "IX";
    } else if ($bulan == "10") {
        $result = "X";
    } else if ($bulan == "11") {
        $result = "XI";
    } else if ($bulan == "12") {
        $result = "XII";
    } else {
        $result = "Terjadi Kesalahan";
    }

    return $result;
}

function getBulan($tgl)
{

    return (int)substr($tgl, 5, 2);

}

function getTahun($tgl)
{

    return (int)substr($tgl, 0, 4);

}


function jk($string)
{
    if ($string == "L") {
        $result = "Laki Laki";
    } else if ($string == "P") {
        $result = "Perempuan";
    } else {
        $result = "";
    }
    return $result;
}


function removeDot($str)
{
    return str_replace('.', '', $str);
}

function roleUser()
{
    // return activeGuard();
    return auth()->user()->role;
}

function activeGuard()
{

    foreach (array_keys(config('auth.guards')) as $guard) {

        if (auth()->guard($guard)->check()) return $guard;

    }
    return NULL;
}




function slugToString($slug)
{
    return ucwords(strtolower(str_replace('-', ' ', $slug)));
}



