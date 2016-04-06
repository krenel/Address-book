<?php include "header.php"; ?>
<?php

$insertInfo = array(
    'address_line_1' => '',
    'address_line_2' => '',
    'address_zip' => '',
    'address_city' => '',
    'address_province' => '',
    'address_country' => '',
);

$func = new Functions();

$insertInfo = array(
    'address_line_1' => (isset($_POST['address_line_1'])) ? $_POST['address_line_1'] : '',
    'address_line_2' => (isset($_POST['address_line_2'])) ? $_POST['address_line_2'] : '',
    'address_zip' => (isset($_POST['address_zip'])) ? $_POST['address_zip'] : '',
    'address_city' => (isset($_POST['address_city'])) ? $_POST['address_city'] : '',
    'address_province' => (isset($_POST['address_province'])) ? $_POST['address_province'] : '',
    'address_country' => (isset($_POST['address_country'])) ? $_POST['address_country'] : ''
);

    if (isset($_POST['save'])) {
        $errors = $func->validateAddresses($insertInfo);
        if ($errors == null && isset($_POST['save'])) {
            echo 'success - 1';
            $_SESSION["address1"] = $insertInfo;
            header("Location: notes.php");
        } else {
            echo 'fail - 1';
        }
    }


    if(isset($_POST['newAddress'])) {

        $errors = $func->validateAddresses($insertInfo);
        $i = 1;
        if ($errors == null && isset($_POST['newAddress'])) {
            echo 'success - 1';
            ++$i;
            $_SESSION["address{$i}"] = $insertInfo;
            $_SESSION['addressCount'] = $i;
            header("Location: addresses.php");
        } else {
            echo 'fail - 1';
        }
    }


?>

<h2>Адреси</h2>

<form action="" method="post">

    <fieldset>
    <legend>Адрес <?php isset($i) ? $i : 1 ?></legend>
    <label for="">Адрес ред 1:</label>
    <input type="text" name="address_line_1" value="<?php echo $insertInfo['address_line_1']; ?>" />
    <label class="red" for="">*<?php echo (isset($errors['address_line_1'])) ? $errors['address_line_1'] : ''; ?></label>
    <br/><br/>
    <label for="">Адрес ред 2:</label>
    <input type="text" name="address_line_2" value="<?php echo $insertInfo['address_line_2']; ?>" />
    <label class="red" for="">*<?php echo (isset($errors['address_line_2'])) ? $errors['address_line_2'] : ''; ?></label>
    <br/><br/>
    <label for="">Пощенски код:</label>
    <input type="text" name="address_zip" value="<?php echo $insertInfo['address_zip']; ?>" />
    <label class="red" for="">*<?php echo (isset($errors['address_zip'])) ? $errors['address_zip'] : ''; ?></label>
    <br/><br/>
    <label for="">Населено място:</label>
    <input  type="text" name="address_city" value="<?php echo $insertInfo['address_city']; ?>" />
    <label class="red" for="">*<?php echo (isset($errors['address_city'])) ? $errors['address_city'] : ''; ?></label>
    <br/><br/>
    <label for="">Област:</label>
    <input type="text" name="address_province" value="<?php echo $insertInfo['address_province']; ?>" />
    <label class="red" for="">*<?php echo (isset($errors['address_province'])) ? $errors['address_province'] : ''; ?></label>
    <br/><br/>
    <label for="">Държава:</label>
    <input type="text" name="address_country" value="<?php echo $insertInfo['address_country']; ?>" />
    <label class="red" for="">*<?php echo (isset($errors['address_country'])) ? $errors['address_country'] : ''; ?></label>
    </fieldset>

    <h4>Запис и:</h4>

<input type="submit" name="save" value="Следваща стъпка">
<br/><br/>
<input type="submit" name="newAddress" value="Допълнителен Адрес">
</form>

<h4>Полетата с * са задължителни!</h4>

<?php include "footer.php"; ?>

