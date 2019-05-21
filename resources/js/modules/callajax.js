import swal from 'sweetalert';

//////////////////////
// Simple call ajax //
//////////////////////
/**
 * 
 * @param {*} data 
 * @param {*} route 
 * @param {*} modalId 
 *
 * Module which treat :
 * - errors from form validations
 * - result when form's been validated
 */

 const simpleCall = (data, route, modalId = null) => {

    let token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        data: data,
        type: 'POST',
        datatype: 'JSON',
        success: function (resp) {
            if(resp.response){
                // Remove the modal popup if it's a modal form
                if(modalId){
                    $('#' + modalId).modal('toggle');
                }
                swal({
                    title: resp.title,
                    text: resp.response,
                    icon: "success",
                })
                    // Used Reload() function to gain time during development. To improve if time available.
                    .then(function (){
                        location.reload();
                    });
            }
        },
        error: function (resp) {
            if(resp.status === 419){
                location.reload();
            }
            else if(resp.status === 422 && resp.responseJSON.errors){
                $('.invalid-feedback').remove();
                $('input').removeClass('is-invalid').addClass('is-valid');
                $.each(resp.responseJSON.errors, function(key, value){
                    $('#' + modalId + ' #' + key).removeClass('is-valid').addClass('is-invalid');
                    $('<div class="invalid-feedback">' + value +'</div>').appendTo($('#' + modalId + ' #' + key).parent());
                });
            }
            else{
                console.log(resp);
                swal({
                    title: resp.status,
                    text: resp.responseJSON.message,
                    icon: "error",
                });
            }
        }
    });
};

const callAjax = {
    simpleCall: simpleCall,
};

export { callAjax }
