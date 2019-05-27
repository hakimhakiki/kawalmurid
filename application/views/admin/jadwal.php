<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/header");?>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <?php $this->load->view("_partials/main_navbar");?>

        <!-- HEADER MOBILE-->
        <?php $this->load->view("_partials/mobile_navbar");?>

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- BREADCRUMB-->
            <?php //$this->load->view("_partials/breadcrumb"); ?>

            <!-- WELCOME-->
            <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-4">Jadwal Pelajaran
                            </h1>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section>
            <!-- END WELCOME-->

            <!-- JADWAL HTML BODY -->
            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-lihat-tab" data-toggle="tab" href="#nav-lihat-jadwal" role="tab" aria-controls="nav-home"
                                     aria-selected="true"><i class="fas fa-table"></i> Lihat Jadwal</a>
                                    <a class="nav-item nav-link" id="nav-ubah-tab" data-toggle="tab" href="#nav-ubah-jadwal" role="tab" aria-controls="nav-contact"
                                     aria-selected="false"><i class="fas fa-edit"></i> Pengubahan Jadwal</a>
                                </div>
                            </nav>
                            <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-lihat-jadwal" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <h3 class="title-5 m-b-35">Tabel Jadwal</h3>
                                        <?php $this->load->view('admin/crudjadwal/tabel_jadwal'); ?>
                                </div>
                                <div class="tab-pane fade" id="nav-ubah-jadwal" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <h3 class="title-5 m-b-35">Ubah Jadwal</h3>
                                        <?php $this->load->view('admin/crudjadwal/ubah_jadwal'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END JADWAL HTML BODY -->

            <!-- COPYRIGHT-->
            <?php $this->load->view('_partials/copyright'); ?>
        </div>

    </div>
    <!-- FOOTER -->
    <?php $this->load->view('_partials/footer'); ?>

</body>

</html>
<!-- end document-->
