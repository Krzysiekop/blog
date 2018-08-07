<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Just a Blog </title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/blog-home.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
  
    
    
 
    
    
<!--    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    -->
    
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Just a blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

            <!--NAVBAR GDY USER JEST ZALOGOWANY -->
           <?php if (null !==($this->session->userdata('user_name'))) { ?>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">       
                <a class="nav-link" href="<?php echo base_url(); ?>index.php/users/profile/<?php echo $this->session->userdata('user_name');?>">
                <?php echo "Welcome ".$this->session->userdata('user_name')." See your profile";	 ?>  
						  </a>
                    </li>
<!--            <li class="nav-item active">-->
                <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>index.php/news">Home
                  
                <span class="sr-only">(current)</span>
              </a>
            </li>
                                   
                <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('news/create/'); ?>">Create post</a>
            </li> 
              <li class="nav-item">
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('users/logoff/'); ?>">Logoff</a>
            </li>
          </ul>

            <!-- NAVBAR GDY USER JEST NIE ZALOGOWANY -->
            <?php } else{  ?>
            <ul class="navbar-nav ml-auto">

               <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>index.php/news">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('users/login/'); ?>">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('users/create/'); ?>">Register</a>
                </li>

            </ul>
            <?php  }  ?>
        </div>
      </div>
    </nav>