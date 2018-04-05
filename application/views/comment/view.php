


      

  <!-- Single Comment -->
  <?php foreach ($comments as $comm): ?>
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0"><?php echo $comm['name']; ?></h5>
					 <?php echo $comm['body']; ?>
			  </div>
          </div>
<br>
      <?php endforeach; ?>

	  
	  
        </div>

  </div>
      <!-- /.row -->

   </div>
<br>
<?php //var_dump($comments) ?>
 


