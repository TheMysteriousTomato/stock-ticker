<section id="stocks-actions" class="well well-lg">
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
                    <option value="{Code}">{Name}</option>
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
