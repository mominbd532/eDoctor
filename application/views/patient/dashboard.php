<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    include_once('includes/header.php');
    include_once('includes/style.php');
?>
<div class="pcoded-main-container">
    <div class="pcoded-content">
            <div class="">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><?php echo $this->security->xss_clean(htmlspecialchars($site_details['title'])); ?></a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Dashboard</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-content-wrapper">
                <div class="">
                    <h1>Welcome <?php echo $patient_details['p_name'];?>!</h1>
                    <h2>Please, Place an appointment to meet your preferred doctor.</h2>
                </div>
            </div>
        </div>
    </div> 
    <?php include_once('includes/footer.php'); ?>
    <?php include_once('includes/js.php'); ?>