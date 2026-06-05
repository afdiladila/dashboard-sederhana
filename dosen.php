<?php
include 'koneksi.php';

$db = new Koneksi();
$conn = $db->getConnection();

$query = "SELECT * FROM dosen";
$result = mysqli_query($conn, $query);

echo "<h2>Data Dosen</h2>";

if (mysqli_num_rows($result) > 0) {

    echo "<table border='1' cellpadding='8' cellspacing='0'>";

    $fields = mysqli_fetch_fields($result);

    echo "<tr>";
    foreach ($fields as $field) {
        echo "<th>{$field->name}</th>";
    }
    echo "</tr>";

    while ($row = mysqli_fetch_assoc($result)) {

        echo "<tr>";

        foreach ($row as $data) {
            echo "<td>" . htmlspecialchars($data) . "</td>";
        }

        echo "</tr>";
    }

    echo "</table>";

} else {
    echo "Data dosen tidak ditemukan.";
}

mysqli_close($conn);
?>