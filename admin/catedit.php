<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Category.php'; ?>
<!--Update Category-->
<?php 
$cat=new Category();
if(!isset($_GET['catid']) || $_GET['catid']==NULL){
    echo "<script>window.location='catlist.php'</script>";
}else{
    $catid=$_GET['catid'];
}

    
if($_SERVER['REQUEST_METHOD']=='POST'){
    $catName=$_POST['catName'];
       
    $update_cat=$cat->updateCat($catName,$catid);
}


?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                 <form action=""accept-charset="utf8mb4_general_ci" method="post">
                     <!--update category-->
                     <?php 
                     if(isset($update_cat)){
                         echo $update_cat;
                     }
                     
                     ?>
                  
                     <!--edit Category-->
                     <?php 
                     $get_cat=$cat->getCtaById($catid);
                     if($get_cat){
                         while($result=$get_cat->fetch_assoc()){

                      
                     ?>
                     
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" value="<?php echo $result['catName']; ?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                         <?php } } ?>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>