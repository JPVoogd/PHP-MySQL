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
                echo "<td>" . htmlentities($member->id) . "</td>";
                echo "<td>" . htmlentities($member->name) . "</td>";
                echo "<td>" . htmlentities($member->family_name) . "</td>";
                echo "<td>" . htmlentities($member->birthday) . "</td>";
                echo "<td>" . htmlentities($member->address) . "</td>";
                echo "<td>" . htmlentities($member->membership) . "</td>";
                echo "<td>" . htmlentities($member->discount) . "%</td>";
                echo "<td> €" . (100 - (100 * (htmlentities($member->discount) / 100))) . ",- </td>";
                echo "<td><a href='index.php?edit&id=" . htmlentities($member->id) . "&name=" . htmlentities($member->name) . "&birthday=" . htmlentities($member->birthday) . "'>Edit</a></td>";
                echo "<td><a href='index.php?delete&id=" . htmlentities($member->id) . "'>Delete</a></td>";
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