<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">


<h2><?php  echo $title  ?></h2>



<?php echo validation_errors();  ?>
<?php $id=$this->uri->segment(3); ?>

<?php echo form_open('comment/create/'); ?>

            <div class="form-group">
    <label for="title">Title</label>
    <input type="input" class="form-control" name="title" /><br />
            </div>
            <div class="form-group">
    <label for="text">Text</label>
    <textarea name="text" class="form-control"></textarea><br />
            </div>
	<input type="hidden" name="id" value=<?php echo $id ?> />
            <div class="form-group">
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
 
</form>


        </div>
    </div>
</div>
