<div class="container-fluid">
<form method="POST" action="functions/users/addHandle.php">
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
        <input type="password" class="form-control" id="inputPassword3" name="password">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
        <input type="email" class="form-control" id="inputEmail3" name="email">
        </div>
    </div>
    <div class="form-group row">
        <label for="address" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="address" name = "address">
        </div>
    </div>
    <div class="form-group row">
        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="phone" name = "phone">
        </div>
    </div>
    <div class="form-group row">
        <div class="input-group-prepend col-sm-2">
            <span class="col-form-label" id="inputGroupFileAddon01">Upload</span>
        </div>
        <div class="col-sm-10">
            <div class="custom-file">
                <input type="file" class="form-control" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Upload Image</label>
            </div>
        </div>
    </div>
    <fieldset class="form-group row">
        <legend class="col-form-label col-sm-2 float-sm-left pt-0">Gender</legend>
        <div class="col-sm-10">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="male" value="0">
                <label class="form-check-label" for="male">
                Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="female" value="1">
                <label class="form-check-label" for="female">
                Female
                </label>
            </div>
        </div>
    </fieldset>
    <div class="form-group row">
        <label for="address" class="col-sm-2 col-form-label">Privilege</label>
        <div class="col-sm-10">
            <select class="custom-select" name="priv">
                <option value="1">Owner</option>
                <option value="2">Admin</option>
                <option value="3" selected>Super Visor</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10 offset-sm-2">
            <button type="submit" class="btn btn-primary btn-icon-split btn-block d-flex justify-content-between">
                <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">Add user</span>
                <div></div>
            </button>
        </div>
    </div>
</form>
</div>
