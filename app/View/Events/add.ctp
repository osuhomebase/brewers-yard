<!-- app/View/Events/add.ctp -->
<?php echo $this->Html->script('jquery-1.9.1'); ?>

<script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
$('#datepicker').datepicker();
});//]]>  

</script>

<h1>Add Event</h1>

<?php
	echo $this->Form->create('Event', array(
		'inputDefaults' => array(
			'wrapInput' => false,
		),
		'class' => 'well'
	));
	?>
    <div class="form-group required">
		 <? 
        echo $this->Form->input('title',array('class' => 'form-control'));
        ?>
    </div>	
    
<div class="bfh-datepicker">
  <div class="bfh-datepicker-toggle" data-toggle="bfh-datepicker">
  	<label for="eDate">Event Date</label>
    <div class="input-group ">
    <? 
		echo $this->Form->input('eventDate', array('type' => 'text','class' => 'form-control','readonly' => 'readonly','label' => false)); 
	?>
    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
    </div>
  </div>
  
  <div class="bfh-datepicker-calendar">
    <table class="calendar table table-bordered">
      <thead>
        <tr class="months-header">
          <th class="month" colspan="4">
            <a class="previous" href="#"><i class="glyphicon glyphicon-chevron-left"></i></a>
            <span></span>
            <a class="next" href="#"><i class="glyphicon glyphicon-chevron-right"></i></a>
          </th>
          <th class="year" colspan="3">
            <a class="previous" href="#"><i class="glyphicon glyphicon-chevron-left"></i></a>
            <span></span>
            <a class="next" href="#"><i class="glyphicon glyphicon-chevron-right"></i></a>
          </th>
        </tr>
        <tr class="days-header">
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
</div> 

    <div class="form-group required">
<?php
	echo $this->Form->input('description', array('rows' => '3','class' => 'form-control'));
?>
	</div>
    <div class="form-group required">
<?php
    
	echo $this->Form->input('active');
?>
	</div>
<?php
	
	echo $this->Form->submit('Save Event', array(
				'div' => 'form-group',
				'class' => 'btn btn-default'
			));
	echo $this->Form->end();
?>
