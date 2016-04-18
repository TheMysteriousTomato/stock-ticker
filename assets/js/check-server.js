$( document ).ready(function() {
    setInterval(update, 500);
    function update(){
        $.get("/homepage/status", function(){}).done(
            function(data) {
                var href = window.location.pathname;
                if ( href == "/gameplay" && data["state"] == 0 ||
                     href == "/gameplay" && data["state"] == 1 ||
                     href == "/gameplay" && data["state"] == 4 )
                    window.location.assign(window.location.origin + "/gameplay/closed");
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