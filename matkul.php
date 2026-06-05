<?php
include 'koneksi.php';

$db = new Koneksi();
$conn = $db->getConnection();

$query = "SELECT * FROM matkul";
$result = mysqli_query($conn, $query);

echo "<h2>Data Mata Kuliah</h2>";

if (mysqli_num_rows($result) > 0) {

    echo "<table border='1' cellpadding='8' cellspacing='0'>";

    echo "<tr>
            <th>Kode Mata Kuliah</th>
            <th>Nama Mata Kuliah</th>
            <th>SKS</th>
            <th>Semester</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {

        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['kode_matkul']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nama_matkul']) . "</td>";
        echo "<td>" . htmlspecialchars($row['sks']) . "</td>";
        echo "<td>" . htmlspecialchars($row['semester']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";

} else {
    echo "Data mata kuliah tidak ditemukan.";
}

$conn->close();
?>