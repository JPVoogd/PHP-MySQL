<?php
include_once 'layout/header.php';

$members = Members::get_members();
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