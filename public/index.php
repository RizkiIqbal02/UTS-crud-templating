
<?php
require_once('../views/layouts/header.php');


$buku = getBuku();

// print data $karyawan
// echo json_encode($buku);die;

?>

<body>
  <div class="login-container">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Buku List</h5>
        
        <button type="button" class="btn btn-outline-primary"><a href="../views/create.php">Tambah</a></button>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Kategori</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($buku as $index => $k) { ?>
              <tr>
                <td><?php echo $index + 1 ?></td>
                <td><?php echo $k['nama'] ?></td>
                <td><?php echo $k['nama_kategori'] ?></td>
                <td><a href="../views/update.php?id=<?php echo $k['id'] ?>">Update</a> | <a href="../views/delete.php?id=<?php echo $k['id'] ?>">Hapus</a></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

<?php  
require_once('../views/layouts/footer.php');
?>