<?php
// created: 2016-04-14 16:04:38

$entry_point_registry['AsteriskController'] = array (
  'file' => 'custom/modules/Asterisk/include/controller.php',
  'auth' => true,
);
$entry_point_registry['AsteriskCallListener'] = array (
  'file' => 'custom/modules/Asterisk/include/callListener.php',
  'auth' => true,
);
$entry_point_registry['AsteriskCallCreate'] = array (
  'file' => 'custom/modules/Asterisk/include/callCreate.php',
  'auth' => true,
);
/*for Scheduled Reports Charts in email*/
$entry_point_registry['SendReportsinEmail'] = array (
  'file' => 'custom/modules/Schedulers/sendReportsEmail.php', 
  'auth' => false,
);
$entry_point_registry['SendReportsinEmailUploadImage'] = array (
  'file' => 'custom/modules/Schedulers/upload.php', 
  'auth' => false,
);
/*for Scheduled Reports Charts in email*/

$entry_point_registry['createBooksEntryPoint'] = array(
        'file' => 'custom/custom_entry_points/createBooks.php',
        'auth' => false,
);