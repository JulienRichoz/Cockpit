import { callAjax } from './modules/callajax';
import swal from 'sweetalert'


// SOFT DELETE ON CLICK AN ACTIVITY
$('#activities_row .delete_activity_cross').click(function(){

    console.log('ss');
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