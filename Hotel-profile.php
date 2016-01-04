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
<html lang="en">
<!--  Adding bootstrap !-->
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
    
    <!-- Include Required Prerequisites -->
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/latest/css/bootstrap.css" />
 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    
    


    <style>
        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img {
            width: auto;
            margin: auto;
        }

    </style>

    <style>
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
    <!-- Adding google map -->
    <script>
        function initialize() {
            var lat = <?php echo strval($Hotel_Lat);?>;
            var lng = <?php echo strval($Hotel_Lng);?>;
            
            var mapProp = {
                center:new google.maps.LatLng(lat,lng),
                zoom:15,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            };
            var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(lat, lng),
                map: map
            })
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <!-- Review box -->
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
        //@import url(//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css);

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

<!-- Navigation bar which is in the top of the page -->

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <ul class="nav navbar-nav navbar-left"><li><img src="hotelimages/logotra.png" height=50px width=50px align="left"></li>
            </ul>
        </div>

        <div>
            <ul class="nav nav-pills navbar-left">
                <li><a href="index.html"><span class="glyphicon glyphicon-home"><b><font size="4" color="#A7A79B">Home</font></b></span></a></li>
                <li><a href="hotel_welcome_page.php"><span class="glyphicon glyphicon-chevron-left"><b><font size="4" color="#A7A79B">Back</font></b></span></a></li>
                
            </ul>
            </ul>
        </div>
        <div>
            <ul class="nav nav-pills navbar-right">
                <!--<li><a href="#"><span class="glyphicon glyphicon-log-in"><b><font size="4" color="#A7A79B">Login</font></b></span></a></li>
-->                <li><a href="#"><span class="glyphicon glyphicon-thumbs-up"><b><font size="4" color="#A7A79B">AboutUs</font></b></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-modal-window"><b><font size="4" color="#A7A79B">Rooms</font></b></span></a></li>

        </div>
    </div>
</nav>

<!-- The bar which contains the photos -->
<div class="row">
    <div class="col-md-18">
        <h3 class="text-primary" align = "center" ><b><?php echo $Hotel_name ?></b></h3>
    </div>
</div>
<div id="Carousel" class="carousel slide carousel-fade  col-offset-0">
        <ol class="carousel-indicators">
            <li data-target="Carousel" data-slide-to="0" class="active"></li>
            <li data-target="Carousel" data-slide-to="1"></li>
            <li data-target="Carousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            <div class="item active">
                <img src="img/download.jpg" class="img-responsive">
            </div>
           <div class="item">
               <img src="img/downloadss.jpg" class="img-responsive">
            </div>
           <div class="item">
             <img src="img/downloadsss.jpg" class="img-responsive">
            </div>
        </div>

        <a class="left carousel-control" href="#Carousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#Carousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
</div>
<style>
.carousel-fade .carousel-inner .item {
  opacity: 0;
  -webkit-transition-property: opacity;
  -moz-transition-property: opacity;
  -o-transition-property: opacity;
  transition-property: opacity;
}
.carousel-control.left, .carousel-control.right {
    background-image: none
}
.carousel-fade .carousel-inner .active {
  opacity: 1;
}
.carousel-fade .carousel-inner .active.left,
.carousel-fade .carousel-inner .active.right {
  left: 0;
  opacity: 0;
  z-index: 1;
}
.carousel-fade .carousel-inner .next.left,
.carousel-fade .carousel-inner .prev.right {
  opacity: 1;
}
.carousel-fade .carousel-control {
  z-index: 2;
}
</style>
<br><br>

<form class="navbar-form" role="search"align = "center"  action="<?php  htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <input type="text" name="datefilter" value="" class="form-control"/>
            <input type="text" align = "right" class="form-control" id="roomid" name = "roomid" placeholder="Category Name, Room ID"/>
        </div> 
	<button type="submit" class="btn btn-default">
            Search
	</button>					
    </form>
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
</div>
</div>
<br><br><br><br>
<!--Hotel Description-->
<div class="container">
    <div class="page-header">
    <h1>Description <small>Will help you to find a better place</small></h1>
</div>
    <br> <br>
    <blockquote>
         <?php echo $Hotel_desc?>
        <div class="col-xs-6">
        <!-- Form which contains the get connected -->
        <form class="form-horizontal">
            <fieldset>

                <!-- Form Name -->
                <br><br>
                <address>
                    <strong><?php echo $Hotel_name?></strong><br /> <?php echo $Hotel_address?><br /> <abbr title="Phone">Phone:</abbr><?php echo $hotel_Telephone ?>
                </address>
            </fieldset>
        </form>
    </div>
    </blockquote>  
  
</div>
<div class="container">
<!--starting of photo gallery -->

  <div class="page-header">
        <h1>Image Gallery <small>Will help you to find a better place</small></h1>
        </div>
    
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="http://onelive.us/wp-content/uploads/2014/08/flower-delivery-online.jpg" data-target="#image-gallery">
                <img class="img-responsive" src="http://onelive.us/wp-content/uploads/2014/08/flower-delivery-online.jpg" alt="Short alt text">
            </a>
        </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="The car i dream about" data-caption="If you sponsor me, I can drive this car" data-image="http://www.picturesnew.com/media/images/car-image.jpg" data-target="#image-gallery">
                <img class="img-responsive" src="http://www.picturesnew.com/media/images/car-image.jpg" alt="A alt text">
            </a>
        </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Im so nice" data-caption="And if there is money left, my girlfriend will receive this car" data-image="http://upload.wikimedia.org/wikipedia/commons/7/78/1997_Fiat_Panda.JPG" data-target="#image-gallery">
                <img class="img-responsive" src="http://upload.wikimedia.org/wikipedia/commons/7/78/1997_Fiat_Panda.JPG" alt="Another alt text">
            </a>
        </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Im so nice" data-caption="And if there is money left, my girlfriend will receive this car" data-image="http://upload.wikimedia.org/wikipedia/commons/7/78/1997_Fiat_Panda.JPG" data-target="#image-gallery">
                <img class="img-responsive" src="http://upload.wikimedia.org/wikipedia/commons/7/78/1997_Fiat_Panda.JPG" alt="Another alt text">
            </a>
        </div>

</div>


<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="image-gallery-title"></h4>
            </div>
            <div class="modal-body">
                <img id="image-gallery-image" class="img-responsive" src="">
            </div>
            <div class="modal-footer">

                <div class="col-md-2">
                    <button type="button" class="btn btn-primary" id="show-previous-image">Previous</button>
                </div>

                <div class="col-md-8 text-justify" id="image-gallery-caption">
                    This text will be overwritten by jQuery
                </div>

                <div class="col-md-2">
                    <button type="button" id="show-next-image" class="btn btn-default">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    <script>
        $(document).ready(function(){

    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current){
        $('#show-previous-image, #show-next-image').show();
        if(counter_max == counter_current){
            $('#show-next-image').hide();
        } else if (counter_current == 1){
            $('#show-previous-image').hide();
        }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr){
        var current_image,
            selector,
            counter = 0;

        $('#show-next-image, #show-previous-image').click(function(){
            if($(this).attr('id') == 'show-previous-image'){
                current_image--;
            } else {
                current_image++;
            }

            selector = $('[data-image-id="' + current_image + '"]');
            updateGallery(selector);
        });

        function updateGallery(selector) {
            var $sel = selector;
            current_image = $sel.data('image-id');
            $('#image-gallery-caption').text($sel.data('caption'));
            $('#image-gallery-title').text($sel.data('title'));
            $('#image-gallery-image').attr('src', $sel.data('image'));
            disableButtons(counter, $sel.data('image-id'));
        }

        if(setIDs == true){
            $('[data-image-id]').each(function(){
                counter++;
                $(this).attr('data-image-id',counter);
            });
        }
        $(setClickAttr).on('click',function(){
            updateGallery($(this));
        });
    }
});
        </script>

        <!-- end of photo gallery -->
 
    <!--Creating the form to the google map -->
        <br><br>
        <div class ="container">
            <div class="page-header">
                    <h1>Find Us </h1>
                </div>
            <div id="googleMap" class="col-md-12" style="width:1150px ;height:400px ; margin:  left"></div>
        </div>

   
   


<div class="container">

<div class="page-header">
    <h1>Rating <small>Will help you to find better place</small></h1>
</div>

<!-- Rating - START -->
<div class="container col-md-12" id="container1">
    
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center">Skills<span class="glyphicon glyphicon-saved pull-right"></span></h4>
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
    
    <div class=" page-header col-md-6">
        <br><br><br>

        <h2 style="font-size: 85px; bold"><small>Overall rating:  </small> 5/6 </h2>
        
        <style>
            h2 {
                text-align: center;
            }
        </style>
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
        <br>
        <br>
<div class="container">
            <!-- Comment box -->
            <div class="col-md-12">
                
                    <h1 class="page-header">User Comments</h1>
                    <div class="container" id="container1">
                    <div class="detailBox">
                        
                        
                        <div class="actionBox">
                            <ul class="commentList">

                                <li>
                                    <div class="commenterImage">
                                        <img src="http://lorempixel.com/50/50/people/7" />
                                    </div>
                                    <div class="">
                                        <p class="">Hello this is a test comment and this comment is particularly very long and it goes on and on and on.</p> <span class="date sub-text">on March 5th, 2014</span>
                                    </div>
                                </li>

                            </ul>
                            <ul class="commentList">

                                <li>
                                    <div class="commenterImage">
                                        <img src="http://lorempixel.com/50/50/people/7" />
                                    </div>
                                    <div class="">
                                        <p class="">Hello this is a test comment and this comment is particularly very long and it goes on and on and on.</p> <span class="date sub-text">on March 5th, 2014</span>
                                    </div>
                                </li>

                            </ul>
                            <form class="form-inline" role="form">
                                <div class="form-group">
                                    <textarea class="form-control" type="text" placeholder="Your comments" required></textarea>
                                </div>
                                <br>
                                <br>
                                <div class="panel-footer">
                                    <button type="button" class="btn btn-primary btn-lg">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    

</body>

</html>