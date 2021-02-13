@extends('layouts.app')

@section('content')
            <div class="layout-px-spacing">

            <h4 class="mt-3">All Accounts</h4>

                <div class="row layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="multi-column-ordering" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Fullname</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Role</th>
                                            <th>More</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @forelse($members as $member)

                                    <tr>
                                            <td>
                                                <div class="d-flex">                                                        
                                                    <div class="usr-img-frame mr-2 rounded-circle">
                                                        <img alt="avatar" class="img-fluid rounded-circle" src="{{config('app.url')}}avatar/avatar.png">
                                                    </div>
                                                    <p class="align-self-center mb-0 admin-name"> Tiger </p>
                                                </div>
                                            </td>
                                            <td>{{$member->name}}</td>
                                            <td>{{$member->email}}</td>
                                            <td>{{$member->status}}</td>
                                            <td>{{$member->role}}</td>
                                            <td>
                                                <a href="{{route('admin.single_member', $member->id)}}" class="btn btn-primary shadow">view more</a>
                                            </td>
                                        </tr>
                                      

                                    @empty


                                    @endforelse
                                       
                                      
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
@endsection