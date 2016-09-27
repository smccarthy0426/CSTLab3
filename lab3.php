<?php

    $totalArray = array();
    $deck = array();
    $p1Hand = array();
    $p2Hand = array();
    $p3Hand = array();
    $p4Hand = array();
    
    function displayHand($playerNum)
    {
        global $totalArray, $p1Hand,$p2Hand,$p3Hand,$p4Hand, $deck;
        if($playerNum == 0)
        {
            $cardsToDisplay = $p1Hand;
        }
        if($playerNum == 1)
        {
            $cardsToDisplay = $p2Hand;
        }
        if($playerNum == 2)
        {
            $cardsToDisplay = $p3Hand;
        }
        if($playerNum == 3)
        {
            $cardsToDisplay = $p4Hand;
        }
        $suits = array("clubs","hearts","diamonds","spades");
    
           
        
        for($i = 0; $i < count($cardsToDisplay); $i++)
        {
            $currentCard = $cardsToDisplay[$i];
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
                 
                echo "<img src='img/cards/$suit/" . $card. ".png' />";
            }
    }
    
    function drawHand($playerNum)
    {
        global $totalArray, $p1Hand,$p2Hand,$p3Hand,$p4Hand, $deck;
        $suits = array("clubs","hearts","diamonds","spades");
    
        $cardsPulled = array();
        $playerTotal = 0;
        $done = false;
       
        while(!$done && $playerTotal < 42)
        {
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
                
                
                $playerTotal += $card;
                $cardsPulled[] = $currentCard;
                
                 //Cases for building a perfect hand
                
                $awayFrom42 = 42 - $playerTotal;
                if(0 >= $awayFrom42 && $awayFrom42<= 5)
                {
                    $done = true;
                }
                elseif($awayFrom42 >= 5 && $awayFrom42 <= 13)
                {
                    $makeAnotherMove = rand(1,2);
                    if($makeAnotherMove == 1)
                    {
                        $done = true;
                    }
                }
        }
        
        
        if($playerNum == 0)
        {
            $p1Hand = $cardsPulled;
        }
        if($playerNum == 1)
        {
            $p2Hand = $cardsPulled;
        }
        if($playerNum == 2)
        {
            $p3Hand = $cardsPulled;
        }
        if($playerNum == 3)
        {
            $p4Hand = $cardsPulled;
        }
        $totalArray[] = $playerTotal;
        echo "</div> <br />";
        
    }
    
    function playGame()
    {
        global $deck,$totalArray;
        for($i = 1; $i <= 52; $i++)
        {
            $deck[] = $i;
        }
        
        $playerNames = array("Austin","Sean","Shrek","Donkey");
        shuffle($deck);
        for($i = 0; $i < 4; $i++)
        {
            drawHand($i);
            echo "<div>";
            if($i == 0)
            {
                echo "<img src='img/" . strtolower($playerNames[$i]). ".jpg' />";
            }
            else{
                echo "<img src='img/" . strtolower($playerNames[$i]). ".png' />" ;
            }
            
            echo "Total: " . $totalArray[$i] . " ";
            if($totalArray[$i] > 42)
            {
                echo " BUST! ";
            }
            displayHand($i);
            echo "</div><br />";
        }
       
    }


?>




<!DOCTYPE html>
<html>
    <head>
        <title>Lab3</title>
        <link rel="stylesheet" href="css/lab3.css" type="text/css" />
    </head>
    <body>
          <?=playGame()?>
    </body>
</html>