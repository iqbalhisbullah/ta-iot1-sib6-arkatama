@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between align-items-center">
            <div class="iq-header-title">
                <h4 class="card-title">Device List</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <div class="table-responsive">
                <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid"
                    aria-describedby="user-list-page-info">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID Device</th>
                            <th>Device Name</th>
                            <th>Device Type</th>
                            <th>Current Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($devices as $device)
                            <tr>
                                <th>{{$device["id"] }}</th>
                                <th>{{ $device->device_name }}</th>
                                <th>{{ $device->device_type }}</th>
                                <th>{{ $device->current_value }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addModal">
                <i class="las la-plus"></i>Add Device
            </button>
        </div>
                    <!-- Modal -->
                    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addModalLabel">Add Device</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="addName">ID Device</label>
                                            <input type="text" class="form-control" id="addName" name='name'>
                                        </div>
                                        <div class="form-group">
                                            <label for="addEmail">Device Name</label>
                                            <input type="email" class="form-control" id="addEmail" name='email'>
                                        </div>
                                        <div class="form-group">
                                            <label for="addPassword">Device Type</label>
                                            <input type="password" class="form-control" id="addPassword" name='password'>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
</div>
@endsection
