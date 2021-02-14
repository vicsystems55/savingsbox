@extends('layouts.app')

@section('content')

    <div class="layout-px-spacing">

        <div class="mt-3">

            
                <h1>Plan Name: {{$my_schedule[0]->custom_name}}</h1>

                <div class="table-responsive">
                    <div class="card">
                        <div class="card-body">
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

                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$schedule->date}}</td>
                                        <td>{{$schedule->deduction_amount}}</td>
                                        <td>{{$schedule->deducted_amount}}</td>
                                        <td>{{$schedule->left}}</td>
                                        <td>{{$schedule->status}}</td>
                                        <td>
                                            <a href="" class="btn btn-primary shadow btn-sm">
                                                PAY NOW!!
                                            </a>
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