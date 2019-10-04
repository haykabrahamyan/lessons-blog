@extends('layouts.main')
@section('content')
<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="breadcrumbs">
                <a href="{{url('/')}}">Home</a>
                <span>Makes</span>
            </div>

            <form enctype="multipart/form-data" method="POST" action="{{url('/models/add')}}">
                @csrf
                <input type="hidden" name="id" value="{{$model->id}}">
                <select class="form-control" name="make">
                    @foreach ($makes as $make)
                        <option value="{{$make->id}}" {{($model->make_id == $make->id) ? 'selected' : ''}}>{{$make->name}}</option>                        
                    @endforeach
                </select>
                <input class="form-control" name="name" value="{{$model->name}}">
                
                
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