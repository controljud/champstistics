@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('breadcrumb')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(['route' => 'team.store', 'id'=>'team-form']) !!}
                        <div class="row">
                            <div class="col col-md-4">
                                <label for="team_name">@lang('team.name')</label>
                                <input type="text" class="form-control" placeholder="@lang('team.name')" id="team_name" name="team_name"/>
                            </div>
                            <div class="col col-md-4">
                                <label for="team_image">@lang('team.image')</label>
                                <input type="text" class="form-control" placeholder="@lang('team.image')" id="team_image" name="team_image"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-md-4">
                                <button type="submit" class="btn btn-light" id="team-save">@lang('team.save')</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-4">
                <table class="table">
                    <thead>
                        <tr>
                            <td>@lang('team.team')</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teams as $team)
                        <tr>
                            <td>{{$team->name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
