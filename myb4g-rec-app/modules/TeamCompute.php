<?php
include('./Compute.php');
class TeamCompute extends Compute{
public $team_id;
public $team_name;

public function __construct($team){
  $this->team_id = $team;
  $this->set_team_begin();
  $this->set_team_previous();
  $this->set_team_current();
}
  function set_team_name($team){
    //Perform query on the teams Table
    $sql_get_team_name = "SELECT * FROM `table_teams`
                          WHERE team_id=$team";
    $result = mysqli_query($this->db_connection, $sql_get_team_name);
    

    $this->team_name
  }
  function get_team_name(){}
  function get_team_begin(){}
  function set_team_begin(){
    $this->begin = 3259.3;
  }
  function get_team_previous(){}
  function set_team_previous(){
    $this->previous = 3217.4;
  }
  function get_team_current(){}
  function set_team_current(){
    $this->current = 3216.2;
  }
}
$team = '1';
// $begin    = null;
// $previous = null;
// $current  = null;
$team_results = new TeamCompute($team);
echo('<br>Weekly Weight Loss: '.$team_results->weekly_weight_loss().' LBS');
echo('<br>Weekly Weight Loss Percent: '.$team_results->weekly_weight_loss_percent().' %');
echo('<br>Overall Weight Loss: '.$team_results->overall_weight_loss().' LBS');
echo('<br>Overall Weight Loss Percent: '.$team_results->overall_weight_loss_percent().' %');
 ?>
