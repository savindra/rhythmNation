<?php
//receive the input from the html form
$vote = $_REQUEST['vote'];

//get content of textfile to check the previous votes
$filename = "poll_result.txt";
$content = file($filename);

//Enters the captured inputs to the array which will be calculated
$array = explode("||", $content[0]);
$yes = $array[0];
$no = $array[1];
$maybe = $array[2];

if ($vote == 0) {
  $yes = $yes + 1;
}
if ($vote == 1) {
  $maybe = $maybe + 1;
}
if($vote == 2){
     $no = $no + 1;
}

//insert votes to poll result txt file
$insertvote = $yes."||".$no."||".$maybe;;
$fp = fopen($filename,"w");
fputs($fp,$insertvote);
fclose($fp);
?>

<!--Working on Displaying the votes for each Answer/Opinion -->
  <h5><strong>Result:</strong></h5>
  <table class="large-12">
  <tr>
  	<td>Yes:</td>
  	<td class="text-left">
      <img src="img/poll.gif" width="<?php echo(300*round($yes/($no+$yes+$maybe),2)); ?>" hieght="20px">&nbsp<?php echo(100*round($yes/($no+$yes+$maybe),2)); ?>% </td>
  </tr>
  
  <tr>
  	<td>Maybe:</td>
  	<td class="text-left">
      <img src="img/poll.gif" width="<?php echo(300*round($maybe/($no+$yes+$maybe),2)); ?>" hieght="20px">&nbsp<?php echo(100*round($maybe/($no+$yes+$maybe),2)); ?>% </td>
  </tr>
  
  <tr>
  	<td>No:</td>
  	<td class="text-left">
      <img src="img/poll.gif" width="<?php echo(300*round($no/($no+$yes+$maybe),2)); ?>" hieght="20px">&nbsp<?php echo(100*round($no/($no+$yes+$maybe),2)); ?>% </td>
  </tr>
  
  </table>
  
  