<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>North DMC Weighbridge</title>
        <script>
            var baseURL ='<?php echo base_url(); ?>';
        </script>
        <!-- Global stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>Assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>Assets/css/layout.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>Assets/css/components.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>Assets/css/colors.min.css" rel="stylesheet" type="text/css">
        <!-- /global stylesheets -->

        <!-- Core JS files -->
        <script src="<?php echo base_url(); ?>global_assets/js/main/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/main/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/loaders/blockui.min.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/ui/ripple.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
        <!-- /core JS files -->

        <!-- Theme JS files -->
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/forms/styling/switchery.min.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/ui/moment/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/pickers/daterangepicker.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/ui/perfect_scrollbar.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/webcam.min.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/extensions/jquery_ui/interactions.min.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/forms/selects/select2.min.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/pickers/pickadate/picker.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/pickers/pickadate/picker.date.js"></script>
       
        <script src="<?php echo base_url(); ?>global_assets/js/demo_pages/layout_fixed_sidebar_custom.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/demo_pages/form_select2.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/demo_pages/picker_date.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/plugins/forms/validation/validate.min.js"></script>
        <script src="<?php echo base_url(); ?>global_assets/js/demo_pages/datatables_extension_colvis.js"></script>
        <!-- /theme JS files -->
        <script src="<?php echo base_url(); ?>Assets/js/app.js"></script>
        <script src="<?php echo base_url(); ?>/app/vehicle/entryvehicle.js"></script>
        <script src="<?php echo base_url(); ?>/app/vehicle/exitvehicle.js"></script>
        <script src="<?php echo base_url(); ?>/app/master/admin.js"></script>
        <script src="<?php echo base_url(); ?>/app/master/operator.js"></script>

    </head>
    <body class="navbar-top">
        <?php $this->load->view('commonlayout/header'); ?>
        <div class="page-content">
            <?php $this->load->view('commonlayout/sidebar'); ?>
            <div class="content-wrapper">
                <?php
                if (!empty($page)) {
                    $this->load->view("$page");
                } else {
                    $this->load->view("dashboard/dashboard.php");
                }
                ?>
                <?php $this->load->view('commonlayout/footer'); ?>
            </div>
        </div>

    </body>
</html>