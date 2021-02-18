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
                            <div class="card-body text-dark">
                                    <h4 class="text-dark">PLAN A</h4>

                                    <ul>
                                        <li>1/2 Bag of rice</li>
                                        <li>Vegetable Oil (75 cl)</li>
                                        <li>1 pack of Knor chicken</li>
                                    </ul>

                                    
                            </div>
                            <div class="card-footer">
                                <a href="{{route('user.subscription_setup', 'plan_a')}}" class="btn btn-dark shadow">
                                    Subscribe
                                </a>
                            </div>
                        </div>

                    </div>

                    <div style="min-width:330px;" class="col-4 mx-auto">

                        <div style="min-height: 230px; min-width:300px" class="shadow card bg-warning mx-auto">
                            <div class="card-header">
                                <h6 class="badge badge-primary">NGN 3,100.00/mo</h6>
                            </div>
                            <div class="card-body text-dark">
                                    <h4 class="text-dark">PLAN B</h4>

                                    <ul>
                                        <li>50kg bag of Rice</li>
                                        <li>Vegetable Oil (2.6ltr)</li>
                                        <li>1 pack of Knor chicken</li>
                                    </ul>

                                    
                            </div>
                            <div class="card-footer">
                                <a href="{{route('user.subscription_setup', 'plan_b')}}" class="btn btn-dark shadow">
                                    Subscribe
                                </a>
                            </div>
                        </div>

                    </div>

                    <div style="min-width:330px;" class="col-4 mx-auto">

                        <div style="min-height: 230px; min-width:300px" class="shadow card bg-warning mx-auto">
                        <div class="card-header">
                                <h6 class="badge badge-primary">NGN 6,200.00/mo</h6>
                            </div>
                            <div class="card-body text-dark">
                                    <h4 class="text-dark">PLAN C</h4>

                                    <ul>
                                        <li>50kg bag of Rice (2bags)</li>
                                        <li>NGN 5000 cash</li>
                                        <li>Vegetable Oil (2.6ltr)</li>
                                        <li>1 pack of Knor chicken</li>
                                    </ul>

                                    
                            </div>
                            <div class="card-footer">
                                <a href="{{route('user.subscription_setup', 'plan_c')}}" class="btn btn-dark shadow">
                                    Subscribe
                                </a>
                            </div>
                        </div>

                    </div>


                    <div style="min-width:330px;" class="col-4 mx-auto">

                        <div style="min-height: 230px; min-width:300px" class="shadow card bg-warning mx-auto">
                        <div class="card-header">
                                <h6 class="badge badge-primary">NGN 15,500.00/mo</h6>
                            </div>
                            <div class="card-body text-dark">
                                    <h4 class="text-dark">PLAN D</h4>

                                    <ul>
                                        <li>50kg bag of Rice (2bags)</li>
                                        <li>NGN 5000 cash</li>
                                        <li>Vegetable Oil (2.6ltr)</li>
                                        <li>1 pack of Knor chicken</li>
                                    </ul>

                                    
                            </div>
                            <div class="card-footer">
                                <a href="{{route('user.subscription_setup', 'plan_d')}}" class="btn btn-dark shadow">
                                    Subscribe
                                </a>
                            </div>
                        </div>

                    </div>

                    <div style="min-width:330px;" class="col-4 mx-auto">

                        <div style="min-height: 230px; min-width:300px" class="shadow card bg-warning mx-auto">
                        <div class="card-header">
                                <h6 class="badge badge-primary">NGN 31,000.00/mo</h6>
                            </div>
                            <div class="card-body text-dark">
                                    <h4 class="text-dark">PLAN E</h4>
                                    
                                    <ul>
                                        <li>50kg bag of Rice (2bags)</li>
                                        <li>NGN 5000 cash</li>
                                        <li>Vegetable Oil (2.6ltr)</li>
                                        <li>1 pack of Knor chicken</li>
                                    </ul>

                                    
                            </div>
                            <div class="card-footer">
                                <a href="{{route('user.subscription_setup', 'plan_e')}}" class="btn btn-dark shadow">
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