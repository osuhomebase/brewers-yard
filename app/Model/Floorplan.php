<?php

class Floorplan extends AppModel {
    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty'
        ),
		'alpha' => array(
            'rule' => 'notEmpty'
        ),
        'roomType' => array(
            'rule' => 'notEmpty'
        ),
        'sqFt' => array(
            'rule' => 'notEmpty'
        ),
        'rate' => array(
            'rule' => 'notEmpty'
        ),
        'imageURL' => array(
            'rule' => 'notEmpty'
        )
    );
}

?>