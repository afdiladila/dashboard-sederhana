<?php
include 'koneksi.php';

$db = new Koneksi();
$conn = $db->getConnection();

$query = "SELECT * FROM perkuliahan";
$result = mysqli_query($conn, $query);

echo "<h2>Data Perkuliahan</h2>";

if (mysqli_num_rows($result) > 0) {

    echo "<table border='1' cellpadding='8' cellspacing='0'>";

    echo "<tr>
            <th>ID Perkuliahan</th>
            <th>NIM</th>
            <th>Kode Mata Kuliah</th>
            <th>NIDN</th>
            <th>Semester</th>
            <th>Nilai</th>
            <th>Tahun Akademik</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {

        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id_perkuliahan']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nim']) . "</td>";
        echo "<td>" . htmlspecialchars($row['kode_matkul']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nidn']) . "</td>";
        echo "<td>" . htmlspecialchars($row['semester']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nilai']) . "</td>";
        echo "<td>" . htmlspecialchars($row['tahun_akademik']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";

} else {
    echo "Data perkuliahan tidak ditemukan.";
}

$conn->close();
?>