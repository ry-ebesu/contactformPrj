<?php
    function validate(){
        if (empty($_SESSION['subject'])) {
            $error['subject'] = '件名を入力してください';
        }
        if (empty($_SESSION['name'])) {
            $error['name'] = '名前を入力してください';
            // name length check
            if(mb_strlen($_SESSION['name']) > 20) {
                $error['name'] = '名前は20文字以内で入力してください';
            }
        }
        if (empty($_SESSION['email'])){
            $error['email'] = "メールアドレスは必ず入力して下さい";
          }/*elseif( !preg_match( '/^[0-9a-z_.\/?]+@([0-9a-z-]+\.)+[0-9a-z-]+$/',$data['email'])) {
            $error['email'] = "メールアドレスは正しい形式で入力して下さい";
        }*/
        if (empty($_SESSION['phonenumber'])) {
            $error['phonenumber'] = '電話番号を入力してください';
            // phonenumber length check
            if(mb_strlen($_SESSION['phonenumber']) > 20) {
            $error['phonenumber'] = '電話番号は20文字以内で入力してください';
            }
        }
        if (empty($_SESSION['message'])) {
            $error['message'] = 'お問い合わせ内容を入力してください';
            // message length check
            if(mb_strlen($_SESSION['message']) > 500) {
            $error['message'] = 'お問い合わせ内容は500文字以内で入力してください';
            }
        }
        if (isset($error)) {
            // エラーメッセージをセッションに保存
            $_SESSION['error'] = $error;
            header('Location: index.php');
            exit;
        }
        return $_SESSION;
    }
?>
