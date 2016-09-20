<?php
    function drawHand($deck)
    {
        $suits = array("clubs","hearts","diamonds","spades");
        
        
        $currentCard = array_pop($deck);
        
        if($currentCard <= 13)
        {
            $suitNo = 0;
        }
        elseif($currentCard >= 13 && $currentCard <= 26)
        {
            $suitNo = 1;
        }
        elseif($currentCard >= 26 && $currentCard >= 39)
        {
            $suitNo = 2;
        }
        else {
            $suitNo = 3;
        }
        
        $suit = $suits[$suitNo];
        if($currentCard % 13 == 0)
        {
            $card = 13;
        }
        else {
            $card = $currentCard % 13;
        }
        
        
        $done = false;
        while(!$done)
        {
            echo "<img src='img/cards/$suit/" . $card . ".png' />";
            $done = true;
        }
        
    }
    
    function playGame()
    {
        $deck = array();
        for($i = 1; $i <= 52; $i++)
        {
            $deck[] = $i;
        }
        

        //Draw cards for four players
        for($i = 0; $i < 4; $i++)
        {
            shuffle($deck);
            drawHand($deck);
        }
    }


?>




<!DOCTYPE html>
<html>
    <head>
        <title>Lab3</title>
    </head>
    <body>
          <?=playGame()?>
    </body>
</html>