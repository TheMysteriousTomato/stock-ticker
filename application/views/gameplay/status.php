<h2 class="text-center underline">Status</h2>

<h3>{PlayerName}'s Portfolio</h3>
<dl class="dl-horizontal">
    <dt>Cash</dt>
    <dd>{Cash}</dd>

    <dt>Equity</dt>
    <dd>{Equity}</dd>

    <dt>Status</dt>
    <dd></dd>
</dl>

<script>
    $(document).ready(function() {
        var refreshGameState = function() {
            $.ajax({
                method: 'get',
                url: 'two',
                success: function(data) {
                    console.log(data);
                }
            });
        };
        setInterval(refreshGameState, 2000);
    });
</script>
