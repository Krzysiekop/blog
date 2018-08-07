




<link href="../../../assets/css/mystyles.css" rel="stylesheet" type="text/css"/>

<div class="container">
    <div class="row profile">
        
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="http://keenthemes.com/preview/metronic/theme/assets/admin/pages/media/profile/profile_user.jpg" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php echo $userzy[0]['username']; ?>
                                           

                                        </div>
					<div class="profile-usertitle-job">
                                             <?php if($userzy[0]['banned']==1)  {
                                                
                                                echo "USER IS BANNED";
                                                
                                            }     ?>
				<?php echo $userzy[0]['email']; ?>
                                           
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				  <div class="profile-userbuttons">
                                <?php  if ($this->session->userdata('user_name')===$userzy[0]['username']) {?>
                              
					
                                        <a href="<?php echo site_url('messages/show/' .$userzy[0]['username']); ?>" class="btn btn-success btn-sm">SHOW MESSAGES [<?php echo $count_messages ; ?>] NEW MESSAGES</a>
                                        

				</div>
                                <?php }
                                else if($this->session->userdata('is_logged')===true){ ?>
                                <a href="<?php echo site_url('messages/create/' .$userzy[0]['username']); ?>" class="btn btn-success btn-sm">MESSAGE USER</a>
                                  <?php } ?>
                                
                                                        
                                 
                                <?php  if($this->session->userdata('Admin')===true){ ?>
                                <a href="<?php echo site_url('users/ban/' .$userzy[0]['username']); ?>" class="btn btn-success btn-sm">BAN USER</a>
                                  <?php } ?>
                               
                                
                                <!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="<?php echo site_url('news/categoryUser/' .$userzy[0]['username']); ?>">
							<i class="glyphicon glyphicon-home"></i>
							Show user's posts </a>
						</li>
						<li>
							<a href="<?php echo site_url('news/categoryusercomments/'.$userzy[0]['username']); ?>">
							<i class="glyphicon glyphicon-user"></i>
							ShowUser's comments </a>
						</li>
						<li>
							<a href="#" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Tasks </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
	<div class="col-md-9">
            <div class="profile-content">
			   <?php echo "Register date: ".$userzy[0]['register_date']; ?>
                           <?php echo "Posts number ". $liczba_postow; ?>
            </div>
		</div>
	</div>
</div>

<br>
<br>