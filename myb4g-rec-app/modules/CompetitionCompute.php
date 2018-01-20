<?php
include('./Compute.php');
class CompetitionCompute extends Compute{

}

$begin    = 232.5;
$previous = 226.3;
$current  = 224.4;
$competition_results = new CompetitionCompute($begin, $previous, $current);
echo('<br>Weekly Weight Loss: '.$team_results->weekly_weight_loss().' LBS');
echo('<br>Weekly Weight Loss Percent: '.$team_results->weekly_weight_loss_percent().' %');
echo('<br>Overall Weight Loss: '.$team_results->overall_weight_loss().' LBS');
echo('<br>Overall Weight Loss Percent: '.$team_results->overall_weight_loss_percent().' %');
 ?>
