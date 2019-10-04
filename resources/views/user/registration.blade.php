<h1>User Registartion</h1>
<a href="{{url('/show_users')}}">Show Users</a>
<br>
<form action="{{url('/users/registration')}}" method="post">
    {{--  @csrf  --}}
    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
    <br>
    <label>Please type your age</label>
    <input type="text" name="age" value="{{(!$errors->registration->first('age')) ? old('age') : ''}}">

    <br>
    <label>Please type your proffestion</label>
    <input type="text" name="proffestion" value="{{(!$errors->registration->first('proffestion')) ? old('proffestion') : ''}}">
    <br>
    <label>Please type your xxx</label>
    <input type="text" name="xxx" value="{{(!$errors->registration->first('xxx')) ? old('xxx') : ''}}">
    <br>
    <label>Please type your name</label>
    <input type="text" name="name" value="{{(!$errors->registration->first('name')) ? old('name') : ''}}">
    <br>
    <label>Please type your email</label>
    <input type="email" name="email" value="{{(!$errors->registration->first('email')) ? old('email') : ''}}">
    <br>

    <label>Please type your password</label>
    <input type="password" name="password">
    <br>

    <label>Please confirm your password</label>
    <input type="password" name="password_confirmation">
    <br>

    <input type="submit" value="Register">
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif