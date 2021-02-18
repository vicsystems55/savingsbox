@extends('layouts.app')

@section('content')

    <div class="layout-px-spacing">

        <div class="mt-5">

            <div class="row">
                <div class="col-md-6">

                <h6 class="text-dark-light">Package Name:</h6>
                <h1> December Jollification</h1>
                <h6 class="text-dark-light">Plan Name:</h6> 
                <h3>{{$my_schedule[0]->custom_name}}</h3>
                
                </div>

                <div class="col-md-6 p-2">

                @if(Session::has('backlog_msg'))

                    <p class="alert alert-success">
                        {{Session::get('backlog_msg')}}
                    </p>


                @endif

                        @if($backlog_data)

                        <div style="width: 320px;" class="card bg-success">
                            <div class="card-body">

                            <?php

                                        $start_date = new Carbon\Carbon($my_schedule[0]->date);

                                        $end_date = new Carbon\Carbon( Carbon\Carbon::now()->format('Y') .':11:01 11:53:20');

                                        $diff_in_months = $end_date->diffInMonths($start_date);

                                        $months_left = 12 - $diff_in_months;

                                        $back_log = 1550 * $months_left;

                                    ?>
                                
                                  
                                    <h6 class="text-center">Backlog Amount</h6>

                                     <h3 class="text-center">NGN {{number_format($my_schedule[0]->backlog_amount,2)}}</h3>

                                    <div class="c text-center">
                                    <button class="btn btn-dark text-center">CLEARED!!</button>
                                    </div>

                                    
                            </div>
                        </div>
                


                        @else

                        <div style="width: 320px;" class="card">
                            <div class="card-body">
                                
                                    <?php

                                        $start_date = new Carbon\Carbon($my_schedule[0]->date);

                                        $end_date = new Carbon\Carbon( Carbon\Carbon::now()->format('Y') .':11:01 11:53:20');

                                        $diff_in_months = $end_date->diffInMonths($start_date);

                                        $months_left = 12 - $diff_in_months;

                                        $back_log = 1550 * $months_left;

                                    ?>
                                    <h6 class="text-center">Backlog Amount</h6>

                                     <h3 class="text-center">NGN {{number_format($my_schedule[0]->backlog_amount,2)}}</h3>

                                    <form method="POST" action="{{ route('pay_backlog') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                                    <div class="" style="">
                                    <div class="col-md-8 mx-auto mt-3">
                                        
                                        <input type="hidden" name="email" value="{{Auth::user()->email}}"> {{-- required --}}
                                        <input type="hidden" name="orderID" value="345">
                                        <input id="backlog_pay_amount" type="hidden" name="amount" value="{{$my_schedule[0]->backlog_amount * 100}}" > {{-- required in kobo --}}
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="currency" value="NGN">
                                        <input type="hidden" name="callback_url" value="{{config('app.url')}}callback_pay_backlog">
                                        <input type="hidden" name="metadata" value="{{ json_encode($array = [

                                        'user_id' => Auth::user()->id,
                                        'package_name' => $my_schedule[0]->packages->package_name,
                                        'custom_name' => $my_schedule[0]->custom_name,
                                        'backlog_amount' => $my_schedule[0]->backlog_amount
                                        
                                        ]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                                        <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                        {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

                                        <p>
                                            <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Backlog!">
                                                <i class="fa fa-plus-circle fa-lg"></i> Pay Backlog
                                            </button>
                                        </p>
                                    </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                


                        @endif

                       
                
                </div>
            </div>

               

                <div class="">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <table class="table">
                            
                                <thead>
                                    <th>#</th>
                                    <th>Payment Date</th>
                                    <th>Deduction Amount</th>
                                    <th>Amount Paid</th>
                                    <th>Amount Left</th>
                                    <th>Status</th>
                                    <th>resolve</th>
                                </thead>

                                <tbody>

                                @foreach($my_schedule as $schedule)

                                            <?php
                                                $sd = new Carbon\Carbon($schedule->date);
                                                $sd = $sd->format('d');
                                                $sm = new Carbon\Carbon($schedule->date);
                                                $sm = $sm->format('M');
                                                $sy = new Carbon\Carbon($schedule->date);
                                                $sy = $sy->format('Y');

                                               
                                            ?>

                                           

                                    <tr class="{{$schedule->status=='processed'?'bg-success':''}}">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$sd}} {{$sm}}, {{$sy}}</td>
                                        <td>NGN {{number_format($schedule->deduction_amount, 2)}}</td>
                                        <td>NGN {{number_format($schedule->deducted_amount, 2)}}</td>
                                        <td>NGN {{number_format($schedule->left, 2)}}</td>
                                        <td>{{$schedule->status}}</td>
                                        <td>

                                            @if($schedule->status=='processed')

                                            <a href="" class="btn btn-success shadow btn-sm">
                                                PAID!!
                                            </a>

                                            @else

                                            <!-- @if(Carbon\Carbon::parse($schedule->date)->format('d:M') == Carbon\Carbon::today()->format('d:M') )

                                                @include('users.manual_pay_form')

                                            @else

                                            @endif -->

                                            @include('users.manual_pay_form')


                                                

                                            <!-- <a href="" class="btn btn-primary shadow btn-sm">
                                                PAY NOW!!
                                            </a> -->

                                            @endif
                                            
                                        </td>
                                    </tr>

                                @endforeach

                                   

                                </tbody>

                            
                            </table>
                        </div>
                    </div>
                </div>
            

        </div>

    </div>
    
@endsection  