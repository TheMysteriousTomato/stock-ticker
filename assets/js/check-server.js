$( document ).ready(function() {
    setInterval(update, 500);
    function update(){
        $.get("/homepage/status", function(){}).done(
            function(data) {
                $("#status-round").html(data["round"]);
                $("#status-state").html(data["desc"]);
                $("#status-upcoming").html(data["upcoming"]);
                $("#status-countdown").html(data["countdown"]);
                //console.log(data);
            }).fail(function(err) {
                //console.error(err);
            }
        );
    }
});