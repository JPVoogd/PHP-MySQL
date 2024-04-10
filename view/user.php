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
    <?php


    if ($member) {
        foreach ($member as $row) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['family_name'] . "</td>";
            echo "<td>" . $row['birthday'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['membership'] . "</td>";
            echo "<td>" . $row['discount'] . "%</td>";
            echo "<td> €" . ($row['amount'] - ($row['amount'] * ($row['discount'] / 100))) . ",- </td>";
            echo "<td>$role</td>";
            echo "<td><a href='index.php?edit&id=" . $row['id'] . "&name=" . $row['name'] . "&birthday=" . $row['birthday'] ."'>Edit</a></td>";
            echo "<td><a href='index.php?delete&id=" . $row['id'] . "'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "No member found.";
    }
    ?>
    </tbody>
</table>

<a href="index.php?account">Update Account</a>

<h1>Financial details</h1>
<?php
echo "<form action='index.php?user' method='POST'>";
echo "<select name='year' onchange='this.form.submit()'>";
echo "<option disabled selected value> --- select a financial year --- </option>";
foreach($financial_years as $year)
{
    if($_POST['year'] && $year['year'] == $_POST['year'])
    {
        echo "<option value='" . $year['year'] . "' selected>" . $year['year'] . "</option>";
    } else {
        echo "<option value='" . $year['year'] . "'>" . $year['year'] . "</option>";
    }
}
echo "</select>";
echo "</form>";

if($payments == "") { }
else if($payments)
{
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
        foreach ($payments as $payment)
        {
            echo "<tr>";
            echo "<td>" . $payment['payments_id'] . "</td>";
            echo "<td> €" . ($payment['amount'] - ($payment['amount'] * ($row['discount'] / 100))) . ",- </td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $payment['year'] . "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

<?php }
else
{
    foreach ($member as $row)
    {
        echo "<p>Amount still need to be paid: €" . ($row['amount'] - ($row['amount'] * ($row['discount'] / 100))) . ",-</p>";
    }
}
?>