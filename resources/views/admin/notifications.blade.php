@extends('layouts.app')

@section('content')

    <div class="layout-px-spacing">

        <div class="">

            
                <h1>All Notifications</h1>

                <!-- Task -->
                <ul class="list-group task-list-group">
                    <li class="list-group-item list-group-item-action">
                        <div class="n-chk">
                            <label class="new-control new-checkbox checkbox-primary w-100 justify-content-between">
                            <input type="checkbox" class="new-control-input">
                            <span class="new-control-indicator"></span>
                                <span class="ml-2">
                                    List groups are a flexible and powerful component for displaying simple.
                                </span>
                                <span class="ml-3 d-block">
                                    <span class="badge badge-secondary">Project</span>
                                </span>
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item list-group-item-action active">
                        <div class="n-chk">
                            <label class="new-control new-checkbox checkbox-primary w-100 justify-content-between">
                            <input type="checkbox" class="new-control-input">
                            <span class="new-control-indicator"></span>
                                <span class="ml-2">
                                    List groups are a flexible and powerful component for displaying simple.
                                </span>
                                <span class="ml-3 d-block">
                                    <span class="badge badge-primary">Urgent</span>
                                </span>
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <div class="n-chk">
                            <label class="new-control new-checkbox checkbox-primary w-100 justify-content-between">
                            <input type="checkbox" class="new-control-input">
                            <span class="new-control-indicator"></span>
                                <span class="ml-2">List groups are a flexible and powerful component for displaying simple.</span>
                                <span class="ml-3 d-block">
                                    <span class="badge badge-success">Success</span>
                                </span>
                            </label>
                        </div>
                    </li>
                </ul>
            

        </div>

    </div>
    
@endsection  