<?php
include('../phpmailer_smtp/smtp/PHPMailerAutoload.php');
include('../private_files/system_configure_setting.php');
session_start();
$end_user_email = $_SESSION['user_otp_email'];

// Email Variables
$user_email = '';
$user_otp = '';

$sql_otp_sender = "SELECT * FROM user_data WHERE email = '{$end_user_email}'" or die("Query Failed!! --> sql_otp_sender");
$result_sql_otp_sender = mysqli_query($conn, $sql_otp_sender);
if (mysqli_num_rows($result_sql_otp_sender) > 0) {
    while ($row = mysqli_fetch_assoc($result_sql_otp_sender)) {
        $user_email = $row['email'];
        $user_otp = $row['forgot_pwd_otp'];

        // Create Email Sesssion
        $_SESSION['otp_username'] = $row['username'];
        $_SESSION['otp_email'] = $row['email'];
    }
} else { ?>
<?php
    echo ("<div class='d-flex justify-content-center' style='margin-bottom:-120px; padding-top:60px;'><p class='btn btn-danger'>Email Not Send</p></div>");
}



// Email Send Code
$subject = "Account Password Reset Notification";
$body = "Your OTP <b>" . $user_otp;
echo smtp_mailer($user_email, $subject, $body);
function smtp_mailer($to, $subject, $msg)
{
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    //$mail->SMTPDebug = 2; 
    $mail->Username = "emailbot4all@gmail.com";
    $mail->Password = "siomkbvpakcldsoa";
    $mail->SetFrom("emailbot4all@gmail.com");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    // $mail->AddBCC($row['email']);
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        )
    );
    if (!$mail->Send()) {
        echo "<div style='background:red; color:#fff; font-size:24px;'>Please cheack Your Internet Connection !!</div>";
    } else {
        return "<script>window.location.href='http://localhost/LMS/admin/forgot_password_otp_auth.php'</script>";
    }
}
