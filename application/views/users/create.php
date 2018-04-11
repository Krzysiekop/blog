

<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">



<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('users/create'); ?>

            <div class="form-group row">
    <label for="username">Username</label>
    <input class="form-control" type="input" name="username" /><br />
    <small  class="form-text text-muted">Username should be unique.</small>
            </div>
            <div class="form-group row">
    <label for="email">Email</label>
    <input name="email" class="form-control"></textarea><br />
       <small  class="form-text text-muted">Mail address should be unique. We'll never sell your data. Probably. </small>
            </div>
            <div class="form-group row">
	<label for="password">Password</label>
    <input type="password" name="password" class="form-control"></textarea><br />
            </div>

            <div class="form-group row">
    <input type="submit" class="btn btn-primary" name="submit" value="register" />
            </div>
</form>



        </div>
    </div>
</div>
