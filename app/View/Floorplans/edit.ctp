<!-- File: /app/View/Floorplans/edit.ctp -->
<h1>Update Floor Plan</h1>
<?php
echo $this->Form->create('Floorplan', array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'wrapInput' => false,
		'class' => 'form-control'
	),
	'class' => 'well'
));
echo $this->Form->input('name');
echo $this->Form->input('alpha');
echo $this->Form->input('rate');
echo $this->Form->input('roomType');
echo $this->Form->input('sqFt');
echo $this->Form->input('imageURL');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->submit('Save Floor Plan', array(
			'div' => 'form-group',
			'class' => 'btn btn-default'
		));
echo $this->Form->end();
?>
