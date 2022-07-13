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

<table border="1">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Nama Panjang</th>
        <th>Tgl Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Kelas</th>
        <th>Point</th>

    </tr>
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