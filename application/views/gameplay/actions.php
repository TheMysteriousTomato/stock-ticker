<h2 class="text-center underline">Buy / Sell Stocks</h2>
<section class="well well-lg">
    <form id="transactions" method="post" action="/gameplay/buystock">

<!-- DEBUG -->
<!--        <form method="post" action="http://bsx.jlparry.com/buy">-->
<!--        <div class="form-group">-->
<!--            <label for="team">Team:</label>-->
<!--            <input type="text" class="form-control" id="team"     name="team"     value="S12" readonly>-->
<!--        </div>-->
<!---->
<!--        <div class="form-group">-->
<!--            <label for="player">Player:</label>-->
<!--            <input type="text" class="form-control" id="player"     name="player"     value="Mickey" >-->
<!--        </div>-->
<!---->
<!--        <div class="form-group">-->
<!--            <label for="token">Token:</label>-->
<!--            <input type="text" class="form-control" id="token"     name="token"     value="dbb728ed6c1fc21cc5a78d85320edec1">-->
<!--        </div>-->

        <div class="form-group">
            <label for="stock">Stocks:</label>
            <select id="stock" name="stock" class="form-control">
                {Stocks}
                    <option value="{Code}">{Name}&nbsp;&nbsp;&nbsp;${Value}</option>
                {/Stocks}
            </select>
        </div>

        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input id="quantity" name="quantity" type="number" min="0" max="10" value="0" />
        </div>

        <div class="radio">
            <label>
                <input type="radio" name="action" id="buy" value="buy" checked />
                Buy
            </label>
        </div>

        <div class="radio">
            <label>
                <input type="radio" name="action" id="sell" value="sell"/>
                Sell
            </label>
        </div>
        <input class="btn btn-primary" type="submit" value="Submit" />
    </form>
</section>

<section class="well well-lg">
    <h4>Register the Agent</h4>
    <hr>
    <div>
        <div class="form-group">
            <label for="team">Team:</label>
            <input type="text" class="form-control" id="team"     name="team"     value="S12" readonly>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name"     name="name"     value="The Mysterious Tomato" readonly>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="text" class="form-control" id="password" name="password" value="tuesday">
        </div>
        <button type="submit" class="btn btn-success" onclick="register()">Register Agent</button>
    </div>
</section>

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