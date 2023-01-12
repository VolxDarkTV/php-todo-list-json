<?php

$testObj = 
    [[
        'en'=>'hello world',
        'it'=>'ciao mondo'
    ]];

header ('Content -Type: application/json');

echo json_encode($testObj);

?>