    <!--header.php-->
    <?php  include 'inc/header.php';?>
    <!--show post by id-->
    <?php
    if(isset($_GET['postid'])){
       
        $postid=$_GET['postid'];
    }
    ?>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!--show single post in a details page -->
					<?php
					
                    $getsinglepost=$post->getSinglepost($postid);
                    if($getsinglepost){
                        while($result=$getsinglepost->fetch_assoc()){

                     
                    ?>
                <ul class="breadcrumb">
                    <li style="background:#3a495e; padding:5px; width:90px; ">
                        <a style="color:#fff;" href="index.php"><i class="fa fa-home"> প্রচ্ছদ</i></a>
                    </li>
                    <li>
                        <a href="<?php
                        if($result['catName']=='জাতীয়'){
                         echo "home" ?>.php"><?php echo $result['catName']; 
                        }elseif($result['catName']=='রাজনীতী'){
                        echo "politics" ?>.php"><?php echo $result['catName']; 
                    }elseif($result['catName']=='আন্তর্জাতিক'){
                        echo "inetrnational"?>.php"><?php echo $result['catName']; 
                    }elseif($result['catName']=='অর্থনীতি'){
                        echo "finance"?>.php"><?php echo $result['catName']; 
                    }elseif($result['catName']=='খেলা ধুলা'){
                        echo "sports"?>.php"><?php echo $result['catName']; 
                    }elseif($result['catName']=='শিক্ষাঙ্গন'){
                        echo "eductaion"?>.php"><?php echo $result['catName']; 
                    }elseif($result['catName']=='আনন্দ আয়না'){
                        echo "anonodo"?>.php"><?php echo $result['catName']; 
                    }elseif($result['catName']=='স্বাস্থ্যকথা'){
                        echo "health"?>.php"><?php echo $result['catName']; 
                    }elseif($result['catName']=='ক্যারিয়ার'){
                        echo "carrer"?>.php"><?php echo $result['catName']; 
                    }elseif($result['catName']=='ধর্ম ও জীবন'){
                        echo "releigion"?>.php"><?php echo $result['catName']; 
                    }elseif($result['catName']=='প্রবাস-পরবাস'){
                        echo "probash"?>.php"><?php echo $result['catName']; 
                    }elseif($result['catName']==' রাজধানী'){
                        echo "capital"?>.php"><?php echo $result['catName']; 
                    }elseif($result['catName']==' আদালত'){
                        echo "adalot"?>.php"><?php echo $result['catName']; 
                    }elseif($result['catName']==' অপরাধ'){
                        echo "oporadh"?>.php"><?php echo $result['catName']; 
                    }elseif($result['catName']=='আমাদের অধিকার'){
                        echo "odhikar"?>.php"><?php echo $result['catName']; 
                    }elseif($result['catName']=='টুকরো খবর'){
                        echo "dif"?>.php"><?php echo $result['catName']; 
                    }elseif($result['catName']=='বিবিধ'){
                        echo "bibidh"?>.php"><?php echo $result['catName']; 
                    }elseif($result['catName']=='ভিন্নখবর'){
                        echo "vinno"?>.php"><?php echo $result['catName']; 
                    }elseif($result['catName']=='এক্সক্লুসিভ'){
                        echo "exclusive"?>.php"><?php echo $result['catName']; 
                    }elseif($result['catName']=='সাহিত্য'){
                        echo "sahitto"?>.php"><?php echo $result['catName']; 
                    }

                    
                    
                  
                    
                    
                         ?> >   <i class="fa fa-info"> > <?php echo $result['title']; ?></i> </a>
                       
                    </li>
                    
                </ul>
                <div class="content-details">
                    <h2> <?php echo $result['title']; ?></h2>
                </div>
                <div class="icon" style="margin-top: 10px;">
                    <p><i class="fa fa-user" style="color: #777;">  <?php echo $result['author']; ?></i></p>
                </div>
                <div class="icon">
                    <p><i class="fa fa-calendar" style="color: #777;">  <?php echo $fm->formatDate($result['date']); ?></i></p>
                </div>
                <div class="contentimages">
                    <img src="admin/<?php echo $result['image'];?>"style="width: 700px; height:400px;" class="img-responsive"; alt="">
                </div>
                <div class="imagecontent">
                   <h3 class="head" style="font-weight: bold;">
                   <?php echo $result['title'];?>
                    </h3>
                   <p style="font-size: 16px; line-height:25px;text-align:justify;">
                   <?php echo $result['body'];?>
                    </p>
                </div>
                      
                <div class="hr" style="margin-top:50px;">
                    <h4>আরও খবর</h4>
                </div>
                <?php } } ?>
                <hr>
                <div class="content-area">
                    <div class="row">
                    <div class="col-md-4">
                     <!--show more news-->
                        <?php 
                        $getnews=$post->getMorePost();
                        if($getnews){
                            while($value=$getnews->fetch_assoc())
                            {

                          
                        ?>
                        <div class="post">
                           <div class="small-imgae" style="margin-top: 15px;">
                           <a href="details.php?postid=<?php echo $value['postId']; ?>"><img src="admin/<?php echo $value['image']; ?>" style="width: 200px;height:100px;"  alt="" class="img-resposinve"></a>
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
                     <!--show more news-->
                        <?php 
                        $getnews=$post->getMorePost();
                        if($getnews){
                            while($value=$getnews->fetch_assoc())
                            {

                          
                        ?>
                        <div class="post">
                           <div class="small-imgae" style="margin-top: 15px;">
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
                        <div class="col-md-4" >
                   <!--show more news-->
                        <?php 
                        $getnews=$post->getMorePost();
                        if($getnews){
                            while($value=$getnews->fetch_assoc())
                            {

                          
                        ?>
                        <div class="post">
                           <div class="small-imgae" style="margin-top: 15px; ">
                           <a href="details.php?postid=<?php echo $value['postId']; ?>"><img src="admin/<?php echo $value['image']; ?>" style="width: 200px;height:100px;"  alt="" class="img-resposinve"></a>
                           </div>
                           <div class="small-image-content">
                               <a href="details.php?postid=<?php echo $value['postId']; ?>" class="pera" style="margin-top:5px;  text-align:left;">
                               <?php echo $value['title']; ?>
                               </a>
                           </div>
                        </div>
                            <?php } } ?>
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
<?php  include 'inc/footer.php';?>