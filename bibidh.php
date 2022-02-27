<?php include 'inc/header.php'; ?>
<div class="back-img">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <?php 
                $getsinglefinancenew=$post->getHeaNews();
                if($getsinglefinancenew){
                    while($result=$getsinglefinancenew->fetch_assoc()){

                
                ?>
                <div class="contentimages">
                    <img src="admin/<?php echo $result['image']; ?>" style="width: 700px; height:400px;" class="img-responsive"; alt="">
                </div>
                <div class="imagecontent">
                   <a href="details.php?postid=<?php echo $result['postId']; ?>"><h4 class="head" style="font-weight: bold;">
                   <?php echo $result['title']; ?>
                    </h4></a> 
                    <a href="details.php?postid=<?php echo $result['postId']; ?>"><p class="pera">
                    <?php echo $fm->textShorten($result['body'],800); ?>
                    </p></a>
                </div>
                    <?php } } ?>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="breadcrumb">
                    <li style="background:#3a495e; padding:5px; width:90px; ">
                        <a style="color:#fff;" href="index.php"><i class="fa fa-home"> প্রচ্ছদ</i></a>
                    </li>
                    <li>
                        <a href="জাতীয়.php"> সর্বশেষ সব খবর</a>
                    </li>
                </ul>
                <div class="allnews">
                    <div class="col-md-12 c0l-sm-12">
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
                        <div class="col-md-6">
                        <div class="news">
                        <div class="col-md-12">
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