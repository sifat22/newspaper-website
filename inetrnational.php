<!--header.php-->
<?php include 'inc/header.php';?>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="breadcrumb">
                    <li style="background:#3a495e; padding:5px; width:90px; ">
                        <a style="color:#fff;" href="index.php"><i class="fa fa-home"> প্রচ্ছদ</i></a>
                    </li>
                    <li>
                        <a href="inetrnational.php">আন্তর্জাতিক</a>
                    </li>
                </ul>
                <!--show আন্তর্জাতিক-->
                <?php 
                $genIntOnenews=$post->getIntNews();
                if($genIntOnenews){
                    while($result=$genIntOnenews->fetch_assoc()){

                
                ?>
                <div class="contentimages">
                    <img src="admin/<?php echo $result['image']; ?>" style="width: 700px; height:400px;" class="img-responsive"; alt="">
                </div>
                <div class="imagecontent">
                   <a href="details.php?postid=<?php echo $result['postId']; ?>"><h4 class="head" style="font-weight: bold;">
                   <?php echo $result['title']; ?>
                    </h4></a> 
                    <a href="details.php?postid=<?php echo $result['postId']; ?>"><p class="pera">
                    <?php echo $fm->textShorten($result['body'],400); ?>
                    </p></a>
                </div>
                    <?php } } ?>
                <div class="content-area">
                    <div class="row">
                    <div class="col-md-4">
                     <!--show আন্তর্জাতিক-->
                        <?php 
                        $getnews=$post->getPostByrandInt();
                        if($getnews){
                            while($value=$getnews->fetch_assoc())
                            {

                          
                        ?>
                        <div class="post">
                           <div class="small-imgae" style="margin-top: 15px; ">
                           <a href="details.php?postid=<?php echo $value['postId']; ?>"><img src="admin/<?php echo $value['image']; ?>" style="width: 200px;height:100px;" alt="" class="img-resposinve"></a>
                           </div>
                           <div class="small-image-content">
                               <a href="details.php?postid=<?php echo $value['postId']; ?>" class="pera" style="margin-top:5px;  text-align:left;">
                               <?php echo $value['title']; ?>
                               </a>
                           </div>
                        </div>
                            <?php } } ?>
                        </div>
                        <div class="col-md-4">
                           <!--show আন্তর্জাতিক-->
                        <?php 
                        $getnews=$post->getPostByrandInt();
                        if($getnews){
                            while($value=$getnews->fetch_assoc())
                            {

                          
                        ?>
                        <div class="post">
                           <div class="small-imgae" style="margin-top: 15px;">
                           <a href="details.php?postid=<?php echo $value['postId']; ?>"><img src="admin/<?php echo $value['image']; ?>"style="width: 200px;height:100px;" alt="" class="img-resposinve"></a>
                           </div>
                           <div class="small-image-content">
                               <a href="details.php?postid=<?php echo $value['postId']; ?>" class="pera" style="margin-top:5px;  text-align:left;">
                               <?php echo $value['title']; ?>
                               </a>
                           </div>
                        </div>
                            <?php } } ?>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-12">
                                <?php 
                                 $getlatestpost=$post->getIntpost();
                                 if($getlatestpost){
                                     while($result=$getlatestpost->fetch_assoc()){
         
                                 
                                 ?>
                                
                                
                           <div class="row" >
                           <div class="col-md-6 col-sm-6">
                                     <div class="small-imgae" style="margin-top: 15px; width:100px; height:70px;">
                                         <a href="details.php?postid=<?php echo $result['postId']; ?>"><img  src="admin/<?php echo $result['image']; ?>" alt="" class="img-resposinve"></a>
                                     </div>
                               </div>
                               <div class="col-md-6 col-sm-6">
                                    <div class="small-image-content"style="margin-top:15px;width:210%; margin-left:10px; text-align:left; font-size:13px;">
                                    <a  href="details.php?postid=<?php echo $result['postId']; ?>" class="pera">
                                        	
                                            <?php echo $result['title']; ?>
    
                                            </a>
                                    </div>
                               </div>
                           </div>
                                     <?php } } ?>
                          
                           </div>
                           <hr>
                           <div class="btn" style="margin-left: 90px;margin-top:5px">
                                <a href="allpost.php"class="btm btn-lg" style="font-size: 15px;">আরও খবর ></a>
                         </div>
                        </div>
                        
                    </div>
                </div>

            </div>
            <!--sidebar.php-->
<?php  include 'inc/sidebar.php';?>
        </div>
    </div>
</div>
<!--footer.php-->
<?php include 'inc/footer.php'; ?>