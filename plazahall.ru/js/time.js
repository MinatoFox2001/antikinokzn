$(document).ready(function () {
    ChangeTime();
})

$('input[name="date"]').change(function () {
    ChangeTime();
});

function ChangeTime() {
    $('select[name="time"]').empty();
    switch ($('input[name="date"]').val()) {
        case '2020-09-04':
            var times = ['1:00','3:00','5:00','9:00','11:00','13:00','16:00','18:00','19:00','20:00','22:00','23:00'];
            break;
        case '2020-08-05':
            var times = ['00:00','2:00','6:00','11:00','14:00','15:00','16:00','18:00','19:00','20:00','23:00'];
            break;
        case '2020-08-06':
            var times = ['2:00','7:00','11:00','12:00','15:00','17:00','18:00','19:00','21:00','23:00'];
            break;

        default: // Даты, к которым не указаны параметры (Дефолт)
            var times = ['1:00','8:00','10:00','13:00','18:00','19:00','21:00','22:00','23:00'];
    }

    $.each(times,function(index,value){
        $('select[name="time"]').append(`<option value="${value}">${value}</option>`);
    });
}