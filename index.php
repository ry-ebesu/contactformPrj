<?php
    session_start();
    
        // $_SESSIONにフォームの入力データがある場合はその内容を表示する
        if(isset($_SESSION)){
            $subject = $_SESSION['subject'];
            $name = $_SESSION['name'];
            $email = $_SESSION['email'];
            $phonenumber = $_SESSION['phonenumber'];
            $message = $_SESSION['message'];
        }
        // $_SESSION['error']がある場合は、エラーメッセージを表示する
        if(isset($_SESSION['error'])){
            $error = $_SESSION['error'];
            // エラーメッセージをクリア
            unset($_SESSION['error']);
        }
    
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>お問い合わせ入力画面</title>
</head>
<body>
    <form action="confirm.php" method="post" enctype="multipart/form-data">
        <h2>お問い合わせフォーム</h2>
        <?php if (!empty($error)) : ?>
            <div class="mt-3">
                <ul class="alert alert-danger" role="alert">
                <?php foreach ($error as $err) : ?>
                    <li class="mx-2"><?php echo $err; ?></li>
                <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <div class="input-area">
            <label for="subject">件名</label>
            <select name="subject" value="<?php echo isset($subject) ? $subject : null ?>">
                <option value="" hidden></option>
                <option value="opinion">ご意見</option>
                <option value="thoughts">ご感想</option>
                <option value="other">その他</option>
            </select>
        </div>
        <div class="input-area">
            <label for="name">お名前</label>
            <input type="text" id="name" name="name" value="<?php echo isset($name) ? $name : null ?>" placeholder="（例） 佐藤　太郎" />
        </div>
        <div class="input-area">
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" value="<?php echo isset($email) ? $email : null ?>" placeholder="（例） example@mail.com"/>
        </div>
        <div class="input-area">
            <label for="phonenumber">電話番号</label>
            <input type="tel" id="phonenumber" name="phonenumber" value="<?php echo isset($phonenumber) ? $phonenumber : null ?>" placeholder="（例） 090-0000-0000"/>
        </div>
        <div class="input-area">
            <p><label for="message">お問い合わせ内容</label></p>
            <textarea id="message" name="message" placeholder="（例） お問い合わせ" rows="10" cols="50"><?php echo isset($message) ? $message : null ?></textarea>
        </div>
        <div class="input-area">
            <label for="avatar">添付資料</label>
            <input type="file" id="upload_file" name="upload_file" accept="image/png, image/jpeg" multiple/>
        </div>
        <div class="input-area">
            <button type="submit" name="submit" value="confirm">送信</button>
        </div>
    </form>
</body>
</html>
