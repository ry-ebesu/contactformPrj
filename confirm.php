<?php
include('functions.php');

if($_SERVER["REQUEST_METHOD"] != "POST"){
    header("Location: index.php");
    exit();
}
    session_start();
    $_SESSION['subject'] = htmlspecialchars($_POST['subject'], ENT_QUOTES,'UTF-8');
    $_SESSION['name'] = htmlspecialchars($_POST['name'], ENT_QUOTES,'UTF-8');
    $_SESSION['email'] = htmlspecialchars($_POST['email'], ENT_QUOTES,'UTF-8');
    $_SESSION['phonenumber'] = htmlspecialchars($_POST['phonenumber'], ENT_QUOTES,'UTF-8');
    $_SESSION['message'] = htmlspecialchars($_POST['message'], ENT_QUOTES,'UTF-8');

    validate();

    //添付ファイルデータ処理
    $uploadfile = basename($_FILES['upload_file']['name']);
    $result = '';

    if(is_uploaded_file($uploadfile)){
        if (move_uploaded_file($_FILES['upload_file']['tmp_name'], $uploadfile)) {
            echo "<p>ファイルの送信に成功しました。</p>";
        } else {
            echo "<p>ファイルの送信に失敗しました。</p>";
        }
    }else{
        $result = "ファイルが選択されていません";
    }
    
    //DB処理
    try{
    //DB接続（DB接続に必要な情報を定義）
    $dsn = 'mysql:dbname=db_contactform;host=localhost;charset=utf8';
    $user = 'root';
    $password = 'password';

    $PDO = new PDO($dsn, $user, $password); //PDOでMysqlのデータベースに接続
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //formの値を取得
    $subject = $_SESSION['subject'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $phonenumber = $_SESSION['phonenumber'];
    $message = $_SESSION['message'];

    //DB登録
    $sql = "INSERT INTO form_info (subject, name, email, phonenumber, message) VALUES (:subject, :name, :email, :phonenumber, :message)";
    $stmt = $PDO->prepare($sql);
    $params = array(':subject' => $subject, ':name' => $name, ':email' => $email, ':phonenumber' => $phonenumber, ':message' => $message);
    $stmt->execute($params);

    }catch(PDOExeption $e){
        exit('データベースに接続できませんでした' . $e->getMessage());
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>確認画面</title>
</head>
<body>
    <form action="complete.php" method="POST" enctype="multipart/form-data">
        <h2>お問い合わせ内容確認</h2>
        <div class="input-area">
            <label for="subject">件名</label>
            <?php echo $_SESSION['subject'];?>
        </div>
        <div class="input-area">
            <label for="name">お名前</label>
            <?php echo $_SESSION['name'];?>
        </div>
        <div class="input-area">
            <label for="email">メールアドレス</label>
            <?php echo $_SESSION['email'];?>
        </div>
        <div class="input-area">
            <label for="phonenumber">電話番号</label>
            <?php echo $_SESSION['phonenumber'];?>
        </div>
        <div class="input-area">
            <label for="message">お問い合わせ内容</label>
            <?php echo $_SESSION['message'];?>
        </div>
        <div class="input-area">
            <label for="avatar">添付資料</label>
            <!--<input type="file" id="upload_file" name="upload_file" accept="image/png, image/jpeg" />-->
            <?php echo $uploadfile;?>
        </div>
        <div class="input-area">
            <button type="button" name="back" onclick="history.back()">戻る</button>
            <button type="submit" name="send">送信</button>
        </div>
    </form>
</body>
</html>
