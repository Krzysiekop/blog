


      

  <!-- Single Comment -->
  <?php foreach ($comments as $comm): ?>
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">  <a href="<?php echo site_url('users/profile/'.$comm['name']); ?>"><?php echo $comm['name'];?></a> <?php echo $comm['created_at'];?></h5>
					 <?php echo $comm['body']; ?>
			  </div>
              <?php if ($this->session->userdata('Admin')===true){ ?>
                  <a href="<?php echo site_url('comment/delete/'.$comm['id']); ?>" class="btn btn-danger">Delete</a>
              <?php }?>
          </div>
<br>
      <?php endforeach; ?>

	  
	  
        </div>

  </div>
      <!-- /.row -->

   </div>
<br>
<?php //var_dump($comments) ?>
 


