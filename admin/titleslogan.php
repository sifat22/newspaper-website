<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Slogan.php' ?>
 <!--insert Slogan-->
 <?php

$slo=new Slogan();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $sloganName=$_POST['sloganName'];
    

    $insert_slogan=$slo->addslogan($sloganName);
}




?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Site Title and Description</h2>
        <div class="block sloginblock">               
         <form action=""accept-charset="utf8mb4_general_ci" method="post">
            <table class="form">	
                <?php 
                if(isset($insert_slogan)){
                    echo $insert_slogan;
                }
                
                ?>				
                
				 <tr>
                    <td>
                        <label>Website Slogan</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Website Slogan..." name="sloganName" class="medium" />
                    </td>
                </tr>
				 
				
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>