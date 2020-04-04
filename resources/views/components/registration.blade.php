<div class="d-inline-flex p-2">
<h1> Registration Page</h1>

<form action="{{url('adduser')}}" method="post" enctype="multipart/form-data" files="true">
{{ csrf_field() }}

    <div class="form-group">
        <label for="name:">Name:</label>
        <input placeholder="" name="name" type="text">
    </div>
    <div class="form-group">
        <label for="user name:">User Name:</label>
        <input placeholder="" class="user_name" name="user_name" type="text" value="">
    </div>
    <div class="form-group">
        <label for="email:">Email:</label>
        <input name="email" type="email" value="">
    </div>
    <div class="form-group">
        <label for="password:">Password:</label>
        <input name="password" type="password" value="">
    </div>
    <div class="form-group">
        <label for="retype-password:">Retype-password:</label>
        <input name="retype-password" type="password" value="">
    </div>
    <div class="form-group">
        <label for="Male:">Male:</label>
        <input name="gender" type="radio" value="male">
        <label for="Fe-Male:">Fe-Male:</label>
        <input name="gender" type="radio" value="fe-male">
    </div>
    <div class="form-group">
        <label for="Date of Birth:">Date Of Birth:</label>
        <input name="dob" type="date" value={{date(\Carbon\Carbon::now()) }}>
    </div>
    <div class="form-group">
        <label for="Select Country :">Select Country :</label>
        <select name="country">
            @foreach($countries as $key=> $country)
            <option value="{{$key}}">{{ $country}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="Profile Image:">Profile Image:</label>
        <input name="image" type="file">
    </div>
    <input class="btn btn-success" type="submit" value="Register">

</form>



</div>