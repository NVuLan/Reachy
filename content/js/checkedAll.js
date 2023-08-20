$('#checkall').change(function() {
    $('.list__checkbox').prop('checked', this.checked);
});

$('.list__checkbox').change(function() {
    if ($('.list__checkbox:checked').length == $('.list__checkbox').length) {
        $('#checkall').prop('checked', true);
    } else {
        $('#checkall').prop('checked', false);
    }
});