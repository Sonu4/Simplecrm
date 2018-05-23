<?php

$entry_point_registry['MyEntryPoint'] = array(
        'file' => 'custom/custom_entry_points/entryPoint.php',
        'auth' => true
);

$entry_point_registry['CreateBooks'] = array(
        'file' => 'custom/custom_entry_points/createBooks.php',
        'auth' => false
);