<center>
    <div class="pengguna-admin-data-table p-2">
        <div class="mb-3">
        <div class="justify-end relative mb-4 flex w-full flex-wrap items-stretch">
            <input
            id="datatable-search-input2"
            type="search"
            class="max-w-sm relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
            placeholder="Search"
            aria-label="Search"
            aria-describedby="button-addon3" />
        </div>
        </div>
        <div id="datatable2"></div>
    </div>
</center>
<div class="tambah">
    <a href="tambah-admin.php">
    <button style="background-color: black;border-radius:50%;width:40px;height:40px;color:white;font-size:1.3rem;position:relative;bottom:5%;left:90%">+</button>
    </a>
</div>

<script>
    const data2 = {
    columns: [
        'No',
        'Nama',
        { label: "Kemaskini", field: "kemaskini", sort: false },
        { label: "Delete", field: "delete", sort: false },
    ],
    rows: [
        <?php 

            $pengguna_admin_sql = $pdo->prepare("SELECT * FROM admin");
            $pengguna_admin_sql->execute([]);

            $no = 0;
            while($pengguna_admin = $pengguna_admin_sql->fetch(PDO::FETCH_ASSOC)){
                $no++;
                
                $id_admin = $pengguna_admin['id_admin'];
                $nama_admin = $pengguna_admin['nama_admin'];

                echo "[\"$no\", \"$nama_admin\", \"<a href='kemaskini-admin.php?id_admin=$id_admin'>kemaskini</a> \", \"<form method='post' action='../backend/admin.php'><input type='hidden' name='token' value='$token'><input type='hidden' name='id_admin' value='$id_admin'><button type='submit' name='batal'>Batal</button></form> \"],";

            }
        ?>
    ],
};

const instance2 = new te.Datatable(document.getElementById('datatable2'), data2)

document.getElementById('datatable-search-input2').addEventListener('input', (e) => {
instance2.search(e.target.value);
});
</script>