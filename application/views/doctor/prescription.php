<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    include('includes/header.php');
?>

<!-- DataTables -->
<link href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />   
<link href="<?php echo base_url(); ?>assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="<?php echo base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<?php include('includes/style.php');?>
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group pull-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><?php echo $site_details['title']; ?></a></li>
                                <li class="breadcrumb-item active">Prescription</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Prescription List</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content-wrapper">
            <div class="">
                <div class="row">
                    <div class="col-12">
                        <div class="m-b-20">                                
                            <a href="<?php echo base_url('doctor/addprescription'); ?>"><button type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i>&nbsp; New Prescription</button></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-block">
                                <table class="table table-bordered datatable-init">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Date</th>
                                            <th>Patient</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; foreach ( $info as $data ) :?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $this->security->xss_clean(htmlspecialchars($data['date'])); ?></td>
                                            <td><?php echo $this->security->xss_clean(htmlspecialchars($data['p_name'])); ?></td>
                                            <td>
                                                <a href="<?php echo base_url('doctor/print_prescription')."/".$data['prescription_id'];?>"><button type="button" class="btn btn-1d btn-sm btn-outline-primary waves-effect waves-light">Print Prescription</button></a>
                                                <a href="javascript:void(0);" onclick="deletes(<?php echo $data['prescription_id'];?>);"><button type="button" class="btn btn-1d btn-sm btn-outline-primary waves-effect waves-light"><span class="mdi mdi-delete"></span></button></a>
                                                <script type="text/javascript">
                                                    var url="<?php echo base_url();?>";
                                                    function deletes(id){
                                                        var r=confirm("Do you want to delete this?")
                                                        if (r==true)
                                                            window.location = url+"doctorpost/deleteprescription/"+id;
                                                        else
                                                            return false;
                                                    } 
                                                </script>
                                            </td>
                                        </tr>
                                        <?php $i++; endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer_start.php');?>
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
<?php include('includes/js.php');?>