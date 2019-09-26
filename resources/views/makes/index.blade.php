@extends('layouts.main')
@section('content')
<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="breadcrumbs">
                <a href="{{url('/')}}">Home</a>
                <span>Makes</span>
            </div>
            @if(\Auth::user()->isStaff())
                <a class="btn btn-success" href="{{url('makes/add')}}">Add Make</a>
            @endif

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
                        <th scope="col">Logo</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($makes as $make)
                    <tr>
                        <th scope="row">{{$make->id}}</th>
                        <td>{{$make->name}}</td>
                        <td>
                            @if($make->logo)
                            <img width="50" src="{{asset('/storage/images/' . $make->logo)}}">
                            @endif
                        </td>
                        <td>{{date("d-M-Y H:i:s", strtotime($make->created_at)) }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{url('/makes/edit/' . $make->id)}}">Edit</a>
                            <a class="btn btn-sm btn-danger" href="{{url('/makes/remove/' . $make->id)}}">Remove</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection