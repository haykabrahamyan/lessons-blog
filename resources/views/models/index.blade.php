@extends('layouts.main')
@section('content')
<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="breadcrumbs">
                <a href="{{url('/')}}">Home</a>
                <span>Models</span>
            </div>
            <a class="btn btn-success" href="{{url('models/add')}}">Add Model</a>

            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Make</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($models as $model)
                    <tr>
                        <th scope="row">{{$model->id}}</th>
                        <td>{{$model->name}}</td>
                        <td>
                            {{$model->make->name}}
                        </td>
                        <td>
                            @if($model->make->logo)
                            <img width="50" src="{{asset('/storage/images/' . $model->make->logo)}}">
                            @endif
                        </td>
                        <td>{{date("d-M-Y H:i:s", strtotime($model->created_at)) }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{url('/models/edit/' . $model->id)}}">Edit</a>
                            <a class="btn btn-sm btn-danger" href="{{url('/models/remove/' . $model->id)}}">Remove</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection