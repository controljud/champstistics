@extends('layouts.app')

@section('content')
    <div class="container-fluid">
    @include('breadcrumb')
    <!-- Icon Cards-->
        <div class="row">
            <div class="col col-md-12">
                <table class="table table-active">
                    @foreach($graph as $ranking)
                        @foreach($ranking as $team)
                            <tr>
                                <td>{{var_dump($ranking)}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection