<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once('includes/header.php');
?>
    <!-- DataTables -->
    <link href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?php echo base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<?php include_once('includes/style.php');?>
    <div class="pcoded-main-container">
        <div class="pcoded-content">

            <div class="">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><?php echo $this->security->xss_clean($site_details['title']); ?></a></li>
                                    <li class="breadcrumb-item active">Patient</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Edit Medicine</h4> <br>


                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
            </div> <!-- End Container -->

            <!-- ==================
                PAGE CONTENT START
            ================== -->
            <div class="page-content-wrapper">
                <div class="">


                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-20">
                                <div class="card-block">
                                    <form action="<?php echo base_url('admin/update_medicine/').$medicine_info->medicine_id;?>" method="post">
                                        <div class="form-group">
                                            <label for="medicine_name">Medicine Name</label>
                                            <input type="text" name="name" class="form-control" id="medicine_name"  required="required" value="<?php echo $medicine_info->name;?>" >

                                        </div>
                                        <div class="form-group">
                                            <label for="generic_name">Generic Name</label>
                                            <input type="text" name="generic_name" class="form-control" id="generic_name"  required="required" value="<?php echo $medicine_info->generic_name;?>" >

                                        </div>
                                        <div class="form-group">
                                            <label for="company_name">Company Name</label>
                                            <input type="text" name="company_name" class="form-control" id="company_name" required="required" value="<?php echo $medicine_info->company_name;?>" >

                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>

                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div> <!-- end container -->
            </div>
            <!-- end page-content-wrapper -->
        </div>
    </div>

<?php include_once('includes/footer.php'); ?>

    <!-- Required datatable js -->
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Buttons examples -->
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.colVis.min.js"></script>

    <!-- Responsive examples -->
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="<?php echo base_url(); ?>assets/pages/datatables.init.js"></script>
<?php include_once('includes/js.php'); ?>