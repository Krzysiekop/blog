

 <!-- Single Comment -->
  <?php foreach ($messages as $mess): ?>
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
                <p>   <?php echo $mess['user_from'];?></p>
                <h5 class="mt-0"> <?php echo $mess['data'];?></h5>
					 
                  <?php echo $mess['message_text']; ?>
			
            <?php if ($this->session->userdata('user_name')===$mess['user_to']){ ?>
                  <a href="<?php echo site_url('messages/create/'.$mess['user_from']); ?>" class="btn btn-danger">Replay</a>
              <?php }?>
            
            </div>
            
            
             
          </div>
<br>
      <?php endforeach; ?>

	  
	  
        </div>

  </div>
      <!-- /.row -->

   </div>
<br>