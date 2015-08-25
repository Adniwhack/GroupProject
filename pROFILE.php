<?php
include('function.php');
 if ($_SESSION['hotel_id']){
     $hotelID = $_GET['hotel_id'];
     $Hotel = new dbHotel();

     $data = $Hotel->get_hotel_data();
     $Hotel_email = $data['email'];
     $Hotel_name = $data['Hotel_Name'];
     $Hotel_address = $data['address'];
     $Hotel_Lat = $data['Hotel_Lat'];
     $Hotel_Lng = $data['Hotel_Lng'];
     $hotel_Telephone = $data['telephone_number'];

 }
else{

}
?>
<!DOCTYPE html>
<html lang="en">
<!-- Adding bootstrap !-->
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!--Adding google map to the profile -->
<script src="http://maps.googleapis.com/maps/api/js"></script>
<style>
.carousel-inner > .item > img,
.carousel-inner > .item > a > img {
width: auto;
margin: auto;
}

</style>

<style> .animated {
-webkit-transition: height 0.2s;
-moz-transition: height 0.2s;
transition: height 0.2s;
}
.stars
{
margin: 20px 0;
font-size: 24px;
color: #d17581;
}</style>
<script>

function initialize() {
var hotellatlng = {lat : <?php echo $Hotel_Lat;?>,lng : <?php echo $Hotel_Lng?>};
var mapProp = {
center: hotellatlng,
zoom:5,
mapTypeId:google.maps.MapTypeId.ROADMAP
};
var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>

<script>
(function(e){var t,o={className:"autosizejs",append:"",callback:!1,resizeDelay:10},i='<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',n=["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing","textIndent"],s=e(i).data("autosize",!0)[0];s.style.lineHeight="99px","99px"===e(s).css("lineHeight")&&n.push("lineHeight"),s.style.lineHeight="",e.fn.autosize=function(i){return this.length?(i=e.extend({},o,i||{}),s.parentNode!==document.body&&e(document.body).append(s),this.each(function(){function o(){var t,o;"getComputedStyle"in window?(t=window.getComputedStyle(u,null),o=u.getBoundingClientRect().width,e.each(["paddingLeft","paddingRight","borderLeftWidth","borderRightWidth"],function(e,i){o-=parseInt(t[i],10)}),s.style.width=o+"px"):s.style.width=Math.max(p.width(),0)+"px"}function a(){var a={};if(t=u,s.className=i.className,d=parseInt(p.css("maxHeight"),10),e.each(n,function(e,t){a[t]=p.css(t)}),e(s).css(a),o(),window.chrome){var r=u.style.width;u.style.width="0px",u.offsetWidth,u.style.width=r}}function r(){var e,n;t!==u?a():o(),s.value=u.value+i.append,s.style.overflowY=u.style.overflowY,n=parseInt(u.style.height,10),s.scrollTop=0,s.scrollTop=9e4,e=s.scrollTop,d&&e>d?(u.style.overflowY="scroll",e=d):(u.style.overflowY="hidden",c>e&&(e=c)),e+=w,n!==e&&(u.style.height=e+"px",f&&i.callback.call(u,u))}function l(){clearTimeout(h),h=setTimeout(function(){var e=p.width();e!==g&&(g=e,r())},parseInt(i.resizeDelay,10))}var d,c,h,u=this,p=e(u),w=0,f=e.isFunction(i.callback),z={height:u.style.height,overflow:u.style.overflow,overflowY:u.style.overflowY,wordWrap:u.style.wordWrap,resize:u.style.resize},g=p.width();p.data("autosize")||(p.data("autosize",!0),("border-box"===p.css("box-sizing")||"border-box"===p.css("-moz-box-sizing")||"border-box"===p.css("-webkit-box-sizing"))&&(w=p.outerHeight()-p.height()),c=Math.max(parseInt(p.css("minHeight"),10)-w||0,p.height()),p.css({overflow:"hidden",overflowY:"hidden",wordWrap:"break-word",resize:"none"===p.css("resize")||"vertical"===p.css("resize")?"none":"horizontal"}),"onpropertychange"in u?"oninput"in u?p.on("input.autosize keyup.autosize",r):p.on("propertychange.autosize",function(){"value"===event.propertyName&&r()}):p.on("input.autosize",r),i.resizeDelay!==!1&&e(window).on("resize.autosize",l),p.on("autosize.resize",r),p.on("autosize.resizeIncludeStyle",function(){t=null,r()}),p.on("autosize.destroy",function(){t=null,clearTimeout(h),e(window).off("resize",l),p.off("autosize").off(".autosize").css(z).removeData("autosize")}),r())})):this}})(window.jQuery||window.$);
var __slice=[].slice;(function(e,t){var n;n=function(){function t(t,n){var r,i,s,o=this;this.options=e.extend({},this.defaults,n);this.$el=t;s=this.defaults;for(r in s){i=s[r];if(this.$el.data(r)!=null){this.options[r]=this.$el.data(r)}}this.createStars();this.syncRating();this.$el.on("mouseover.starrr","span",function(e){return o.syncRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("mouseout.starrr",function(){return o.syncRating()});this.$el.on("click.starrr","span",function(e){return o.setRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("starrr:change",this.options.change)}t.prototype.defaults={rating:void 0,numStars:5,change:function(e,t){}};t.prototype.createStars=function(){var e,t,n;n=[];for(e=1,t=this.options.numStars;1<=t?e<=t:e>=t;1<=t?e++:e--){n.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"))}return n};t.prototype.setRating=function(e){if(this.options.rating===e){e=void 0}this.options.rating=e;this.syncRating();return this.$el.trigger("starrr:change",e)};t.prototype.syncRating=function(e){var t,n,r,i;e||(e=this.options.rating);if(e){for(t=n=0,i=e-1;0<=i?n<=i:n>=i;t=0<=i?++n:--n){this.$el.find("span").eq(t).removeClass("glyphicon-star-empty").addClass("glyphicon-star")}}if(e&&e<5){for(t=r=e;e<=4?r<=4:r>=4;t=e<=4?++r:--r){this.$el.find("span").eq(t).removeClass("glyphicon-star").addClass("glyphicon-star-empty")}}if(!e){return this.$el.find("span").removeClass("glyphicon-star").addClass("glyphicon-star-empty")}};return t}();return e.fn.extend({starrr:function(){var t,r;r=arguments[0],t=2<=arguments.length?__slice.call(arguments,1):[];return this.each(function(){var i;i=e(this).data("star-rating");if(!i){e(this).data("star-rating",i=new n(e(this),r))}if(typeof r==="string"){return i[r].apply(i,t)}})}})})(window.jQuery,window);$(function(){return $(".starrr").starrr()})
$(function(){
$('#new-review').autosize({append: "\n"});
var reviewBox = $('#post-review-box');
var newReview = $('#new-review');
var openReviewBtn = $('#open-review-box');
var closeReviewBtn = $('#close-review-box');
var ratingsField = $('#ratings-hidden');
openReviewBtn.click(function(e)
{
reviewBox.slideDown(400, function()
{
$('#new-review').trigger('autosize.resize');
newReview.focus();
});
openReviewBtn.fadeOut(100);
closeReviewBtn.show();
});
closeReviewBtn.click(function(e)
{
e.preventDefault();
reviewBox.slideUp(300, function()
{
newReview.focus();
openReviewBtn.fadeIn(200);
});
closeReviewBtn.hide();

});
$('.starrr').on('starrr:change', function(e, value){
ratingsField.val(value);
});
});

</script>
<!--Style for comment box preview -->
<style>
@import url(//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css);
.detailBox {
width:320px;
border:1px solid #bbb;
margin:50px;
}
.titleBox {
background-color:#fdfdfd;
padding:10px;
}
.titleBox label{
color:#444;
margin:0;
display:inline-block;
}
.commentBox {
padding:10px;
border-top:1px dotted #bbb;
}
.commentBox .form-group:first-child, .actionBox .form-group:first-child {
width:80%;
}
.commentBox .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
width:18%;
}
.actionBox .form-group * {
width:100%;
}
.taskDescription {
margin-top:10px 0;
}
.commentList {
padding:0;
list-style:none;
max-height:200px;
overflow:auto;
}
.commentList li {
margin:0;
margin-top:10px;
}
.commentList li > div {
display:table-cell;
}
.commenterImage {
width:30px;
margin-right:5px;
height:100%;
float:left;
}
.commenterImage img {
width:100%;
border-radius:50%;
}
.commentText p {
margin:0;
}
.sub-text {
color:#aaa;
font-family:verdana;
font-size:11px;
}
.actionBox {
border-top:1px dotted #bbb;
padding:10px;
}


</style> 


</head>
<body>


<div class="container-fluid">
<div class="row">
<div class="col-md-12">

<nav class="navbar navbar-default" role="navigation" >
<div class="navbar-header">
<button type="button" class="btn btn-primary btn-md">


<span class="glyphicon glyphicon-home"></span> Home
</button>

<button type="button" class="btn btn-primary btn-md">

<span class="glyphicon glyphicon-chevron-left"></span> Back
</button>
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
<span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
</button> 
</div>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

<ul class="nav navbar-nav">
<li >

<a href="#" class="dropdown-toggle" data-toggle="dropdown">Price Range<strong class="caret" ></strong></a>
</li>

<li>
<a href="#" class="dropdown-toggle" data-toggle="dropdown">City<strong class="caret" ></strong></a>
</li>

</ul>

<form class="navbar-form navbar-left" role="search">
<div class="form-group">
<input type="text" class="form-control" placeholder="Hotel, Guest house etc" />
</div> 
<button type="submit" class="btn btn-primary btn-md">
Search
</button>
</form> 
<ul class="nav navbar-nav navbar-right">
<button type="submit" class="btn btn-primary btn-md">
<span class=" glyphicon glyphicon-log-in"></span> Login
</button>
<button type="submit" class="btn btn-primary btn-md">
<span class=" glyphicon glyphicon-thumbs-up"></span> About us

</button>

</ul>
</div>

</nav>
<div class="row">
<div class="col-md-18">
<h3 class="text-primary" align = "center" ><b><?php echo $Hotel_Name;?></b></h3>
</div>
</div>
<div id="carousel-713107" class="carousel slide" style="width: 900px; height :auto; margin: auto">

<ol class="carousel-indicators">
<li class="active" data-slide-to="0" data-target="#carousel-713107">
</li>
<li data-slide-to="1" data-target="#carousel-713107">
</li>
<li data-slide-to="2" data-target="#carousel-713107">
</li>
</ol>
<div class="carousel-inner"><?php

    /*
<div class="item active">
<img alt="Carousel Bootstrap First" src="E:\Downloads\slide_02.jpg" />

</div>
<div class="item">
<img alt="Carousel Bootstrap Second" src="E:\Downloads\slide_05.jpg" />

</div>
<div class="item">
<img alt="Carousel Bootstrap Third" src="E:\Downloads\slide_06.jpg" />

</div> */ ?>
</div>
    <a class="left carousel-control" href="#carousel-713107" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-713107" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>
</div>
</div>
<div class="row">
<br></br>
<br></br>
<div class="col-md-4">
<br></br>

<div id="googleMap" style="width:400px ;height:400px ; margin: left"></div>
</div>
<div class="col-md-4" align = "left">
<br> </br> 
<form class="form-horizontal ">
<fieldset>
<!-- Form Name -->
<legend>Room Availability</legend>
<nav class="navbar navbar-top" role="navigation" >

<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
<span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
</button> 
</div>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<form class="navbar-form navbar-left" role="search">
<label for="checkin">Check in<span class="glyphicon glyphicon-calendar"></span>:</label>
<input type="date" id="for" class="form-control">
<br></br>
<label for="checkout">Check out<span class="glyphicon glyphicon-calendar"></span>:</label>
<input type="date" id="checkout" class="form-control" >
<br></br>
<button type="submit" class="btn btn-default">
Search
</button>
</form>
</div>
</nav>
</fieldset>
</form>
</div>
<div class="col-md-4 ">
<br></br>
<form class="form-horizontal">
<fieldset>
<!-- Form Name -->
<legend>Get Connect</legend>
<address>
<strong><?php echo $Hotel_Name; ?></strong><br /><?php echo $Hotel_Address; ?><br /> <abbr title="Phone">Phone:</abbr> +(94) 91 4 383 166 
</address>
</fieldset>
</form>
</div>
</div>
<div class="container-fluid">
<div class="row">
<div class="col-md-6">
<h2 class="page-header">Ratings</h2>

<div class="text-right">
<div class="col-md-8">
<form accept-charset="UTF-8" action="" method="post">
<input id="ratings-hidden" name="rating" type="hidden"> 

<div class="text-right">
<div class="stars starrr" data-rating="4">Location </div>
<div class="stars starrr" data-rating="5">Sleep quality </div>
<div class="stars starrr" data-rating="3">Rooms </div>
<div class="stars starrr" data-rating="2">Service </div>
<div class="stars starrr" data-rating="3">Cleanliness </div>

</div>
</form>
<a class="btn btn-success btn-green" href="#reviews-anchor" id="open-review-box">Leave a Review</a>
</div>

</div>

<div class="row" id="post-review-box" style="display:none;">
<div class="col-md-8">
<form accept-charset="UTF-8" action="" method="post">
<input id="ratings-hidden" name="rating" type="hidden"> 

<div class="text-right">
<div class="stars starrr" data-rating="0">Location </div>
<div class="stars starrr" data-rating="0">Sleep quality </div>
<div class="stars starrr" data-rating="0">Rooms </div>
<div class="stars starrr" data-rating="0">Service </div>
<div class="stars starrr" data-rating="0">Cleanliness </div>
<button class="btn btn-success btn-md" type="submit">Add</button>
</div>
</form>
</div>

</div> 
</div>

<div class="col-md-6">
<div class="container">
<h2 class="page-header">Comments</h2>

<div class="detailBox">
<div class="titleBox">
<label>Comment Box</label>
<button type="button" class="close" aria-hidden="true">&times;</button>
</div>
<div class="commentBox">

</div>
<div class="actionBox">
<ul class="commentList">
<li>
<div class="commenterImage">
<img src="http://lorempixel.com/50/50/people/7" />
</div>
<div class="commentText">
<p class="">Hello this is a test comment and this comment is particularly very long and it goes on and on and on.</p> <span class="date sub-text">on March 5th, 2014</span>
</div>
</li>

</ul>
<form class="form-inline" role="form">
<div class="form-group">
<input class="form-control" type="text" placeholder="Your comments" />
</div>
<div class="form-group">
<button class="btn btn-success btn-md" type="submit">Add</button>
</div>
</form>
</div>
</div>
</div>

</div>
</div>
</div>
</div>

</div>
</div>

</body>

</html>