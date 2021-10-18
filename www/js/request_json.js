$(document).ready(function () {
    $("#btn_submit").click( function() {
        var id = $('#id').val().trim();
        ShowMeetingInfoById(id, "result");
    });
});


function ShowMeetingInfoById(id, el) {
    $.getJSON({
        url: "process.php",
        data: {id: id, method: "json"}
    }).done(function (result, status, xhr) {
        if(result) {
            var txt = "<b>sysid: </b> " + result.sysid + "<br>" +
                      "<b>name: </b>" + result.name + "<br>" +
                      "<b>date: </b>" + result.date + "<br>";

            document.getElementById(el).innerHTML = "<b> #" + id + "</b></br>" + txt;
            return;
        }
    })
    .fail(function() {
        document.getElementById(el).innerHTML = "<b> #" + id + "</b></br> Not found";
    });
};

