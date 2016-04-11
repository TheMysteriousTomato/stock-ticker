<form class='navbar-form navbar-right' action='/user/login' method='post'>
    <div class='form-group'>
        <input name='username' type='text'     class='form-control' placeholder='Username'>
        <input name='password' type='password' class='form-control' placeholder='Password'>
        <span class="btn btn-default btn-file">
            Upload <input type="file" name="avatar">
        </span>
    </div>
    <button type='submit' class='btn btn-success'>Login</button>
</form>