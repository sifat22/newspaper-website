<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Category.php'; ?>
<?php include '../classes/Post.php' ?>
<!--inert-->
<?php 
$cat=new Category();
$post=new Post();
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $insert_post=$post->insertPost($_POST,$_FILES);
}

?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Post</h2>
        <div class="block">           
            <?php 
            if(isset($insert_post)){
                echo $insert_post;
            }
            ?>    
         <form action=""accept-charset="utf8mb4_general_ci" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Title</label>
                    </td>
                    <td>
                        <input type="text" name="title" placeholder="Enter Product Name..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                    <select id="select" name="catId">
                    <option>Select Category</option>
                    <!--show category-->
                   <?php 
                   $showCat=$cat->ShowCategory();
                   if($showCat){
                       $i=0;
                       while($value=$showCat->fetch_assoc()){

                     
                   ?>
                   <option value="<?php echo $value['catId']; ?>"><?php echo $value['catName'] ?></option>
                       <?php } } ?>

                </select>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body"></textarea>
                    </td>
                </tr>

            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
                <tr>
                    <td>
                        <label>Author</label>
                    </td>
                    <td>
                        <input type="text" name="author" placeholder="Enter Product Name..." class="medium" />
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


