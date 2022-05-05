<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" class="form-control" value="{{old('name', $users->name)}}" >

    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input type="text" name="email" class="form-control" value="{{old('email', $users->email)}}" >
    </div>
    <div class="form-group">
        <label for="">Image</label>
        <input type="file" name="file_upload" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Address</label>
        <input type="text" name="address" class="form-control" value="{{old('address', $users->address)}}" >
    </div>
    <div class="form-group">
        <label for="">Phone number</label>
        <input type="number" name="phone" class="form-control" value="{{old('phone', $users->phone)}}" >
    </div>
    <div class="form-group">
        <label for="">Password</label>
        <input type="password" name="password" class="form-control" value="{{old('password', $users->password)}}" >
    </div>
    <div class="">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>
