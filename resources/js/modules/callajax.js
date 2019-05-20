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
 * Module simple call ajax which handle :
 * - errors from form validations
 * - result when form's been validated
 */

 const simpleCall = (data, route) => {

    let token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        data: data,
        type: 'POST',
        datatype: 'JSON',
        success: function (resp) {
            if(resp.response){
                swal({
                    title: resp.title,
                    text: resp.response,
                    icon: "success",
                })
                    // Reload manually => easier than dynamically maintain all table. (no time to do it dynamically)
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
