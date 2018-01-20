<?php
//1705061845 --- PreWrapper ,pre> format helper function
function prewrap($array){
  echo('<pre>');
  print_r($array);
  echo('</pre>');
}

//1704230656 --- Dynamically Insert Complete Registration Form
function add_reg_form($class = 'none', $action = '#', $method = 'get'){
  if($class !== 'none'){$class_area = 'class="'.$class.'" ';}else{$class_area = '';}
  $reg_form = '<form '.$class_area.'action="'.$action.'" method="'.$method.'">'."\r\n\t\t\t";
  $reg_form .= '<fieldset>'."\r\n\t\t\t\t";
  $reg_form .= '<legend>Registration</legend>'."\r\n\t\t\t\t";
  $reg_form .= 'Email:<br>'."\r\n\t\t\t\t";
  $reg_form .= add_reg_input_field('email', 'registration_email').'<br>'."\r\n\t\t\t\t";
  $reg_form .= 'First Name:<br>'."\r\n\t\t\t\t";
  $reg_form .= add_reg_input_field('text', 'registration_firstname').'<br>'."\r\n\t\t\t\t";
  $reg_form .= 'Last Name:<br>'."\r\n\t\t\t\t";
  $reg_form .= add_reg_input_field('text', 'registration_lastname', 'lastname').'<br>'."\r\n\t\t\t\t";
  $reg_form .= 'Password:<br>'."\r\n\t\t\t\t";
  $reg_form .= add_reg_input_field('password', 'registration_password').'<br>'."\r\n\t\t\t\t";
  $reg_form .= 'Confirm Password:<br>'."\r\n\t\t\t\t";
  $reg_form .= add_reg_input_field('password', 'registration_password2').'<br>'."\r\n\t\t\t\t";
  $reg_form .= add_reg_input_field('submit', 'register').'<br>'."\r\n\t\t\t";
  $reg_form .='</fieldset>'."\r\n\t\t";
  $reg_form .= '</form>'."\r\n";

  return $reg_form;
}

//1704101458 --- Strip Phone Number Input Data Using Regular Expressions
function strip_phone_number($phone_number){
  $phone = $phone_number;
  $string = preg_replace('/[^0-9]/', '', $phone);

  return $string;
}

//1704101108 --- Dynamically Add Form Input Field
function add_reg_input_field($type, $name, $id=null, $class=null){
  if($type !== 'submit'){
    $input_field = '<input type="'.$type.'" name="'.$name.'" id="'.$id.'" class="'.$class.'">';
    return $input_field;
  }else{
    $input_field = '<input type="'.$type.'" name="'.$name.'" id="'.$id.'" class="'.$class.'" value="Register">';
    return $input_field;
  }
}

//1704101058 --- Dynamically Insert Complete Registration Form Fields
function add_reg_form_fields(){
  $reg_form = '<fieldset><legend>Registration</legend>Email:<br>';
  $reg_form .= add_reg_input_field('email', 'registration_email').'<br>';
  $reg_form .= 'First Name:<br>';
  $reg_form .= add_reg_input_field('text', 'registration_firstname').'<br>';
  $reg_form .= 'Last Name:<br>';
  $reg_form .= add_reg_input_field('text', 'registration_lastname', 'lastname').'<br>';
  $reg_form .= 'Password:<br>';
  $reg_form .= add_reg_input_field('password', 'registration_password').'<br>';
  $reg_form .= 'Confirm Password:<br>';
  $reg_form .= add_reg_input_field('password', 'registration_password2').'<br>';
  $reg_form .= add_reg_input_field('submit', 'Submit').'<br>';
  $reg_form .='</fieldset>';
    return $reg_form;
}
 ?>
