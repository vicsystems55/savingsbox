@extends('layouts.app')

<link
          rel="stylesheet"
          href="https://unpkg.com/simplebar@latest/dist/simplebar.css"
        />

@section('content')

    <div class="layout-px-spacing">

        <div class="container-fluid ">

            
                <h1>December Jollificate</h1>

                <div class="row overflow-auto flex-row flex-nowrap mt-4 pb-4 pt-2 " >

                    <div style="min-width:330px;" class="col-4 bx-auto" >

                        <div style="min-height: 230px; mainwidth:230px;" class="shadow card bg-warning mx-auto">

                        <div class="card-header">
                            <h6 class="badge badge-primary">NGN 1,550.00/mo</h6>
                        </div>
                            <div class="card-body">
                                    <h4>PLAN A</h4>

                                    <ul>
                                        <li>1/2 Bag of rice</li>
                                        <li>Vegetable Oil (75 cl)</li>
                                        <li>1 pack of Knor chicken</li>
                                    </ul>

                                    
                            </div>
                            <div class="card-footer">
                                <a href="{{route('user.subscription_setup', 2)}}" class="btn btn-success shadow">
                                    Subscribe
                                </a>
                            </div>
                        </div>

                    </div>

                    <div style="min-width:330px;" class="col-4 mx-auto">

                        <div style="min-height: 230px; min-width:300px" class="shadow card bg-warning mx-auto">
                            <div class="card-body">
                                    <h4>PLAN B</h4>

                                    
                            </div>
                            <div class="card-footer">
                                <a href="" class="btn btn-success shadow">
                                    Subscribe
                                </a>
                            </div>
                        </div>

                    </div>

                    <div style="min-width:330px;" class="col-4 mx-auto">

                        <div style="min-height: 230px; min-width:300px" class="shadow card bg-warning mx-auto">
                            <div class="card-body">
                                    <h4>PLAN C</h4>

                                    
                            </div>
                            <div class="card-footer">
                                <a href="" class="btn btn-success shadow">
                                    Subscribe
                                </a>
                            </div>
                        </div>

                    </div>


                    <div style="min-width:330px;" class="col-4 mx-auto">

                        <div style="min-height: 230px; min-width:300px" class="shadow card bg-warning mx-auto">
                            <div class="card-body">
                                    <h4>PLAN D</h4>

                                    
                            </div>
                            <div class="card-footer">
                                <a href="" class="btn btn-success shadow">
                                    Subscribe
                                </a>
                            </div>
                        </div>

                    </div>

                </div>


            

        </div>

    </div>

    <script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>
    
@endsection  