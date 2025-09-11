<?php
// Konfigurasi database
$host = "localhost";
$user = "root";       // sesuaikan dengan user database
$pass = "";           // sesuaikan dengan password database
$db   = "rpl_usti";

// Koneksi ke database
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$nama_lengkap       = $_POST['nama_lengkap'];
$tempat_lahir       = $_POST['tempat_lahir'];
$tanggal_lahir      = $_POST['tanggal_lahir'];
$jenis_kelamin      = $_POST['jenis_kelamin'];
$agama              = $_POST['agama'];
$status_perkawinan  = $_POST['status_perkawinan'];
$kewarganegaraan    = $_POST['kewarganegaraan'];
$alamat             = $_POST['alamat'];
$kode_pos           = $_POST['kode_pos'];
$no_telepon         = $_POST['no_telepon'];
$email              = $_POST['email'];
$jalur_rpl          = $_POST['jalur_rpl'];
$program_studi      = $_POST['program_studi'];

$pendidikan_terakhir = $_POST['pendidikan_terakhir'];
$asal_sekolah_pt    = $_POST['asal_sekolah_pt'];
$asal_jurusan       = $_POST['asal_jurusan'];
$asal_program_studi = $_POST['asal_program_studi'];
$tahun_lulus        = $_POST['tahun_lulus'];

// Upload file
$dir_upload = "uploads/"; 
if (!is_dir($dir_upload)) {
    mkdir($dir_upload, 0777, true);
}

// Formulir RPL
$file_formulir = "";
if (!empty($_FILES['file_formulir']['name'])) {
    $file_formulir = $dir_upload . time() . "_formulir_" . basename($_FILES['file_formulir']['name']);
    move_uploaded_file($_FILES['file_formulir']['tmp_name'], $file_formulir);
}

// Formulir Evaluasi
$file_evaluasi = "";
if (!empty($_FILES['file_evaluasi']['name'])) {
    $file_evaluasi = $dir_upload . time() . "_evaluasi_" . basename($_FILES['file_evaluasi']['name']);
    move_uploaded_file($_FILES['file_evaluasi']['tmp_name'], $file_evaluasi);
}

// CV
$file_cv = "";
if (!empty($_FILES['file_cv']['name'])) {
    $file_cv = $dir_upload . time() . "_cv_" . basename($_FILES['file_cv']['name']);
    move_uploaded_file($_FILES['file_cv']['tmp_name'], $file_cv);
}

// Nilai
$file_nilai = "";
if (!empty($_FILES['file_nilai']['name'])) {
    $file_nilai = $dir_upload . time() . "_nilai_" . basename($_FILES['file_nilai']['name']);
    move_uploaded_file($_FILES['file_nilai']['tmp_name'], $file_nilai);
}

// Pendukung
$file_pendukung = "";
if (!empty($_FILES['file_pendukung']['name'])) {
    $file_pendukung = $dir_upload . time() . "_pendukung_" . basename($_FILES['file_pendukung']['name']);
    move_uploaded_file($_FILES['file_pendukung']['tmp_name'], $file_pendukung);
}

// Query simpan
$sql = "INSERT INTO pendaftaran 
(nama_lengkap, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, status_perkawinan, kewarganegaraan, alamat, kode_pos, no_telepon, email, jalur_rpl, program_studi, pendidikan_terakhir, asal_sekolah_pt, asal_jurusan, asal_program_studi, tahun_lulus, file_formulir, file_evaluasi, file_cv, file_nilai, file_pendukung) 
VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssssssssssssssssss", 
    $nama_lengkap, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $agama, 
    $status_perkawinan, $kewarganegaraan, $alamat, $kode_pos, $no_telepon, 
    $email, $jalur_rpl, $program_studi, $pendidikan_terakhir, 
    $asal_sekolah_pt, $asal_jurusan, $asal_program_studi, $tahun_lulus, 
    $file_formulir, $file_evaluasi, $file_cv, $file_nilai, $file_pendukung
);

if ($stmt->execute()) {
    header("Location: pendaftaran.html?status=success");
    exit;
} else {
    header("Location: pendaftaran.html?status=error");
    exit;
}


$stmt->close();
$conn->close();
?>
