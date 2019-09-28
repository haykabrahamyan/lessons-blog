@extends('layouts.main')
@section('content')
<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="breadcrumbs">
                <a href="{{url('/')}}">Home</a>
                <span>Cars</span>
            </div>
            <div class="overlay" style="display: none;" id="overlayBlock">
                <div class="overlay__inner">
                    <div class="overlay__content"><span class="spinner"></span></div>
                </div>
            </div>
            <form enctype="multipart/form-data" method="POST" action="{{url('/Cars/add')}}">
                @csrf
                <select class="form-control" name="make" id="makes">
                    <option>Select Makes</option>
                    @foreach ($makes as $make)
                    <option value="{{$make->id}}">{{$make->name}}</option>
                    @endforeach
                </select>
                <select class="form-control" name="models" id="models">
                    <option>Select Model</option>
                </select>
                <input type="number" class="form-control" name="year">
                <textarea class="form-control" name="description"></textarea>
                <input type="file" name="image">
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
@section('js')
<script>
    var token = $("[name='_token']").val();

    $('#makes').on('change', function () {
        $('#overlayBlock').toggle();
        var make = this.value;
        $.ajax({
            type: "POST",
            url: "/cars/getModels",
            data: {make_id: make, _token: token}, 
            success: function (result) {
                $('#models').html('<option>Select Model</option>');
                result.forEach(element => {
                    $('#models').append("<option value='"+element.id+"'>"+element.name+"</option>")
                });
                $('#overlayBlock').toggle();
            },
            error: function(err){
                alert(err.responseJSON.message);
                $('#overlayBlock').toggle();
                // console.log("************************************",err);
            }
        })
        console.log(this, this.value);
    });

   
</script>
@endsection