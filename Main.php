$<?php

function displayRandomCard() {
    
    $total = 0;
    $temp= 0;
    $players = array(0, 0, 0, 0);
 
  $deck = array();
  for ($i = 1; $i <= 52; $i++) {
      
      $deck[] = $i;
      
  }
  
  shuffle($deck);
  print_r($deck);

  $card = array_pop($deck);
  
  echo $card . "<br />";
  
 
  $suits = array("clubs", "diamonds", "hearts", "spades");
  $randomSuitIndex = rand(0,3);
  $randomSuit = $suits[$randomSuitIndex];    

  
  for($i = 0; $i < 4; $i++)
  {
     
  while($total < 42)
  {
      $ai = 0;
      
      $ai = rand(1,2);
      
      if($ai == 1 && $players[i] > 35)
      {
          break;
      }
      
      else{
          
        $temp = rand(1,13);
        $players[i] += $temp;
        echo "<img src='img/cards/$randomSuit/" . $temp . ".png' />";
        echo $players[i] + "/n";
      }
      

      
      
  }
  
  }

}
  
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        
        <?=displayRandomCard() ?>

    </body>
</html>