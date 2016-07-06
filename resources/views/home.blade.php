@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged ixn!
                    @if (Auth::user()->subscribed('main'))
                    <br> Você é assinante
                    @endif
                    @include('subviews.payment-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection