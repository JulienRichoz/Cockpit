import { callAjax } from './modules/callajax';
import swal from 'sweetalert'

// Save data from modal popup
$('#add_picket_modal_submit').click(function(){

    let modal = $('#add_picket_modal');
    let data = {
        main: modal.find('#main').val(),
        substitute: modal.find('#substitute').val(),
        start_date: modal.find('#start_date').val(),
        start_time: modal.find('#start_time').val(),
        end_date: modal.find('#end_date').val(),
        end_time: modal.find('#end_time').val(),
        id: modal.find('#picket_id').val(),
    };

    let route = $(this).data('route');

    callAjax.simpleCall(data, route, modal.attr('id'));
});

// Edit picket
$('#pickets_manager .editable_row ._edit_').click(function(){
    let modal = $('#add_picket_modal');
  
    // Define a default begin / end time
    let start_date = null;
    let start_time = '07:30';
    let end_date = null;
    let end_time = '07:30';

    if($(this).parent().data('start_date')){
        let start_split_datetime = $(this).parent().data('start_date').split(' ');
        start_date = start_split_datetime[0];
        start_time = start_split_datetime[1];

        let end_split_datetime = $(this).parent().data('end_date').split(' ');
        end_date = end_split_datetime[0];
        end_time = end_split_datetime[1];
    }

    modal.find('#main').val($(this).parent().data('main'));
    modal.find('#substitute').val($(this).parent().data('substitute'));
    modal.find('#start_date').val(start_date);
    modal.find('#start_time').val(start_time);
    modal.find('#end_date').val(end_date);
    modal.find('#end_time').val(end_time);
    modal.find('#picket_id').val($(this).parent().data('id'));
    $('#add_picket_modal').modal('toggle');
});


// Softdelete a piquet on click
$('#pickets_manager .delete_picket_cross').click(function(){
    const data = {
        id: $(this).parent().data('id'),
    };

    const route = $(this).data('route');

    swal({
        title: 'Attention',
        text: 'Voulez vous vraiment archiver cet événement ?',
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