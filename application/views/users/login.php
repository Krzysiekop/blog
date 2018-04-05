<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">



<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('users/login'); ?>

    <div class="form-group">
    <label for="username">Username</label>
    <input type="input" name="username" class="form-control"  /><br />
    </div>

            <div class="form-group">
	<label for="password">Password</label>
    <input type="password" class="form-control"  name="password"></input><br/>
            </div>
            <div class="form-group">
    <input type="submit" class="btn btn-primary" name="submit" value="login" />
            </div>
</form>





        </div>

    </div>

</div>