// password　の表示-非表示
$(".toggle-password").click(function () {
    // icon　の変更
    $(this).toggleClass("bi-eye-fill bi-eye-slash-fill");

    // Get input form
    let input = $(this).parent().prev("input");

    // inputタイプの切替え
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});