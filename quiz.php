<?php
require_once('functions/functions.php');
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    	<?php
			$pageTitle = "Quiz";
			include 'includes/header.php';
  		?>
        
        <script>
		  var pos = 0, test, test_status, question, choice, choices, chA, chB, chC, correct = 0;
		  var completed = false;
		  var questions = [
				  [ "How Many Strings are there in a typical Acoustic Guitar?", "6", "10", "12", "4","A" ],
			  [ "What type/s of instrument does the Piano belong to?", "Keyboard", "Precussive", "Cordophone, Precussive and Keyboard", "Precussive and Keyboard","C" ],
			  [ "Who wrote the Lyrics to <cite>Sri Lanka Matha</cite>?", "Ananda Samarakoon", "Rabindranath Tagore", "D.S.Senanayake", "Mahatma Ghandi","A" ],
			  [ "Which Album is the most successful album of all time?", "<cite>The Bodyguard</cite> (1992) by Whitney Houston", "<cite>Thriller</cite> (1982) by Michael Jackson", "<cite>Bat Out of Hell</cite> (1977) by Meatloaf", "<cite>The Dark Side of the Moon</cite> (1973) by AC/DC","B" ],
			  [ "The critically acclaimed song <cite>Bohemian Rhapsody</cite> (1975) was sung by...", "Freddie Mercury", "Queen", "Robert Plant", "Led Zeppelin","B" ],
			  [ "The Most Financially Successful Rapper is... ", "Eminem", "P.Diddy", "2Pac", "Dr. Dre","D" ],
			  [ "Typical Range a human can hear is...", "20Hz - 20,000 MHz", "20Hz - 20,000Hz", "20Hz - 2,000Hz", "70Hz - 50,000Hz","B" ],
			  [ "In classical Music; who was the composer of <cite>Clair De Lune</cite>?", "Camille Saint-Saëns", "Claude Debussy", "Mozart", "Beethoven","B" ],
			  [ "What is the Sample Resolution range of High Definition Audio?", "8-32 bits", "8-64 bits", "24-96 bits", "24-32 bits","A" ],
			  [ "According to the Guinness World Records Tim Storms (USA) has the widest male vocal range at...", "8 Octaves", "9 Octaves", "10 Octaves", "6 Octaves","C" ],
			  ];
	  
	  function _(x){
		  return document.getElementById(x);
	  }
	  function renderQuestion(){
		  test = _("test");
		  if(pos >= questions.length){
			  test.innerHTML = "<h2>You got "+correct+" Points for the "+questions.length+" Question Music Quiz!</h2>";
			  _("test_status").innerHTML = "Test Completed";
			  pos = 0;
			  correct = 0;
			  clearInterval(counter);
			  return false;
		  }
		  _("test_status").innerHTML = "Question "+(pos+1)+" of "+questions.length;
		  question = questions[pos][0];
		  chA = questions[pos][1];
		  chB = questions[pos][2];
		  chC = questions[pos][3];
		  chD = questions[pos][4];
		  test.innerHTML = "<p><b>"+question+"</b></p>";
		  test.innerHTML += "<input type='radio' name='choices' value='A'> "+chA+"<br>";
		  test.innerHTML += "<input type='radio' name='choices' value='B'> "+chB+"<br>";
		  test.innerHTML += "<input type='radio' name='choices' value='C'> "+chC+"<br>";
		  test.innerHTML += "<input type='radio' name='choices' value='D'> "+chD+"<br><br>";
		  test.innerHTML += "<button class=\"small button radius\" onclick='checkAnswer()'>Submit Answer</button>";
	  }
	  function checkAnswer(){
		  choices = document.getElementsByName("choices");
		  for(var i=0; i<choices.length; i++){
			  if(choices[i].checked){
				  choice = choices[i].value;
			  }
		  }
		  if(choice == questions[pos][5]){
			  correct = correct + 2;
		  }else{
			  if(!(pos == 9 && correct == 0)){
				  correct--;
			  }
		  }
		  pos++;
		  renderQuestion();
	  }
	  window.addEventListener("load", renderQuestion, false);
	  
		  var count = 180;
		  var counter = setInterval(timer, 1000);
		  
		  function timer(){
			  
			  count = count - 1;
			  if(count <= 0){
				  clearInterval(counter);
				  pos = 9;
				  checkAnswer()
				  //return;
			  }
			  
			  document.getElementById("count").innerHTML = Math.round(count/60)-1 + ":" + count%60;
		  }
	  </script>
</head>
 
<body>   
  <?php
			include 'includes/menu.php';
  	?>
    
<div class="row">
	<div class="large-12">
    	<h4><b>QUIZ</b></h4>
    	<ul class="breadcrumbs">
        	<li><a href="main.php?ref=home">Home</a></li>
            <li><a href="#">Activity</a></li>
            <li class="current"><a href="contact.php">Quiz</a></li>
        </ul>
    </div>

</div>

<div class="row">

	<div class="large-12 columns">
    	<div class="panel callout radius">
        
        <h5><strong>Rules</strong></h5>
        <li>You are awarded 2 points for each correct answer</li>
        <li>You are awarded -1 points for each incorrect/blank answer</li>
        <hr />
        <div id="count" class="text-right"></div>
        <h6 id="test_status"><strong></strong></h6>
        <div id="test"></div>
        
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