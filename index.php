<?php

include 'koneksi.php';

$db = new Koneksi();
$conn = $db->getConnection();

$page = $_GET['page'] ?? 'dashboard';

$jml_mhs = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM mahasiswa")
)['total'];

$jml_dosen = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM dosen")
)['total'];

$jml_matkul = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM matkul")
)['total'];

$jml_perkuliahan = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM perkuliahan")
)['total'];

?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>SIAKAD Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<style>

body{
    margin:0;
    background:#f5f7fb;
    font-family:'Segoe UI',sans-serif;
}

.sidebar{
    width:240px;
    height:100vh;
    position:fixed;
    left:0;
    top:0;
    background:#162447;
}

.logo{
    padding:25px;
    color:white;
    border-bottom:1px solid rgba(255,255,255,.15);
}

.menu{
    margin-top:10px;
}

.menu a{
    display:block;
    color:white;
    text-decoration:none;
    padding:15px 25px;
    transition:.3s;
}

.menu a:hover{
    background:#1f4068;
}

.menu a.active{
    background:#2563eb;
    border-left:4px solid white;
}

.main{
    margin-left:240px;
}

.topbar{
    background:white;
    padding:20px 30px;
    box-shadow:0 2px 10px rgba(0,0,0,.05);
}

.content{
    padding:25px;
}

.welcome{
    background:linear-gradient(90deg,#2563eb,#7c3aed);
    color:white;
    border-radius:15px;
    padding:25px;
    margin-bottom:25px;
}

.card-stat{
    border:none;
    border-radius:15px;
    box-shadow:0 4px 12px rgba(0,0,0,.08);
}

.jumlah{
    font-size:35px;
    font-weight:bold;
}

.table-card{
    background:white;
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 4px 12px rgba(0,0,0,.08);
}

.table-header{
    padding:15px 20px;
    color:white;
    font-size:18px;
    font-weight:bold;
}

.header-mahasiswa{
    background:linear-gradient(90deg,#2563eb,#3b82f6);
}

.header-dosen{
    background:linear-gradient(90deg,#16a34a,#22c55e);
}

.header-matkul{
    background:linear-gradient(90deg,#d97706,#f59e0b);
}

.header-perkuliahan{
    background:linear-gradient(90deg,#dc2626,#ef4444);
}

.dataTables_wrapper{
    padding:15px;
}

</style>

</head>
<body>

<div class="sidebar">

    <div class="logo">
        <h4>SIAKAD</h4>
        <small>Sistem Informasi Akademik</small>
    </div>

    <div class="menu">

        <a href="index.php"
        class="<?= ($page=='dashboard') ? 'active' : '' ?>">
        Dashboard
        </a>

        <a href="?page=mahasiswa"
        class="<?= ($page=='mahasiswa') ? 'active' : '' ?>">
        Mahasiswa
        </a>

        <a href="?page=dosen"
        class="<?= ($page=='dosen') ? 'active' : '' ?>">
        Dosen
        </a>

        <a href="?page=matkul"
        class="<?= ($page=='matkul') ? 'active' : '' ?>">
        Mata Kuliah
        </a>

        <a href="?page=perkuliahan"
        class="<?= ($page=='perkuliahan') ? 'active' : '' ?>">
        Perkuliahan
        </a>

    </div>

</div>

<div class="main">

<div class="topbar">
    <h4>Dashboard SIAKAD</h4>
</div>

<div class="content">

<?php if($page == 'dashboard'){ ?>

<div class="welcome">
    <h3>Halo Afdila 👋</h3>
    <p>Selamat datang di Sistem Informasi Akademik</p>
</div>

<div class="row">

    <div class="col-md-3 mb-3">
        <div class="card card-stat">
            <div class="card-body text-center">
                <h5>Mahasiswa</h5>
                <div class="jumlah text-primary">
                    <?= $jml_mhs ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card card-stat">
            <div class="card-body text-center">
                <h5>Dosen</h5>
                <div class="jumlah text-success">
                    <?= $jml_dosen ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card card-stat">
            <div class="card-body text-center">
                <h5>Mata Kuliah</h5>
                <div class="jumlah text-warning">
                    <?= $jml_matkul ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card card-stat">
            <div class="card-body text-center">
                <h5>Perkuliahan</h5>
                <div class="jumlah text-danger">
                    <?= $jml_perkuliahan ?>
                </div>
            </div>
        </div>
    </div>

</div>

<?php } ?>

<?php

if($page != 'dashboard'){

    $query = "";
    $judul = "";
    $warna = "";

    if($page == 'mahasiswa'){
        $query = "SELECT * FROM mahasiswa";
        $judul = "Data Mahasiswa";
        $warna = "header-mahasiswa";
    }

    if($page == 'dosen'){
        $query = "SELECT * FROM dosen";
        $judul = "Data Dosen";
        $warna = "header-dosen";
    }

    if($page == 'matkul'){
        $query = "SELECT * FROM matkul";
        $judul = "Data Mata Kuliah";
        $warna = "header-matkul";
    }

    if($page == 'perkuliahan'){
        $query = "SELECT * FROM perkuliahan";
        $judul = "Data Perkuliahan";
        $warna = "header-perkuliahan";
    }

    if($query != ""){

        $result = mysqli_query($conn, $query);

        echo "<div class='table-card'>";
        echo "<div class='table-header $warna'>$judul</div>";

        echo "<table id='datatable' class='table table-striped table-hover'>";

        echo "<thead><tr>";

        $fields = mysqli_fetch_fields($result);

        foreach($fields as $field){
            echo "<th>{$field->name}</th>";
        }

        echo "</tr></thead>";

        echo "<tbody>";

        while($row = mysqli_fetch_assoc($result)){

            echo "<tr>";

            foreach($row as $data){
                echo "<td>".htmlspecialchars($data)."</td>";
            }

            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    }
}
?>

</div>
</div>

<script>
$(document).ready(function() {

    $('#datatable').DataTable({
        pageLength: 5,
        lengthMenu: [
            [5,10,15,25,50],
            [5,10,15,25,50]
        ]
    });

});
</script>

</body>
</html>