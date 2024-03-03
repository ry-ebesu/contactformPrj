<?php
//送信ボタン押下時
$message = array();
if( isset($_POST['send']) && $_POST['send'] ){
    $message = "お問い合わせを受け付けました。\r\n"
             . "名前： " . $_SESSION['name'] . "\r\n"
             . "メールアドレス： " . $_SESSION['email'] . "\r\n"
             . "電話番号： " . $_SESSION['phonenumber'] . "\r\n"
             . "お問い合わせ内容：\r\n"
             . preg_replace("/\r\n|\r\n/", "\r\n", $_SESSION['message']);
    mb_send_mail($_SESSION['email'],'お問い合わせありがとうございます。',$message);
    mb_send_mail('管理者向けメールアドレス','お問い合わせがありました。',$message);
    session_destroy();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>送信完了画面</title>
</head>
<body>
    <h2>お問い合わせ完了</h2>
    <p>お問い合わせありがとうございました。</p>
</body>
</html>
