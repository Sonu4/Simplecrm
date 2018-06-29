<?php

$entry_point_registry['MyEntryPoint'] = array(
        'file' => 'custom/custom_entry_points/entryPoint.php',
        'auth' => true
);

$entry_point_registry['CreateBooks'] = array(
        'file' => 'custom/custom_entry_points/createBooks.php',
        'auth' => false
);

$entry_point_registry['RetriveDataList'] = array(
        'file' => 'custom/modules/shubh_Bookstore/views/getData.php',
        'auth' => false
);

$entry_point_registry['passData'] = array(
        'file' => 'custom/passData.php',
        'auth' => true
);

$entry_point_registry['test'] = array(
        'file' => 'custom/test.php',
        'auth' => false
);
$entry_point_registry['GetSecurityGroup'] = array(
        'file' => 'custom/getSecurityGroup.php',
        'auth' => false
);