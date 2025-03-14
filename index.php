<?php
require 'shared/helper.php'; // call helper.php file to use directly its functions
require 'config/config.php'; // call config.php file 

// check if the used is logged in
if (!isset($_SESSION['logged_in'])) {
    if (strpos(BASE_URL . $_SERVER['QUERY_STRING'], 'module') !== false)  // if 'module' string is in 'QUERY_STRING'
    { 
        $_SESSION['referrer'] = BASE_URL . $_SERVER['QUERY_STRING']; // save the url asked by the user and show it after login
    }
    header("Location: sign_in.php"); // redirect user to sign in page if he's logged out
    exit();
}

// include DB file and common header file
require 'modules/classes/DB.php';
require 'common_templates/head.php';
?>

<body class="hold-transition sidebar-mini layout-fixed"> <!-- 3 classes mentioned in AdminLTE -->
<div class="wrapper">
    <!-- Preloader -->
    <!--    <div class="preloader flex-column justify-content-center align-items-center">-->
    <!--        <img class="animation__shake" src="-->
    <? //= ADMIN_ASSETS_DIR ?><!--/img/AdminLTELogo.png" alt="AdminLTELogo"-->
    <!--             height="60"-->
    <!--             width="60">-->
    <!--    </div>-->
    <?php include 'common_templates/header.php'; ?>
    <?php include 'common_templates/left_sidebar.php'; ?>

    <?php
    // content
    $module = filter_input(INPUT_GET, 'module');
    if ($module) {
        $action = filter_input(INPUT_GET, 'action');
        $module = ucwords($module);
        $moduleClassPath = sprintf("modules/classes/%s.php", $module);
        $viewPath = sprintf("views/%s/%s.php", $module, $action);
        require $moduleClassPath;
        require $viewPath;
    }
    ?>

    <?php include 'common_templates/footer.php'; ?>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>

<script src="<?php echo ADMIN_URL ?>assets/plugins/js/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo ADMIN_URL ?>assets/plugins/js/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo ADMIN_URL ?>assets/plugins/js/bootstrap.bundle.min.js"></script>

<script src="<?php echo ADMIN_URL ?>assets/plugins/js/select2.full.min.js"></script>
<!-- ChartJS -->
<!--<script src="--><?php //echo ADMIN_URL ?><!--assets/plugins/js/Chart.min.js"></script>-->
<!-- Sparkline -->
<script src="<?php echo ADMIN_URL ?>assets/plugins/js/sparkline.js"></script>
<!-- JQVMap -->
<!--<script src="--><?php //echo ADMIN_URL ?><!--assets/plugins/js/jquery.vmap.min.js"></script>-->
<!--<script src="--><?php //echo ADMIN_URL ?><!--assets/plugins/js/jquery.vmap.usa.js"></script>-->
<!-- jQuery Knob Chart -->
<!--<script src="--><?php //echo ADMIN_URL ?><!--assets/plugins/js/jquery.knob.min.js"></script>-->
<!-- daterangepicker -->
<script src="<?php echo ADMIN_URL ?>assets/plugins/js/moment.min.js"></script>
<script src="<?php echo ADMIN_URL ?>assets/plugins/js/jquery.inputmask.min.js"></script>
<script src="<?php echo ADMIN_URL ?>assets/plugins/js/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo ADMIN_URL ?>assets/plugins/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo ADMIN_URL ?>assets/plugins/js/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo ADMIN_URL ?>assets/plugins/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo ADMIN_URL ?>assets/js/adminlte.min.js"></script> <!--main script file -->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo ADMIN_URL ?>assets/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="--><?php //echo ADMIN_URL ?><!--assets/js/dashboard.js"></script>-->

<script src="<?php echo ADMIN_URL ?>assets/js/jquery.validate.min.js"></script> <!-- for validation -->
<script src="<?php echo ADMIN_URL ?>assets/js/additional-methods.min.js"></script> <!-- for putting numbers -->
<script src="<?php echo ADMIN_URL ?>assets/js/toastr.min.js"></script> <!-- for showing messages -->


<script src="<?php echo ADMIN_URL ?>assets/js/jquery.dataTables.min.js"></script> <!-- for creating tables using dataTables -->
<script src="<?php echo ADMIN_URL ?>assets/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo ADMIN_URL ?>assets/js/dataTables.responsive.min.js"></script>
<script src="<?php echo ADMIN_URL ?>assets/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo ADMIN_URL ?>assets/js/dataTables.buttons.min.js"></script>
<script src="<?php echo ADMIN_URL ?>assets/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo ADMIN_URL ?>assets/js/custom_script.js"></script> <!-- I created this file -->
<script src="<?php echo ADMIN_URL ?>assets/js/index.js"></script> <!-- I created this file -->

<script>
    $(function () {
        $('.select2').select2(); // integrate select2 jquery

        $('.select2bs4').select2({ // integrate select2bs4
            theme: 'bootstrap4'
        });

        $('[data-mask]').inputmask(); // inputmasking using data mask
    });
</script>
</body>
