<?php
require_once('functions/functions.php');
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    	<?php
			$pageTitle = "Weekly Poll";
			include 'includes/header.php';
  		?>
        
        <script>
		  //AJAX
		  function getVote(int) {
			if (window.XMLHttpRequest) {
			  // for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			} else {  
			// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function() {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				document.getElementById("poll").innerHTML=xmlhttp.responseText;
			  }
			}
			
			//Server Request
			xmlhttp.open("GET","functions/weekly-poll.php?vote="+int,true);
			xmlhttp.send();
		  }
		</script>
</head>
 
<body>   
  <?php
			include 'includes/menu.php';
  	?>
    
<div class="row">
	<div class="large-12">
    	<h4><b>WEEKLY POLL</b></h4>
    	<ul class="breadcrumbs">
        	<li><a href="main.php?ref=home">Home</a></li>
            <li class="unavailable">Activity</li>
            <li class="current"><a href="weekly-poll.php">Weekly Poll</a></li>
        </ul>
    </div>
</div>

<div class="row">

	<div class="large-12 columns">
    	<div class="panel callout radius">
        
          <div id="poll">
            <h5><strong>Will you come back to shop at RhythmNation?</strong></h5>
            <br />
            <!--The Voting Form-->
            <form>
            <li>Yes I Would!:
            	<input type="radio" name="vote" value="0" onclick="getVote(this.value)">
            </li>
            <li>Maybe I might, I'm undecided:
            	<input type="radio" name="vote" value="1" onclick="getVote(this.value)">
            </li>
            <li>No, I found a better Store!:
            	<input type="radio" name="vote" value="2" onclick="getVote(this.value)">
            </li>
            </form>
          </div>
        
        </div>
    </div>

</div>

 <footer>
	  <?php
          include 'includes/footer.php';
      ?>
    </footer>
    
  </body>
</html>