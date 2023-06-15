<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          
        function get_data() {
            $datae = array();
            $datae[] = array(
                'Title' => $_POST['title'],
                'FirstName' => $_POST['fname'],
                'LastName' => $_POST['lname'],
                'Email' => $_POST['email'],
                'Tel' => $_POST['tel'],
                'Gender' => $_POST['gender'],
                'dob'=> $_POST['dob'],
                'department'=> $_POST['department'],
                'description'=> $_POST['description'],
            );
            return $datae;
        }
          
        $name = "appointment";
        $file_name = $name . '.json';

        // Check if the file exists
        if (file_exists($file_name)) {
            $current_data = json_decode(file_get_contents($file_name), true);
        } else {
            $current_data = array();
        }

        // Append new data to the existing data
        $current_data = array_merge($current_data, get_data());
       
        if (file_put_contents($file_name, json_encode($current_data))) {
            echo 'Your Response has been submitted';
        } else {
            echo 'There is some error';
        }
    }
?>
