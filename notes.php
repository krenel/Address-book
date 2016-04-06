<?php include "header.php"; ?>
<?php
$table = 'notes';

$insertInfo = array(
    'note_text' => '',
);

$insertInfo = array(
    'note_text' => (isset($_POST['note_text'])) ? $_POST['note_text'] : '',
);

$func = new Functions();

if(isset($_POST['save'])) {

    $errors = $func->validateNote($insertInfo);

    if($errors == null){
        echo 'success';
        $_SESSION['note1'] = $insertInfo;
        header("Location: saveDb.php");
    } else {
        echo 'fail';
    }
}

if(isset($_POST['newNote'])) {

    $errors = $func->validateNote($insertInfo);
    $i = 1;
    if ($errors == null && isset($_POST['newNote'])) {
        echo 'success - 1';
        ++$i;
        $_SESSION["note{$i}"] = $insertInfo;
        $_SESSION['notesCount'] = $i;
        header("Location: notes.php");
    } else {
        echo 'fail - 1';
    }
}

?>

<h2>Бележки</h2>

<form action="" method="post">
    <label for="">Текст на бележката</label>
    <br/><br/>
    <textarea rows="4" cols="50" name="note_text"><?php echo (isset($insertInfo['note_text'])) ? $insertInfo['note_text'] : ''; ?></textarea>
    <label class="red" for="">*<?php echo (isset($errors['note_text'])) ? $errors['note_text'] : ''; ?></label>
    <br/><br/>
    <input type="submit" name="save" value="Запис">
    <br/><br/>
    <input type="submit" name="newNote" value="Допълнителna бележка">

</form>
<h4>Полетата с * са задължителни!</h4>

<?php include "footer.php"; ?>

