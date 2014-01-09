<!-- File: /app/View/users/index.ctp  -->

<h1>Users</h1>
<p><?php echo $this->Html->link("Add User", array('action' => 'add')); ?></p>
<table  class="table table-striped .table-bordered">
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Role</th>
        <th>Created</th>
        <th>Modified</th>
        <th>Action</th>
    </tr>

<!-- Here's where we loop through our $posts array, printing out post info -->

<?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($user['User']['username'], array('action' => 'edit', $user['User']['id'])); ?>
        </td>
        <td><?php echo $user['User']['role']; ?></td>
        <td><?php echo $user['User']['created']; ?></td>
        <td><?php echo $user['User']['modified']; ?></td>
        <td>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $user['User']['id'])); ?> | 
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $user['User']['id']),
                array('confirm' => 'Are you sure?'));
            ?>
        </td>
    </tr>
<?php endforeach; ?>

</table>