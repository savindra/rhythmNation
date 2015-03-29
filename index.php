<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RhythmNation | Welcome</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon" />
    <meta http-equiv="refresh" content="5;url=?page=main" />
    
    <script>
	var count = 5;
	var counter = setInterval(timer, 1000);
	
	function timer(){
		
		count = count - 1;
		if(count <= 0){
			clearInterval(counter);
			//return;
		}
		document.getElementById("count").innerHTML = count;
	}
	</script>
  </head>
  <body style="background-image:url(img/pic-crowd.jpg)">
    
    <div class="off-canvas-wrap" style="background-color:#CCC">
      <div class="row">
      	<div class="large-12 columns">
        	<h3>Welcome to RhythmNation</h3>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="large-12 columns">
      	<div class="panel">     
        	<h3 class="text-center">You'll be redirected in <span id="count">5</span> Seconds</h3>       
      	</div>
      </div>
    </div>
    
    <div class="row">
    	<div class="large-8 large-offset-2 columns">
        	<div class="panel">
            	<h3 class="text-center">Group Members</h3>
                  <table width="100%">
                      <tr>
                          <th><h5>Student Name</h5></th>
                          <th><h5>Student No</h5></th>
                      </tr>
                      <tr>
                          <td><h6>Savindra Perera</h6></td>
                          <td><h6>2013042</h6></td>
                      </tr>
                      <tr>
                          <td><h6>Pumudu Perera</h6></td>
                          <td><h6>2013086</h6></td>
                      </tr>
                      <tr>
                          <td><h6>Yesin Singhawansa</h6></td>
                          <td><h6>2013120</h6></td>
                      </tr>
                      <tr>
                          <td><h6>Oshada</h6></td>
                          <td><h6>20130xx</h6></td>
                      </tr>
                  </table>
            </div>
        </div>
    </div>
    
    <?php
    	if(isset($_GET['page']) && $_GET["page"] == "main") {
        	if(file_exists("includes/" . $_GET['page'] . '.php')){
            	ob_start();
				header("Location: includes/" . $_GET['page'] . '.php?ref=home');
				ob_end_flush();
            }else {
            	echo "404 Page Not Found!";
            }
        
        }
    ?>
    

    
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
