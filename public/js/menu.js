$('input[name="kind"]').each(function() {
    $(this).click(function() {
        if ($(this).prop('checked')) {
            $($(this).val()).show();
        } else {
            $($(this).val()).hide();
        }
    });
});