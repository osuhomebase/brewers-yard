<h1>Log In</h1>
<?php echo $this->Session->flash('auth'); ?>
<?php

echo $this->Form->create('User', array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'wrapInput' => false,
		'class' => 'form-control'
	),
	'class' => 'well'
)); 
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->submit('Save User', array(
			'div' => 'form-group',
			'class' => 'btn btn-default'
		));
echo $this->Form->end();