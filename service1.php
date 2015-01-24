<?php
$query = 'SELECT first_name, last_name, gender, finish_time FROM runners order by finish_time ASC ';
$result = db_connection($query);
$runners = array();
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
array_push($runners, array('fname' => $row['first_name'], 'lname' => $row['last_name'],'gender' => $row['gender'], 'time' => $row['finish_time']));
}
echo json_encode(array("runners" => $runners));

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
php?>