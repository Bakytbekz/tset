<?php
$update_mode = isset($_REQUEST['id']);
$title="";
if ($update_mode){
    
    require_once "dbconnect.php";
    $title = "Update coupon.";
    $sql = "SELECT * FROM coupon WHERE coupon_id=?";

    $stmt  = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);

    $id = $_REQUEST['id'];
    $stmt->execute();
    $res = $stmt->get_result();
    $row = $res->fetch_assoc();
    
    $action = "../coupon_update.php";
}
else{
    $title = "Add new coupon.";
    $action = "?p=coupon_insert";
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ#*&@';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    $row = array(
        "coupon_id" => "Automatic",
        "code" => generateRandomString(),
        "discount" => "",
        "valid_from" => "",
        "valid_to" => "",
        "total_usage" => "",
        "is_enable" => ""
    );

   
}   



?>
<div class="container coupon_theme">
    <h2 class="center"><?=$title?></h2>
    <br>
    <div class="p50 form_coupon">
        <form class="form-horizontal" action="<?=$action?>" method="post">
            <p>
                <input type="text" name="coupon_id" class="input_control" value="<?=$row['coupon_id']?>" style="display: none;">
            </p>
            <p>
                <label for="Code" style="width: 90px">Code(*)</label>
                <input type="text"  name="code" class="input_control" value="<?=$row['code']?>" required>
            </p>
            
            <p>
                <label for="Discount" style="width: 90px">Discount %*</label>
                <input type="number" class="input_control" min="1" step="1" name="discount" value="<?=$row['discount']?>" required>
            </p>
            
            <p>
                <label for="enable" style="width: 90px">Is enable (*)</label>
                <select id="enable" name="is_enable" class="input_control">
                <option value="1">true</option>
                <option value="0">false</option>
                </select>
            </p>
            <p>
                <label for="date_from" style="width: 90px">Valid From</label>
                <input type="date" class="input_control" name="valid_from" value="<?=$row['valid_from']?>" required>
            </p>
            <p>
                <label for="date_from">Valid to</label>
                <input type="date" class="input_control" name="valid_to" value="<?=$row['valid_to']?>" required>
            </p>
            <p>
                <label for="date_from">Total usage (*)</label>
                <input type="number" class="input_control" min="1" step="1" name="total_usage" value="<?=$row['total_usage']?>" required>
            </p>

            <input type="submit" class='btn btn-outline-success btn-xs mb-1 ml-5' value="Submit">
        </form>
    </div>
</div>

<style>
    input.input_control{
        border-radius: 10px;
        border: 1px solid #222;
        padding: 5px;
    }
</style>

