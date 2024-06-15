<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "db_abxy");
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Periksa apakah pengguna sudah masuk atau belum


// REGISTRASI USER
// Fungsi Registrasi
function registrasi($data)
{
    global $conn;

    // Verifikasi eksistensi data POST
    if (!isset($data['nama'], $data['email'], $data['password'], $data['confirm_password'], $data['alamat'], $data['no_hp'], $data['id_tipe_user'])) {
        echo "Semua field harus diisi!";
        return false;
    }

    // Data dari formulir pengguna
    $nama = strtolower(stripslashes($data['nama']));
    $email = strtolower(stripslashes($data['email']));
    $password = $data['password'];
    $confirm_password = $data['confirm_password'];
    $alamat = strtolower(stripslashes($data['alamat']));
    $no_hp = $data['no_hp'];
    $id_tipe_user = $data['id_tipe_user'];

    // Set zona waktu yang sesuai, misalnya "Asia/Jakarta"
    date_default_timezone_set('Asia/Jakarta');

    // Dapatkan tanggal dan waktu saat ini dalam format yang sesuai
    $tgl_daftar = date('Y-m-d H:i:s');

    $gambar_user = 'default.jpg'; // Misalnya gambar default untuk pengguna baru

    // Verifikasi email
    $email = mysqli_real_escape_string($conn, $email);
    $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email sudah terdaftar!');window.location.href = 'login.php';</script>";
        return false;
    }

    // Verifikasi kata sandi
    if ($password !== $confirm_password) {
        echo "<script>alert('Kata sandi dan konfirmasi kata sandi tidak sesuai.');</script>";
        return false;
    }

    // Hashing kata sandi
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Mendapatkan ID User terakhir
    $result = mysqli_query($conn, "SELECT id_user FROM user ORDER BY id_user DESC LIMIT 1");
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $lastId = $row['id_user'];
    } else {
        $lastId = null;
    }

    // Membuat ID User baru
    if ($lastId) {
        $num = substr($lastId, 2); // Mengambil bagian numerik dari ID terakhir
        $newId = 'US' . str_pad((int) $num + 1, 8, '0', STR_PAD_LEFT);
    } else {
        $newId = 'US00000001'; // ID pertama jika belum ada data
    }

    // Insert data ke tabel user
    $query = "INSERT INTO user (id_user, id_tipe_user, nama_user, email, password, alamat, no_hp, tgl_daftar, gambar_user) 
              VALUES ('$newId', '$id_tipe_user', '$nama', '$email', '$hashed_password', '$alamat', '$no_hp', '$tgl_daftar', '$gambar_user')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Pendaftaran berhasil!'); window.location.href = 'login.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.location.href = 'login.php';</script>";
    }

    return mysqli_affected_rows($conn);
}

// Panggil fungsi registrasi dengan data POST
// $message = '';
// if (isset($_POST['register'])) {
//     $message = registrasi($_POST);
// }

// Fungsi Hapus User
function hapus($id_user)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM user WHERE id_user = '$id_user'");
    if (mysqli_affected_rows($conn) > 0) {
        // Jika berhasil, tampilkan alert
        echo "<script>alert('Data berhasil dihapus!');window.location.href='tambahuser.php'; </script>";
    } else {
        // Jika gagal, tampilkan alert
        echo "<script>
    alert('Data gagal dihapus!');
    window.location.href='tambahuser.php'; // Ganti dengan halaman tujuan Anda
    </script>";
    }
    return mysqli_affected_rows($conn);
}

// Panggil fungsi hapus jika parameter id_user diterima dari URL
if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];
    hapus($id_user);
}




// EDIT USER
// Periksa apakah formulir edit telah dikirim
if (isset($_POST['updateuser'])) {
    // Ambil data yang diperbarui dari formulir
    $id_user = $_POST['id_user'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $id_tipe_user = $_POST['id_tipe_user'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    // Periksa apakah gambar baru diunggah
    if (isset($_FILES['foto_anda']) && $_FILES['foto_anda']['name']) {
        // Jika gambar baru diunggah, simpan dan gunakan gambar baru
        $foto_anda = $_FILES['foto_anda']['name'];
        $tmp_name = $_FILES['foto_anda']['tmp_name'];
        move_uploaded_file($tmp_name, "imglandingpage/$foto_anda");
    } else {
        // Jika tidak ada gambar baru diunggah, tetap gunakan foto sebelumnya
        $foto_anda = isset($_POST['edit_image']) ? $_POST['edit_image'] : '';
    }


    // UPDATE USER
    // Eksekusi kueri SQL untuk memperbarui data pengguna
    $sql = "UPDATE user SET nama_user='$nama', email='$email', id_tipe_user='$id_tipe_user', alamat='$alamat', no_hp='$no_hp', gambar_user='$foto_anda' WHERE id_user='$id_user'";
    if ($conn->query($sql) === TRUE) {
        // Data berhasil diperbarui, tampilkan pesan sukses dengan JavaScript
        echo "<script>alert('Data berhasil diperbarui!');";
        echo "window.location.href = 'tambahuser.php';</script>";
        exit(); // Keluar dari skrip setelah pengalihan halaman
    } else {
        // Terjadi kesalahan, tampilkan pesan error
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}



// TAMBAH USER
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tambahuser'])) {
    // Tangkap data dari form
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $id_tipe_user = $_POST['id_tipe_user'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    // File upload
    $gambar_user = $_FILES['foto_anda']['name'];
    $temp_file = $_FILES['foto_anda']['tmp_name'];
    $target_directory = "imglandingpage/";
    $target_file = $target_directory . basename($gambar_user);

    // Mendapatkan ID User terakhir
    $result = mysqli_query($conn, "SELECT id_user FROM user ORDER BY id_user DESC LIMIT 1");
    $row = mysqli_fetch_assoc($result);
    $lastId = $row['id_user'];

    // Membuat ID User baru
    if ($lastId) {
        $num = substr($lastId, 2); // Mengambil bagian numerik dari ID terakhir
        $newId = 'US' . str_pad((int) $num + 1, 8, '0', STR_PAD_LEFT);
    } else {
        $newId = 'US00000001'; // ID pertama jika belum ada data
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Upload file gambar
    if (move_uploaded_file($temp_file, $target_file)) {
        try {
            // Query untuk menambahkan pengguna ke database
            $sql = "INSERT INTO user (id_user, id_tipe_user, nama_user, email, password, alamat, no_hp, tgl_daftar, gambar_user)
                    VALUES ('$newId', '$id_tipe_user', '$nama', '$email', '$hashed_password', '$alamat', '$no_hp', NOW(), '$gambar_user')";

            if ($conn->query($sql) === TRUE) {
                echo "<script> alert'Pengguna berhasil ditambahkan.';</script>";
            } else {
                throw new Exception("Error: " . $sql . "<br>" . $conn->error);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}



// HAPUS BARANG
if (isset($_GET['hapus_barang'])) {
    // Ambil ID barang dari parameter URL
    $id_barang = $_GET['id_barang'];

    // Ambil ID kategori barang sebelum menghapus barang
    $sql_get_kategori = "SELECT id_kategori FROM barang WHERE id_barang = ?";
    $stmt_get_kategori = $conn->prepare($sql_get_kategori);
    $stmt_get_kategori->bind_param("s", $id_barang);

    // Periksa apakah persiapan query berhasil
    if ($stmt_get_kategori->execute()) {
        // Simpan hasil query
        $result_get_kategori = $stmt_get_kategori->get_result();

        // Periksa apakah ada baris hasil
        if ($result_get_kategori->num_rows > 0) {
            // Ambil data kategori
            $row_kategori = $result_get_kategori->fetch_assoc();
            $id_kategori_barang = $row_kategori['id_kategori'];

            // Hapus terlebih dahulu entri terkait di tabel riwayat
            $sql_delete_riwayat = "DELETE FROM riwayat WHERE id_barang = ?";
            $stmt_riwayat = $conn->prepare($sql_delete_riwayat);

            // Periksa apakah persiapan query berhasil
            if ($stmt_riwayat) {
                // Bind parameter
                $stmt_riwayat->bind_param("s", $id_barang);

                // Eksekusi pernyataan untuk menghapus riwayat terkait dari tabel riwayat
                if ($stmt_riwayat->execute()) {
                    // Setelah menghapus riwayat, hapus barang dari tabel barang
                    $sql_delete_barang = "DELETE FROM barang WHERE id_barang = ?";
                    $stmt_barang = $conn->prepare($sql_delete_barang);

                    // Periksa apakah persiapan query berhasil
                    if ($stmt_barang) {
                        // Bind parameter
                        $stmt_barang->bind_param("s", $id_barang);

                        // Eksekusi pernyataan untuk menghapus barang dari tabel barang
                        if ($stmt_barang->execute()) {
                            // Setelah menghapus barang, kurangi jumlah barang di kategori terkait
                            $sql_update_kategori = "UPDATE kategori SET jumlah = jumlah - 1 WHERE id_kategori = ?";
                            $stmt_update_kategori = $conn->prepare($sql_update_kategori);

                            // Periksa apakah persiapan query berhasil
                            if ($stmt_update_kategori) {
                                // Bind parameter
                                $stmt_update_kategori->bind_param("s", $id_kategori_barang);

                                // Eksekusi pernyataan untuk mengurangi jumlah barang di kategori terkait
                                if (!$stmt_update_kategori->execute()) {
                                    echo "Error saat mengurangi jumlah barang di kategori: " . $stmt_update_kategori->error;
                                }
                            } else {
                                echo "Error saat menyiapkan pernyataan SQL untuk mengurangi jumlah barang di kategori: " . $conn->error;
                            }

                            // Redirect ke halaman yang sesuai setelah menghapus barang
                            header("Location: tambah-barang.php");
                            exit();
                        } else {
                            echo "Error saat menghapus barang: " . $stmt_barang->error;
                        }
                    } else {
                        echo "Error saat menyiapkan pernyataan SQL untuk menghapus barang: " . $conn->error;
                    }
                } else {
                    echo "Error saat menghapus riwayat: " . $stmt_riwayat->error;
                }
            } else {
                echo "Error saat menyiapkan pernyataan SQL untuk menghapus riwayat: " . $conn->error;
            }
        } else {
            echo "Error: Kategori barang tidak ditemukan.";
        }
    } else {
        echo "Error saat mengeksekusi pernyataan SQL untuk mendapatkan kategori barang: " . $stmt_get_kategori->error;
    }
}

// EDIT BARANG

if (isset($_POST['updatebarang'])) {
    // Ambil data yang diperbarui dari formulir
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $id_kategori_baru = $_POST['id_kategori'];
    $harga = $_POST['harga'];
    $id_user = $_SESSION['id_user'];

    // Periksa apakah gambar baru diunggah
    if (isset($_FILES['gambar_barang']['name']) && $_FILES['gambar_barang']['name']) {
        // Jika gambar baru diunggah, simpan dan gunakan gambar baru
        $gambar_barang = $_FILES['gambar_barang']['name'];
        $tmp_name = $_FILES['gambar_barang']['tmp_name'];
        move_uploaded_file($tmp_name, "imglandingpage/$gambar_barang");
    } else {
        // Jika tidak ada gambar baru diunggah, tetap gunakan foto sebelumnya
        $gambar_barang = isset($_POST['edit_gambar']) ? $_POST['edit_gambar'] : '';
    }

    // Dapatkan kategori lama
    $queryOldKategori = "SELECT id_kategori FROM barang WHERE id_barang = '$id_barang'";
    $resultOldKategori = mysqli_query($conn, $queryOldKategori);
    $rowOldKategori = mysqli_fetch_assoc($resultOldKategori);
    $id_kategori_lama = $rowOldKategori['id_kategori'];

    // Eksekusi kueri SQL untuk memperbarui data barang
    $sql = "UPDATE barang SET id_user='$id_user', nama_barang='$nama_barang', id_kategori='$id_kategori_baru', harga='$harga', gambar_barang='$gambar_barang', tanggal_masuk=NOW() WHERE id_barang='$id_barang'";

    if ($conn->query($sql) === TRUE) {
        // Data berhasil diperbarui, tambahkan entri riwayat

        // Update jumlah kategori jika berubah
        if ($id_kategori_lama != $id_kategori_baru) {
            $updateKategoriLama = "UPDATE kategori SET jumlah = jumlah - 1 WHERE id_kategori = '$id_kategori_lama'";
            $updateKategoriBaru = "UPDATE kategori SET jumlah = jumlah + 1 WHERE id_kategori = '$id_kategori_baru'";
            mysqli_query($conn, $updateKategoriLama);
            mysqli_query($conn, $updateKategoriBaru);
        }

        // Mendapatkan ID Riwayat terakhir
        $result_riwayat = mysqli_query($conn, "SELECT id_riwayat FROM riwayat ORDER BY id_riwayat DESC LIMIT 1");
        if ($result_riwayat && mysqli_num_rows($result_riwayat) > 0) {
            $row_riwayat = mysqli_fetch_assoc($result_riwayat);
            $lastIdRiwayat = $row_riwayat['id_riwayat'];
            $newIdRiwayat = $lastIdRiwayat + 1;
        } else {
            $newIdRiwayat = 1; // ID pertama jika belum ada data
        }

        // Masukkan entri baru ke dalam tabel riwayat
        $sql_riwayat = "INSERT INTO riwayat (id_riwayat, id_user, id_barang, tindakan, waktu) VALUES ('$newIdRiwayat', '$id_user', '$id_barang', 'Edit', NOW())";
        if ($conn->query($sql_riwayat) === TRUE) {
            // Data riwayat berhasil ditambahkan, tampilkan pesan sukses dengan JavaScript
            echo "<script>alert('Data berhasil diperbarui!');
            window.location.href = 'tambah-barang.php';</script>"; // Redirect ke halaman tambahbarang.php setelah berhasil memperbarui
            exit(); // Keluar dari skrip setelah pengalihan halaman
        } else {
            // Terjadi kesalahan saat menambahkan data riwayat
            echo "Error: " . $sql_riwayat . "<br>" . $conn->error;
        }
    } else {
        // Terjadi kesalahan saat memperbarui data barang
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// TAMBAH BARANG
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tambahbarang'])) {
    // Tangkap data dari form
    $nama_barang = $_POST['nama_barang'];
    $id_kategori = $_POST['kategori']; // Ubah $_POST['id_kategori'] menjadi $_POST['kategori']
    $harga = $_POST['harga'];

    // Sekarang Anda dapat mengakses data pengguna yang disimpan dalam sesi
    $id_user = $_SESSION['id_user'];

    // File upload
    $gambar_barang = $_FILES['gambar_barang']['name'];
    $temp_file = $_FILES['gambar_barang']['tmp_name'];
    $target_directory = "imglandingpage/";
    $target_file = $target_directory . basename($gambar_barang);

    // Mendapatkan ID Barang terakhir
    $result = mysqli_query($conn, "SELECT id_barang FROM barang ORDER BY id_barang DESC LIMIT 1");
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $lastId = $row['id_barang'];
        // Membuat ID Barang baru
        $num = substr($lastId, 2); // Mengambil bagian numerik dari ID terakhir
        $newIdBarang = 'BR' . str_pad((int) $num + 1, 8, '0', STR_PAD_LEFT);
    } else {
        $newIdBarang = 'BR00000001'; // ID pertama jika belum ada data
    }

    // Upload file gambar
    if (move_uploaded_file($temp_file, $target_file)) {
        try {
            // Query untuk menambahkan barang ke database
            $sql = "INSERT INTO barang (id_barang, id_user, nama_barang, id_kategori, harga, gambar_barang, tanggal_masuk)
                    VALUES ('$newIdBarang', '$id_user', '$nama_barang', '$id_kategori', '$harga', '$gambar_barang', NOW())";

            if (mysqli_query($conn, $sql)) {
                // Barang berhasil ditambahkan

                // Perbarui jumlah pada kategori
                $update_kategori = "UPDATE kategori SET jumlah = jumlah + 1 WHERE id_kategori = '$id_kategori'";
                if (!mysqli_query($conn, $update_kategori)) {
                    throw new Exception("Error updating category quantity: " . mysqli_error($conn));
                }

                // Mendapatkan ID Riwayat terakhir
                $result_riwayat = mysqli_query($conn, "SELECT id_riwayat FROM riwayat ORDER BY id_riwayat DESC LIMIT 1");
                if ($result_riwayat && mysqli_num_rows($result_riwayat) > 0) {
                    $row_riwayat = mysqli_fetch_assoc($result_riwayat);
                    $lastIdRiwayat = $row_riwayat['id_riwayat'];
                    $newIdRiwayat = $lastIdRiwayat + 1;
                } else {
                    $newIdRiwayat = 1; // ID pertama jika belum ada data
                }

                // Masukkan entri baru ke dalam tabel riwayat
                $sql_riwayat = "INSERT INTO riwayat (id_riwayat, id_user, id_barang, tindakan, waktu) VALUES ('$newIdRiwayat', '$id_user', '$newIdBarang', 'Tambah', NOW())";
                if (mysqli_query($conn, $sql_riwayat)) {
                    // Riwayat berhasil dicatat
                    echo "<script>
                        alert('Barang Berhasil ditambah!');
                        window.location.href = 'tambah-barang.php';
                    </script>";
                } else {
                    // Terjadi kesalahan saat mencatat riwayat
                    throw new Exception("Error: " . mysqli_error($conn));
                }
            } else {
                // Terjadi kesalahan saat menambahkan barang
                throw new Exception("Error: " . mysqli_error($conn));
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else {
        // Gagal mengunggah file gambar
        echo "Maaf, ada masalah saat mengunggah file gambar.";
    }
}


