<?php

$voterAge = 19;
$voterHasPVC = true;
$voterWard = 020;

if($voterAge < 18){
    echo "Voter is not old enough to vote.";
}elseif($voterHasPVC === false){
    echo "Sorry you can not vote without a PVC.";
}elseif($voterWard !== 020){
    echo "Oops this is not your ward";
}else{
   echo "Voter eligible to vote.";
}

?>
