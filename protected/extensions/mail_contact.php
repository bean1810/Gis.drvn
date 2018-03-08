<?php
$alert = "";
//function checkinput($data){
//    $data = trim($data);
//    $data = stripcslashes($data);
//    $data = htmlspecialchars($data);
//    return $data;
//}
if(isset($_POST['send_contact'])) {
    require_once(Yii::app()->basePath . '/extensions/PhpMailer/PHPMailerAutoload.php');
    $err = "";
    $first = $_POST['first'];
    $last = $_POST['last'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
//    if(empty($first)){
//        echo "<script type='text/javascript'>alert('Xin hãy điền đầy đủ thông tin')</script>";
//    }else{
//        $first = checkinput($first);
//    }
//    if(empty($last)){
//        echo "<script type='text/javascript'>alert('Xin hãy điền đầy đủ thông tin')</script>";
//    }else{
//        $last = checkinput($last);
//    }
//    if(empty($email)){
//        echo "<script type='text/javascript'>alert('Xin hãy điền đầy đủ thông tin')</script>";
//    }else{
//        $email = checkinput($email);
//        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
//            $err = "Địa chỉ email không tồn tại";
//        }
//    }
//    if(empty($message)){
//        echo "<script type='text/javascript'>alert('Xin hãy điền đầy đủ thông tin')</script>";
//    }else{
//        $message = checkinput($message);
//    }
    if(!empty($first) || !empty($last) || !empty($email) || !empty($message)){
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
        $mail->addReplyTo($email, 'Người dùng');
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'Thông tin phản hồi từ người dùng';
        $mail->From = $email;
        $mail->Body = nl2br("Phản hồi từ người dùng với : \n"."Tên người dùng : $first $last\n"."Email : $email \n"."Điện thoại : $phone \n"."Nội dung thư : $message \n");
        if(!$mail->send()) {
            echo "<script type='text/javascript'>alert('Thư của bạn không thể gửi, xin hãy kiểm tra lại thông tin');
            </script>";
            header("refresh:5;url=http://goong.io/contact");
        } else {
            echo "<script type='text/javascript'>alert('Thư của bạn đã được gửi, chúng tôi sẽ phản hồi tới bạn sớm nhất')</script>";
            header("refresh:5;url=http://goong.io/contact");
            $first =$last =$email = $phone = $message = "";
        }
    }else{
        echo "<script type='text/javascript'>alert('Xin hãy điền đầy đủ thông tin')</script>";
    }
}
?>
