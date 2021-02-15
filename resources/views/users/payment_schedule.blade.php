@extends('layouts.app')

@section('content')

    <div class="layout-px-spacing">

        <div class="mt-5">

                <h6 class="text-dark-light">Package Name:</h6>
                <h1> December Jollification</h1>
                <h6 class="text-dark-light">Plan Name:</h6> 
                <h3>{{$my_schedule[0]->custom_name}}</h3>

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

                                    <tr class="{{$schedule->status=='processed'?'bg-success':''}}">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$schedule->date}}</td>
                                        <td>{{$schedule->deduction_amount}}</td>
                                        <td>{{$schedule->deducted_amount}}</td>
                                        <td>{{$schedule->left}}</td>
                                        <td>{{$schedule->status}}</td>
                                        <td>

                                            @if($schedule->status=='processed')

                                            <a href="" class="btn btn-success shadow btn-sm">
                                                PAID!!
                                            </a>

                                            @else
                                            <a href="" class="btn btn-primary shadow btn-sm">
                                                PAY NOW!!
                                            </a>

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