
  

  <?php if(!empty($posts)){ foreach($posts as $news_item): ?>
        
          
                <div class="card mb-4" id="postList">
             <img class="card-img-top" src="<?php echo "/blog/uploads/{$news_item['id']}.jpg" ?>" alt="">
            <div class="card-body">
              <h2 class="card-title"><?php echo $news_item['title']; ?></h2>
              <p class="card-text"><?php echo $news_item['text']; ?></p>
              <a href="<?php echo site_url('news/'.$news_item['id']); ?>" class="btn btn-primary">View article &rarr;</a>

              <?php if ($this->session->userdata('Admin')===true) {?>
              <a href="<?php echo site_url('news/edit/'.$news_item['id']); ?>" class="btn btn-primary">Edit</a>
			  <a href="<?php echo site_url('news/delete/'.$news_item['id']); ?>" class="btn btn-danger">Delete</a>
              <?php } ?>
            </div>
            <div class="card-footer text-muted">
              Posted on <?php echo $news_item['created_at']; ?> by
              <a href="<?php echo site_url('users/profile/'.$news_item['user_id']); ?>"><?php echo $news_item['user_id'] ?></a>
                in category  <?php echo $news_item['category']; ?>
            </div>
          </div>
            
         
        
    <?php   endforeach;  ?>
  
    <?php if($postNum > $postLimit){ ?>
        <div class="load-more" lastID="<?php echo $news_item['id']; ?>" style="display: none;">
            <img src="<?php echo base_url('assets/images/load.gif'); ?>"/> Loading more posts...
        </div>
    <?php }else{ ?>
        <div class="load-more" lastID="0">
            That's All!
        </div>
    <?php } ?>    
<?php }else{ ?>    
    <div class="load-more" lastID="0">
            That's All!
    </div>    
<?php } ?>
