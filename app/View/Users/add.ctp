<!-- app/View/Users/add.ctp -->
<h1>Add User</h1>
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
	echo $this->Form->input('role', array(
		'options' => array('admin' => 'Admin', 'author' => 'Author')
	));
	echo $this->Form->submit('Save User', array(
				'div' => 'form-group',
				'class' => 'btn btn-default'
			));
	echo $this->Form->end();
?>