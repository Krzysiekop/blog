



<?php echo $error;?>
<div> Only JPG, should be 750x300</div>
<?php $id=$this->uri->segment(3) ?>
<?php echo form_open_multipart("upload/do_upload/$id");?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>

