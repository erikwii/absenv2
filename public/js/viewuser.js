/**
 * Created by eka on 11/02/16.
 */
$(document).ready(function(){
    $(".edit-btn").click(function(e){ // Click to only happen on announce links
        var user = $(this).data('id');
        $("#id").val(user.id);
        $("#name").val(user.name);
        $("#email").val(user.email);
    });
    $(".delete-btn").click(function(e) { // Click to only happen on announce links{
        var user = $(this).data('id');
        $('<input>').attr({
            type: 'hidden',
            id: 'id',
            name: 'id',
            value: user.id,
        }).appendTo('form');
    });
});