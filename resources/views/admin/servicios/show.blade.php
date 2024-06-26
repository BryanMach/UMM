@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">servicio {{ $servicio->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/servicios') }}" title="VOLVER"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> ATRAS</button></a>
                        <a href="{{ url('/admin/servicios/' . $servicio->id . '/edit') }}" title="Edit servicio"><button
                                class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Edit</button></a>

                        <form method="POST" action="{{ url('admin/servicios' . '/' . $servicio->id) }}"
                            accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete servicio"
                                onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                    aria-hidden="true"></i> Delete</button>
                        </form>
                        <br />
                        <br />

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $servicio->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Servicio </th>
                                        <td> {{ $servicio->servicio }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
