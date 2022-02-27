<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Category.php'; ?>
<!--insert Category-->
<?php 
$cat=new Category();
if($_SERVER['REQUEST_METHOD']=='POST'){
    $catName=$_POST['catName'];
    

    $insert_cat=$cat->addCat($catName);
}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                 <form action=""accept-charset="utf8mb4_general_ci" method="post">
                     <!--insert-->
                     <?php 
                     if(isset($insert_cat)){
                         echo $insert_cat;
                     }
                     
                     ?>
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>