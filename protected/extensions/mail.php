<?php
	$alert = "";
	if(isset($_POST['send'])) {
        $email = $_POST['email'];
        $message = $_POST['message'];
        if(!empty($email) && !empty($message)){
            require_once(Yii::app()->basePath . '/extensions/PhpMailer/PHPMailerAutoload.php');
            $mail = new PHPMailer;
//        $mail->SMTPDebug = 2;                               // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication goongtraffic@gmail.com
            $mail->Username = 'tranvietdung181095@gmail.com';                 // SMTP username 2B@trung
            $mail->Password = '0989032963';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
//		$mail->setFrom('waze.com', 'Mailer');
            $mail->addAddress('tranvietdung181095@gmail.com', 'User');     // Add a recipient// Name is optional
            $mail->addReplyTo($email, 'User');
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->CharSet = 'UTF-8';
            $mail->Subject = 'Thông tin phản hồi từ người dùng';
            $mail->From = $email;
            $mail->Body    =nl2br("Phản hồi từ người dùng với : \n"." Địa chỉ Email : $email \n"."Nội dung thư : $message \n");
            if(!$mail->send()) {
                echo "<script type='text/javascript'>alert('Thư của bạn không thể gửi, xin hãy kiểm tra lại thông tin');
            </script>";
                header("refresh:5;url=http://goong.io");
            } else {
                echo "<script type='text/javascript'>alert('Thư của bạn đã được gửi, chúng tôi sẽ phản hồi tới bạn sớm nhất')</script>";
                header("refresh:5;url=http://goong.io");
                $email = $message ="";
            }
        }else{
            echo "<script type='text/javascript'>alert('Xin hãy điền đầy đủ thông tin')</script>";
        }
	}
?>
