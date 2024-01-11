<?php $title = "E-Ordering"; $location_index = "."; include('./components/head.php')?>

<style>
    *{
        padding: 0;
        margin: 0;
    }
    .section-1{
        /* background-image: url('./src/assets/images/background-1.png'); */
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        height: 95vh;

    }
</style>
<body>
    <?php $location_index = "."; include('./components/header-login.php')?>
    <section class="section-1 ">
        <center>
            <div class="block md:flex">
                <div class="container w-100"></div>
                <div class="container w-100">
                    <center>
                        <h1>Error</h1>
                    </center>
                    <a href="./admin-login.php"><u>Admin Login</u></a>
                </div>
            </div>
        </center>
    </section>


    <?php $location_index = ".";include('./components/footer.php') ?>   
</body>

</html>