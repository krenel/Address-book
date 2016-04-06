<?php
    class Functions{

        public function create($table , $insertInfo)
        {

            $connection = mysqli_connect('127.0.0.1', 'root', '', 'phplab_course_project');

            $sql = "INSERT INTO `$table` SET ";


            $num = count($insertInfo);
            $i = 0;
            foreach($insertInfo as $key => $value){
                if(++$i == $num){
                    $sql .= "`{$key}` = '{$value}'";
                } else {
                    $sql .= "`{$key}` = '{$value}',";
                }

            }

            mysqli_query($connection, $sql);

        }

        public function noteCreate($table,$insertInfo)
        {
            $connection = mysqli_connect('127.0.0.1', 'root', '', 'phplab_course_project');

            $sql = "SELECT * FROM `users` ORDER BY `user_id` DESC LIMIT 1";
            $row = mysqli_query($connection, $sql);
            $array = mysqli_fetch_assoc($row);
            $userId = $array['user_id'];

            $sql = "INSERT INTO `{$table}` SET `note_user_id` = {$userId},";

            $num = count($insertInfo);
            $i = 0;
            foreach ($insertInfo as $key => $value) {
                if (++$i == $num) {
                    $sql .= "`{$key}` = '{$value}'";
                } else {
                    $sql .= "`{$key}` = '{$value}',";
                }

            }

            mysqli_query($connection, $sql);

        }

        public function usersAddressesCreate($table)
        {
            $connection = mysqli_connect('127.0.0.1', 'root', '', 'phplab_course_project');

            $sql = "SELECT * FROM `users` ORDER BY `user_id` DESC LIMIT 1";
            $row = mysqli_query($connection, $sql);
            $array = mysqli_fetch_assoc($row);
            $userId = $array['user_id'];

            $sql = "SELECT * FROM `addresses` ORDER BY `address_id` DESC LIMIT 1";
            $row = mysqli_query($connection, $sql);
            $array = mysqli_fetch_assoc($row);
            $addressId = $array['address_id'];

            $sql = "INSERT INTO `{$table}` SET `ua_user_id` = {$userId}, `ua_address_id` = {$addressId}";

            mysqli_query($connection, $sql);
        }

        public function validateUser($input){
            $errors = array();

            if(!isset($input['user_fname']) || strlen(trim($input['user_fname'])) < 5 || strlen(trim($input['user_fname'])) > 45){
                $errors['user_fname'] = 'Грешно въведено име!';
            }

            if(!isset($input['user_mname']) || strlen(trim($input['user_mname'])) < 5 || strlen(trim($input['user_mname'])) > 45){
                $errors['user_mname'] = 'Грешно въведено бащино име!';
            }

            if(!isset($input['user_lname']) || strlen(trim($input['user_lname'])) < 5 || strlen(trim($input['user_lname'])) > 45){
                $errors['user_lname'] = 'Грешно въведено фамилно име!';
            }

            if(!isset($input['user_login']) || strlen(trim($input['user_login'])) < 5 || strlen(trim($input['user_login'])) > 30){
                $errors['user_login'] = 'Грешно въведено потребителско име!';
            }

            if(!isset($input['user_email']) || strlen(trim($input['user_email'])) < 5 || strlen(trim($input['user_email'])) > 64){
                $errors['user_email'] = 'Грешно въведена ел.поща!';
            }

            if(!isset($input['user_phone']) || strlen(trim($input['user_phone'])) < 8 || strlen(trim($input['user_phone'])) > 14){
                $errors['user_phone'] = 'Грешно въведен телефон!';
            }

            return $errors;

        }

        public function validateAddresses($input){
            $errors = array();

            if(!isset($input['address_line_1']) || strlen(trim($input['address_line_1'])) < 5 || strlen(trim($input['address_line_1'])) > 45){
                $errors['address_line_1'] = 'Грешeн адрес!';
            }

//            if(!isset($input['address_line_2']) || strlen(trim($input['address_line_2'])) < 5 || strlen(trim($input['address_line_2'])) > 45){
//                $errors['address_line_2'] = 'Грешeн адрес 2!';
//            }

            if(!isset($input['address_zip']) || strlen(trim($input['address_zip'])) < 4 || strlen(trim($input['address_zip'])) > 8){
                $errors['address_zip'] = 'Грешeн пощенски код!';
            }

            if(!isset($input['address_city']) || strlen(trim($input['address_city'])) < 5 || strlen(trim($input['address_city'])) > 30){
                $errors['address_city'] = 'Грешeн град!';
            }

            if(!isset($input['address_province']) || strlen(trim($input['address_province'])) < 5 || strlen(trim($input['address_province'])) > 64){
                $errors['address_province'] = 'Грешна област!';
            }

            if(!isset($input['address_country']) || strlen(trim($input['address_country'])) < 5 || strlen(trim($input['address_country'])) > 30){
                $errors['address_country'] = 'Грешна държава!';
            }

             return $errors;

        }

        public function validateNote($input){
            $errors = array();

            if(!isset($input['note_text']) || strlen(trim($input['note_text'])) < 5 || strlen(trim($input['note_text'])) > 300){
                $errors['note_text'] = 'Бележката е празна!';
            }

            return $errors;

        }

        public function exo()
        {
            echo 'Exo!';
        }

    }