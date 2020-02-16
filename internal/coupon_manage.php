<?php
require "dbconnect.php";
if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin']==0) {
	die("You are not admin");
}

$sql = "SELECT * FROM coupon";

    $stmt  = $mysqli->prepare($sql);
    $stmt->execute();
    $res = $stmt->get_result();
    echo "<a class='btn btn-outline-success btn-sm mb-1' href=?p=coupon_form>Add new coupon</a>";
    echo "<table border=1 cellspacing=0 cellpadding=5 class='table-bordered'>";
        echo "<tr>";
            echo "<td>Id</td>";
            echo "<td>Coupon code</td>";
            echo "<td>Discount %</td>";
            echo "<td>Is enable</td>";
            echo "<td>Valid from</td>";
            echo "<td>Valid to</td>";
            echo "<td>Total usage</td>";
            echo "<td colspan=2>Actions</td>";
        echo "</tr>";

    while ($row = $res->fetch_assoc()){
        echo "<tr>";
            echo "<td>";
                echo $row['coupon_id'];
            echo "</td>";
        
            echo "<td>";
                echo $row['code'];
            echo "</td>";
        
            echo "<td>";
                echo $row['discount'];
            echo "</td>";

            echo "<td>";
                echo $row['is_enable'];
            echo "</td>";
        
            echo "<td>";
                echo $row['valid_from'];
            echo "</td>";
        
            echo "<td>";
                echo $row['valid_to'];
            echo "</td>";

            echo "<td>";
                echo $row['total_usage'];
            echo "</td>";

            echo "<td>";
                echo "<a class='btn btn-outline-danger btn-sm btn-delete' title='Delete Book' href=internal/coupon_delete.php?id={$row['coupon_id']}></a>";
            echo "</td>";

            echo "<td>";
                echo "<a class='btn btn-outline-primary btn-sm btn-edit' title='Edit Book' href=internal/coupon_form.php/?id={$row['coupon_id']}></a>";
            echo "</td>";


        echo "</tr>";
    }
    echo "</table>";
    
    $mysqli->close();




?>