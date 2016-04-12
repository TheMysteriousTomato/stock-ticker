<h2 class="text-center underline">Player Management</h2>
<br>
<ul class="list-group col-md-12">
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