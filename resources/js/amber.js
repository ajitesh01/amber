$(document).ready(function () {
    function radioValue() {
        $('.right_answer').each(function (i) {
            this.value = i
        });
    }
    radioValue();
    $(document).on('click', '.btn-add', function (e) {
        e.preventDefault();
        var controlForm = $('#myRepeatingFields:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);
        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="fa fa-minus-circle" aria-hidden="true"></span>');
        radioValue();
    }).on('click', '.btn-remove', function (e) {
        e.preventDefault();
        $(this).parents('.entry:first').remove();
        radioValue();
        return false;
    });
    $(document).on('click', '.select-toggle', function (e) {
        e.preventDefault();
        var checkbox = $("input[type=checkbox]");
        checkbox.prop("checked", !checkbox.prop("checked"));
    });

    if ($('#transaction-table').length > 0) {
        $('#transaction-table').DataTable({
            paginate: true
        });
    }

    if ($('#user-select').length > 0) {
        $('#user-select').select2({
            placeholder: 'Select an user'
        });
    }
});
