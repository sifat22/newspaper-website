<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Category.php'; ?>
<?php include '../classes/Post.php' ?>
<!--inert-->
<?php 
$cat=new Category();
$post=new Post();
if(!isset($_GET['postid']) || $_GET['postid']==NULL){
    echo "<script>window.location='productlist.php'</script>";
}else{
    $postid=$_GET['postid'];
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $updatepost=$post->postUpdate($_POST,$_FILES,$postid);
}


?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Post</h2>
        <div class="block">   
            <!--update-->
            <?php
            if(isset($updatepost)){
                echo $updatepost;
            }
            
            ?> 
            <!--edit post-->       
            <?php 
            $getpost=$post->getPostByid($postid);
            if($getpost){
                $i=0;
                while($result=$getpost->fetch_assoc()){

              
            ?>    
         <form action=""accept-charset="utf8mb4_general_ci" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Title</label>
                    </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $result['title']; ?>" class="medium" />
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
                   <!--edit-->
                    <option
                    

                    <?php
                    if($result['catId']==$value['catId']){?>
                    selected="Selected";
                    <?php   } ?> value="<?php echo $value['catId']; ?>"><?php echo $value['catName'] ?>
                    </option>
                       <?php } } ?>

                </select>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body">
                            <?php echo $result['body']; ?>
                        </textarea>
                    </td>
                </tr>

            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="<?php echo $result['image']; ?>" height="80px";width="160px";/>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
                <tr>
                    <td>
                        <label>Author</label>
                    </td>
                    <td>
                        <input type="text" name="author" value="<?php echo $result['author']; ?>" class="medium" />
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
                       <?php } } ?>
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


