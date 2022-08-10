<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List Siswa</title>
</head>
<body>
  <h3>Form Pencarian</h3>

  <form action="list-siswa.php" method="get">
  <label>Cari :</label>
  <input type="text" name="cari">
  <input type="submit" value="Cari">
  </form>

  <?php
  if(isset($_GET['cari'])){
  $cari = $_GET['cari'];
  echo "<b>Hasil pencarian : ".$cari."</b>";
  }
  ?>

  <table border="1">
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>Jenis Kelamin</th>
    <th>Agama</th>
    <th>Sekolah Asal</th>
    <th>Tindakan</th>
  </tr>
  <?php
  if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $data = mysqli_query($db,"select * from calon_siswa where id like
    '%".$cari."%' OR nama like
    '%".$cari."%' OR alamat like
    '%".$cari."%' OR jenis_kelamin like
    '%".$cari."%' OR agama like
    '%".$cari."%' OR sekolah_asal like
    '%".$cari."%'");
  }else{
    $data = mysqli_query($db,"select * from calon_siswa");
  }
  $no = 1;
  while($siswa = mysqli_fetch_array($data)){
  ?>
  <tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $siswa['nama']; ?></td>
    <td><?php echo $siswa['alamat']; ?></td>
    <td><?php echo $siswa['jenis_kelamin']; ?></td>
    <td><?php echo $siswa['agama']; ?></td>
    <td><?php echo $siswa['sekolah_asal']; ?></td>

    <td>
      <?php echo "<a href='form-edit.php?id=".$siswa['id']."'>Edit |</a>";
      echo "<a href='hapus.php?id=".$siswa['id']."'>Hapus</a>"; ?>
    </td>
  </tr>
  <?php } ?>
  </table>
  <a href="index.php">Kembali</a>
</body>
</html>