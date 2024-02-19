<?php $title = "Pembelian Pengguna"; $location_index = "../.."; include('../../components/head.php')?>

<style>
    .select-bahan{
        background-color: aliceblue;
        border-radius: 5px;
        padding: 10px;
    }
    .bahan-div{
        padding: 10px;
    }
    .remove-button{
        background-color: red;
        color: white;
        padding: 2px;
        padding-left: 5px;
        padding-right: 5px;
        border-radius: 3px;
        margin-left: 10px;
    }
</style>

<body>
    <?php $location_index = "../.."; include('../../components/header.php')?>
    <script src="../../src/assets/js/tw-elements.umd.min.js"></script>
    <div class="main-container p-5 pt-15">
        <center>
            <center>
                <div class="pembelian-baru-data-table p-2">
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

            <script>
                const data1 = {
                columns: [
                    'No',
                    'Tajuk Permohonan',
                    'Tarikh Permintaan',
                    'Tarikh Penggunaan',
                    { label: "Status", field: "status", sort: false },
                    { label: "Lihat", field: "lihat", sort: false },
                    { label: "Borang", field: "borang", sort: false },
                ],
                rows: [
                    <?php 

                        $id_pensyarah = $_SESSION['id_pensyarah_session'];
                        $permohonan_pengguna_sql = $pdo->prepare("SELECT * FROM permohonan WHERE id_pensyarah = ?");
                        $permohonan_pengguna_sql->execute([$id_pensyarah]);

                        $no = 0;
                        while($permohonan_pengguna = $permohonan_pengguna_sql->fetch(PDO::FETCH_ASSOC)){
                            $no++;

                            $id_permohonan = $permohonan_pengguna['id_permohonan'];
                            $nama_tajuk_permohonan = $permohonan_pengguna['nama_tajuk_permohonan'];
                            $tarikh_permintaan_permohonan = $permohonan_pengguna['tarikh_permintaan_permohonan'];
                            $tarikh_penggunaan_permohonan = $permohonan_pengguna['tarikh_penggunaan_permohonan'];

                            if($permohonan_pengguna['status_permohonan'] == 0){
                                $jenis_permohonan = "Batal";
                                $color = "red";
                            }
                            else if($permohonan_pengguna['status_permohonan'] == 1){
                                $jenis_permohonan = "Baru";
                                $color = "gray";
                            }
                            else if($permohonan_pengguna['status_permohonan'] == 2){
                                $jenis_permohonan = "Sedang Diproses";
                                $color = "yellow";
                            }
                            else if($permohonan_pengguna['status_permohonan'] == 3){
                                $jenis_permohonan = "Sedang Dibeli";
                                $color = "yellow";
                            }
                            else if($permohonan_pengguna['status_permohonan'] == 4){
                                $jenis_permohonan = "Berjaya Dibeli";
                                $color = "green";
                            }else{
                                $jenis_permohonan = "Tidak Tentu";
                            } 
                            $color_str =  "bg-" . $color . "-200 " . "text-" . $color . "-500";

                            echo "[\"$no\", \"$nama_tajuk_permohonan\", \"$tarikh_permintaan_permohonan\", \"$tarikh_penggunaan_permohonan\", \"<div><p class='$color_str rounded-sm' style='width:fit-content;padding-left:5px;padding-right:5px;align-center' >$jenis_permohonan</p></div>\", \"<a href='lihat-permohonan.php?id_permohonan=$id_permohonan'><svg style='width:16px; height:16px; fill:#241f31'  viewBox='0 0 384 512' xmlns='http://www.w3.org/2000/svg'><path d='M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM64 80c0-8.8 7.2-16 16-16h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16zm0 64c0-8.8 7.2-16 16-16h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16zm128 72c8.8 0 16 7.2 16 16v17.3c8.5 1.2 16.7 3.1 24.1 5.1c8.5 2.3 13.6 11 11.3 19.6s-11 13.6-19.6 11.3c-11.1-3-22-5.2-32.1-5.3c-8.4-.1-17.4 1.8-23.6 5.5c-5.7 3.4-8.1 7.3-8.1 12.8c0 3.7 1.3 6.5 7.3 10.1c6.9 4.1 16.6 7.1 29.2 10.9l.5 .1 0 0 0 0c11.3 3.4 25.3 7.6 36.3 14.6c12.1 7.6 22.4 19.7 22.7 38.2c.3 19.3-9.6 33.3-22.9 41.6c-7.7 4.8-16.4 7.6-25.1 9.1V440c0 8.8-7.2 16-16 16s-16-7.2-16-16V422.2c-11.2-2.1-21.7-5.7-30.9-8.9l0 0c-2.1-.7-4.2-1.4-6.2-2.1c-8.4-2.8-12.9-11.9-10.1-20.2s11.9-12.9 20.2-10.1c2.5 .8 4.8 1.6 7.1 2.4l0 0 0 0 0 0c13.6 4.6 24.6 8.4 36.3 8.7c9.1 .3 17.9-1.7 23.7-5.3c5.1-3.2 7.9-7.3 7.8-14c-.1-4.6-1.8-7.8-7.7-11.6c-6.8-4.3-16.5-7.4-29-11.2l-1.6-.5 0 0c-11-3.3-24.3-7.3-34.8-13.7c-12-7.2-22.6-18.9-22.7-37.3c-.1-19.4 10.8-32.8 23.8-40.5c7.5-4.4 15.8-7.2 24.1-8.7V232c0-8.8 7.2-16 16-16z'></path></svg></a>\", \"<a href='borang-permohonan.php?id_permohonan=$id_permohonan'><svg style='width:16px; height:16px;' class='w-[16px] h-[16px] fill-[#241f31]' viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg'><path d='M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V304H176c-35.3 0-64 28.7-64 64V512H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM176 352h32c30.9 0 56 25.1 56 56s-25.1 56-56 56H192v32c0 8.8-7.2 16-16 16s-16-7.2-16-16V448 368c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24H192v48h16zm96-80h32c26.5 0 48 21.5 48 48v64c0 26.5-21.5 48-48 48H304c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H320v96h16zm80-112c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16s-7.2 16-16 16H448v32h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H448v48c0 8.8-7.2 16-16 16s-16-7.2-16-16V432 368z'></path></svg></a>\"],";

                        }
                    ?>
                ],
            };

            const instance1 = new te.Datatable(document.getElementById('datatable1'), data1)

            document.getElementById('datatable-search-input1').addEventListener('input', (e) => {
            instance1.search(e.target.value);
            });
            </script>
        </center>
    </div>

    <?php $location_index = "../..";$set="minimal";include('../../components/footer.php') ?>   
</body>
</html>