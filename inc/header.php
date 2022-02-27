<?php
    include 'lib/Session.php'; 
	Session::init();;
	include 'lib/Database.php';
	include 'helpers/Format.php';
	

	spl_autoload_register(function($class){
		include_once "classes/".$class.".php";
	});

	$db=new Database();
	$fm=new Format();
    $slo=new Slogan();
    $cat=new Category();
    $post=new Post();
	

	

?>
	<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="language" content="Bangla">
	<meta name="keywords" content="blog,cms blog">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://fonts.maateen.me/bangla/font.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/indexstyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
</head>

<style>

 .headlines {
    width: 100%;
    height: 40px;
    margin: 0px auto 15px;
    text-align: left;
    position: relative;
}
  
.headline_left h4 {
    width: 11.2%;
    float: left;
    font-size: 13px;
    color: #fff;
    line-height: 40px;
    margin: 0;
    text-align: center;
    font-weight: bold;
    background: red;
}
.headlines_just {
    background: slategrey;
    height: 38px;
    color: #fff;
    border-right: 1px solid #fff;
}
.headline_left h4:after {
    content: '';
    position: absolute;
    left: 116px;
    border-left: 24px solid #3a495e;
    border-top: 39px solid transparent;
    clear: both;
}
.marquee {
    width: 87%;
    height: 40px;
    overflow: hidden;
    margin: 0 2px 0 0px;
    float: right;
}
.marquee a {
    font-size: 16px;
    line-height: 40px;
    color: #000;
    margin-right: 15px;
}
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 60%;
  margin-left: 250px;
  margin-top: 20px;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: black;
  color: white;
}
.footer1{
    background: #E6E6FA;
    padding: 15px;
    
}
.app-container {
    line-height: 38px;
    float: right;
}
.app-container a, .app-container span {
    display: inline-block;
    margin: 0 0 0 10px;
    font-size: 16px;
}
.app-container .android-aps-icon {
    background: url(https://www.odhikar.news/templates/adhikar-v1/images/mobile_app_122x76.png) 0 -38px no-repeat;
    text-decoration: none;
    width: 122px;
    height: 38px;
    display: inline-block;
}
.app-container a, .app-container span {
    display: inline-block;
    margin: 0 0 0 10px;
    font-size: 16px;
}
.foot_content {
    background: cadetblue;
    margin: 0 0 0px 0;
    padding: 15px 0;
}
.container {
    padding-right: 10px;
    padding-left: 10px;
    margin-right: auto;
    margin-left: auto;
}
.wrapper {
    margin: 0 auto;
    max-width: 1048px;
    _width: 1048px;
}
.bottom_menu {
    width: 100%;
    overflow: hidden;
    margin: 0 auto;
    text-align: left;
    padding: 10px 0;
}
.row {
    margin-right: -10px;
    margin-left: -10px;
}
.botlink_box {
    width: 100%;
    float: left;
}
.botlink_box ul {
    width: 100%;
    overflow: hidden;
}
.botlink_box ul li {
    width: 20%;
    float: left;
    margin: 0 0 3px 0;
    list-style: none;
}
.foot_content {
    background: cadetblue;
    margin: 0 0 0px 0;
    padding: 15px 0;
}
.foot_content p {
    color: #fff;
    font-size: 16px;
    line-height: 26px;
}
</style>
<style>
    .top_header {
    max-width: 1048px;
    margin: 0 auto;
    overflow: hidden;
    background: #f5f5f5;
    padding: 10px 15px 10px 0px;
}
.wrapper {
    margin: 0 auto;
    max-width: 1048px;
    _width: 1048px;
}
ul.datetime {
    margin-left: 0px;
}
ul.datetime li {
    float: left;
    padding: 0px 14px 0 14px;
    /* border-right: 1px solid #000; */
    color: #000;
    line-height: 14px;
    font-size: 14px;
    font-weight: bold;
    list-style: none;
    margin-top: 5px;
}
ul.datetime li:last-child {
    border-right: none;
}
ul.datetime li > a {
    color: #000;
    line-height: 14px;
}
#social {
    text-align: center;
    float: right;
    _margin-top: -4px;
}
#social a {
    margin-right: 5px;
}
.facebookBtn {
    color: #4060A5;
    font-size: 25px;
}

.twitterBtn {
    color: #00ABE3;
    font-size: 25px;
}
.pinterestBtn {
    color: #cb2027;
    font-size: 25px;
}
.google {
    color: #d52120;
    font-size: 25px;
}
.linkedinBtn {
    color: #007bb5;
    font-size: 25px;
}
.rssBtn {
    color: #ee802f;
    font-size: 25px;
}
.youtubeBtn {
    color: #c4302b;
    font-size: 25px;
}
</style>



<body>

   <div class="top"><!-- Top Begin -->
     
       <div class="container "><!-- container Begin -->
           
       <div class="top_header hidden-print">
    <div class="wrapper">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-7">
                <ul class="list-inline datetime">
                    <li><?php 
                        date_default_timezone_set('UTC');
                        $datetime = new DateTime();
                        echo $datetime->format('Y-m-d H:i:s');
                        ?>
                         <span> ২৮ °সে</span>
                    </li>
                    <li>বেটা ভার্সন</li>
                </ul>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-5">
                <ul class="list-inline datetime">
                    <li>
                        <a href="">আর্কাইভ</a>
                    </li>
                    <li>
                        <a href="">কনভার্টার</a>
                    </li>
                </ul>
                <div id="social">
                    <a class="facebookBtn" target="_blank" href="https://www.facebook.com"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                    <a class="twitterBtn" target="_blank" href="https://twitter.com"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                    <a class="pinterestBtn" target="_blank" href="https://www.pinterest.com"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a>
                    <a class="google" target="_blank" href=""><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
                    <a class="youtubeBtn" target="_blank" href="https://www.youtube.com"><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
                    <a class="linkedinBtn" target="_blank" href="https://www.linkedin.com"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                    <a class="rssBtn" target="_blank" href=""><i class="fa fa-rss-square" aria-hidden="true"></i></a>
               </div>
            </div>
        </div>
    </div>
</div>
</div><!-- container Finish -->
</div><!-- Top Finish -->
   <!--menu bar-->
   
   <style>
     .wrapper {
    margin: 0 auto;
    max-width: 1048px;
    _width: 1048px;
}
div.search_box {
    padding: 10px 0 5px 0;
    background: #FFF;
    display: none;
}
.input-group {
    position: relative;
    display: table;
    border-collapse: separate;
}
.fa-search {
    background: #eee;
    padding: 9px 10px;
    border-radius: 50%;
    color: #3a3a3a;
}
.fa-times {
    background: #FF0000;
    padding: 9px 10px;
    border-radius: 50%;
    color: #ffffff;
}
div.header_wrapper {
    display: table;
    width: 100%;
    padding-top: 10px;
}
div.header_wrapper >div.header_left {
    text-align: left;
    width: 155px;
    padding-right: 15px;
}
div.header_wrapper >div {
    display: table-cell;
    vertical-align: middle;
}
div.header_wrapper >div.header_left img {
    height: 50px;
}
div.header_wrapper >div {
    display: table-cell;
    vertical-align: middle;
}
div.menu_category {
    float: left;
}
div.menu_category ul {
    text-align: left;
}
div.menu_category ul li {
    display: inline-block;
    padding: 0 2px;
}
div.menu_category ul li a {
    display: block;
    /* line-height: 50px; */
    padding: 5px 10px 8px;
    margin-top: 5px;
    color: #000;
    font-weight: 500;
}
div.others_menu {
    float: right;
}
div.others_menu ul {
    text-align: left;
}
div.others_menu ul li {
    display: inline-block;
}
div.others_menu ul li span {
    padding: 5px;
    display: block;
    cursor: pointer;
    /* line-height: 50px; */
    color: steelblue;
}
div.others_menu ul li span i {
    /* padding-left: 5px; */
    font-size: 14px;
}
.fa-bars {
    background: #FF0000;
    padding: 9px 10px;
    border-radius: 50%;
    color: #ffffff;
}
div.others_menu ul li span {
    padding: 5px;
    display: block;
    cursor: pointer;
    /* line-height: 50px; */
    color: steelblue;
}
div.others_menu ul li:last-child span {
    padding: 0 0px 0 10px;
}
div.others_menu ul li span {
    padding: 5px;
    display: block;
    cursor: pointer;
    /* line-height: 50px; */
    color: steelblue;
}
div.others_menu ul li:last-child span i {
    /* padding-right: 0px; */
    color: steelblue;
}
div.others_menu ul li span i {
    /* padding-left: 5px; */
    font-size: 14px;
}
.fa-search {
    background: #eee;
    padding: 9px 10px;
    border-radius: 50%;
    color: #3a3a3a;
}
div.megaMenuWrapper {
    width: 100%;
    position: absolute;
    top: 70px;
    background: #fff;
    z-index: 9999999;
    padding: 20px 20px 25px 20px;
    display: none;
    border-top: 2px solid #ccc;
    -webkit-box-shadow: 0 8px 6px -6px black;
    -moz-box-shadow: 0 8px 6px -6px black;
    box-shadow: 0 8px 6px -6px black;
}
.wrapper {
    margin: 0 auto;
    max-width: 1048px;
    _width: 1048px;
}
div.megaMenu {
    border-bottom: 1px solid #ccc;
}
div.megaMenu ul {
    text-align: left;
    list-style: none;
    overflow: hidden;
    padding-bottom: 15px;
}
ul {
    margin: 0;
    padding: 0;
}
div.megaMenu ul li {
    float: left;
    width: 16.5%;
    height: 50px;
}
div.megaMenu ul li a {
    color: #232121;
    line-height: 35px;
    font-size: 13px;
}
div.megaMenuBtm {
    width: 100%;
    margin-top: 25px;
}
div.megaMenuBtm ul {
    text-align: left;
}
div.megaMenuBtm ul li {
    display: inline-block;
    padding-right: 20px;
}
div.megaMenuBtm ul li a {
    color: #333333;
    font-size: 16px;
}
</style>
<div class="wrapper">
     <div class="header-inner" style="position: relative; width: 100%; top: 0px; z-index: 99999; background: rgb(255, 255, 255);">
    <div class="header" style="border-bottom: 2px solid steelblue; box-shadow: none;">
        <div class="search_box">
            <div class="input-group input-group-lg srch_form">
              <input type="text" name="q" class="form-control srch_keyword" placeholder="সার্চ করুন..." value="">
              <span class="input-group-addon btn-primary"><i class="fa fa-search srch_btn"></i></span>

              <span class="input-group-addon cross_btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></span>
            </div>
        </div>
        <div class="header_wrapper">
            <div class="header_left">
                <a href=""><img src="images/odhikar.png" class="img-responsive"></a>
            </div>
            <div class="header_right hidden-print">
            <div class="menu_category" style="display: block;">
                <ul>
                     <li>
                         <a href="home.php">জাতীয়</a>
                    </li>
                     <li>
                     <a href="politics.php">রাজনীতী</a>
                    </li>
                    <li>
                    <a href="inetrnational.php">আন্তর্জাতিক</a>
                    </li>
                    <li>
                    <a href="finance.php">অর্থনীতি</a>
                    </li>
                    <li>
                    <a href="sports.php">খেলাধুলা</a>
                    </li>
                    <li>
                    <a href="eductaion.php">শিক্ষাঙ্গন</a>
                    </li>
                    <li>
                            <a href="anonodo.php">আনন্দ আয়না</a>
                        </li>
                        <li>
                     <li>
                            <a href="health.php">স্বাস্থ্যকথা</a>
                        </li>
                        <li>
                            <a href="carrer.php">ক্যারিয়ার</a>
                        </li>
                 </ul>
           </div>
            <div class="others_menu">
                <ul>
                    <li>
                        <span id="all_menu">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </span>
                    </li>
                    <li>
                        <span id="search_btn">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </span>
                    </li>
                </ul>
            </div>
            <div style="clear:both"></div>
            </div>
        </div>

        <div class="megaMenuWrapper" style="display: none;">
            <div class="wrapper">
                <div class="megaMenu">
					<ul>
                        <li>
                            <a class="active" href="home.php">জাতীয়</a>
                        </li>
                        <li>
                            <a href="politics.php">রাজনীতী</a>
                        </li>
                        <li>
                            <a href="inetrnational.php">আন্তর্জাতিক</a>
                        </li>
                        <li>
                            <a href="finance.php">অর্থনীতি</a>
                        </li>
                        <li>
                            <a href="sports.php">খেলাধুলা</a>
                        </li>
                        <li>
                            <a href="eductaion.php">শিক্ষাঙ্গন</a>
                        </li>
                       
                        <li>
                            <a href="anonodo.php">আনন্দ আয়না</a>
                        </li>
                        <li>
                            <a href="carrer.php">ক্যারিয়ার</a>
                        </li>
                        <li>
                            <a href="health.php">স্বাস্থ্যকথা</a>
                        </li>
                        <li>
                            <a href="releigion.php">ধর্ম ও জীবন</a>
                        </li>
                        <li>
                            <a href="probash.php">প্রবাস-পরবাস</a>
                        </li>
                        <li>
                            <a href="capital.php">রাজধানী</a>
                        </li>
                        <li>
                            <a href="adalot.php">আদালত</a>
                        </li>
                        <li>
                            <a href="oporadh.php">অপরাধ</a>
                        </li>
                        <li>
                            <a href="sahitto.php">সাহিত্য</a>
                        </li>
                       
                        <li>
                            <a href="vinno.php">ভিন্নখবর</a>
                       
                        <li>
                            <a href="odhikar.php">আমাদের অধিকার</a>
                        </li>
                        <li>
                            <a href="bibidh.php">বিবিধ</a>
                        </li>
                       
                        <li>
                            <a href="dif.php">টুকরো খবর</a>
                        </li>
                        <li>
                            <a href="sompadokio.php">সম্পাদকীয়</a>
                        </li>
                    </ul>  
                 </div>             
               
            </div>
        </div>

    </div>
</div>
</div>
<script type="text/javascript">

        $(document).ready(function(){

        $('#search_btn').click(function(){
            $('div.header_wrapper').hide();
            $('div.search_box').show();
        });
        $('.cross_btn').click(function(){
            $('div.header_wrapper').show();
            $('div.search_box').hide();
        });
        $('#all_menu').click(function(){
            $('div.menu_category').toggle();

            icon = $(this).find("i");
            if($(icon).hasClass( "fa-times" )){
                icon.addClass('fa-bars');
                icon.removeClass('fa-times');
            }else{
                icon.removeClass('fa-bars');
                icon.addClass('fa-times');
            }

            if($('.megaMenuWrapper').css('display')=='none')
                $('.megaMenuWrapper').slideDown('fast');
            else
                $('.megaMenuWrapper').slideUp('fast');

        });
        });
       
        </script>
   <!--menu bar-->
   <!--show slogan-->
            <?php 
            $showslogan=$slo->showSlogan();
            if($showslogan){
                $i=0;
                while($result=$showslogan->fetch_assoc()){
                    $i++;

             

            ?>
<div class="marque" style="margin-top: 10px;">
    <div class="container">
        <div class="headlines hidden-print" style="border:1px solid #3a495e;">
            <div class="headline_left" style="width:100%; overflow:hidden;">
                <h4 style="background:#3a495e;" class="headlines_just">
                     সর্বশেষ :
                </h4>
            <div class="marquee">
                 <marquee direction="left" height="30" speed="normal" scrollamount="4"behavior="scroll"onmouseover="this.stop();"onmouseout="this.start();">
                   <a href=""><?php echo $result['sloganName']; ?></a>
                </marquee>
            </div>
        </div>
    </div>
</div>                 
</div>
 <?php }}?>