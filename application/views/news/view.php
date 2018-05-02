<?php
//echo '<h2>'.$news_item['title'].'</h2>';

$id=$this->uri->segment(2);
?>


          <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Title -->
          <h1 class="mt-4"><?php echo $news_item['title']; ?></h1>

          <!-- Author -->
          <p class="lead">
            by
            <a href="#"><?php echo $news_item['user_id'] ?></a>
          </p>

          <hr>

          <!-- Date/Time -->
          <p>Posted on <?php echo $news_item['created_at'] ?> </p>

          <hr>

          <!-- Preview Image -->
         <!-- <img class="img-fluid rounded" src="http://placehold.it/900x300" alt=""> -->

            <!--    <hr> -->

                <!-- Post Content -->
          <p class="lead"><?php echo $news_item['text']; ?></p>


          <hr>
            <!-- Jeżeli zalogowany to moze dodac foto -->
            <?php  if ($this->session->userdata('Admin')===true){ ?>
            <a href="<?php echo site_url("upload/do_upload/$id"); ?>">Add a photo</a>
            <?php  } else {}  ?>
<br>

            <!-- Jeżeli zalogowany to moze dodac komentarz -->
            <?php  if ($this->session->userdata('is_logged')===true){ ?>
            <a href="<?php echo site_url("comment/create/$id"); ?>">Add a comment</a>
            <br>
            <?php  } else {}  ?>
<br>
