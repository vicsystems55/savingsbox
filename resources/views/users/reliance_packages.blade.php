@extends('layouts.app')

@section('content')

    <div class="layout-px-spacing">

        <div class="v">

            
                <h1>Our Packages</h1>

                <div class="row">
                    <div class="col-md-4">
                        <div class="card bg-warning">
                            <div class="card-body">
                                <h4>December Jollification</h4>

                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci ad sed itaque porro ris aut minima dolor.
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="{{route('user.single_package', 1)}}" class="btn btn-primary shadow">View More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card bg-primary">
                            <div class="card-body">
                                <h4>Steady Savings</h4>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci ad sed itaque porro ris aut minima dolor.
                                </p>
                                
                            </div>
                            <div class="card-footer">
                                <a href="{{route('user.single_package', 1)}}" class="btn btn-primary shadow">View More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card bg-danger">
                            <div class="card-body">
                                <h4>Target Savings</h4>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci ad sed itaque porro ris aut minima dolor.
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="{{route('user.single_package', 1)}}" class="btn btn-primary shadow">View More</a>
                            </div>
                        </div>
                    </div>
                </div>


            

        </div>

    </div>
    
@endsection  