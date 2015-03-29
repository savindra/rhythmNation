
    	<meta charset="utf-8" />
    	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    	<title> <?php echo $pageTitle ?> | RhythmNation</title>
    	<link rel="stylesheet" href="css/foundation.css" />
        <link rel="stylesheet" href="css/foundation-icons.css" />
        <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,800italic,700,600,800,400' rel='stylesheet' type='text/css'>
    	<script src="js/vendor/modernizr.js"></script>
        <script src="http://maps.googleapis.com/maps/api/js"></script>
        <script>
			function initialize() {
			  var mapProp = {
				center:new google.maps.LatLng(6.90162, 79.86895),
				zoom:15,
				mapTypeId:google.maps.MapTypeId.ROADMAP
			  };
			  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
			}
			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
        
        <style type="text/css">.panel{background:#F5F5F5;} IMG.displayed {display: block;margin-left: auto;margin-right: auto } h2, h3, h4,h6, p, li, body { font-family: 'Open Sans'; } .cvcolumns {padding-left:0.0rem;padding-right:0.0rem;} .panel.callout{background:#FDFDFD;} .addressImg{background:url(css/svgs/fi-address-book.svg) no-repeat 0 0; background-size:2.5rem 2.5rem;padding-left: 4rem;} div{display:block;} table tr th, table tr td, li, p{font-size:14px;} .leftHr {height: 2px;color: #ed1d61;background: #0099FF;font-size: 0;border: 0;} .contactImg{background:url(css/svgs/fi-telephone.svg) no-repeat 0 0; background-size:2.5rem 2.5rem;padding-left: 4rem;}  .rightHr {height: 5px;color: #000;background: #000;font-size: 0;border: 0;} .webImg{background:url(css/svgs/fi-web.svg) no-repeat 0 0; background-size:2.5rem 2.5rem;padding-left: 4rem;} .langImg{background:url(css/svgs/fi-clipboard-notes.svg) no-repeat 0 0; background-size:2.5rem 2.5rem;padding-left: 4rem;} .linkedInImg{background:url(css/svgs/fi-social-linkedin.svg) no-repeat 0 0; background-size:2.5rem 2.5rem;padding-left: 4rem;} .ImageBorder{padding:10px;border:medium solid #09F;} header{ 
  display:table;
  text-align:center; 
}
header:before, header:after{ 
  content:'';
  display:table-cell; 
  background:#09F; 
  width:50%;
  -webkit-transform:scaleY(0.09);
  transform:scaleY(0.09);
}
header > h3{ white-space:pre; padding:0 15px; }

.eduImg{background:url(css/svgs/fi-book.svg) no-repeat 0 0; background-size:2.5rem 2.5rem;padding-left: 4rem;} 
.profImg{background:url(css/svgs/fi-torso-business.svg) no-repeat 0 0; background-size:2.5rem 2.5rem;padding-left: 4rem;} 
.skillImg{background:url(css/svgs/fi-social-skillshare.svg) no-repeat 0 0; background-size:2.5rem 2.5rem;padding-left: 4rem;}

.top-border{border-top-color:#09F;border-top-style:solid; background-color:#333333;}
.menu-panel{padding: 0.75rem;}

.secondary-menu{background-color:transparent;}

.top-bar-section2 li:not(.has-form) a:not(.button) {
      padding: 0 0.9375rem;
      line-height: 2.8125rem;
      background:#F5F5F5; }
	  
.top-bar-section2 li:not(.has-form) a:not(.button):hover {
        background-color: transparent;
        background: #09F; }
.top-bar-section2 li.active:not(.has-form) a:not(.button) {
      padding: 0 0.9375rem;
      line-height: 2.8125rem;
      color: #000;
      background: #096; }
.top-bar-section2 li.active:not(.has-form) a:not(.button):hover {
        background: #669;
        color: #000; }
.top-bar-section2 li.hover > a:not(.button) {
      background-color: #000;
      background: #990;
      color: #000; }
.top-bar-section2 ul li > a {
      display: block;
      width: 100%;
      color: #333;
      padding: 12px 0 12px 0;
      padding-left: 0.9375rem;
      font-family: 'Open Sans',"Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
      font-size: 0.8125rem;
      font-weight: bold;
      text-transform: none; }
.top-bar-section2 .dropdown li:not(.has-form):not(.active) > a:not(.button) {
        color: #333;
        background:#FFF; }
.top-bar-section2 .dropdown li a {
        color: #333;
        line-height: 2.8125rem;
        white-space: nowrap;
        padding: 12px 0.9375rem;
        background: #FC6; }
      .top-bar-section2 .dropdown li:not(.has-form):not(.active):hover > a:not(.button) {
        color: #000;
        background-color: #63F;
        background: #09F; }
.top-bar-section2 ul li:hover:not(.has-form) > a {
      background-color: #63F;
      background: #FFF;
      color: #000; }

</style>
    
