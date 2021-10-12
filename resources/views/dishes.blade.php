@extends('layouts.app')
    @section('content')

        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-1">
                    <h1 class="m-0">Dishes</h1>
                </div><!-- /.col -->
                <div class="col-sm-11 mt-2">
                    <a class="btn btn-primary" href="/dishes/add">Add new</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
        <div class="dishes">
            @foreach ($dishes as $dish)
                <div class="item border-top mb-2 dish-{{$dish->id}}">
                    <div class="row mt-2">
                        <div class="col-1">
                            <img class="img-fluid rounded" src="{{asset('storage/'.$dish->image)}}" alt="">
                        </div>
                        <div class="col-5">
                            <h2>{{$dish->name}}</h2>
                        </div>

                        <div class="col-4">
                            <p>{{$dish->description}}</p>
                        </div>
                        <div class="col-2">
                            <a href="/dishes/edit/{{$dish->id}}" class="btn btn-primary"><i class="fas fa-edit"></i>Edit</a>
                            <a href="/dishes/delete/{{$dish->id}}" class="btn btn-danger"><i class="fas fa-trash"></i>Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
@endsection
