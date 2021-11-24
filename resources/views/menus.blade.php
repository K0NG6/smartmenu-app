@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Menus</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Dishes</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                        <div id="accordion" class="dishesDrag">

                            @foreach ($dishes as $dish)
                                <div class="card card-primary" id='draggablee{{$dish->id}}'>
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-11">
                                                <h4 class="card-title w-100">
                                                    {{$dish->name}}
                                                </h4>
                                            </div>
                                            <div class="col-1">
                                                <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapse{{$dish->id}}" aria-expanded="false">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapse{{$dish->id}}" class="collapse" data-parent="#accordion" style="">
                                        <div class="card-body">
                                            <div class="row mt-2">
                                                <div class="col-2">
                                                    <img class="img-fluid rounded" src="{{asset('storage/'.$dish->image)}}" alt="">
                                                </div>
                                                <div class="col-10">
                                                    {{$dish->description}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Menu</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body dishesDrop">
                        <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
