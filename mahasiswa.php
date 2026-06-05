<?php
include 'koneksi.php';

$db = new Koneksi();
$conn = $db->getConnection();

$query = "SELECT * FROM mahasiswa";
$result = mysqli_query($conn, $query);

echo "<h2>Data Mahasiswa</h2>";

if (mysqli_num_rows($result) > 0) {

    echo "<table border='1' cellpadding='8' cellspacing='0'>";
    
    echo "<tr>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Angkatan</th>
            <th>Alamat</th>
            <th>Email</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {

        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['nim']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nama_mhs']) . "</td>";
        echo "<td>" . htmlspecialchars($row['angkatan']) . "</td>";
        echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";

} else {
    echo "Data mahasiswa tidak ditemukan.";
}

mysqli_close($conn);
?>