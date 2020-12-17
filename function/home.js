$('.sortCreate').click(function() {
    $('#updateTable').animate({
        opacity: "toggle"
    }, "slow");
    $('#createdTable').animate({
        opacity: "toggle"
    }, "slow");
    $('.sortCreate').attr("disabled", true);
    $('.sortUpdate').attr("disabled", false);

});
$('.sortUpdate').click(function() {
    $('#createdTable').animate({
        opacity: "toggle"
    }, "slow");
    $('#updateTable').animate({
        opacity: "toggle"
    }, "slow");
    $('.sortCreate').attr("disabled", false);
    $('.sortUpdate').attr("disabled", true);
});