<?php
class Compute{
  public $begin;
  public $previous;
  public $current;

  function __construct($begin, $previous, $current){
    $this->begin    = $begin;
    $this->previous = $previous;
    $this->current  = $current;
  }
  function weekly_weight_loss(){
    return number_format($this->previous - $this->current, 1);
  }
  function weekly_weight_loss_percent(){
    return number_format(($this->weekly_weight_loss() / $this->previous) * 100,6);
  }
  function overall_weight_loss(){
    return number_format($this->begin - $this->current, 1);
  }
  function overall_weight_loss_percent(){
    return number_format(($this->overall_weight_loss() / $this->begin) * 100,6);
  }
}

// $begin    = 244.8;
// $previous = 241;
// $current  = 239.4;
//
// $result = new Compute($begin, $previous, $current);

// echo('<br>Weekly Weight Loss: '.$result->weekly_weight_loss().' LBS');
// echo('<br>Weekly Weight Loss Percent: '.$result->weekly_weight_loss_percent().' %');
// echo('<br>Overall Weight Loss: '.$result->overall_weight_loss().' LBS');
// echo('<br>Overall Weight Loss Percent: '.$result->overall_weight_loss_percent().' %');
 ?>
