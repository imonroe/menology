@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Collection: </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>{{ $collection->title }}</H2>

                    <div class="records">
                        <h4>Records:</h4>
                        <ul>
                        @foreach ($collection->records as $record)
                            @include('record.showRecord', ['record' => $record])
                        @endforeach
                        </ul>
                    </div>

                    @include('record.addRecord')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
