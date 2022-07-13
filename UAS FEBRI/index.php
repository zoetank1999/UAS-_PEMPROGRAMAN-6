<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<?php
include 'config.php';
?>

<h3>Form Pencarian</h3>

<form action="index.php" method="get">
    <label>Cari :</label>
    <input type="text" name="cari">
    <input type="submit" value="Cari">
</form>

<?php
if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    echo "<b>Hasil pencarian : " . $cari . "</b>";
}
?>
<body>
    <table class="table table-striped" border="1"> 
    <thead> 
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Nama Panjang</th>
            <th scope="col">Tgl Lahir</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Kelas</th>
            <th scope="col">Point</th>
        </tr>     
    <thead>
        
    <?php
    if (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        $data = mysqli_query($kon, "select * from students where name like '%" . $cari . "%'");
    } else {
        $data = mysqli_query($kon, "select * from students ");
    }
    $no = 1;
    while ($d = mysqli_fetch_array($data)) {
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['name']; ?></td>
            <td><?php echo $d['surname']; ?></td>
            <td><?php echo $d['birthdate']; ?></td>
            <td><?php echo $d['gender']; ?></td>
            <td><?php echo $d['class']; ?></td>
            <td><?php echo $d['point']; ?></td>

        </tr>
    <?php } ?>
</table>

<script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



