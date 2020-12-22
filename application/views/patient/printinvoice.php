<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    include_once('includes/header.php');
?>

<?php 
    include_once('includes/style.php');
    $id = $this->uri->segment(3);
    $row_data = $this->patient_mo->getinvoicebyid($id);
?>
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group pull-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><?php echo $site_details['title']; ?></a></li>
                                <li class="breadcrumb-item active">Print Invoice</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Print Invoice</h4>
                    </div>
                </div>
            </div>
        </div>
        <?php
            if(!$row_data){
                echo "<center><h3>No Such Record Found!!</h3></center>";
            }else{
                $data = $row_data[0];
                $info = $this->patient_mo->getp_name($data['doctor_id']);
                $title = json_decode($data['invoice_title']);
                $amount = json_decode($data['invoice_amount']);
        ?>
        <div class="page-content-wrapper">
            <div class="">
                <div class="row">
                    <div class="col-12">
                        <div class="m-b-20">                                
                            <a href="<?php echo base_url('patient/billing'); ?>"><button type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-arrow-left"></i>&nbsp; Back to Invoice List</button></a>                                           
                            <button type="button" class="btn btn-primary waves-effect waves-light" onclick="print_div()"><i class="fa fa-print"></i>&nbsp; Print Invoice</button>
                        </div>
                    </div>
                </div>
                <div class="prescription-print">
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-20">
                                <div class="card-block">

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="invoice-title">
                                                <h4 class="pull-right font-16"><strong># <?php echo $this->security->xss_clean(htmlspecialchars($data['invoice_id'])) ?></strong></h4>
                                                <h3 class="m-t-0">Invoice</h3>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-6">
                                                    <h3 class="text-danger">Dr. <?php echo $this->security->xss_clean(htmlspecialchars($info['doctor_name'])) ?></h3>
                                                    <address>
                                                    <p class="text-muted m-l-5">
                                                    <?php echo $this->security->xss_clean(htmlspecialchars($info['doctor_designation'])) ?> <br>
                                                    <?php echo $this->security->xss_clean(htmlspecialchars($info['doctor_qualification'])) ?> <br>
                                                    <?php echo $this->security->xss_clean(htmlspecialchars($info['doctor_hospital'])) ?> <br>
                                                        Email - <?php echo $this->security->xss_clean(htmlspecialchars($info['doctor_email'])) ?> <br>
                                                        Phone - <?php echo $this->security->xss_clean(htmlspecialchars($info['doctor_phone'])) ?>
                                                    </p>
                                                    </address>
                                                </div>
                                                <div class="col-6 text-right">
                                                    <h3>To,</h3>
                                                    <h5><?php echo $this->security->xss_clean(htmlspecialchars($user['p_name'])); ?></h5>
                                                    <p class="text-muted m-l-30"><strong>Address</strong> : <?php echo $this->security->xss_clean(htmlspecialchars($user['add'])); ?></p>
                                                    <p class="text-muted"><strong>Phone</strong> : <?php echo $this->security->xss_clean(htmlspecialchars($user['phone'])); ?></p>
                                                    <p class="m-t-20"><b> Date :</b> <i class="fa fa-calendar"></i>&nbsp; <?php echo date('d-m-Y'); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="panel panel-default">
                                                <div class="">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <td><strong>Sr.No</strong></td>
                                                                    <td class="text-center"><strong>Details</strong></td>
                                                                    <td class="text-center"><strong>Amount</strong></td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                    <?php
                                                                        $total = 0; 
                                                                        for ( $i=0; $i<count($title); $i++) : 
                                                                    ?>

                                                                <tr>
                                                                    <td><?php echo $i+1; ?></td>
                                                                    <td class="text-center"><?php echo $this->security->xss_clean(htmlspecialchars($title[$i])); ?></td>
                                                                    <td class="text-center">
                                                                        <?php 
                                                                            echo $this->security->xss_clean(htmlspecialchars($amount[$i]));
                                                                            $total += $amount[$i]
                                                                        ?>

                                                                    </td>
                                                                </tr>
                                                                    <?php endfor;?>

                                                                <tr>
                                                                    <td class="no-line"></td>                                                            
                                                                    <td class="no-line text-right">
                                                                        <strong>Total</strong></td>
                                                                    <td class="no-line text-center"><h4 class="m-0"><?php echo $this->security->xss_clean(htmlspecialchars($total)); ?></h4></td>
                                                                </tr>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>      
<?php } include_once('includes/footer.php'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/print.js"></script>
<script src="<?php echo base_url(); ?>assets/js/printThis.js"></script>
<?php include_once('includes/js.php'); ?>