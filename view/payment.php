<h1>Financial details</h1>
<?php
echo "<form action='index.php?user' method='POST'>";
echo "<select name='year' onchange='this.form.submit()'>";
echo "<option disabled selected value> --- select a financial year --- </option>";
foreach($years as $year)
{
    if($_POST['year'] && $years->year == $_POST['year'])
    {
        echo "<option value='" . $year->year . "' selected>" . $year->year . "</option>";
    } else {
        echo "<option value='" . $year->year . "'>" . $year->year . "</option>";
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
            echo "<tr>";
            echo "<td>" . $payments->payment_id . "</td>";
            echo "<td> €" . ($payments->amount - ($payments->amount * ($member->discount / 100))) . ",- </td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $payments->financial_year . "</td>";
            echo "</tr>";
        ?>
        </tbody>
    </table>

<?php }
else
{
        echo "<p>Amount still need to be paid: €" . ($payments->amount - ($payments->amount * ($member->discount / 100))) . ",-</p>";

}