$( document ).ready(function() {
    $('#sandbox-container .input-group.date').datepicker({
        format: "dd.mm.yyyy",
        calendarWeeks: true,
        autoclose: true,
        defaultViewDate: { year: 1977, month: 04, day: 25 }
    });
});