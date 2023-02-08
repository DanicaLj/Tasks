<?php
if (isset($_POST['name']) && $_POST['name'] 
&& isset($_POST['lastname']) && $_POST['lastname']
&& isset($_POST['gender']) && $_POST['gender']
&& isset($_POST['birth']) && $_POST['birth']
&& isset($_POST['city']) && $_POST['city']
&& isset($_POST['address']) && $_POST['address']
&& isset($_POST['check']) && $_POST['check']) {

    echo json_encode([
        'success' => 1,
        'data' => [
            'name' => $_POST['name'],
            'lastnem' => $_POST['lastname'],
            'gender' => $_POST['gender'],
            'birth' => $_POST['birth'],
            'city' => $_POST['city'],
            'address' => $_POST['address'],
            'check' => $_POST['check']
        ]
        
    ]);
} else {
    echo json_encode(array('success' => 0));
}