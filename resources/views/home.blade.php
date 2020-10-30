@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!--{{ __('You are logged in!') }}-->
                    <p style="text-align: center">Hello Mr : {!! Auth::user()->name !!}</p>
                    <p style="text-align: center">The Email You Use : {!! Auth::user()->email !!}</p>

                    <td><a href = "{{route ('allProducts')}}" class="btn btn-outline-primary">Main Website</a></td>
                    @if ($userData->isAdmin())
                        <td><a href = "{{route ('adminDisplayProducts')}}" class="btn btn-outline-success ">Admin Dashboard</a></td>
                    @else
                        <div class="btn btn-outline-danger">You Are Not Admin To Access Admin Panel</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
