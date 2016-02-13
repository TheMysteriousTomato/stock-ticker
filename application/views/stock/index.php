<h1 class="text-center">
    {info}
    {Name} ({Code}): &nbsp; {Value}, {Category}
    {/info}
</h1>

{form}
{select}

<div id="stock_code" class="hidden-xs hidden-sm hidden-md hidden-lg">{stock_code}</div>
<div id="stock_code" class="hidden-xs hidden-sm hidden-md hidden-lg">{url}</div>

<!-- Graph Container -->
<div id="temp-stocks"></div>

<!-- Inject Graph -->
<script src="/assets/js/stock-history.js"></script>
