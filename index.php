<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"));

$to      = $data->to;
$subject = $data->subject;
$message = $data->message;
$from = $data->from;
$headers =
    "From: " . $from . "\r\n" .
    "Reply-To: " . $from . "\r\n" .
    "X-Mailer: PHP/" . phpversion();

function message($content) {
  return json_encode(array("message" => $content));
}

if ($_ENV["ENV"] === "TEST") {
    echo message("This is a test environment");
    exit();
}

if(!$to || !$subject || !$message || !$from) {
    echo message("check if you are sending 'to', 'subject', 'message' and 'from' fields");
    exit();
}

if(@mail($to, $subject, $message, $headers)) {
    echo message("success");
} else {
    echo message("error");
}
?>
