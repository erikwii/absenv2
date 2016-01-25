/**
 * Created by eka on 25/01/16.
 */

$(document).ready(function() {
    //for clear text
    $('input:Reset').click(
        function () {
            $(this).val('');
        });

    //for tooltip
    $('input[name="kode_seksi"]').tooltip({'trigger':'focus'});
});