<?php

include_once 'layout/header.php';

?>
    <h1>Data from MySQL Table</h1>
    <table class="styled-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Birthday</th>
            <th>Adress</th>
            <th>Membership</th>
            <th>Discount</th>
            <th>Amount</th>
            <th>Account Role</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <td><?php echo htmlentities($member->id); ?></td>
        <td><?php echo htmlentities($member->name); ?></td>
        <td><?php echo htmlentities($member->family_name); ?></td>
        <td><?php echo htmlentities($member->birthday); ?></td>
        <td><?php echo htmlentities($member->address); ?></td>
        <td><?php echo htmlentities($member->membership); ?></td>
        <td><?php echo htmlentities($member->discount); ?>%</td>
        <td>€<?php echo htmlentities(100 - (100 * ($member->discount / 100))); ?>,-</td>
        <td><?php echo htmlentities($member->role) ?></td>
        <?php echo "<td><a href='index.php?edit&id=" . htmlentities($member->id) . "&name=" . htmlentities($member->name) . "&birthday=" . htmlentities($member->birthday) . "'>Edit</a></td>"; ?>
        <?php echo "<td><a href='index.php?delete&id=" . htmlentities($member->id) . "'>Delete</a></td>"; ?>
        </tbody>
    </table>
    <a href="index.php?account">Update Account</a>

<?php

include_once 'view/payment.php';

include_once 'layout/footer.php';
?>