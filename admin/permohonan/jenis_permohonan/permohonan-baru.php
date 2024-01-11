<center>
    <div class="baru-data-table p-2">
        <div class="mb-3">
        <div class="justify-end relative mb-4 flex w-full flex-wrap items-stretch">
            <input
            id="datatable-search-input1"
            type="search"
            class="max-w-sm relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
            placeholder="Search"
            aria-label="Search"
            aria-describedby="button-addon1" />
        </div>
        </div>
        <div id="datatable1"></div>
    </div>
</center>

<script>
    const data1 = {
    columns: [
        'Tajuk Permohonan',
        'No',
        'Nama Pensyarah',
        'Nama Kelas',
        'Tarikh Permintaan',
        'Tarikh Penggunaan',
        { label: "Lihat", field: "lihat", sort: false },
        { label: "Borang", field: "borang", sort: false },
    ],
    rows: [
        <?php 
            
            $permohonan_baru_sql = $pdo->prepare("SELECT * FROM permohonan WHERE status_permohonan = 1");
            $permohonan_baru_sql->execute();      
            
            $no = 0;
            while($permohonan_baru = $permohonan_baru_sql->fetch(PDO::FETCH_ASSOC)){
                $no++;

                $id_permohonan = $permohonan_baru['id_permohonan'];
                $id_pensyarah = $permohonan_baru['id_pensyarah'];
                $nama_kelas_permohonan = $permohonan_baru['nama_kelas_permohonan'];
                $nama_tajuk_permohonan = $permohonan_baru['nama_tajuk_permohonan'];
                $tarikh_permintaan_permohonan = $permohonan_baru['tarikh_permintaan_permohonan'];
                $tarikh_penggunaan_permohonan = $permohonan_baru['tarikh_penggunaan_permohonan'];

                $pensyarah_sql = $pdo->prepare("SELECT * FROM pensyarah WHERE id_pensyarah = ?");
                $pensyarah_sql->execute([$id_pensyarah]);
                $pensyarah = $pensyarah_sql->fetch(PDO::FETCH_ASSOC);
                $nama_pensyarah = $pensyarah['nama_pensyarah']; 
                
                echo "[\"$nama_tajuk_permohonan\", \"$no\", \"$nama_pensyarah\", \"$nama_kelas_permohonan\", \"$tarikh_permintaan_permohonan\", \"$tarikh_penggunaan_permohonan\", \"<a href='lihat-permohonan.php?id_permohonan=$id_permohonan'><svg style='width:16px; height:16px; fill:#241f31;'  viewBox='0 0 384 512' xmlns='http://www.w3.org/2000/svg'><path d='M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM112 256H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16z'></path></svg></a>\", \"<a href='./borang-permohonan.php?id_permohonan=$id_permohonan'><svg style='width:16px; height:16px; fill:#241f31;'  viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg'><path d='M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V304H176c-35.3 0-64 28.7-64 64V512H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM176 352h32c30.9 0 56 25.1 56 56s-25.1 56-56 56H192v32c0 8.8-7.2 16-16 16s-16-7.2-16-16V448 368c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24H192v48h16zm96-80h32c26.5 0 48 21.5 48 48v64c0 26.5-21.5 48-48 48H304c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H320v96h16zm80-112c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16s-7.2 16-16 16H448v32h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H448v48c0 8.8-7.2 16-16 16s-16-7.2-16-16V432 368z'></path></svg></a>\"],";


            }
        ?>
    ],
};

const instance1 = new te.Datatable(document.getElementById('datatable1'), data1)

document.getElementById('datatable-search-input1').addEventListener('input', (e) => {
instance1.search(e.target.value);
});
</script>