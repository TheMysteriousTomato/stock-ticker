<h2 class="text-center underline">Buy / Sell Stocks</h2>
<form>
    <div class="form-group">
        <label for="stock">Stocks:</label>
        <select id="stock" name="stock" class="form-control">
            <option>STOCK#1</option>
            <option>STOCK#2</option>
            <option>STOCK#3</option>
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