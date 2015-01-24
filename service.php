<?php
if ($_POST['action'] == 'addRunner') {
$fname = htmlspecialchars($_POST['txtFirstName']);
$lname = htmlspecialchars($_POST['txtLastName']);
$gender = htmlspecialchars($_POST['ddlGender']);
$minutes = htmlspecialchars($_POST['txtMinutes']);
$seconds = htmlspecialchars($_POST['txtSeconds']);
if(preg_match('/[^\w\s]/i', $fname) || preg_match('/[^\w\s]/i', $lname)) {
fail('Invalid name provided.');
}
if( empty($fname) || empty($lname) ) {
fail('Please enter a first and last name.');
}
if( empty($gender) ) {
fail('Please select a gender.');
}
$time = $minutes.":".$seconds;
$query = "INSERT INTO runners SET first_name='$fname', last_name='$lname',
gender='$gender', finish_time='$time'";
$result = db_connection($query);

if ($result) {
$msg = "Runner: ".$fname." ".$lname." added successfully" ;
success($msg);
} else { fail('Insert failed.');}
exit;
}
function fail($message) {
die(json_encode(array('status' => 'fail', 'message' => $message)));
}
function success($message) {
die(json_encode(array('status' => 'success', 'message' => $message)));
}
function db_connection($query) {
mysql_connect('127.0.0.1','jojo','ashjojo')OR die(fail('Could not connect to database'));
mysql_select_db ('hfjq_race_info');
return mysql_query($query);
}
exit;
?>