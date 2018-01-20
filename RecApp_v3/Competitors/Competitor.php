<?php
require('./config.php');

class Competitor{
  public $connection;
  public $database    = 'recapp_v3';
  public $table       = 'competitors';
  public $id;
  public $firstname;
  public $lastname;
  public $email;
  public $phone;
  public $team;
  public $date_added;

  public function __construct($connection){
    $this->connection = $connection;
    $this->create_table();
  }

  public function add($data){
    $this->firstname  = $data['firstname'];
    $this->lastname   = $data['lastname'];
    $this->email      = $data['email'];
    $this->phone      = $data['phone'];
    $this->insert();
  }

  public function create_table(){
    $sql = "CREATE TABLE IF NOT EXISTS `".$this->database."`.`".$this->table."` (
       `competitor_id` INT UNSIGNED NOT NULL AUTO_INCREMENT , 
       `competitor_firstname` VARCHAR(50) NOT NULL , 
       `competitor_lastname` VARCHAR(50) NOT NULL , 
       `competitor_email` VARCHAR(100) NOT NULL , 
       `competitor_phone` VARCHAR(20) NULL , 
       `competitor_team` VARCHAR(100) NULL , 
       `competitor_date_added` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
       PRIMARY KEY (`competitor_id`)
       ) ENGINE = InnoDB;";
    $result = mysqli_query($this->connection, $sql);
  }

  public function insert(){
    
    $sql = "INSERT INTO `competitors` (
      `competitor_id`, 
      `competitor_firstname`, 
      `competitor_lastname`, 
      `competitor_email`, 
      `competitor_phone`, 
      `competitor_team`, 
      `competitor_date_added`
      ) VALUES (
        NULL, 
        '$this->firstname', 
        '$this->lastname', 
        '$this->email', 
        '$this->phone', 
        NULL, 
        CURRENT_TIMESTAMP
        );";
    $result = mysqli_query($this->connection, $sql);

  }

}

$Competitor = new Competitor($connection);

$firstname  = 'Lawrence';
$lastname   = 'Elliot';
$email      = 'lelliot@wmi-inc.com';
$phone      = '3015550912';

$data = array(
  'firstname' => $firstname,
  'lastname'  => $lastname,
  'email'     => $email,
  'phone'     => $phone
);

$Competitor->add($data);
?>