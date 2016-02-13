/**
 * Created by eka on 12/02/16.
 */

$(document).ready(function(){
    $(".edit-btn").click(function(e){ // Click to only happen on announce links
        var room = $(this).data('id');
        var nama_ruang=room.nama_ruang;
        var lokasi=room.lokasi;
        $('#nama_ruang').val(room.nama_ruang);
        $('#lokasi').val(room.lokasi);
        $('#daya_tampung').val(room.daya_tampung);
        $('#id_ruang').val(room.id);
    });
});