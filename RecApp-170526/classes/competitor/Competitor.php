<?php
require('../../../myb4g-connect.php');
require('../../library.php');
class Competitor{
  public $connection;
  public $id;
  public $email;
  public $firstname;
  public $lastname;
  public $phone;
  public $begin_weight;
  public $team_id;
  public $competition_id;
  public $data;
  public $json;

  public function __construct($params){
    $this->connection     = $params['connection'];
    $this->id             = $params['id'];
    $this->email          = $params['email'];
    $this->firstname      = $params['firstname'];
    $this->lastname       = $params['lastname'];
    $this->phone          = $params['phone'];
    $this->begin_weight   = $params['begin_weight'];
    $this->team_id        = $params['team_id'];
    $this->competition_id = $params['competition_id'];

  }

  public function get_competitors(){
    $this->get_competitors_data();
    return $this->data;
  }

  public function get_competitor($id){
    $this->get_competitor_data($id);
    return $this->data;
  }

  public function edit_competitor($id){
    $this->get_competitor_data($id);
    return $this->data;
  }

  public function create_competitor(){
    $this->create_competitors_table();
    $this->insert_competitor();
  }

  public function update_competitor($id){
    $this->get_competitor_data($id);
    return $this->data;
  }

  public function delete_competitor($id){
    $this->get_competitor_data($id);
    return $this->data;
  }

  public function create_competitors_table(){
    $sql = $this->get_create_competitors_table_query();
    $result = mysqli_query($this->connection, $sql);
    if(!$result){echo(' ***** ERROR | Unable to CREATE COMPETITORS TABLE *****');}
  }

  protected function get_create_competitors_table_query(){
    return "CREATE TABLE IF NOT EXISTS `mybod4god`.`competitors` (
      `competitor_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
      `competitor_email` VARCHAR(100) NOT NULL ,
      `competitor_firstname` VARCHAR(100) NOT NULL ,
      `competitor_lastname` VARCHAR(100) NOT NULL ,
      `competitor_begin_weight` DECIMAL(4,1) NOT NULL ,
      `competitor_phone` VARCHAR(20) NOT NULL ,
      `competitor_team_id` INT UNSIGNED NOT NULL ,
      `competitor_date_entered` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,
      PRIMARY KEY (`competitor_id`)
    ) ENGINE = InnoDB;";
  }

  public function insert_competitor(){
    $sql = $this->get_insert_competitor_query();
    $result = mysqli_query($this->connection, $sql);
    if(!$result){
      echo(' ***** ERROR | Unable to INSERT COMPETITOR *****');
    }
  }

  public function get_insert_competitor_query(){
    return "INSERT INTO `competitors` (
      `competitor_id`,
      `competitor_email`,
      `competitor_firstname`,
      `competitor_lastname`,
      `competitor_phone`,
      `competitor_begin_weight`,
      `competitor_team_id`,
      `competitor_date_entered`
    ) VALUES (
      NULL,
      '$this->email',
      '$this->firstname',
      '$this->lastname',
      '$this->phone',
      '$this->begin_weight',
      '$this->team_id',
      CURRENT_TIMESTAMP
    );";
  }

  public function get_competitors_data(){
    $sql = "SELECT * FROM competitors;";
    $result = mysqli_query($this->connection, $sql);
    if(!$result){
      echo(' ***** ERROR | Unable to GET COMPETITORS DATA *****');
    }else{
      $this->data = array();
      while($row = mysqli_fetch_assoc($result)){
        $this->data[] = array(
          'id'            => $row['competitor_id'],
          'email'         => $row['competitor_email'],
          'firstname'     => $row['competitor_firstname'],
          'lastname'      => $row['competitor_lastname'],
          'phone'         => $row['competitor_phone'],
          'begin_weight'  => $row['competitor_begin_weight'],
          'team_id'       => $row['competitor_team_id'],
          'date_entered'  => $row['competitor_date_entered']
        );
      }
      $this->json = json_encode($this->data);
    }
  }

  public function get_competitor_data($id){
    $sql = "SELECT * FROM competitors WHERE competitor_id='$id';";
    $result = mysqli_query($this->connection, $sql);
    if(!$result){
      echo(' ***** ERROR | Unable to GET COMPETITOR DATA *****');
    }else{
      $row = mysqli_fetch_assoc($result);
      $this->data[] = array(
        'id'            => $row['competitor_id'],
        'email'         => $row['competitor_email'],
        'firstname'     => $row['competitor_firstname'],
        'lastname'      => $row['competitor_lastname'],
        'phone'         => $row['competitor_phone'],
        'begin_weight'  => $row['competitor_begin_weight'],
        'team_id'       => $row['competitor_team_id'],
        'date_entered'  => $row['competitor_date_entered']
      );

        $this->json = json_encode($this->data);
    }
  }
}

$id               = null;
$email            = 'maparks@gmail.com';
$firstname        = 'mickelle';
$lastname         = 'parks';
$phone            = '(240) 555-1346';
$begin_weight     = '93.2';
$team_id          = '1';
$competition_id   = '1';

$params = array(
  'connection'      =>    $connection,
  'id'              =>    $id,
  'email'           =>    $email,
  'firstname'       =>    $firstname,
  'lastname'        =>    $lastname,
  'phone'           =>    $phone,
  'begin_weight'    =>    $begin_weight,
  'team_id'         =>    $team_id,
  'competition_id'  =>    $competition_id
);

prewrap($params);
$competitor = new Competitor($params);
$competitor->create_competitor();
// $competitor->get_competitors();
$competitor->get_competitor_data(2);
prewrap($competitor);
 ?>
