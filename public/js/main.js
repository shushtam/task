$(document).ready(function () {
    $(document).on("click", ".btn-clear", function () {
        $("input").val('');
        $("select.non-arithmetic").val("1");
        $("select.arithmetic").val("=");
        $(".btn-go").trigger("click");
    });
});