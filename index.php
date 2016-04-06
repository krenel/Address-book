<?php include "header.php"; ?>
<?php

    $insertInfo = array(
        'user_fname' => '',
        'user_mname' => '',
        'user_lname' => '',
        'user_login' => '',
        'user_email' => '',
        'user_phone' => '',
    );

    if(isset($_POST['save'])) {
        $insertInfo = array(
            'user_fname' => (isset($_POST['user_fname'])) ? $_POST['user_fname'] : '',
            'user_mname' => (isset($_POST['user_mname'])) ? $_POST['user_mname'] : '',
            'user_lname' => (isset($_POST['user_lname'])) ? $_POST['user_lname'] : '',
            'user_login' => (isset($_POST['user_login'])) ? $_POST['user_login'] : '',
            'user_email' => (isset($_POST['user_email'])) ? $_POST['user_email'] : '',
            'user_phone' => (isset($_POST['user_phone'])) ? $_POST['user_phone'] : ''
        );

        $func = new Functions();
        $errors = $func->validateUser($insertInfo);

        if($errors == null){
            echo 'success';
            $_SESSION['user'] = $insertInfo;
            header("Location: addresses.php");
        } else {
            echo 'fail';
        }
    }


?>

    <h2>Лични данни</h2>

    <form action="" method="post">

        <label for="">Собствено име</label>
        <input type="text" name="user_fname" value="<?php echo $insertInfo['user_fname']; ?>" />
        <label class="red" for="">*<?php echo (isset($errors['user_fname'])) ? $errors['user_fname'] : ''; ?></label>
        <br/><br/>
        <label for="">Бащино име</label>
        <input type="text" name="user_mname" value="<?php echo $insertInfo['user_mname']; ?>" />
        <label class="red" for="">*<?php echo (isset($errors['user_mname'])) ? $errors['user_mname'] : ''; ?></label>
        <br/><br/>
        <label for="">Фамилно име</label>
        <input type="text" name="user_lname" value="<?php echo $insertInfo['user_lname']; ?>" />
        <label class="red" for="">*<?php echo (isset($errors['user_lname'])) ? $errors['user_lname'] : ''; ?></label>
        <br/><br/>
        <label for="">Потребителско име (login)</label>
        <input  type="text" name="user_login" value="<?php echo $insertInfo['user_login']; ?>" />
        <label class="red" for="">*<?php echo (isset($errors['user_login'])) ? $errors['user_login'] : ''; ?></label>
        <br/><br/>
        <label for="">Електронна поща</label>
        <input type="email" name="user_email" value="<?php echo $insertInfo['user_email']; ?>" />
        <label class="red" for="">*<?php echo (isset($errors['user_email'])) ? $errors['user_email'] : ''; ?></label>
        <br/><br/>
        <label for="">Телефон</label>
        <input type="text" name="user_phone" value="<?php echo $insertInfo['user_phone']; ?>" />
        <label class="red" for="">*<?php echo (isset($errors['user_phone'])) ? $errors['user_phone'] : ''; ?></label>

        <br/><br/>
        <input type="submit" name="save" value="Запис">

    </form>
    <h4>Полетата с * са задължителни!</h4>

<?php include "footer.php"; ?>

