<?php include 'inc/header.php'; ?>

<div style="width:100%; position:relative;">
<div class="container">
    <style>
        
    .upazila_election{ width:100%; overflow:hidden; margin-bottom:15px;}
    .upazila_election h3{ background:cadetblue; line-height:40px; text-align:center; font-size:20px;margin:0; color:#fff;}
    .upazila_election table{ margin-bottom:0px;}
    .upazila_election table tr th{ text-align:center;border:1px solid cadetblue;}
    .upazila_election table tr td{ padding:5px 10px; border:1px solid cadetblue; text-align:center;}
    .upazila_election h4{ background:#ffef03; line-height:40px; font-size:15px; text-align:center; margin:0;color:#fff;}
    .upazila_election span{ color:#fff;}

    </style>
    <div style="display:none">
    adhikar-hrch_cat_news-118-4
    </div>
    <div class="spc_mn_news_block bg-dark">
        <div class="spc_mn_banner">
            <a href="">
                <img src="imgaes/int1.jpg" alt="" class="img-responsive">
            </a>
        </div>
        <div class="row">
    <?php 
    $show1image=$post->getOneNews();
    if($show1image){
        while($result=$show1image->fetch_assoc()){

     
    ?>
        <div class="col-md-3 col-sm-3">
            <div class="body_block">
                <a href="details.php?postid=<?php echo $result['postId']; ?>">
                <div class="body_img">
                    <img alt="বগুড়া" style="width: 200px;" src="admin/<?php echo $result['image']; ?>" >
                </div>
                <div class="special_headline">
                    <h4 class="text-white">
                       <?php echo $result['title']; ?>
                    </h4>
                    </div>
                </a>
            </div>
        </div>
        <?php } } ?>
        <?php
        $show1image=$post->getFinNews();
    if($show1image){
        while($result=$show1image->fetch_assoc()){

     
    ?>
        <div class="col-md-3 col-sm-3">
            <div class="body_block">
                <a href="details.php?postid=<?php echo $result['postId']; ?>">
                <div class="body_img">
                    <img alt="বগুড়া" style="width: 200px;" src="admin/<?php echo $result['image']; ?>" >
                </div>
                <div class="special_headline">
                    <h4 class="text-white">
                       <?php echo $result['title']; ?>
                    </h4>
                    </div>
                </a>
            </div>
        </div>
        <?php } } ?>
        <?php
        $show1image=$post->getIntNews();
    if($show1image){
        while($result=$show1image->fetch_assoc()){

     
    ?>
        <div class="col-md-3 col-sm-3">
            <div class="body_block">
                <a href="details.php?postid=<?php echo $result['postId']; ?>">
                <div class="body_img">
                    <img alt="বগুড়া" style="width: 200px;" src="admin/<?php echo $result['image']; ?>" >
                </div>
                <div class="special_headline">
                    <h4 class="text-white">
                       <?php echo $result['title']; ?>
                    </h4>
                    </div>
                </a>
            </div>
        </div>
        <?php } } ?>
        <?php
         $show1image=$post->getOneNews();
         if($show1image){
             while($result=$show1image->fetch_assoc()){
     
          
         ?>
             <div class="col-md-3 col-sm-12">
                 <div class="body_block">
                     <a href="details.php?postid=<?php echo $result['postId']; ?>">
                     <div class="body_img">
                         <img alt="বগুড়া" style="width: 200px;" src="admin/<?php echo $result['image']; ?>" >
                     </div>
                     <div class="special_headline">
                         <h4 class="text-white">
                            <?php echo $result['title']; ?>
                         </h4>
                         </div>
                     </a>
                 </div>
             </div>
             <?php } } ?>
             <a href="allpost.php" class="aro_khbr" style="float:right;color: #fff !important">আরও খবর <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
    </div>
</div>

    </div>
    </div>
    
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8">
                <ul class="breadcrumb">
                    <li style="background:#3a495e; padding:5px; width:90px; ">
                        <a style="color:#fff;" href="index.php"><i class="fa fa-home"> প্রচ্ছদ</i></a>
                    </li>
                    <li>
                        <a href="জাতীয়.php"> সর্বশেষ সব খবর</a>
                    </li>
                </ul>
                <div class="allnews">
                    <div class="col-md-12 col-sm-12">
                        <div class="col-md-6 col-sm-6">
                            <div class="news">
                            <div class="col-md-12">
                                    <!--get সর্বশেষ news-->
                                    <?php 
                                        $getmoreread=$post->getLastPost();
                                        if($getmoreread){
                                            while($value=$getmoreread->fetch_assoc()){

                                         
                                    ?>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5">
                                            <div class="news-image" style="margin-top:15px;">
                                                <a href="details.php?postid=<?php echo $value['postId']; ?>">
                                                    <img style="width: 120px; height:80px;" src="admin/<?php echo $value['image']; ?>" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-sm-7">
                                            <div class="new-content" style="margin-top:25px;">
                                            <a href="details.php?postid=<?php echo $value['postId']; ?>">
                                                <p><?php echo $value['title']; ?> </p>
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                  <?php } } ?>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-6 col-sm-6">
                        <div class="news">
                        <div class="col-md-12 col-sm-12">
                                    <!--get সর্বশেষ news-->
                                    <?php 
                                        $getmoreread=$post->getmoreRead();
                                        if($getmoreread){
                                            while($value=$getmoreread->fetch_assoc()){

                                         
                                    ?>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="news-image" style="margin-top:15px;">
                                                <a href="details.php?postid=<?php echo $value['postId']; ?>">
                                                    <img style="width: 120px; height:80px;" src="admin/<?php echo $value['image']; ?>" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="new-content" style="margin-top:25px;">
                                            <a href="details.php?postid=<?php echo $value['postId']; ?>">
                                                <p><?php echo $value['title']; ?> </p>
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                  <?php } } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="btn">
                   <a href="allpost.php"><button class="btn btn-lg" style="width:200%;background: #337AB7;">সর্বাধিক পঠিত</button></a>
               </div>
               <div class="col-md-12">
                    <!--get more Read News-->
                    <?php 
                        $getmore=$post->getmoreRead();
                        if($getmore){
                            while($result=$getmore->fetch_assoc()){

                        
                        ?>
                   <div class="row">
                       <div class="col-md-6">
                            <div class="small-imgae" style="margin-top: 15px;">
                               <a href="details.php?postid=<?php echo $result['postId']; ?>"><img style="width: 140px; height:80px;" src="admin/<?php echo $result['image']; ?>"  alt="" class="img-resposinve"></>
                            </div>
                       </div>
                       <div class="col-md-6">
                            <div class="small-image-content"style="margin-top:15px; text-align:left; font-size:13px;">
                                <a href="details.php?postid=<?php echo $result['postId']; ?>" class="pera">
                                    <?php echo $result['title']; ?>
                                </a>
                            </div>
                       </div>
                   </div>
                   <?php } } ?>
               </div>
               
            </div>
            <div class="btn" style="margin-left: 800px;margin-top:2px">
                   <a href="allpost.php"><button class="btn btn-lg" style="width:250%;">সব খবর</button></a>
               </div>
        </div>
        
    </div>
</div> 
<hr>


<?php include 'inc/footer.php'; ?>