<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    include_once('includes/header.php');
?>

<!-- form Uploads -->
<link href="<?php echo base_url(); ?>assets/plugins/fileuploads/css/dropify.min.css" rel="stylesheet" type="text/css" />
<?php include_once('includes/style.php'); ?>
<div class="pcoded-main-container">
    <div class="pcoded-content">
            <div class="">
                <!-- Page-Title -->
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
                </div><!-- end page title end breadcrumb -->
            </div> <!-- end container -->
     
        <!-- ==================
                PAGE CONTENT START
        ================== -->
        <div class="page-content-wrapper">
            <div class="">
                <div class="row">
                    <div class="col-6">
                        <div class="card m-b-20">
                            <div class="card-block">
                                <label><h6>Profile Information</h6></label>
                                <form name="updateprofile" id="updateprofile" method="post" action="<?php echo base_url('adminpost/updateprofile'); ?>">
                                    <div class="row">
                                         <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="title" value="<?php echo $this->security->xss_clean(htmlspecialchars($info['title'])) ?>" placeholder="Site Title" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="user_name" value="<?php echo $this->security->xss_clean(htmlspecialchars($info['user_name'])) ?>" placeholder="Doctor Name" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                               
                                                <input type="email" class="form-control" name="email" value="<?php echo $this->security->xss_clean(htmlspecialchars($info['email'])) ?>" placeholder="Doctor Email" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                
                                                <input type="text" class="form-control" name="user_phone" value="<?php echo 
                                                    $this->security->xss_clean($info['user_phone']) ?>" placeholder="Doctor Phone" required="">
                                            </div>
                                        </div>
                                         <div class="col-md-12">
                                            <div class="form-group">
                                                
                                                <input type="text" class="form-control" name="address" value="<?php echo 
                                                    $this->security->xss_clean($info['address']) ?>" placeholder="Address" required="">
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
                    </div> <!-- end col -->
                    <div class="col-6">
                        <div class="card m-b-20">
                            <div class="card-block">
                                <label><h6>Profile Information</h6></label>
                                <form name="updatepassword" id="updatepassword" method="post" action="<?php echo base_url('adminpost/updatepassword'); ?>">
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
                    </div> <!-- end col -->
                </div> <!-- end row -->
                
                     <div class="row">
                    <div class="col-4">
                        <div class="card m-b-20">
                            <div class="card-block">
                                <form name="updatelogo" id="updatelogo" method="post" action="<?php echo base_url('adminpost/updateprofilepic'); ?>" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label><h6>Update Profile Photo</h6></label>
                                            <button type="submit" class="btn btn-info waves-effect waves-light pull-right">Update</button>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="file" name="profile_photo" class="dropify" data-default-file="<?php echo base_url(); ?>assets/images/<?php echo $this->security->xss_clean(htmlspecialchars($info['profile_photo'])); ?>"  />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div> <!-- end col -->
                         <div class="col-4">
                        <div class="card m-b-20">
                            <div class="card-block">
                                <form name="updatelogo" id="updatelogo" method="post" action="<?php echo base_url('adminpost/updatelogo'); ?>" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label><h6>Update Site Logo</h6></label>
                                            <button type="submit" class="btn btn-info waves-effect waves-light pull-right">Update</button>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="file" name="logo" class="dropify" data-default-file="<?php echo base_url(); ?>assets/images/<?php echo $this->security->xss_clean(htmlspecialchars($info['logo'])); ?>"  />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- end col -->
                    
                     <div class="col-4">
                        <div class="card m-b-20">
                            <div class="card-block">
                                <form name="updatelogo" id="updatelogo" method="post" action="<?php echo base_url('adminpost/updatefavicon'); ?>" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label><h6>Update Site Favicon</h6></label>
                                            <button type="submit" class="btn btn-info waves-effect waves-light pull-right">Update</button>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="file" name="favicon" class="dropify" data-default-file="<?php echo base_url(); ?>assets/images/<?php echo $this->security->xss_clean(htmlspecialchars($info['favicon'])); ?>"  />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
  

            </div> <!-- end container -->
        </div><!-- end page-content-wrapper -->
</div>
</div>
<?php include_once('includes/footer.php'); ?>

        <!-- file uploads js -->
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
                            url:'../user_operation/updatepassword',
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