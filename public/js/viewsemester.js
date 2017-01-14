/**
 * Created by eka on 14/01/17.
 */

$(document).ready(function(){
    $(".edit-btn").click(function(e){ // Click to only happen on announce links
        var kalender = $(this).data('id');
        var semester=kalender.semester;
        var start_period=kalender.start_period;
        var end_period=kalender.end_period;
        var active=kalender.active;
        $('#semester').val(kalender.semester);
        $('#start_period').val(kalender.start_period);
        $('#end_period').val(kalender.end_period);
        $('#active').val(kalender.active);
        $('#id').val(kalender.id);
    });
});