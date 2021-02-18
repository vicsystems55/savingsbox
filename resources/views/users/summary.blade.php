@extends('layouts.app')

@section('content')
            <div class="layout-px-spacing">

            <h1 class="mt-5">Statement of Account</h1>


            <div class="table-responsive">

                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">

                            <thead>
                                <th>#</th>
                               
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Cr</th>
                                <th>Db</th>
                                
                            </thead>

                            <tbody>

                                @forelse($user_wallet_summary as $trans)

                                <tr>

                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$trans->description}}</td>
                                    <td>NGN {{number_format($trans->amount,2)}}</td>
                                    <td>
                                        @if($trans->type == 'credit')
                                         {{$trans->type}}
                                        @endif

                                    </td>

                                    <td>

                                        @if($trans->type == 'debit')
                                         {{$trans->type}}
                                        @endif

                                    </td>


                                </tr>





                                @empty

                                <h4>Nothing yet ...</h4>



                                @endforelse
                            
                               

                            </tbody>

                        </table>
                    </div>
                    <div class="card-footer">
                        <h4>Total: </h4>
                    </div>
                </div>

            </div>



            </div>
@endsection