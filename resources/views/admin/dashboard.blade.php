@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">UMM</div>

                    <div class="card-body">
                        Unidad de Marina Mercante.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
