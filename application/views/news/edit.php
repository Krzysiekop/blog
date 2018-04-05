<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">




<h2><?php  echo $title  ?></h2>



<?php echo validation_errors();  ?>
<?php $id=$this->uri->segment(3); ?>

<?php echo form_open('news/edit/'.$id  ); ?>

            <div class="form-group">
    <label for="title">Title</label>
    <input class="form-control" type="input" name="title" /><br />
            </div>
            <div class="form-group">
    <label for="text">Text</label>
    <textarea class="form-control" name="text"></textarea><br />
            </div>
            <div class="form-group">
    <input class="btn btn-primary" type="submit" name="submit" value="Edit a post" />
            </div>
</form>


        </div>
    </div>
</div>