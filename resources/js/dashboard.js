/**
 * Activity Script
 * 
 * Access : Auth
 * Description : handle the modal pop up on different event to do some actions (edit, delete).
 * 
 * Author : Julien Richoz
 * Date: 21.05.2019
 */

import { callAjax } from './modules/callajax';

$('.editable_text').click(function(){

    $(this).addClass('d-none');
    let content = $(this).html();

    $(this).parent().find('.input-group input').attr('value', content);
    $(this).parent().find('.input-group').removeClass('d-none');
    $(this).parent().find('.input-group input').focus();
});

$('.save_information_text').click(function(){
    let text_value = $(this).closest('.input-group').find('input').val();

    let data = {
        text: text_value,
        id: $(this).closest('.event_row').attr('id'),
    };

    let route = $(this).closest('#event').data('route');

    $(this).closest('.input-group').addClass('d-none');
    $(this).closest('.input-group').parent().find('.editable_text').html(text_value);
    $(this).closest('.input-group').parent().find('.editable_text').removeClass('d-none');

    callAjax.simpleCall(data, route);
});
