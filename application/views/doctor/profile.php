<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    include_once('includes/header.php');
?>
<link href="<?php echo base_url(); ?>assets/plugins/fileuploads/css/dropify.min.css" rel="stylesheet" type="text/css" />
<?php include_once('includes/style.php'); ?>
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group pull-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><?php echo $this->security->xss_clean(htmlspecialchars($site_details['title'])); ?></a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Profile Setting</h4>                        
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content-wrapper">
            <div class="">
                <div class="row" >
                    <div class="col-6">
                        <div class="card m-b-20">
                            <div class="card-block">
                                <label><h6>Profile Information</h6></label>
                                <form name="updateprofile" id="updateprofile" method="post" action="<?php echo base_url('doctorpost/update_profile'); ?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="doctor_name" value="<?php echo $this->security->xss_clean(htmlspecialchars($info['doctor_name'])) ?>" placeholder="Doctor Name" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                               
                                                <input type="email" class="form-control" name="doctor_email" value="<?php echo $this->security->xss_clean(htmlspecialchars($info['doctor_email'])) ?>" placeholder="Doctor Email" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                
                                                <input type="text" class="form-control" name="doctor_phone" value="<?php echo 
                                                    $this->security->xss_clean($info['doctor_phone']) ?>" placeholder="Doctor Phone" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                
                                                <input type="text" class="form-control" name="doctor_hospital" value="<?php echo 
                                                    $this->security->xss_clean($info['doctor_hospital']) ?>" placeholder="Doctor Hospital" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                
                                                <input type="text" class="form-control" name="doctor_designation" value="<?php echo 
                                                    $this->security->xss_clean($info['doctor_designation']) ?>" placeholder="Doctor Designation" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                
                                                <input type="text" class="form-control" name="doctor_qualification" value="<?php echo 
                                                    $this->security->xss_clean($info['doctor_qualification']) ?>" placeholder="Doctor Qualification" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Update Profile Information</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> 
                    <div class="col-6">
                        <div class="card m-b-20">
                            <div class="card-block">
                                <label><h6>Profile Information</h6></label>
                                <form name="updatepassword" id="updatepassword" method="post" action="<?php echo base_url('doctor/update_password'); ?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="cpass" id="cpass" required="" placeholder="Current Password">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="Password" class="form-control" name="npass" id="npass" placeholder="New Password"required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Re-enter New Password</label>
                                                <input type="Password" class="form-control" name="rpass" id="rpass" placeholder="Re-enter New Password" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="button" id="changepass" class="btn btn-primary waves-effect waves-light">Update Password</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card m-b-20">
                            <div class="card-block">
                                <form name="updatelogo" id="updatelogo" method="post" action="<?php echo base_url('doctorpost/update_photo'); ?>" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label><h6>Update Profile Photo</h6></label>
                                            <button type="submit" class="btn btn-info waves-effect waves-light pull-right">Update</button>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="file" name="doctor_photo" class="dropify" data-default-file="<?php echo base_url(); ?>assets/images/<?php echo $this->security->xss_clean(htmlspecialchars($info['doctor_photo'])); ?>"  />
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

<script src="<?=base_url(); ?>assets/plugins/fileuploads/js/dropify.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#changepass').click(function(){
            var cpass = $('#cpass').val();
            var npass = $('#npass').val();
            var rpass = $('#rpass').val();
            if(rpass == npass)
            {
                $.ajax({
                    type:'POST',
                    url:'../doctorpost/update_password',
                    dataType:'json',
                    data:{cpass : cpass,
                        npass : npass
                        },
                    success: function(data){
                            if(data.status == 1)
                            {
                                alert('Password successfully changed.');	
                            }
                            else
                            {
                                alert('Please check your old password!!');
                                $('#cpass').focus();
                            }
                    },
                    error:function(data)
                    {
                        alert('oops! Something Went Wrong!!!');
                    }
                });
            }
            else
            {
                alert("Password doesn't match!!!");
                $('#rpass').focus();
            }
        });

        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong appended.'
            },
            error: {
                'fileSize': 'The file size is too big (1M max).'
            }
        });
    });
</script>

<?php include_once('includes/js.php'); ?>