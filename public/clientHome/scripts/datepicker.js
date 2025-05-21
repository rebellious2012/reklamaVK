$(function () {
    $("#passport-issue-date").datepicker({
        dateFormat: "dd-mm-yy"
    });
    $("#anim").on("change", function () {
        $("#passport-issue-date").datepicker("option", "showAnim", $(this).val());
    });
});

$(function () {
    $("#birth").datepicker({
        dateFormat: "dd-mm-yy"
    });
    $("#anim").on("change", function () {
        
        $("#birth").datepicker("option", "showAnim", $(this).val());
    });
});