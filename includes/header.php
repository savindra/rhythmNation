		<meta charset="utf-8" />
    	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    	<title> <?php echo $pageTitle ?> | RhythmNation</title>
    	<link rel="stylesheet" href="css/foundation.css" />
        <link rel="stylesheet" href="css/foundation-icons.css" />
        <link rel="stylesheet" href="css/slippry.css" />
        <link rel="stylesheet" href="css/custom.css" />
        <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,800italic,700,600,800,400' rel='stylesheet' type='text/css'>
    	<script src="js/vendor/modernizr.js"></script>
        <script src="http://maps.googleapis.com/maps/api/js"></script>
        <script src="js/validate.js"></script>
        <script>
		  var myCenter=new google.maps.LatLng(6.90162, 79.86895);
		  var marker;
		  
		  function initialize()
		  {
		  var mapProp = {
			center:myCenter,
			zoom:15,
			mapTypeId:google.maps.MapTypeId.ROADMAP
			};
		  
		  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
		  
		  var marker=new google.maps.Marker({
			position:myCenter,
			animation:google.maps.Animation.BOUNCE
			});
		  
		  marker.setMap(map);
		  }
		  
		  google.maps.event.addDomListener(window, 'load', initialize);
		</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/slippry.min.js"></script>
        <script>
		  jQuery(document).ready(function($){
			$(function(){
				$('#slippry-demo').slippry()
			});
			$('.variable-width').slick({
				dots: true,
				infinite: true,
				speed: 100,
				slidesToShow: 2,
				centerMode: true,
				variableWidth: true,
				autoplay: true
      });
		  });
</script>