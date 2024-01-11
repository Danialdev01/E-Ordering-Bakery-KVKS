<?php $title = "Barang Basah"; $location_index = "../.."; include('../../components/head.php')?>
<body>
    <?php $location_index = "../.."; include('./components/header.php')?>
    <center>
        <form action="../backend/pengguna.php" method="post">
            <input name="nama_admin" type="text">
            <input name="password_admin" type="text">
            <input name="password_admin_ulangan" type="text">
            <button name="tambah_admin" type="submit">Tambah</button>
        </form>
    </center>
    <?php $location_index = "../..";include('../../components/footer.php') ?>   
</body>
</html>
