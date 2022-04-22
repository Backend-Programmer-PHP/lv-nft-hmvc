<form method="post">
    @csrf
    <div class="form-group">
        <label>email</label>
        <input type="email" class="form-control" name="email" value="{{$user->email}}">
    </div>

    <div class="form-group">
        <label>full name</label>
        <input type="text" class="form-control" name="full_name" value="{{$user->fullname}}">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>