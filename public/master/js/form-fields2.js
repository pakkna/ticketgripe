//# sourceMappingURL=form-fields.js.map
$(function() {
    $(document).on("click", ".option-up", function(a) {
        console.debug("Option up");
        a.preventDefault();
        a = $(this).closest("tr");
        var b = a.prev("tr");
        0 !== b.length && a.insertBefore(b);
        reIndexOptionNames();
        return !1
    });
    $(document).on("click", ".option-down", function(a) {
        console.debug("Option down");
        a.preventDefault();
        a = $(this).closest("tr");
        var b = a.next("tr");
        0 !== b.length && a.insertAfter(b);
        reIndexOptionNames();
        return !1
    });
    $(document).on("click", ".option-delete", function(a) {
        $(this).closest("tr").remove();
        reIndexOptionNames();
        return !1
    })
});

function reIndexOptionNames() {
    var a = $("#availableOptionTable2 tr");
    // console.debug(a);
    // console.debug(a.size());
    a.each(function(a) {
        // console.log("Index: " + a);
        $(this).find("input[name*='id']").attr("name", "choices[" + a + "].id");
        $(this).find("input[name*='label']").attr("name", "choices[" + a + "].label")
    })
}

function addOption2() {
    // console.debug("Adding Available Option");
    var a = $("<tr/>"),
        b = $("<input/>").attr("type", "text").attr("name", "choices[].label").addClass('payment-input cus-input'),
        b = $("<td/>").append(b),
        c = $("<button/>").addClass("btn btn-xs btn-default btn-bg-custom option-up").append($("<i/>").addClass("fas fa-arrow-up")),
        d = $("<button/>").addClass("btn btn-xs btn-default btn-bg-custom option-down").append($("<i/>").addClass("fas fa-arrow-down")),
        e = $("<button/>").addClass("btn btn-xs btn-danger option-delete").append($("<i/>").addClass("fas fa-trash")),
        c = $("<td/>").append(c).append("&nbsp;").append(d).append("&nbsp;").append(e);
    $("#availableOptionTable2").append(a.append(b).append(c));
    reIndexOptionNames()
};