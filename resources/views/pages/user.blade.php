@extends('layouts.dashboard')
@section('content')
<div class="container">
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between align-items-center">
            <div class="iq-header-title">
                <h3 class="card-title">Users List</h3>
            </div>
        </div>
        @php
        $i = 1;
        @endphp
        <div class="iq-card-body">
            <div class="table-responsive">
                <table id="user-list-table" class="table mt-4 table-striped table-bordered" role="grid"
                    aria-describedby="user-list-page-info">
                    <thead class="thead-dark">
                        <tr>
                            <th style="font-size: 18px;">No</th>
                            <th style="font-size: 18px;">Name</th>
                            <th style="font-size: 18px;">Email</th>
                            <th style="font-size: 18px;">Join Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td style="font-size: 18px;"> {{ $i++ }} </td>
                            <td style="font-size: 18px;">{{ $user->name }}</td>
                            <td style="font-size: 18px;">{{ $user->email }}</td>
                            <td style="font-size: 18px;">{{ $user->created_at->format('d M Y, H:i:s') }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
