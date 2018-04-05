<h2><?php echo $title;  ?></h2>


<!-- <h3><?php  //if (null !==($this->session->userdata($newdata['username']) ) ) {
//		echo 'nic'; }
//		 else {
//		 var_dump($this->session->all_userdata()); } 	?></h3> -->
 <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <h1 class="my-4">Just a simple <b>Blog</b>
          
          </h1>

<h4> <?php // print_r($this->session->all_userdata()) ?> </h4>
<h5> <?php // if (null !==($this->session->userdata('username'))) {
	//"Witaj ".$this->session->userdata('username');  	}  ; ?> </h5>

											
													


   <!-- Blog Post -->
   <?php foreach ($news as $news_item): ?>
          <div class="card mb-4">
            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title"><?php echo $news_item['title']; ?></h2>
              <p class="card-text"><?php echo $news_item['text']; ?></p>
              <a href="<?php echo site_url('news/'.$news_item['id']); ?>" class="btn btn-primary">View article &rarr;</a>
			  <a href="<?php echo site_url('news/edit/'.$news_item['id']); ?>" class="btn btn-primary">Edit</a>
			  <a href="<?php echo site_url('news/delete/'.$news_item['id']); ?>" class="btn btn-danger">Delete</a>

            </div>
            <div class="card-footer text-muted">
              Posted on <?php echo $news_item['created_at']; ?> by
              <a href="#"><?php echo $news_item['user_id'] ?></a>
                in category  <?php echo $news_item['category']; ?>
            </div>
          </div>
		<?php endforeach; ?>



           </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="<?php echo site_url('news/category/webdesign'); ?>">Web Design</a>
                    </li>
                    <li>
                      <a href="<?php echo site_url('news/category/html'); ?>">HTML</a>
                    </li>
                    <li>
                      <a href="#">Freebies</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="<?php echo site_url('news/category/javascript'); ?>">JavaScript</a>
                    </li>
                    <li>
                      <a href="<?php echo site_url('news/category/css'); ?>">CSS</a>
                    </li>
                    <li>
                      <a href="<?php echo site_url('news/category/tutorials'); ?>">Tutorials</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>


<br>
<a href="http://localhost/blog/index.php/news/create">Create post</a>
<br>
<a href="http://localhost/blog/index.php/users/login">LOGIN NOW DUDE</a>
<br>
<a href="http://localhost/blog/index.php/users/create">REGISTER NOW DUDE</a>
<br>
<a href="<?php echo site_url('users/logoff/'); ?>">LOGOFF</a>