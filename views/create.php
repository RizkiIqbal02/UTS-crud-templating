
<?php

require_once('../views/layouts/header.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  insertBuku();
}

$kategori = getKategori();
// print data $karyawan
// echo json_encode($kategori);die;

?>

<body>
  <div class="login-container">
    <div class="card">
      <div class="card-body">
        <form method="post" action="">
          <div>
            <label for="">Nama : </label>
            <input type="text" name="nama">
          </div>
          <div>
          <label for="">Kategori : </label>
            <select name="category_id">
              <?php foreach($kategori as $kat) { ?>
                <option value="<?php echo $kat['id'] ?>"><?php echo $kat['nama'] ?></option>
              <?php  } ?>
           </select>

          </div>
          <button type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>

<?php 
require_once('../views/layouts/footer.php');
?>