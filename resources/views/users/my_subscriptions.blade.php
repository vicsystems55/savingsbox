@extends('layouts.app')

@section('content')
            <div class="layout-px-spacing">

            <h4 class="mt-3">My Subscriptions</h4>

                <div class="row layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="multi-column-ordering" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Custom Name</th>
                                            <th>Package name</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>More</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @forelse($my_subscriptions as $sub)

                                    <tr>
                                            <td>
                                                <div class="d-flex">                                                        
                                                    <div class="usr-img-frame mr-2 rounded-circle">
                                                        <img alt="avatar" class="img-fluid rounded-circle" src="{{config('app.url')}}avatar/avatar.png">
                                                    </div>
                                                    <p class="align-self-center mb-0 admin-name">  </p>
                                                </div>
                                            </td>
                                            <td>{{$sub->custom_name}}</td>
                                            <td>{{$sub->packages->package_name}}</td>

                                            <?php
                                                $sd = new Carbon\Carbon($sub->start_date);
                                                $sd = $sd->format('d');
                                                $sm = new Carbon\Carbon($sub->start_date);
                                                $sm = $sm->format('M');
                                                $sy = new Carbon\Carbon($sub->start_date);
                                                $sy = $sy->format('Y');

                                                $ed = new Carbon\Carbon($sub->end_date);
                                                $ed = $ed->format('d');
                                                $em = new Carbon\Carbon($sub->end_date);
                                                $em = $em->format('M');
                                                $ey = new Carbon\Carbon($sub->end_date);
                                                $ey = $ey->format('Y');
                                            ?>

                                            <td>{{$sd}} {{$sm}}, {{$sy}}</td>
                                            <td>{{$ed}} {{$em}}, {{$ey}}</td>
                                          
                                            
                                            <td>
                                                <a href="{{route('user.payment_schedule', $sub->custom_name)}}" class="btn btn-primary shadow">view more</a>
                                            </td>
                                        </tr>
                                      

                                    @empty


                                    @endforelse
                                       
                                      
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                            <th>#</th>
                                            <th>Custom Name</th>
                                            <th>Package name</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>More</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
@endsection