/**
 * Publics script
 * 
 * Access : public
 * Description : Other script are only auth access. This one handle the calcul of the date bar progression.
 * 
 * Author : Julien Richoz
 * Date: 27.05.2019
 */

$(document).ready(function() {

    // Compute and set the height of the vertical line to display
    var activitiesDivHeight = ($('#activities_row').height()-30).toString()+'px'; 
    $('#vltime').css('height', activitiesDivHeight);

    // Compute and set horizontally the vertical line to refer to the current day in the month cell 
    var monthWidth = $('#month-width').width();
    var now = new Date();
    var today = now.getDate();
    var dayInCurrentMonth = new Date(now.getFullYear(), now.getMonth()+1, 0).getDate();
    var finalPos = Math.round(today/dayInCurrentMonth * monthWidth)+'px';
    $('#vltime').css('margin-left', finalPos);

});