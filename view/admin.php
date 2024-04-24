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
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php


    if ($members) {
        foreach ($members as $member) {
            echo "<tr>";
            echo "<td>" . $member['id'] . "</td>";
            echo "<td>" . $member['name'] . "</td>";
            echo "<td>" . $member['family_name'] . "</td>";
            echo "<td>" . $member['birthday'] . "</td>";
            echo "<td>" . $member['address'] . "</td>";
            echo "<td>" . $member['membership'] . "</td>";
            echo "<td>" . $member['discount'] . "%</td>";
            echo "<td> €" . ($member['amount'] - ($member['amount'] * ($member['discount'] / 100))) . ",- </td>";
            echo "<td><a href='index.php?edit&id=" . $member['id'] . "&name=" . $member['name'] . "&birthday=" . $member['birthday'] . "'>Edit</a></td>";
            echo "<td><a href='index.php?delete&id=" . $member['id'] . "'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "No members found.";
    }
    ?>
    </tbody>
</table>

<?php 
include_once 'layout/footer.php';
?>