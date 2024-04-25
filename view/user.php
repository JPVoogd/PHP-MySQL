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

    <h1>Financial details</h1>
<?php
echo "<form action='index.php?user' method='POST'>";
echo "<select name='year' onchange='this.form.submit()'>";
echo "<option disabled selected value> --- select a financial year --- </option>";
foreach ($financial_years as $year) {
    if ($_POST['year'] && $year['year'] == $_POST['year']) {
        echo "<option value='" . $year['year'] . "' selected>" . $year['year'] . "</option>";
    } else {
        echo "<option value='" . $year['year'] . "'>" . $year['year'] . "</option>";
    }
}
echo "</select>";
echo "</form>";

if ($payments == "") {
} else if ($payments) {
    ?>
    <h3>Amount paid:</h3>
    <table class="styled-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Amount</th>
            <th>First name</th>
            <th>Year</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($payments as $payment) {
            echo "<tr>";
            echo "<td>" . $payment['payments_id'] . "</td>";
            echo "<td> €" . (100 - (100 * ($member->discount / 100))) . ",- </td>";
            echo "<td>" . $member->name . "</td>";
            echo "<td>" . $payment['year'] . "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

    <?php
} else {
    echo "<p>Amount still need to be paid: €" . (100 - (100 * ($member->discount / 100))) . ",-</p>";
}

include_once 'layout/footer.php';
?>