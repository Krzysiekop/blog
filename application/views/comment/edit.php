<h2><?php  echo $title  ?></h2>



<?php echo validation_errors();  ?>
<?php $id=$this->uri->segment(3); ?>

<?php echo form_open('comment/create/'.$id  ); ?>

    <label for="title">Title</label>
    <input type="input" name="title" /><br />

    <label for="text">Text</label>
    <textarea name="text"></textarea><br />

    <input type="submit" name="submit" value="Create news item" />

</form>