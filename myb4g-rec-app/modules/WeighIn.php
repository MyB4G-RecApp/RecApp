<?php
class WeighIn{
  public $db_connection;
  public $table_name;
  public $competitor_id;
  public $team_id;
  public $current_week;
  public $weight;

  public function __construct($connection, $competitor, $team, $week, $weight){
    $this->db_connection  = $connection;
    $this->table_name     = 'table_weigh_ins';
    $this->competitor     = $competitor;
    $this->team           = $team;
    $this->week           = $week;
    $this->weight         = $weight;

    $this->create_weigh_in_table();
    $this->insert_weigh_in_data();
  }

  public function create_weigh_in_table(){
    $sql_create_wi_table = "CREATE TABLE IF NOT EXISTS `whollycoders`.`".$this->get_table_name()."` (
       `wi_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
       `wi_competitor_id` INT UNSIGNED NOT NULL ,
       `wi_team_id` INT UNSIGNED NOT NULL ,
       `wi_week_id` INT UNSIGNED NOT NULL ,
       `wi_weight` FLOAT(4,1) UNSIGNED NOT NULL ,
       `wi_date_entered` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,
       UNIQUE( `wi_competitor_id`, `wi_week_id`),
       PRIMARY KEY (`wi_id`)) ENGINE = InnoDB;";

    $this->query_database($sql_create_wi_table);
  }
    public function insert_weigh_in_data(){
      $sql_insert_wi_data = "INSERT INTO `table_weigh_ins` (
        `wi_id`,
        `wi_competitor_id`,
        `wi_team_id`,
        `wi_week_id`,
        `wi_weight`,
        `wi_date_entered`
      ) VALUES (
        NULL,
        '$this->competitor',
        '$this->team',
        '$this->week',
        '$this->weight',
        CURRENT_TIMESTAMP
      );";

      $this->query_database($sql_insert_wi_data);
    }

    public function query_database($query){
      return $result = mysqli_query($this->db_connection, $query);
    }

    public function get_table_name(){
      return $this->table_name;
    }

    public function select_weigh_in_data(){
      $sql_select_weigh_in_data = "SELECT * FROM ".$this->get_table_name().";";
      $this->query_database($sql_select_weigh_in_data);
    }

    public function select_weigh_in_data_team($team, $week){
      $sql_select_weigh_in_data_team = "SELECT * FROM `".$this->get_table_name()."` WHERE `wi_team_id`=".$team." && `wi_week_id`=".$week.";";
      echo($sql_select_weigh_in_data_team);
      return $this->query_database($sql_select_weigh_in_data_team);
    }
}
include('../php/dbconnect.php');
$team = 1;
$week = 1;
$current_wi = new WeighIn($connection, 33, 1, 1, 149.7);
// $result = $current_wi->select_weigh_in_data_team($team, $week);
if($result = $current_wi->select_weigh_in_data_team($team, $week)){echo('Yeah!!!');}else{echo('Awww CRAP!!!');}
//
// $sql="SELECT Lastname,Age FROM Persons ORDER BY Lastname";
//
// if ($result=mysqli_query($con,$sql))
//   {
//   // Return the number of rows in result set
//   $rowcount=mysqli_num_rows($result);
//   printf("Result set has %d rows.\n",$rowcount);
//   // Free result set
//   mysqli_free_result($result);
//   }
 ?>
