/**
 * Activity Script
 * 
 * Access : Auth only
 * Description : handle the modal pop up on different event to do some actions (edit, delete, add).
 * 
 * Author : Julien Richoz
 * Date: 21.05.2019
 */

import { callAjax } from './modules/callajax';
import swal from 'sweetalert'

// Add an activity on submit modal form
$('#add_activity_modal_submit').click(function(){

    let modal = $('#add_activity_modal');

    let data = {
        name: modal.find('#name').val(),
        location: modal.find('#location').val(),
        start_date: modal.find('#start_date').val(),
        end_date: modal.find('#end_date').val(),
        type: modal.find('#activity_type_id').val(),
        progress: modal.find('#progress').val(),
        id: modal.find('#activity_id').val(),
    };

    let route = $(this).data('route');

    callAjax.simpleCall(data, route, modal.attr('id'));
});


// Add/Edit an activity on click (modal popup)
$('#activities_row .editable_row ._edit_').click(function(){
    let modal = $('#add_activity_modal');
    let progress = '0';
    if($(this).parent().data('progress')){
        progress = $(this).parent().data('progress');
    }
    // Get the values from the view in the modal to get the current data.
    modal.find('#name').val($(this).parent().data('name'));
    modal.find('#location').val($(this).parent().data('location'));
    modal.find('#start_date').val($(this).parent().data('start_date'));
    modal.find('#end_date').val($(this).parent().data('end_date'));
    modal.find('#activity_id').val($(this).parent().data('id'));
    modal.find('#progress').val(progress);//$(this).parent().data('progress'));
    modal.find('#activity_type_id').val($(this).parent().data('activity_type_id'));

    $('#add_activity_modal').modal('toggle');
});

// Softdelete an activity on click
$('#activities_row .delete_activity_cross').click(function(){
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