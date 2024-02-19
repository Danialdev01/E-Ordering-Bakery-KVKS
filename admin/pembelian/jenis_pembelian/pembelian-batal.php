<center>
    <div class="pembelian-baru-data-table p-2">
        <div class="mb-3">
        <div class="justify-end relative mb-4 flex w-full flex-wrap items-stretch">
            <input
            id="datatable-search-input3"
            type="search"
            class="max-w-sm relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
            placeholder="Search"
            aria-label="Search"
            aria-describedby="button-addon3" />
        </div>
        </div>
        <div id="datatable3"></div>
    </div>
</center>

<script>
    const data3 = {
    columns: [
        'No',
        'Tarikh Cipta Pembelian',
        'Harga Anggaran',
        'Bil Permohonan',
        { label: "Aktif", field: "aktif", sort: false },
        { label: "Borang", field: "borang", sort: false },
    ],
    rows: [
        <?php 
            
            $pembelian_batal_sql = $pdo->prepare("SELECT * FROM pembelian WHERE status_pembelian = 0");
            $pembelian_batal_sql->execute([]);
            
            $no = 0;
            while($pembelian_batal = $pembelian_batal_sql->fetch(PDO::FETCH_ASSOC)){
                $no++;

                $id_pembelian = $pembelian_batal['id_pembelian'];
                $tarikh_cipta_pembelian = $pembelian_batal['tarikh_cipta_pembelian'];
                $harga_anggaran_pembelian = $pembelian_batal['harga_anggaran_pembelian'];

                $bil_permohonan_pembelian = 0;

                $permohonan_pembelian = rtrim($pembelian_batal['id_permohonan_pembelian'], ', ');
                $permohonan_pembelianArray = explode(',', $permohonan_pembelian);

                foreach($permohonan_pembelianArray as $id_permohonan){
                    $bil_permohonan_pembelian++;
                }

                echo "[\"$no\", \"$tarikh_cipta_pembelian\", \"$harga_anggaran_pembelian\", \"$bil_permohonan_pembelian\", \"<form action='../backend/pembelian.php' method='post'><input type='hidden' name='token' value='$token'><input type='hidden' name='id_pembelian' value='$id_pembelian'><button type='submit' style='padding:5px;'><svg style='width:16px; height:16px; fill:#241f31;'  viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg'><path d='M48.5 224H40c-13.3 0-24-10.7-24-24V72c0-9.7 5.8-18.5 14.8-22.2s19.3-1.7 26.2 5.2L98.6 96.6c87.6-86.5 228.7-86.2 315.8 1c87.5 87.5 87.5 229.3 0 316.8s-229.3 87.5-316.8 0c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0c62.5 62.5 163.8 62.5 226.3 0s62.5-163.8 0-226.3c-62.2-62.2-162.7-62.5-225.3-1L185 183c6.9 6.9 8.9 17.2 5.2 26.2s-12.5 14.8-22.2 14.8H48.5z'></path></svg></button></form>\", \"<a href='borang-pembelian.php?id_pembelian=$id_pembelian'><svg style='width:16px; height:16px;' class='w-[16px] h-[16px] fill-[#241f31]' viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg'><path d='M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V304H176c-35.3 0-64 28.7-64 64V512H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM176 352h32c30.9 0 56 25.1 56 56s-25.1 56-56 56H192v32c0 8.8-7.2 16-16 16s-16-7.2-16-16V448 368c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24H192v48h16zm96-80h32c26.5 0 48 21.5 48 48v64c0 26.5-21.5 48-48 48H304c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H320v96h16zm80-112c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16s-7.2 16-16 16H448v32h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H448v48c0 8.8-7.2 16-16 16s-16-7.2-16-16V432 368z'></path></svg></a>\"],";

            }
        ?>
    ],
};

const instance3 = new te.Datatable(document.getElementById('datatable3'), data3)

document.getElementById('datatable-search-input3').addEventListener('input', (e) => {
instance3.search(e.target.value);
});
</script>