◆開発環境
・xampp（windows、php、MySQL）
◆実装に費やした時間
・30時間
◆実装中に問題となったこと・工夫したところ
・問題となったこと：バリデーションの実装、メール送信確認、添付ファイルのDB登録処理、セレクトボックスの値保持
・工夫したこと：シンプルなコーディング、処理部分とテンプレート部分のセパレート
◆改善点
・バリデーションの文言の表示位置、メール送信機能の追加、添付ファイルの登録、セレクトボックスの値保持、CSSの実装
◆どのような動作テストを行ったか
・画面遷移の確認
  ①入力画面のフォームに値を入力⇒送信ボタンクリック⇒確認画面における送信ボタンクリック⇒完了画面の表示
  ②入力画面のフォームに値を入力⇒送信ボタンクリック⇒確認画面における戻るボタンをクリック⇒入力画面の表示
・DBへのデータ登録の確認
  ①MySQLへログインし対象テーブルにデータが登録されているか確認
・バリデーション機能の確認
  ①件名、名前、メールアドレス、電話番号、お問い合わせ内容の入力項目に対して空欄の状態で送信ボタンをクリックしたときのバリデーションの確認
  ②メールアドレスの入力項目に関してメールアドレスの形式（~~~~~@~~~~~~~）に合致しない場合（ex.sampleExample.comと入力）の確認
◆参考資料又は参考サイト
・https://pg-log.com/php-web-form/
・https://qiita.com/kei_1011/items/75a1ac12ad54f08ed05b
・https://www.webdesignleaves.com/pr/php/php_basic_06.php
・https://webukatu.com/wordpress/blog/33637/
・https://madoseed.com/php-contact-form/
・https://kasumiblog.org/php-db-form-post-register/
・https://log.dot-co.co.jp/php-db-register/
・https://cbc-study.com/training/advanced/page6
