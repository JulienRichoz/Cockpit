import { callAjax } from './modules/callajax';
import swal from 'sweetalert'


$('#add_weekly_modal_submit').click(function(){

    let modal = $('#add_weekly_modal');

    let data = {
        name: modal.find('#name').val(),
        location: modal.find('#location').val(),
        date: modal.find('#date').val(),
        people: modal.find('#people').val(),
        id: modal.find('#weekly_id').val(),
    };

    let route = $(this).data('route');

    callAjax.simpleCall(data, route, modal.attr('id'));
});


$('#weekly_activity .editable_row ._edit_').click(function(){

    let modal = $('#add_weekly_modal');

    modal.find('#name').val($(this).parent().data('name'));
    modal.find('#location').val($(this).parent().data('location'));
    modal.find('#date').val($(this).parent().data('date'));
    modal.find('#people').val($(this).parent().data('people'));
    modal.find('#weekly_id').val($(this).parent().data('id'));

    $('#add_weekly_modal').modal('toggle');
});

$('.delete_weekly_cross').click(function(){

    let data = {
        id: $(this).parent().data('id'),
    };

    let route = $(this).data('route');

    swal({
        title: 'Attention',
        text: 'Voulez vous vraiment supprimer cette activité ?',
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((response) => {
            if (response) {
                callAjax.simpleCall(data, route);
            } else {
                swal("Your imaginary file is safe!");
            }
        });
});
