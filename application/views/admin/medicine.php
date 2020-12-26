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
                            <h4 class="page-title">Medicine List</h4>
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
                                    <table class="table table-bordered datatable-init">
                                        <thead>
                                        <tr>
                                            <th>Sr.No.</th>
                                            <th>Medicine Name</th>
                                            <th>Generic Name</th>
                                            <th>Company Name</th>
                                            <th>Options</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php  $i = 1; foreach ( $info as $data ) : ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $this->security->xss_clean(htmlspecialchars($data['name'])); ?></td>
                                                <td><?php echo $this->security->xss_clean(htmlspecialchars($data['generic_name'])); ?></td>
                                                <td><?php echo $this->security->xss_clean(htmlspecialchars($data['company_name'])); ?></td>

                                                <td>

                                                        <a href="javascript:void(0);" onclick="deletes(<?php echo $data['medicine_id'];?>);"><button type="button" class="btn btn-1d btn-sm btn-outline-primary waves-effect waves-light"><span class="mdi mdi-delete"></span></button></a>
                                                        <script type="text/javascript">
                                                            var url="<?php echo base_url();?>";
                                                            function deletes(id){
                                                                var r=confirm("Do you want to delete this?")
                                                                if (r==true)
                                                                    window.location = url+"adminpost/deletedoctor/"+id;
                                                                else
                                                                    return false;
                                                            }
                                                        </script>
                                                </td>
                                            </tr>
                                            <?php
                                            $i++;
                                        endforeach; ?>
                                        </tbody>
                                    </table>
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