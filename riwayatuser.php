<?php
require 'functions.php';

// Query untuk mengambil riwayat
$sql = "SELECT * FROM riwayat ORDER BY waktu DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riwayat Aksi</title>
</head>

<body>
  <h1>Riwayat Aksi Pengguna</h1>

  <table border="1">
    <thead>
      <tr>
        <th>ID Riwayat</th>
        <th>ID User</th>
        <th>Tindakan</th>
        <th>Keterangan</th>
        <th>Waktu</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row['id_riwayat'] . "</td>";
          echo "<td>" . $row['id_user'] . "</td>";
          echo "<td>" . $row['tindakan'] . "</td>";
          echo "<td>" . $row['keterangan'] . "</td>";
          echo "<td>" . $row['waktu'] . "</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='5'>Belum ada riwayat aksi.</td></tr>";
      }
      ?>
    </tbody>
  </table>
</body>

</html>