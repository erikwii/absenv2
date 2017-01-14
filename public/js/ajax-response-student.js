/**
 * Created by eka on 21/01/16.
 */

$(document).ready(function() {
    //handle showTopic
    $('select#changeStatus[name="course_id"]').change(function(e){
        e.preventDefault();
        var course_id = $('select[id="changeStatus"][name="course_id"]').val();
        var token = $('input[name="_token"]').val();
        $.ajax({
            type: 'POST',
            url: '/coursetopic',
            data: {Kode_Matkul: course_id, _token: token},
            success: function( msg ) {
                //turn JSON object to javascript object for easier debugging
                var obj = JSON.parse(msg);
                //$("#ajaxResponse").append("<div>"+obj._token+"</div>");
                $('body').load( "coursetopic",{ "_token": obj._token, "Kode_Matkul" : obj.Kode_Matkul,"step" : 2} );
            },
            dataType: 'html'
        });
        console.log(token);
    });

    //handle rekap dosen
    $('select#changeStatus[name="Semester"]').change(function(e){
        e.preventDefault();
        var semester_id = $('select[id="changeStatus"][name="Semester"]').val();
        var token = $('input[name="_token"]').val();
        $.ajax({
            type: 'POST',
            url: '/ajaxrekapdosen',
            data: {Semester: semester_id, _token: token},
            success: function( msg ) {
                //turn JSON object to javascript object for easier debugging
                var obj = JSON.parse(msg);
                //$("#ajaxResponse").append("<div>"+obj._token+"</div>");
                $('body').load( "/ajaxrekapdosen",{ "_token": obj._token, "Semester" : obj.Semester,"step" : 2} );
            },
            dataType: 'html'
        });
        console.log(token);
    });

});