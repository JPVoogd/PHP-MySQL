<h1>Financial details</h1>
<?php
echo "<form action='index.php?user' method='POST'>";
echo "<select name='year' onchange='this.form.submit()'>";
echo "<option disabled selected value> --- select a financial year --- </option>";
foreach($years as $year)
{
    if($_POST['year'] && $years->year == $_POST['year'])
    {
        echo "<option value='" . htmlentities($year->year) . "' selected>" . htmlentities($year->year) . "</option>";
    } else {
        echo "<option value='" . htmlentities($year->year) . "'>" . htmlentities($year->year) . "</option>";
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
            <tr>
                <td><?php htmlentities($payments->payment_id) ?></td>
                <td>U+20ac<?php ($payments->amount - ($payments->amount * ($member->discount / 100))) ?>,-</td>
                <td><?php (htmlentities($payments->amount) - (htmlentities($payments->amount) * (htmlentities($member->discount) / 100))) ?></td>
                <td><?php htmlentities($payments->name)  ?></td>
                <td><?php htmlentities($payments->financial_year) ?></td>
            </tr>

        <!-- <?php
            echo "<tr>";
            echo "<td>" . htmlentities($payments->payment_id) . "</td>";
            echo "<td> €" . ($payments->amount - ($payments->amount * ($member->discount / 100))) . ",- </td>";
            echo "<td>" . htmlentities($payments->name) . "</td>";
            echo "<td>" . htmlentities($payments->financial_year) . "</td>";
            echo "</tr>";
        ?> -->
        </tbody>
    </table>

<?php }
else
{
        echo "<p>Amount still need to be paid: €" . (htmlentities($payments->amount) - (htmlentities($payments->amount) * (htmlentities($member->discount) / 100))) . ",-</p>";

}
?>