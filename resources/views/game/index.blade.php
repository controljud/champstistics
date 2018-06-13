@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('breadcrumb')
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col col-md-12">
                        <button class="btn btn-light small" data-toggle="collapse" data-target="#new_team">@lang('game.new_game')</button>
                    </div>
                </div>
                <div class="collapse" id="new_team">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::open(['route' => 'game.store', 'id'=>'game-form']) !!}
                            <div class="row">
                                <div class="col col-md-8">
                                    <div class="row">
                                        <div class="col col-md-3">
                                            <label for="team_h">@lang('game.team_h')</label>
                                            <select id="team_h" name="team_h" class="form-control">
                                                <option value="">------</option>
                                                @foreach($teams as $team)
                                                    <option value="{{$team->id}}">{{$team->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col col-md-2">
                                            <label for="goals_h">@lang('game.goals')</label>
                                            <input type="text" id="goals_h" name="goals_h" class="form-control" placeholder="0"/>
                                        </div>
                                        <div class="col col-md-1 center" style="padding-top:8px">
                                            X
                                        </div>
                                        <div class="col col-md-2">
                                            <label for="goals_v">@lang('game.goals')</label>
                                            <input type="text" id="goals_v" name="goals_v" class="form-control" placeholder="0"/>
                                        </div>
                                        <div class="col col-md-3">
                                            <label for="team_h">@lang('game.team_v')</label>
                                            <select id="team_v" name="team_v" class="form-control">
                                                <option value="">------</option>
                                                @foreach($teams as $team)
                                                    <option value="{{$team->id}}">{{$team->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                <div class="col col-md-4">
                                    <label for="date">@lang('game.date')</label>
                                    <input type="datetime-local" id="date" name="date" class="form-control"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-md-3">
                                    <label for="year">@lang('game.year')</label>
                                    <input type="number" class="form-control" id="year" name="year" value="{{$year}}"/>
                                </div>
                                <div class="col col-md-3">
                                    <label for="round">@lang('game.round')</label>
                                    <input type="number" class="form-control" id="round" name="round" value="{{$round}}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-md-4">
                                    <button type="submit" class="btn btn-light" id="team-save">@lang('game.save')</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <table class="table">
                    <thead>
                    <tr>
                        <td>@lang('game.game')</td>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
