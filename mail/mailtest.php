<?php
if(mb_send_mail('win-hot@hotmail.co.jp', 'メール送信テスト：タイトル', 'メール送信テスト：本文')) {
    echo "送信完了";
} else {
    echo "送信失敗";
}
?>