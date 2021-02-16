@extends('layouts.app')

@section('content')

    <div class="layout-px-spacing">

        <div class="v">

            
                <h1>Our Packages</h1>

                <div class="row">
                    <div class="col-md-4">
                        <div style="min-width: 230px;" class="card bg-warning mb-3 shadow">
                            <div class="card-body">
                                <h4>December Jollification</h4>

                                <p>
                                   Choose from a variety of packages. <br> PLAN A, PLAN B, PLAN C, PLAN D, PLAN E.
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="{{route('user.single_package', 1)}}" class="btn btn-primary shadow">View More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div style="min-width: 230px;" class="card bg-primary mb-3 shadow">
                            <div class="card-body">
                                <h4>Steady Savings</h4>
                                <p>
                                    Save concurrently for your personal projects, over any desired time.
                                </p>
                                
                            </div>
                            <div class="card-footer">
                                <a href="{{route('user.single_package', 1)}}" class="btn btn-primary shadow">View More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div style="min-width: 230px;" class="card bg-danger" mb-2 shadow>
                            <div class="card-body">
                                <h4>Target Savings</h4>
                                <p>
                                    Save towards a target amount.
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