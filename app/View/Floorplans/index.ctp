<!-- File: /app/View/floorplans/index.ctp  -->

<h1>Floor Plans</h1>
<p><?php echo $this->Html->link("Add Floor Plan", array('action' => 'add')); ?></p>
<table  class="table table-striped .table-bordered">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Alpha</th>
        <th>Rate</th>
        <th>Room Type</th>
        <th>Sq Ft</th>
        <th>Image URL</th>
        <th>Action</th>
    </tr>

<!-- Here's where we loop through our $posts array, printing out post info -->

<?php foreach ($floorplans as $floorplan): ?>
    <tr>
        <td><?php echo $floorplan['Floorplan']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($floorplan['Floorplan']['name'], array('action' => 'edit', $floorplan['Floorplan']['id'])); ?>
        </td>
        <td><?php echo $floorplan['Floorplan']['alpha']; ?></td>
        <td><?php echo $floorplan['Floorplan']['rate']; ?></td>
        <td><?php echo $floorplan['Floorplan']['roomType']; ?></td>
        <td><?php echo $floorplan['Floorplan']['sqFt']; ?></td>
        <td><a href="<?php echo $floorplan['Floorplan']['imageURL']; ?>" target="_new">[click]</a></td>
        <td>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $floorplan['Floorplan']['id'])); ?> |
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $floorplan['Floorplan']['id']),
                array('confirm' => 'Are you sure?'));
            ?>
        </td>
    </tr>
<?php endforeach; ?>

</table>