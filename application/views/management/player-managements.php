<h2 class="text-center underline">Player Management</h2>
<br>
<ul class="list-group col-md-12">
    <li class="list-group-item col-md-12 container">
        <div class="col-md-4">Player Name Here</div>
        <div class="col-md-4">
            <input type="checkbox" name="my-checkbox" data-on-text="Admin" data-off-text="Player" checked>
        </div>
        <div class="col-md-4">
            <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#playerid">Delete</button>
        </div>
    </li>
    <li class="list-group-item col-md-12 container">
        <div class="col-md-4">Player Name Here</div>
        <div class="col-md-4">
            <input type="checkbox" name="my-checkbox" data-on-text="Admin" data-off-text="Player" checked>
        </div>
        <div class="col-md-4">
            <button class="btn btn-danger pull-right">Delete</button>
        </div>
    </li>
    <li class="list-group-item col-md-12 container">
        <div class="col-md-4">Player Name Here</div>
        <div class="col-md-4">
            <input type="checkbox" name="my-checkbox" data-on-text="Admin" data-off-text="Player" checked>
        </div>
        <div class="col-md-4">
            <button class="btn btn-danger pull-right">Delete</button>
        </div>
    </li>
</ul>

<script>
    $("[name='my-checkbox']").bootstrapSwitch('state', true);
</script>

<div class="modal fade" id="playerid" tabindex="-1" role="dialog" aria-labelledby="deletePlayerModalLabel">
    <div class="modal-dialog" role="document" style="border: solid 1px #000; border-radius: 5px">
        <div class="modal-content">
            <div class="modal-header" style="background-color: red">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="playerModalLabel" style="color: #ffffff">Delete a Player</h4>
            </div>
            <div class="modal-body">
                <form>
                    Player id: something
                    <h3>Are you sure you want to delete this player?</h3>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger" onclick="alert('playerid')">Delete</button>
            </div>
        </div>
    </div>
</div>