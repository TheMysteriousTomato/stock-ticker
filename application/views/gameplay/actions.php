<h2 class="text-center underline">Buy / Sell Stocks</h2>
{view}

<script>
    var radio = "buy";

    $(document).ready(function() {
        $("input[type=radio]").change(function(e) {
            radio = $(this).attr('id');
            if(radio == "buy")
                $("form#transactions").attr("action", "/gameplay/buystock");
            else
                $("form#transactions").attr("action", "/gameplay/sellstock");
        });
    });

    function register()
    {
        var data = {
            team: $("#team").val(),
            name: $("#name").val(),
            password: $("#password").val()
        };

        console.log(data);

        $.ajax({
            url: 'gameplay/register',
            type: 'POST',
            data: data,
            success: function(result)
            {
                var xml = $(result);
                var token;

                if(xml.has("token")) {
                    token = xml.find("token");
                    if(token.length > 0)
                    {
                        console.log(token.text());
                        Cookies.set('token', token.text());
                        // TODO: Set expiration
                    }
                }

                if(xml.has("team")) {
                    var team = xml.find("team");
                    if(team.length > 0)
                    {
                        console.log(team.text());
                        Cookies.set('team', team.text());
                    }
                }
            }
        });
    }
</script>
