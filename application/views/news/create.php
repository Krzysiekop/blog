<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">



<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>


<?php echo form_open('news/create'); ?>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="input" name="title" class="form-control" /><br />
        </div>

        <div class="form-group">
                <label for="text">Text</label>
                <textarea name="text" class="form-control"></textarea><br />
    </div>

     <div class="form-group">
         <label for="category">Category</label>
         <select name="category" class="form-control" >
             <option>WebDesign</option>
             <option>HTML</option>
             <option>CSS</option>
             <option>JavaScript</option>
             <option>Tutorials</option>
         </select>
     </div>


    <div class="form-group">

    <input type="submit" name="submit" class="btn-primary" value="Create post" />
    </div>

            </form>


        </div>
    </div>
</div>


