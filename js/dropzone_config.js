Dropzone.autoDiscover = false; //要素の自動探索停止

var myDropzone = new Dropzone(".dropzone", {
    url: 'upload.php',
    dictDefaultMessage: 'タップしてファイルを選択してください',
    autoProcessQueue: false, //キューの自動処理停止
    parallelUploads: 2, // ファイルアップロードの数
    acceptedFiles: 'image/*', //ファイルの種別制限
    addRemoveLinks: true,　//削除するリンクの表示
    dictRemoveFile: 'やめる'　//削除リンクの名前表示用
});

var forms = document.querySelectorAll('.needs-validation') //フォームの入力内容をすべて読み込み
Array.prototype.slice.call(forms)
    .forEach(function (form) {
        $('#uploadfiles').click(function () {
            if (form.checkValidity() && myDropzone.getAcceptedFiles().length > 0) {
                myDropzone.processQueue(); //フォームにすべて入力されていて、かつファイルが1個以上選択していたらキューの実行
            } else {
                console.log("はずれです。");//フォームに未入力があったら、何もしない
            }
        });
    })