@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between align-items-center">
            <div class="iq-header-title">
                <h3 class="card-title">User Profile</h3>
            </div>
        </div>
        <div class="iq-card-body">
            <div class="table-responsive">
                <table class="table mt-4 table-striped table-bordered" role="grid">
                    <thead class="thead-dark">
                        <tr>
                            <th style="font-size: 18px;">Attribute</th>
                            <th style="font-size: 18px;">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="font-size: 18px;">Name</td>
                            <td style="font-size: 18px;">{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 18px;">Email</td>
                            <td style="font-size: 18px;">{{ Auth::user()->email }}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 18px;">Join Date</td>
                            <td style="font-size: 18px;">{{ Auth::user()->created_at->format('d M Y, H:i:s') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
