@extends('layouts.app')

@section('app')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h1>{{ $fields->name }}</h1>
                <p>{{ $fields->content }}</p>
                @if($fields->emails)
                    <p>{!! nl2br($fields->emails) !!}</p>
                @endif
            </div>
            <div class="col-md-6">
                Contact form here
            </div>
        </div>
    </div>
@endsection