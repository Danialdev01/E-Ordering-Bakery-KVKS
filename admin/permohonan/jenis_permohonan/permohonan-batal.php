<center>
    <div class="baru-data-table p-2">
        <div class="mb-3">
            <div class="justify-end relative mb-4 flex w-full flex-wrap items-stretch">
                <input
                id="datatable-search-input3"
                type="search"
                class="max-w-sm relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                placeholder="Search"
                aria-label="Search"
                aria-describedby="button-addon2" />
            </div>
        </div>

        <div id="datatable3"></div>

    </div>
</center>
<script>
    const data3 = {
    columns: [
        'Tajuk Permohonan',
        'Nama Pensyarah',
        'Nama Kelas',
        'Tarikh Permintaan',
        'Tarikh Penggunaan',
        { label: "Aktif Kembali", field: "lihat", sort: false },
        { label: "Borang", field: "borang", sort: false },
    ],
    rows: [
        <?php 
            
            $permohonan_batal_sql = $pdo->prepare("SELECT * FROM permohonan WHERE status_permohonan = 0");
            $permohonan_batal_sql->execute();      
            
            $no = 0;
            while($permohonan_batal = $permohonan_batal_sql->fetch(PDO::FETCH_ASSOC)){
                $no++;

                $id_permohonan = $permohonan_batal['id_permohonan'];
                $id_pensyarah = $permohonan_batal['id_pensyarah'];
                $nama_kelas_permohonan = $permohonan_batal['nama_kelas_permohonan'];
                $nama_tajuk_permohonan = $permohonan_batal['nama_tajuk_permohonan'];
                $tarikh_permintaan_permohonan = $permohonan_batal['tarikh_permintaan_permohonan'];
                $tarikh_penggunaan_permohonan = $permohonan_batal['tarikh_penggunaan_permohonan'];

                $pensyarah_sql = $pdo->prepare("SELECT * FROM pensyarah WHERE id_pensyarah = ?");
                $pensyarah_sql->execute([$id_pensyarah]);
                $pensyarah = $pensyarah_sql->fetch(PDO::FETCH_ASSOC);
                $nama_pensyarah = $pensyarah['nama_pensyarah']; 
                
                echo "[\"$nama_tajuk_permohonan\", \"$nama_pensyarah\", \"$nama_kelas_permohonan\",\"$tarikh_permintaan_permohonan\", \"$tarikh_penggunaan_permohonan\", \"<form action='../backend/permohonan.php' method='post'><input type='hidden' name='token' value='$token'><input type='hidden' name='id_permohonan' value='$id_permohonan'><button type='submit' name='aktifkan'><svg style='width:16px; height:16px; fill:#241f31;'  viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg'><path d='M386.3 160H336c-17.7 0-32 14.3-32 32s14.3 32 32 32H464c17.7 0 32-14.3 32-32V64c0-17.7-14.3-32-32-32s-32 14.3-32 32v51.2L414.4 97.6c-87.5-87.5-229.3-87.5-316.8 0s-87.5 229.3 0 316.8s229.3 87.5 316.8 0c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0c-62.5 62.5-163.8 62.5-226.3 0s-62.5-163.8 0-226.3s163.8-62.5 226.3 0L386.3 160z'></path></svg></button></form>\", \"<a href='./borang-permohonan.php?id_permohonan=$id_permohonan'><svg style='width:16px; height:16px; fill:#241f31;'  viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg'><path d='M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V304H176c-35.3 0-64 28.7-64 64V512H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM176 352h32c30.9 0 56 25.1 56 56s-25.1 56-56 56H192v32c0 8.8-7.2 16-16 16s-16-7.2-16-16V448 368c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24H192v48h16zm96-80h32c26.5 0 48 21.5 48 48v64c0 26.5-21.5 48-48 48H304c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H320v96h16zm80-112c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16s-7.2 16-16 16H448v32h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H448v48c0 8.8-7.2 16-16 16s-16-7.2-16-16V432 368z'></path></svg></a>\"],";


            }
        ?>
    ],
};

const instance3 = new te.Datatable(document.getElementById('datatable3'), data3)

document.getElementById('datatable-search-input3').addEventListener('input', (e) => {
instance3.search(e.target.value);
});

</script>