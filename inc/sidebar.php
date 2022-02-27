<style type="text/css">
	.tab_bar_block ul{display:table; margin-left: 0; width: 100%; font-size: 16px; background: #EDEFEE; margin-bottom:10px;}
	.tab_bar_block ul > li{position:relative; display: table-cell; padding: 5px 15px; height: 30px; width: 33.33%; text-align: center; cursor: pointer}
	.tab_bar_block ul > li.active{background: #214C83; color: #fff}
	.tab_bar_block ul > li:first-child.active:after{
		left: 100%;
	    top: 0;
	    height: 0;
	    width: 7px;
	    position: absolute;
	    content: " ";
	    pointer-events: none;
	    margin-left: 0;
	    margin-top: 0;
	    border-top: 30px solid #214C83;
	    border-right: 8px solid transparent;
	}
	.tab_bar_block ul > li:nth-child(2).active:after{
		left: 100%;
	    top: 0;
	    height: 0;
	    width: 7px;
	    position: absolute;
	    content: " ";
	    pointer-events: none;
	    margin-left: 0;
	    margin-top: 0;
	    /*border-top: 30px solid #214C83;*/
	    border-right: 8px solid transparent;
	}
	.tab_bar_block ul > li:last-child.active:before{
		right: 100%;
	    top: 0;
	    height: 0;
	    width: 7px;
	    position: absolute;
	    content: " ";
	    pointer-events: none;
	    margin-left: 0;
	    margin-top: 0;
	    border-bottom: 30px solid #214C83;
	    border-left: 8px solid transparent;
	}
	.allNews {border:1px solid #214C83;font-size: 16px;line-height: 28px;text-align: center;width: 100%; display: block; margin: 10px 0 0 0;color: #000; background:none;}
	.allNews:hover,.allNews:focus{ background:none; color:#000;}

	#popular_list_block{display: none}

	.img{position:relative;}

	.editor_picks_list{display: table; width: 100%; margin:0 0 10px 0; }
	.list_display_block .editor_picks_list:last-child{margin: 0px 0 0 0; }
	.editor_picks_list > a > div{display: table-cell; vertical-align: middle}
	.editor_picks_list > a > div.img{background: #f7f7f7; width: 90px; height: 60px; text-align: center; position:relative;}
	.editor_picks_list > a > div.img:hover{ opacity:0.9;}
	.editor_picks_list > a > div.img > i{font-size: 24px; color: #eee}
	.editor_picks_list > a > div.hl > h4{font-size: 16px; line-height: 22px; padding: 0 10px; margin:0; color:#000;}
	.editor_picks_list > a > div.hl > h4:hover{ color:#336699;}
	.list_display_inner{ overflow-y:scroll; height:445px;}

	.editor_picks_list .img .vicon{position:absolute; top:-33%; left:-9%; width:100px; height:100px; z-index:9999;  background:url(https://www.odhikar.news/templates/adhikar-v1/images/vid_icon_s.png)}
	.editor_picks_list .img .vicon:hover{position:absolute; top:-33%; left:-9%; width:100px; height:100px; z-index:9999;  background:url(https://www.odhikar.news/templates/adhikar-v1/images/vid_icon_s_hover.png)}
    .tab_bar_block ul {
    display: table;
    margin-left: 0;
    width: 100%;
    font-size: 16px;
    background: #EDEFEE;
    margin-bottom: 10px;
}
.tab_bar_block ul > li.active {
    background: #214C83;
    color: #fff;
}
.tab_bar_block ul > li {
    position: relative;
    display: table-cell;
    padding: 5px 15px;
    height: 30px;
    width: 33.33%;
    text-align: center;
    cursor: pointer;
}
.tab_bar_block ul > li:first-child.active:after {
    left: 100%;
    top: 0;
    height: 0;
    width: 7px;
    position: absolute;
    content: " ";
    pointer-events: none;
    margin-left: 0;
    margin-top: 0;
    border-top: 30px solid #214C83;
    border-right: 8px solid transparent;
}
.tab_bar_block ul > li {
    position: relative;
    display: table-cell;
    padding: 5px 15px;
    height: 30px;
    width: 33.33%;
    text-align: center;
    cursor: pointer;
}
.list_display_inner {
    overflow-y: scroll;
    height: 445px;
}
.editor_picks_list {
    display: table;
    width: 100%;
    margin: 0 0 10px 0;
}
.editor_picks_list > a > div.img {
    background: #f7f7f7;
    width: 90px;
    height: 60px;
    text-align: center;
    position: relative;
}
.editor_picks_list > a > div {
    display: table-cell;
    vertical-align: middle;
}

.img {
    position: relative;
}
img {
    max-width: 100%;
    max-height: 100%;
}
.editor_picks_list > a > div {
    display: table-cell;
    vertical-align: middle;
}
.editor_picks_list > a > div.hl > h4 {
    font-size: 16px;
    line-height: 22px;
    padding: 0 10px;
    margin: 0;
    color: #000;
}
.editor_picks_list {
    display: table;
    width: 100%;
    margin: 0 0 10px 0;
}
.editor_picks_list > a > div.img {
    background: #f7f7f7;
    width: 90px;
    height: 60px;
    text-align: center;
    position: relative;
}
.editor_picks_list > a > div {
    display: table-cell;
    vertical-align: middle;
}
.img {
    position: relative;
}
img {
    max-width: 100%;
    max-height: 100%;
}
</style>

<div class="col-md-4" style="margin-top: 50px;">

<div class="tab_bar_block">
    <ul class="list-inline">
        <li class="active" tabindex="latest_list_block">
            সর্বশেষ
        </li>
        <li tabindex="popular_list_block">
            সর্বাধিক পঠিত
        </li>
    </ul>
</div>
<div class="list_display_block" id="latest_list_block">
    <div class="list_display_inner">
                                 <!--get Latest News-->
                                 <?php 
                        $getlatestpost=$post->getLastPost();
                        if($getlatestpost){
                            while($result=$getlatestpost->fetch_assoc()){

                        
                        ?>
        <div class="editor_picks_list">
            <a href="details.php?postid=<?php echo $result['postId']; ?>">
                <div class="img">
                    <img src="admin/<?php echo $result['image']; ?>" title="" alt="৪২ হাজার মানুষের দেহে পুশ হচ্ছে অক্সফোর্ডের ভ্যাকসিন">
                </div><!--end img-->
                <div class="hl">
                    <h4> <?php echo $result['title']; ?></h4>
                </div><!--end hl-->
            </a>
        </div>
          <?php } } ?>
    </div>
    <div align="right">
        <a class="allNews" href="allpost.php">সব খবর </a>
    </div>
</div>
<div class="list_display_block" id="popular_list_block">
    <div class="list_display_inner">
              <!--get more Read News-->
              <?php 
                        $getmore=$post->getmoreRead();
                        if($getmore){
                            while($result=$getmore->fetch_assoc()){

                        
                        ?>
        <div class="editor_picks_list">
        <a href="details.php?postid=<?php echo $result['postId']; ?>">
        <div class="img">
            <img src="admin/<?php echo $result['image']; ?>" title="" alt="এক দিনে সর্বোচ্চ করোনা শনাক্ত, মৃত্যুর রেকর্ড">
        </div><!--end img-->
        <div class="hl">
        <?php echo $result['title']; ?>
        </div><!--end hl-->
    </a>
        </div>
         <?php } } ?>
    </div>
    <div align="right"><a class="allNews" href="lastall">সব খবর</a>
</div>
</div>
<script type="text/javascript">
	$('.tab_bar_block li').on('click',function(){
		if(!$(this).hasClass('active')){
			var tabIndex = $(this).attr('tabIndex');
			$('.tab_bar_block li').removeClass('active');
			$(this).addClass('active');
			$('.list_display_block').hide();
			$('#' + tabIndex).fadeIn();
		}
	});
</script>







               
            </div>