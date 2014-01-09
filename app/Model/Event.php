<?php

class Event extends AppModel {
    public $validate = array(
        'eventDate' => array(
            'date' => array(
                //Add 'ymd' to the rule.
                'rule' => array('date', 'ymd'),
                'message' => 'Please select a valid date.',
            ),
        ),
		'title' => array(
            'rule' => 'notEmpty'
        ),
        'description' => array(
            'rule' => 'notEmpty'
        ),
        'active' => array(
            'rule' => 'notEmpty'
        )
    );
}

?>