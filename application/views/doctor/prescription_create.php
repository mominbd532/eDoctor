<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    include_once('includes/header.php') 
?>
<link href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<?php include_once('includes/style.php'); 
    $error = $this->session->flashdata('error');
?>
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-content-wrapper" style="padding-top: 2%;">
            <div class="">
                <div class="row">
                    <div class="col-12">
                        <div class="m-b-20">
                            <a href="<?php echo base_url('user/prescription'); ?>"><button type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-arrow-left"></i>&nbsp; Back to Prescription List</button></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-block">
                                <form name="addprescription" id="addprescription" method="post" action="<?php echo base_url('doctorpost/addprescription'); ?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="patient" class="col-form-label text-muted">Patient</label>
                                                        <div class="input-group">
                                                            <select class="select-patient" id="myselect2" name="patient_id" required="">
                                                                <option value="">Select</option>
                                                                    <?php foreach ( $info as $data ) : ?>

                                                                <option value="<?php echo $data['patient_id']; ?>"><?php echo $this->security->xss_clean(htmlspecialchars($data['p_name'])); ?></option>

                                                                    <?php endforeach; ?>

                                                            </select>
                                                        </div>
                                                        <?php if($error['patient_id']){?> <span class="text-danger"><?php echo $error['patient_id']; ?></span> <?php } ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="symptoms" class="col-form-label text-muted">Symptoms</label>
                                                        <div class="input-group">
                                                            <textarea class="form-control" name="symptoms" id="symptoms" placeholder="Add Symptoms" rows="3" required=""></textarea>
                                                        </div>
                                                        <?php if($error['symptoms']){?> <span class="text-danger"><?php echo $this->security->xss_clean(htmlspecialchars($error['symptoms'])); ?></span> <?php } ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="diagnosis" class="col-form-label text-muted">Diagnosis</label>
                                                        <div class="input-group">
                                                            <textarea class="form-control" name="diagnosis" id="diagnosis" placeholder="Add Diagnosis" rows="3" required=""></textarea>                                                        
                                                        </div>
                                                        <?php if($error['diagnosis']){?> <span class="text-danger"><?php echo $this->security->xss_clean(htmlspecialchars($error['diagnosis'])); ?></span> <?php } ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button class="btn btn-primary waves-effect waves-light" type="submit" name="save_prescription"><i class="fa fa-save"></i> &nbsp; Save Prescription</button>
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">                                            
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="medicine" class="col-form-label text-muted">Medicine</label>
                                                        <div id="medicine_entry">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <select class="select xxx" id="myselect2" name="medicine_name[]" required="">
                                                                            <option value="">Select</option>
                                                                            <?php foreach ( $medicines as $data ) : ?>
                                                                            <option value="<?php echo $data['name']; ?>"><?php echo $this->security->xss_clean(htmlspecialchars($data['name'])) ." - ".$this->security->xss_clean(htmlspecialchars($data['generic_name'])) ." - ".$this->security->xss_clean(htmlspecialchars($data['company_name'])); ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                        <?php if($error['medicine_name']){?> <span class="text-danger"><?php echo $error['medicine_name']; ?></span> <?php } ?>

                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <input type="text" class="form-control" placeholder="Notes" name="medicine_note[]" required="">
                                                                        <?php if($error['medicine_note']){?> <span class="text-danger"><?php echo $error['medicine_note']; ?></span> <?php } ?>

                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <input type="text" class="form-control" placeholder="Dosage" name="m_dose[]" required="">
                                                                        <?php if($error['m_dose']){?> <span class="text-danger"><?php echo $error['m_dose']; ?></span> <?php } ?>

                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <button type="button" class="fcbtn btn btn-outline btn-danger btn-1d btn-sm" data-toggle="tooltip" data-placement="right" title="Remove" onclick="delele_parent_element(this, 'medicine')"><i class="fa fa-times"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="append_holder_for_medicine_entries"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button type="button" class="btn btn-primary waves-effect waves-light" onclick="append_blank_entry('medicine')"><i class="fa fa-plus"></i> &nbsp; Add Medicine</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                            
                                            </div>
                                            <div class="row">                                            
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="test" class="col-form-label text-muted">Test</label>
                                                        <div id="test_entry">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-5">
                                                                        <input type="text" class="form-control" placeholder="Test Name" name="test_name[]" required="">
                                                                        <?php if($error['test_name']){?> <span class="text-danger"><?php echo $error['test_name']; ?></span> <?php } ?>

                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <input type="text" class="form-control" placeholder="Notes" name="test_note[]" required="">
                                                                        <?php if($error['test_note']){?> <span class="text-danger"><?php echo $error['test_note']; ?></span> <?php } ?>
                                                                        
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <button type="button" class="btn-sm fcbtn btn btn-outline btn-danger btn-1d" data-toggle="tooltip" data-placement="right" title="Remove" onclick="delele_parent_element(this, 'test')"><i class="fa fa-times"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="append_holder_for_test_entries"></div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <button type="button" class="btn btn-primary waves-effect waves-light" onclick="append_blank_entry('test')"><i class="fa fa-plus"></i> &nbsp; Add Test</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once('includes/footer.php'); ?>

<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
<script type="text/javascript">
    var blank_medicine_entry = '';
    var blank_test_entry = '';
    var number_of_medicine = 1;
    var number_of_test = 1;
    $(document).ready(function() {

        $('.select-patient').select2();
        blank_medicine_entry = $('#medicine_entry').html();
        blank_test_entry = $('#test_entry').html();
        $('.xxx').select2();

    });
    function append_blank_entry(selector) {
        if (selector == 'medicine') {
        number_of_medicine = number_of_medicine + 1;
        $(".medicine_entry:last").find('.xxx').select2('destroy');
        $('#append_holder_for_medicine_entries').append(blank_medicine_entry);
        $('.xxx').select2();
        } else {
        number_of_test = number_of_test + 1;
        $('#append_holder_for_test_entries').append(blank_test_entry);
        }
    }
    function delele_parent_element(n, selector) {
        if (selector == 'medicine') {
        if (number_of_medicine > 1) {
            n.parentNode.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode.parentNode);
        }
        if (number_of_medicine != 1) {
            number_of_medicine = number_of_medicine - 1;
        }
        } else {
        if (number_of_test > 1) {
            n.parentNode.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode.parentNode);
        }
        if (number_of_test != 1) {
            number_of_test = number_of_test - 1;
        }
        }
    }
</script>
<?php include_once('includes/js.php'); ?>