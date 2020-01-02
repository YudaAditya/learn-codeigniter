<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_layouts/header.php"); ?>
    <link href="<?php echo base_url('theme/regform-2/vendor/mdi-font/css/material-design-iconic-font.min.css') ?>" rel="stylesheet" media="all">
    <link href="<?php echo base_url('theme/regform-2/vendor/font-awesome-4.7/css/font-awesome.min.css ') ?>" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url('theme/regform-2/vendor/select2/select2.min.css') ?>" rel="stylesheet" media="all">
    <link href="<?php echo base_url('theme/regform-2/vendor/datepicker/daterangepicker.css') ?>" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="<?php echo base_url('theme/regform-2/css/main.css') ?>" rel="stylesheet" media="all">
</head>

<body>
    <?php $this->load->view("_layouts/navbar.php"); ?>
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Tambah Artikel</h2>
                    <form method="POST">
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Name" name="name">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2 js-datepicker" type="text" placeholder="Birthdate" name="birthday">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender">
                                            <option disabled="disabled" selected="selected">Gender</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="class">
                                    <option disabled="disabled" selected="selected">Class</option>
                                    <option>Class 1</option>
                                    <option>Class 2</option>
                                    <option>Class 3</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="text" placeholder="Registration Code" name="res_code">
                                </div>
                            </div>
                        </div>
                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view("_layouts/footer.php"); ?>

</body>
<?php $this->load->view("_layouts/js.php"); ?>


<!-- Jquery JS-->
<script src="<?php echo base_url('theme/regform-2/vendor/jquery/jquery.min.js') ?>"></script>
<!-- Vendor JS-->
<script src="<?php echo base_url('theme/regform-2/vendor/select2/select2.min.js') ?>"></script>
<script src="<?php echo base_url('theme/regform-2/vendor/datepicker/moment.min.js') ?>"></script>
<script src="<?php echo base_url('theme/regform-2/vendor/datepicker/daterangepicker.js') ?>"></script>

<!-- Main JS-->
<script src="<?php echo base_url('theme/regform-2/js/global.js') ?>"></script>


</html>