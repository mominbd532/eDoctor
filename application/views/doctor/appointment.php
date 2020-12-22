<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    include_once('includes/header.php'); 
?>
<link href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/plugins/fullcalendar/css/fullcalendar.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet">      
<?php  include_once('includes/style.php'); ?>
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group pull-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><?php echo $this->security->xss_clean(htmlspecialchars($site_details['title'])); ?></a></li>
                                <li class="breadcrumb-item active">Appointment</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Appointment</lable></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content-wrapper">
            <div class="">
                <div class="row">
                    <div class="col-md-7">
                        <div class="card m-b-20">
                            <div class="card-block">
                                <div id='calendar'></div>
                                <div style='clear:both'></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card m-b-20">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-12 m-b-20">
                                        <h5>Appointment List | <lable id="selected_date"><?php echo date('d M, Y'); ?></lable></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" id="appointment_list">
                                        <?php if($ap_list){ ?>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>Patient</th>
                                                <th>Schedule</th>
                                            </tr>
                                            <?php $i = 1;foreach($ap_list as $list) :?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $this->security->xss_clean(htmlspecialchars($list['p_name'])) ?></td>
                                                <td><?php echo $this->security->xss_clean(htmlspecialchars($list['time'])) ?></td>
                                            </tr>
                                            <?php $i++; endforeach; ?>
                                        </table>
                                        <?php }else{ echo '<h6>No Appointments Found On '.date('d M, Y').'</h6>';} ?>
                                    </div>
                                    <div class="col-md-12" id="new_list" style="display : none"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
        </div>                                       
    </div>
</div>
<?php include_once('includes/footer.php'); ?>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/fullcalendar/js/fullcalendar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/pages/form-advanced.js"></script>
<script src="<?php echo base_url(); ?>assets/pages/appointment_doctor.js"></script>
<?php include_once('includes/js.php'); ?>