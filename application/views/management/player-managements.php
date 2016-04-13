<h2 class="text-center underline">Player Management</h2>
<br>
<ul class="list-group col-md-12">
        {player}
        <li class="list-group-item col-md-12 container disabled">
            <div class="col-md-4">{Player}</div>
            <div class="col-md-4">
                <input type="checkbox" name="my-checkbox" data-on-text="Admin" data-off-text="Player" checked disabled>
            </div>
        </li>
        <div class="modal fade" id="player-{id}" tabindex="-1" role="dialog" aria-labelledby="deletePlayerModalLabel">
            <div class="modal-dialog" role="document" style="border: solid 1px #000; border-radius: 5px">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: red">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="playerModalLabel" style="color: #ffffff">Delete a Player</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <h3>Are you sure you want to delete {Player}?</h3>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" onclick="alert('player-{id}')">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    {/player}
    {players}
        <li class="list-group-item col-md-12 container">
            <div class="col-md-4">{Player}</div>
            <div class="col-md-4">
                <input type="checkbox" name="my-checkbox" data-on-text="Admin" data-off-text="Player" data-role="{role}" data-id="{id}">
            </div>
            <div class="col-md-4">
                <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#player-{id}">Delete</button>
            </div>
        </li>
        <div class="modal fade" id="player-{id}" tabindex="-1" role="dialog" aria-labelledby="deletePlayerModalLabel">
            <div class="modal-dialog" role="document" style="border: solid 1px #000; border-radius: 5px">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: red">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="playerModalLabel" style="color: #ffffff">Delete a Player</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <h3>Are you sure you want to delete {Player}?</h3>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger"  data-dismiss="modal" onclick="del('{id}')">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    {/players}
</ul>

<script>
    $(document).ready(function(){
        var checkboxes = $("[name='my-checkbox']");
        checkboxes.bootstrapSwitch('state', true);
        $("[data-role='player']").bootstrapSwitch('state', false);

        checkboxes.on('switchChange.bootstrapSwitch', function(event, state) {
            var id = $(this).attr("data-id");

            alert("changing to " + state + " for id:" + id);
        });

    });

    function del(id) {
        alert("delete " + id);
    }
</script>

