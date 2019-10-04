@extends('layouts.main')
@section('content')
<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="breadcrumbs">
                <a href="{{url('/')}}">Home</a>
                <span>Models</span>
            </div>

            <form enctype="multipart/form-data" method="POST" action="{{url('/models/add')}}">
                @csrf
                <select class="form-control" name="make">
                    @foreach ($makes as $make)
                        <option value="{{$make->id}}">{{$make->name}}</option>                        
                    @endforeach
                </select>
                <input class="form-control" name="name">
                <button type="submit" class="btn btn-success">Save</button>
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

        </div>
    </div>
</main>
@endsection