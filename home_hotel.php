<?php
include('function.php');
if ($_GET['hotel_id']){
    $hotelID = $_GET['hotel_id'];
    $Hotel = new dbHotel();

    $data = $Hotel->get_hotel_data($hotelID);

    $Hotel_email = $data['email'];
    $Hotel_name = $data['Hotel_Name'];
    $Hotel_address = $data['address'];
    $Hotel_Lat = $data['Hotel_Lat'];
    $Hotel_Lng = $data['Hotel_Lng'];
    $hotel_Telephone = $data['telephone_number'];
    $Hotel_desc = $data['Hotel_Description'];

    $_SESSION['hotel_email_view'] = $Hotel_email;
    $_SESSION['hotel_id_view'] = $hotelID;
    $_SESSION['hotel_view'] = $Hotel_name;

}

?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
<style>
           
    .carousel-inner > .item > img,
    .carousel-inner > .item > a > img {
        width: 70%;
        margin: auto;
    }
    .navbar {
        color: #FFFFFF;
        background-color: #161640;
    }

    /* OR*/

    .nav {
        color: #FFFFFF;
        background-color: #161640;

    .nav-pills > li > a {
      color: #A7A79Bf;
      font-family: 'Oswald', sans-serif;
      font-size: 0.8em ;
      padding: 1px 1px 1px ;
    }

</style> 
<style>
     .animated {
    -webkit-transition: height 0.2s;
    -moz-transition: height 0.2s;
    transition: height 0.2s;
    }

    .stars
    {
        margin: 20px 0;
        font-size: 24px;
</style>
<script type="text/javascript">
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
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
 

<script type="text/javascript">
$(function() {

  $('input[name="datefilter"]').daterangepicker({
      autoUpdateInput: false,
      locale: {
          cancelLabel: 'Clear'
      }
  });

  $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
      var startDate=$startDate.val();
      document.getElementById('demo').innerHTML='<p>'+startDate+'</p>';
      
  });

  $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });

});
</script>
</head>
<body>
    
    <!-- nav bar -->
    <nav class="navbar navbar-default">
		<div class="container-fluid">
    			<div class="navbar-header">
      				<ul class="nav navbar-nav navbar-left"><li><img src="hotelimages/logotra.png" height=50 width=50 align="left"></li>
					</ul>
    			</div>
                    <div>
                        <ul class="nav nav-pills navbar-right">
                        <li><a href="rooms_hotel.php"><span class="glyphicon glyphicon-modal-window"><b><font size="4" color="#A7A79B">Rooms</font></b></span></a></li>
                        <!--li><a href="#"><span class="glyphicon glyphicon-user"><b><font size="4" color="#A7A79B">Profile</font></b></span></a></li-->
                        <li><a href="#"><span class="glyphicon glyphicon-file"><b><font size="4" color="#A7A79B">Reports</font></b></span></a></li>
                        <!--li><a href="#"><span class="glyphicon glyphicon-cog"><b><font size="4" color="#A7A79B">Settings</font></b></a></li-->
                        <li><a href="aboutus.html"><span class="glyphicon glyphicon-thumbs-up"><b><font size="4" color="#A7A79B">AboutUs</font></b></a></li>
                        <li><a href="hotel_logout.php"><span class="glyphicon glyphicon-log-out"><b><font size="4" color="#A7A79B">Logout</font></b></a></li></ul>
                    </div>
         	</div>
    </nav>
    <!--navbar ends-->
    <h2 align = "center">Hotel Name</h2>  
    <!--carousel creates-->
    <div id="myCarousel" class="carousel slide col-md-12" data-ride="carousel" >
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="img/downloads-bg.jpg" alt="Chania">
        </div>

        <div class="item">
          <img src="img/downloads-bg.jpg" alt="Chania">
        </div>

        <div class="item">
          <img src="img/downloads-bg.jpg" alt="Flower">
        </div>

        <div class="item">
          <img src="img/downloads-bg.jpg" alt="Flower">
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <br> 
    <div>
    <!--carousel ends-->
    <form class="navbar-form" role="search"  method="post">
        <div class="form-group">
            <input type="text" name="datefilter" value="" class="form-control"/>
            <input type="text" align = "right" class="form-control" id="roomid" name = "roomid" placeholder="Category Name, Room ID"/>
        </div> 
	<button type="submit" class="btn btn-default">
            Search
	</button>					
    </form>    
    </div> 
 
    <br><br>
<!-- Review box and comments-->
<div class="container">
<div class="page-header">
    <h1>Description <small>Will help you to find a better place</small></h1>
</div>
    <blockquote>
         never seen so many lights on houses, rooftops and lawns. ... It is a replica of Neela Park. ... warmth and camaraderie on this very special holy day as church members from Chagrin Falls treat guests to a fabulous buffet.
    </blockquote>    

<div class="page-header">
    <h1>Contact us <small>Will help you to find a better place</small></h1>
</div>
    
<div class="container">
    <div class="row">
        <div class="col-xs-6">
            <!--Adding google map -->
            <script
                src="http://maps.googleapis.com/maps/api/js">
            </script>

            <script>
                function initialize() {
                  var mapProp = {
                    center:new google.maps.LatLng(51.508742,-0.120850),
                    zoom:5,
                    mapTypeId:google.maps.MapTypeId.ROADMAP
                  };
                  var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
                }
                google.maps.event.addDomListener(window, 'load', initialize);
            </script>
            
            <div class="col-md-6" id="googleMap" style="width:500px;height:380px;"></div>
        </div>
        <div class="col-xs-6">
            <blockquote>
                never seen so many lights on houses, rooftops and lawns. ... It is a replica of Neela Park. ... warmth and camaraderie on this very special holy day as church members from Chagrin Falls treat guests to a fabulous buffet.
            </blockquote>
        </div>
    </div>
</div>
<div class="container">
  <div class="page-header">
    <h1>Image Gallery <small>Will help you to find a better place</small></h1>
</div>
  <p>The .thumbnail class can be used to display an image gallery. Click on the images to see it in full size:</p>            
  <div class="row">
    <div class="col-md-4">
      <a href="pulpitrock.jpg" class="thumbnail">
        <p>Pulpit Rock: A famous tourist attraction in Forsand, Ryfylke, Norway.</p>    
        <img src="pulpitrock.jpg" alt="Pulpit Rock" style="width:150px;height:150px">
      </a>
    </div>
    <div class="col-md-4">
      <a href="img/downloads-bg.jpg" class="thumbnail">
        <p>Moustiers-Sainte-Marie: Considered as one of the "most beautiful villages of France".</p>
        <img src="moustiers-sainte-marie.jpg" alt="Moustiers Sainte Marie" style="width:150px;height:150px">
      </a>
    </div>
    <div class="col-md-4">
      <a href="cinqueterre.jpg" class="thumbnail">
        <p>The Cinque Terre: A rugged portion of coast in the Liguria region of Italy.</p>      
        <img src="cinqueterre.jpg" alt="Cinque Terre" style="width:150px;height:150px">
      </a>
    </div>
  </div>
</div>

<br>

<div class="page-header">
    <h1>Rating <small>Bootsrap Rating template</small></h1>
</div>

<!-- Rating - START -->
<div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center">Over role checking  <span class="glyphicon glyphicon-saved pull-right"></span></h4>
            </div>
            <div class="panel-body text-center">
                <p class="lead">
                    <strong>Technology Overview</strong>
                </p>
            </div>
            <ul class="list-group list-group-flush text-center">
                <li class="list-group-item">
                    <div class="skillLineDefault">
                        <div class="skill pull-left text-center">HTML5</div>
                        <div class="rating" id="rate1"></div>
                    </div>
                </li>
                <li class="list-group-item text-center">
                    <div class="skillLineDefault">
                        <div class="skill pull-left text-center">CSS</div>
                        <div class="rating" id="rate2"></div>
                    </div>
                </li>
                <li class="list-group-item text-center">
                    <div class="skillLineDefault">
                        <div class="skill pull-left text-center">jQuery</div>
                        <div class="rating" id="rate3"></div>
                    </div>
                </li>
                <li class="list-group-item text-center">
                    <div class="skillLineDefault">
                        <div class="skill pull-left text-center">C#</div>
                        <div class="rating" id="rate4"></div>
                    </div>
                </li>
            </ul>
            <div class="panel-footer text-center">
                <button type="button" class="btn btn-primary btn-lg btn-block">
                    Submit
                </button>
            </div>
        </div>
    </div>

<!-- Comment box -->
            <div>
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
                                    <input class="form-control" type="text" placeholder="Your comments" required/>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success btn-md" type="submit" >Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
</div>
<style>
    #container1 {
        margin-bottom: 120px;
        padding:20px;
        background-color:#f5f5f5;
    }

    .rating {
        margin-left: 30px;
    }

    div.skill {
        background: #5cb85c;
        border-radius: 3px;
        color: white;
        font-weight: bold;
        padding: 3px 4px;
        width: 70px;
    }

    .skillLine {
        display: inline-block;
        width: 100%;
        min-height: 90px;
        padding: 3px 4px;
    }

    skillLineDefault {
        padding: 3px 4px;
    }
</style>

<!-- you need to include the shieldui css and js assets in order for the charts to work -->
<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>

<script type="text/javascript">
    initializeRatings();

    function initializeRatings() {
        $('#rate1').shieldRating({
            max: 7,
            step: 0.1,
            value: 6.3,
            markPreset: false
        });
        $('#rate2').shieldRating({
            max: 7,
            step: 0.1,
            value: 6,
            markPreset: false
        });
        $('#rate3').shieldRating({
            max: 7,
            step: 0.1,
            value: 4.5,
            markPreset: false
        });
        $('#rate4').shieldRating({
            max: 7,
            step: 0.1,
            value: 5,
            markPreset: false
        });
    }
</script>

<!-- Rating - END -->

</div>
</body>
</html>
