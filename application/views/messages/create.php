



<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">



<h2><?php //echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php $user=$this->uri->segment(3); ?>

<?php echo form_open('messages/create/'.$user); ?>


<div class="form-group">
                <label for="user_from">FROM:</label>
                <input type="input" name="from" value="<?php echo $this->session->userdata('user_name'); ?>" class="form-control"  readonly/><br />
        </div>


<div class="form-group">
                <label for="user_to">TO:</label>
                <input type="input" name="to" value="<?php   echo $user;   ?>" class="form-control"  readonly/><br />
        </div>


<div class="form-group">
                <label for="subject">Subject: </label>
                <input type="input" name="subject" class="form-control" /><br />
        </div>

        <div class="form-group">
                <label for="text">Message content: </label>
                <textarea name="message_text" class="form-control"></textarea><br />
    </div>
  
    <div class="form-group">

    <input type="submit" name="submit" class="btn-primary" value="Send Message" />
    </div>

            </form>


        </div>
    </div>
</div>
 
 
 
 
 
 