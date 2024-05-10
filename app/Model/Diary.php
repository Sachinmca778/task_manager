<?php
class Diary extends AppModel {
   public $name= 'Diary';
  public $validation = array(
    'title'=> array(
        'rule'=>'notBlank',
        'message'=>'please enter the title'
    ),
    'body'=> array(
        'rule'=>'notBlank',
        'message'=>'please the enter'
    )
    );
}
?>
