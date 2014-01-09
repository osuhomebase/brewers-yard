<!-- File: /app/View/events/index.ctp  -->

<h1>Events</h1>
<p><?php echo $this->Html->link("Add Event", array('action' => 'add')); ?></p>
<table  class="table table-striped .table-bordered">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Date</th>
        <th>Description</th>
        <th>Active</th>
    </tr>

<!-- Here's where we loop through our $posts array, printing out post info -->

<?php foreach ($events as $event): ?>
    <tr>
        <td><?php echo $event['Event']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($event['Event']['title'], array('action' => 'edit', $event['Event']['id'])); ?>
        </td>
        <td><?php echo $event['Event']['eventDate']; ?></td>
        <td><?php echo $event['Event']['description']; ?></td>
        <td><?php echo $event['Event']['active']; ?></td>
        <td>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $event['Event']['id'])); ?>
            |
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $event['Event']['id']),
                array('confirm' => 'Are you sure?'));
            ?>
        </td>
    </tr>
<?php endforeach; ?>

</table>