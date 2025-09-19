<?php
if (isset($_POST['submit'])) {
    // 🔹 Koneksi DB InfinityFree
    $host     = "sql201.infinityfree.com"; // ganti sesuai cPanel
    $user     = "if0_39942924"; 
    $password = "R4eYSKONyJ9rmz"; 
    $database = "if0_39942924_rpl_usti"; 

    $conn = mysqli_connect($host, $user, $password, $database);
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // 🔹 Data dari form (contoh sebagian saja, tambahkan sesuai formmu)
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

    // 🔹 Upload file (simpan ke folder "uploads/")
    $upload_dir = "uploads/";

    // Pastikan folder ada
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    function uploadFile($file, $upload_dir) {
        $target = $upload_dir . basename($file["name"]);
        if (move_uploaded_file($file["tmp_name"], $target)) {
            return $target;
        } else {
            return null;
        }
    }

    $formulir_aplikasi = uploadFile($_FILES["file_formulir"], $upload_dir);
    $evaluasi_diri     = uploadFile($_FILES["file_evaluasi"], $upload_dir);
    $cv                = uploadFile($_FILES["file_cv"], $upload_dir);
    $transkrip         = uploadFile($_FILES["file_nilai"], $upload_dir);
    $pendukung         = uploadFile($_FILES["file_pendukung"], $upload_dir);

    // 🔹 Simpan ke database
    $sql = "INSERT INTO pendaftaran 
        (nama_lengkap, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, status_perkawinan, kewarganegaraan, alamat, kode_pos, no_telepon, email, jalur_rpl, program_studi, pendidikan_terakhir, asal_sekolah_pt, asal_jurusan, asal_program_studi, tahun_lulus, file_formulir, file_evaluasi, file_cv, file_nilai, file_pendukung) 
        VALUES 
        ('$nama_lengkap', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$agama', '$status_perkawinan', '$kewarganegaraan', ' $alamat', '$kode_pos', '$no_telepon', '$email', '$jalur_rpl', '$program_studi', '$pendidikan_terakhir', '$asal_sekolah_pt', '$asal_jurusan', '$asal_program_studi', '$tahun_lulus', '$formulir_aplikasi', '$evaluasi_diri', '$cv', '$transkrip', '$pendukung')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Pendaftaran dan upload file berhasil!');
                window.location='pendaftaran.html';
              </script>";
    } else {
        echo "<script>
                alert('Gagal: " . mysqli_error($conn) . "');
                window.location='pendaftaran.html';
              </script>";
    }

    mysqli_close($conn);
}
?>
