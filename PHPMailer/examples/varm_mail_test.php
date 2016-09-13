<?php

//
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
//$from = "emailtest@YOURDOMAIN";
//$to = "mvir@bk.ru"; // "maxim.kabaev@gmail.com";
//$subject = "PHP Mail Test script";
//$message = "This is a test to check the PHP Mail functionality";
//$headers = "From:" . $from;
//mail($to, $subject, $message, $headers);
//echo "Test email sent";
//$args = array(
//    'product_id'   => FILTER_SANITIZE_ENCODED,
//    'component'    => array('filter'    => FILTER_VALIDATE_INT,
//                            'flags'     => FILTER_REQUIRE_ARRAY, 
//                            'options'   => array('min_range' => 1, 'max_range' => 10)
//                           ),
//    'versions'     => FILTER_SANITIZE_ENCODED,
//    'doesnotexist' => FILTER_VALIDATE_INT,
//    'testscalar'   => array(
//                            'filter' => FILTER_VALIDATE_INT,
//                            'flags'  => FILTER_REQUIRE_SCALAR,
//                           ),
//    'testarray'    => array(
//                            'filter' => FILTER_VALIDATE_INT,
//                            'flags'  => FILTER_REQUIRE_ARRAY,
//                           )
//
//);
$value = filter_input(INPUT_POST, "value", FILTER_VALIDATE_INT, array("options" => array("min_range" => 15, "max_range" => 20)));
if ($value) {
    // Выполняем обработку данных
} else {
    // Обрабатываем ошибку
}

function sendmail() {
    require_once '../PHPMailerAutoload.php';
    $results_messages = array();

    $mail = new PHPMailer(true);
    $mail->CharSet = 'utf-8';
    ini_set('default_charset', 'UTF-8');

    class phpmailerAppException extends phpmailerException {
        
    }

    try {
        $to = 'maxim.kabaev@gmail.com';
        if (!PHPMailer::validateAddress($to)) {
            throw new phpmailerAppException("Email address " . $to . " is invalid -- aborting!");
        }
        $mail->isSMTP();
        $mail->SMTPDebug = 2;
        $mail->Host = "smtp.gmail.com";
        $mail->Port = "587";
        $mail->SMTPSecure = "tls";
        $mail->SMTPAuth = true;
        $mail->Username = "vsebaki63@gmail.com";
        $mail->Password = "freelove17";
        $mail->addReplyTo("vsebaki63@gmail.com", "varm_bot");
        $mail->setFrom("vsebaki63@gmail.com", "varm_bot");
        $mail->addAddress("maxim.kabaev@gmail.com", "Max");
        $mail->Subject = "Subj (PHPMailer test using SMTP)";
        $body = <<<'EOT'
    Эй, это заказ
    <hr/>
EOT;
        $mail->WordWrap = 78;
        $mail->msgHTML($body, dirname(__FILE__), true); //Create message bodies and embed images
//$mail->addAttachment('images/phpmailer_mini.png','phpmailer_mini.png');  // optional name
//$mail->addAttachment('images/phpmailer.png', 'phpmailer.png');  // optional name

        try {
            $mail->send();
            $results_messages[] = "Message has been sent using SMTP";
        } catch (phpmailerException $e) {
            throw new phpmailerAppException('Unable to send to: ' . $to . ': ' . $e->getMessage());
        }
    } catch (phpmailerAppException $e) {
        $results_messages[] = $e->errorMessage();
    }

    if (count($results_messages) > 0) {
        echo "<h2>Run results</h2>\n";
        echo "<ul>\n";
        foreach ($results_messages as $result) {
            echo "<li>$result</li>\n";
        }
        echo "</ul>\n";
    }
    return true;
}
