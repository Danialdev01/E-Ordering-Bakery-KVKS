<center>
    <div class="pengguna-pensyarah-data-table p-2">
        <div class="mb-3">
        <div class="justify-end relative mb-4 flex w-full flex-wrap items-stretch">
            <input
            id="datatable-search-input1"
            type="search"
            class="max-w-sm relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
            placeholder="Search"
            aria-label="Search"
            aria-describedby="button-addon3" />
        </div>
        </div>
        <div id="datatable1"></div>
    </div>
</center>
<div class="tambah">
    <a href="tambah-pensyarah.php">
    <button style="background-color: black;border-radius:50%;width:40px;height:40px;color:white;font-size:1.3rem;position:relative;bottom:5%;left:90%">+</button>
    </a>
</div>

<script>
    const data1 = {
    columns: [
        'No',
        'Nama',
        'Bil Permohonan Telah Dibuat',
        { label: "Kemaskini", field: "kemaskini", sort: false },
        { label: "Delete", field: "delete", sort: false },
    ],
    rows: [
        <?php 

            $pengguna_pensyarah_sql = $pdo->prepare("SELECT * FROM pensyarah WHERE status_pensyarah = 1");
            $pengguna_pensyarah_sql->execute([]);

            $no = 0;
            while($pengguna_pensyarah = $pengguna_pensyarah_sql->fetch(PDO::FETCH_ASSOC)){
                $no++;
                
                $id_pensyarah = $pengguna_pensyarah['id_pensyarah'];
                $nama_pensyarah = $pengguna_pensyarah['nama_pensyarah'];

                $permohonan_pensyarah_sql = $pdo->prepare("SELECT * FROM permohonan WHERE id_pensyarah = ?");
                $permohonan_pensyarah_sql->execute([$id_pensyarah]);
                
                $permohonan_pensyarah_bil = 0;
                while($permohonan_pensyarah = $permohonan_pensyarah_sql->fetch(PDO::FETCH_ASSOC)){
                    $permohonan_pensyarah_bil++;
                }

                echo "[\"$no\", \"$nama_pensyarah\", \"$permohonan_pensyarah_bil\", \"<a href='kemaskini-pensyarah.php?id_pensyarah=$id_pensyarah'>kemaskini</a> \", \"<form method='post' action='../backend/pensyarah.php'><input type='hidden' name='token' value='$token'><input type='hidden' name='id_pensyarah' value='$id_pensyarah'><button type='submit' name='batal'>Batal</button></form> \"],";

            }
        ?>
    ],
};

const instance1 = new te.Datatable(document.getElementById('datatable1'), data1)

document.getElementById('datatable-search-input1').addEventListener('input', (e) => {
instance1.search(e.target.value);
});
</script>