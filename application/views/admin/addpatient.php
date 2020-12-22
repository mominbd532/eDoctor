<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    include_once('includes/header_start.php'); 
?>

<?php include_once('includes/header_end.php');
    $data = $this->user_mo->get_user();
    $error = $this->session->flashdata('error');
?>
    <div class="pcoded-main-container">
    <div class="pcoded-content">
      
    <div class="">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group pull-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><?php echo $this->security->xss_clean(htmlspecialchars($data[0]['title'])); ?></a></li>
                                <li class="breadcrumb-item active">Add New Patient</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Add New Patient</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->
        </div> <!-- End Container -->
    <!-- ==================
         PAGE CONTENT START
        ================== -->
   
                <div class="col-md-12" style="padding-top: 2%;">
                    <div class="m-b-20">
                        <a href="<?php echo base_url('user/patients'); ?>"><button type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-arrow-left"></i>&nbsp; Back to Patient List</button></a>
                    </div>
                </div>
           
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-20">
                        <div class="card-block">
                            <blockquote>Basic Information</blockquote>
                            <form name="addpatient" id="addpatient" method="post" action="<?php echo base_url('user_operation/addpatient'); ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter patient name"  title="Enter Proper Name(Alphabets only)" required="" value="<?php echo $error['old_name'];?>">
                                            <?php if($error['name']){?> <span class="text-danger"><?php echo $error['name']; ?></span> <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Age</label>
                                            <input type="text" class="form-control" placeholder="Enter patient's age" name="age" title="Enter Numeric values only(3 digit only)" required="" value="<?php echo $error['old_age'];?>">
                                            <?php if($error['age']){?> <span class="text-danger"><?php echo $error['age']; ?></span> <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select class="form-control" name="gender" required="">
                                                <option value="" <?php if($error['old_gender'] == "") echo 'selected'; ?>>--Select Gender--</option>
                                                <option  value="1" <?php if($error['old_gender'] == "1") echo 'selected'; ?>>Male</option>
                                                <option  value="2" <?php if($error['old_gender'] == "2") echo 'selected'; ?>>Female</option>
                                            </select>
                                            <?php if($error['gender']){?> <span class="text-danger"><?php echo $error['gender']; ?></span> <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" name="phone" placeholder="+1-234-567-7890" title="Enter Numeric values only(Min 5 Numers)" required="" maxlength="20" value="<?php echo $error['old_phone'];?>">
                                            <?php if($error['phone']){?> <span class="text-danger"><?php echo $error['phone']; ?></span> <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea name="add" rows="3" class="form-control" placeholder="Enter current address" required=""><?php echo $error['old_name'];?></textarea>
                                            <?php if($error['old_add']){?> <span class="text-danger"><?php echo $error['add']; ?></span> <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <blockquote>Medical Information</blockquote>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Height</label>
                                            <input type="text" class="form-control" name="height" placeholder="Enter height" title="Enter Numeric values only(3 digit only)" required="" value="<?php echo $error['old_height'];?>">
                                            <?php if($error['height']){?> <span class="text-danger"><?php echo $error['height']; ?></span> <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Weight</label>
                                            <input type="text" class="form-control" name="weight" placeholder="Enter weight" title="Enter Numeric values only(3 digit only)" required="" value="<?php echo $error['old_weight'];?>">
                                            <?php if($error['weight']){?> <span class="text-danger"><?php echo $error['weight']; ?></span> <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Blood Group</label>
                                            <select class="form-control" name="blood_group" required="">
                                                <option value="">-- Select Blood Group --</option>
                                                <option value="A+" <?php if($error['old_blood_group'] == "A+") echo 'selected'; ?>>A+</option>
                                                <option value="A-"<?php if($error['old_blood_group'] == "A-") echo 'selected'; ?>>A-</option>
                                                <option value="B+"<?php if($error['old_blood_group'] == "B+") echo 'selected'; ?>>B+</option>
                                                <option value="O+"<?php if($error['old_blood_group'] == "O+") echo 'selected'; ?>>O+</option>
                                                <option value="O-"<?php if($error['old_blood_group'] == "O-") echo 'selected'; ?>>O-</option>
                                                <option value="AB+"<?php if($error['old_blood_group'] == "AB+") echo 'selected'; ?>>AB+</option>
                                                <option value="AB-"<?php if($error['old_blood_group'] == "AB-") echo 'selected'; ?>>AB-</option>
                                            </select>
                                            <?php if($error['blood_group']){?> <span class="text-danger"><?php echo $error['blood_group']; ?></span> <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Blood Pressure</label>
                                            <input type="text" class="form-control" name="blood_pressure" placeholder="Enter blood pressure" title="Enter Numeric values only(4 digit only)" required="" value="<?php echo $error['old_blood_pressure'];?>">
                                            <?php if($error['blood_pressure']){?> <span class="text-danger"><?php echo $error['blood_pressure']; ?></span> <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pulse</label>
                                            <input type="text" class="form-control" name="pulse" placeholder="Enter pulse" title="Enter Numeric values only(4 digit only)" required="" value="<?php echo $error['old_pulse'];?>">
                                            <?php if($error['pulse']){?> <span class="text-danger"><?php echo $error['pulse']; ?></span> <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Respiration</label>
                                            <input type="text" class="form-control" name="respiration" placeholder="Enter respiration"  title="Enter Numeric values only(4 digit only)" required="" value="<?php echo $error['old_respiration'];?>">
                                            <?php if($error['respiration']){?> <span class="text-danger"><?php echo $error['respiration']; ?></span> <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Allergy</label>
                                            <input type="text" class="form-control" name="allergy" placeholder="Enter allergy symptoms"  required="" value="<?php echo $error['old_allergy'];?>">
                                            <?php if($error['allergy']){?> <span class="text-danger"><?php echo $error['allergy']; ?></span> <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Diet</label>
                                            <input type="text" class="form-control" name="diet" placeholder="Enter diet" required="" value="<?php echo $error['old_diet'];?>">
                                            <?php if($error['diet']){?> <span class="text-danger"><?php echo $error['diet']; ?></span> <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Add New Patient</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            
    </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<?php include_once('includes/footer_start.php'); ?>

<?php include_once('includes/footer_end.php'); ?>