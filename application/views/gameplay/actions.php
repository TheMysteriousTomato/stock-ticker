<h2 class="text-center underline">Buy / Sell Stocks</h2>
<section class="well well-lg">
    <form>
        <div class="form-group">
            <label for="stock">Stocks:</label>
            <select id="stock" name="stock" class="form-control">
                {Stocks}
                    <option value="{Code}">{Name}</option>
                {/Stocks}
            </select>
        </div>

        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input id="quantity" name="quantity" type="number" min="1" max="10" />
        </div>

        <div class="radio">
            <label>
                <input type="radio" name="action" id="buy" value="buy" checked />
                Buy
            </label>
        </div>

        <div class="radio">
            <label>
                <input type="radio" name="action" id="sell" value="sell" checked />
                Sell
            </label>
        </div>
        <input class="btn btn-primary" type="submit" value="Submit" />
    </form>
</section>

<section class="well well-lg">
    <h4>Register the Agent</h4>
    <hr>
    <div role="form" class="form">
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
    function register()
    {
        var data = {
            team: $("#team").val(),
            name: $("#name").val(),
            pass: $("#password").val()
        };

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

                if(xml.has("error")) {
                    var error = xml.find("error");
                    if(error.length > 0)
                    {
                        console.log(error.text());
                        Cookies.set('error', error.text());
                    }
                }
            }
        });
    }
</script>