<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    include_once('includes/header.php'); 
?>
<link href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<?php include_once('includes/style.php');?>
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group pull-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><?php echo $this->security->xss_clean($site_details['title']); ?></a></li>
                                <li class="breadcrumb-item active">Patient</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Patient List</h4>
                    </div>
                </div>
            </div>
        </div> 
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
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Age</th>
                                            <th>Address</th>
                                            <th>Prescribed</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; foreach ( $info as $data ) : ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $this->security->xss_clean(htmlspecialchars($data['p_name'])); ?></td>
                                            <td><?php echo $this->security->xss_clean(htmlspecialchars($data['phone'])); ?></td>
                                            <td><?php echo $this->security->xss_clean(htmlspecialchars($data['age'])); ?></td>
                                            <td><?php echo $this->security->xss_clean(htmlspecialchars($data['add'])); ?></td>
                                            <?php 
                                                $datas = $_SESSION['doctorinfo'];
                                        		$res_doc = $this->db->select('*')
                                        		->from('doctors')
                                        		->where('doctor_email',$datas['email'])
                                        		->get()->result_array();
                                        
                                        		$id = $res_doc[0]['doctor_id'];
                                        		$res = $this->db->query("select patient_id from prescriptions where patient_id='".$data['patient_id']."'and doctor_id='".$id."'");?>
                                                <td><?php if(count($res->result_array())>=1){ echo count($res->result_array());}else{ echo '0'; }?></td>
                                            <td>
                                                <a href="<?php echo base_url('doctor/patient_profile')."/".$data['patient_id'];?>"><button type="button" class="btn btn-1d btn-sm btn-outline-primary waves-effect waves-light">Manage Patient</button>
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