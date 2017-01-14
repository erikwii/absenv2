$(function () {
        $("#datepicker").datepicker();
        $("#datepicker2").datepicker();
        $("#datepicker, #datepicker2").datepicker("option", "dateFormat", 'yy-mm-dd');
    }
);