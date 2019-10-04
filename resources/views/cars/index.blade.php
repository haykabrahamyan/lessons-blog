@extends('layouts.main')
@section('content')
<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="breadcrumbs">
                <a href="{{url('/')}}">Home</a>
                <span>Cars</span>
            </div>
            <a class="btn btn-success" href="{{url('cars/add')}}">Add Car</a>

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
                        <th scope="col">Car</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cars as $car)
                    <tr>
                        <th scope="row">{{$car->id}}</th>
                        <td>{{$car->make->name . ' ' . $car->model->name . ' ' . $car->year. ' tiv'}}</td>
                        <td>
                            @if($car->getImages(true))
                                <img width="50" src="{{asset('/storage/images/' . $car->getImages(true))}}">
                            @endif
                        </td>
                        <td>{{date("d-M-Y H:i:s", strtotime($car->created_at)) }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{url('/cars/edit/' . $car->id)}}">Edit</a>
                            <a class="btn btn-sm btn-danger" href="{{url('/cars/remove/' . $car->id)}}">Remove</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection