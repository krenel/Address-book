<?php
    session_start();
    require_once 'Functions.php';


    $func = new Functions();

    $table = 'users';

    $data = $_SESSION['user'];

    $func->create($table,$data);

    $table = 'addresses';

    (isset($_SESSION['addressCount'])) ? $addressesCount = $_SESSION['addressCount'] : $addressesCount = 1;

    for($i = $addressesCount; $i >= 1; $i--){
        $data = array();
        $data = $_SESSION["address{$i}"];

        $func->create($table,$data);
    }

    $table = 'notes';

    (isset($_SESSION['notesCount'])) ? $notesCount = $_SESSION['notesCount'] : $notesCount = 1;

    for($i = $addressesCount; $i >= 1; $i--){
        $data = array();
        $data = $_SESSION["note{$i}"];

        $func->noteCreate($table,$data);
    }

    $table = 'users_addresses';

    for($i = $addressesCount; $i >= 1; $i--) {
        $func->usersAddressesCreate($table);
    }

    session_destroy();

    header("Location: index.php");



