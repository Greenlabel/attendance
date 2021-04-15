<?php
$title = 'View Records';
require_once 'includes/header.php';
require_once 'includes/auth_check.php';
require_once 'db/conn.php';

$results = $crud->getAttendees();

?>
<!-- We use bootstrap for modify tables by adding a class -->
<table class="table">
    <tr>
        <!-- th means table header and td table data -->
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Specialty</th>
        <th>Actions</th>
    </tr>
    <!-- <tr>
        <td>1</td>
        <td>value1</td>
        <td>value 2</td>
        <td>value 4</td>
        <td>value 3 email</td>
        <td>54321351</td>
        <td>Database Admin</td>
    </tr>  for dynamicaly way use php-->
    <?php 
    while($r = $results->fetch(PDO::FETCH_ASSOC)){
    ?>
    <!-- We open { in first php tag and close it to another.
this will help us write clean html.So we want to make <tr> -->
    <tr>
        <td><?php echo $r['attendee_id']  ?> </td>
        <td><?php echo $r['firstname']  ?></td>
        <td><?php echo $r['lastname']  ?></td>
        <td><?php echo $r['name']  ?></td>
        <td>
            <a href="view.php?id=<?php echo $r['attendee_id']  ?>" class="btn btn-primary">View</a>
            <a href="edit.php?id=<?php echo $r['attendee_id']  ?>" class="btn btn-warning">Edit</a>
            <!-- we add javascript for confirmation before deleting -->
            <a onclick="return confirm('Are you sure you want to delete this record?');"
                href="delete.php?id=<?php echo $r['attendee_id']  ?>" class="btn btn-danger">Delete</a>
        </td>
    </tr>
    <?php } ?>

</table>

<br />
<?php
echo '<hr/>';
require_once 'includes/footer.php';
?>