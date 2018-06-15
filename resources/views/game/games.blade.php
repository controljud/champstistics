<h4>@lang('home.ultimos jogos')</h4>
<div class="row">
    <div class="col col-md-3">
        <button type="button" class="btn btn-default" aria-label="Left Align">
            <i class="fa fa-arrow-left fa-fw"></i>
        </button>
    </div>
    <div class="col col-md-6 center">
        {{$round}}º @lang('game.round')
    </div>
    <div class="col col-md-3 right">
        <button type="button" class="btn btn-default" aria-label="Left Align">
            <i class="fa fa-arrow-right fa-fw"></i>
        </button>
    </div>
</div>
<table class="table table-hover">
    <tbody>
    @foreach($games as $game)
        <tr>
            <td>{{$game->team_h}}</td>
            <td>{{$game->goals_h}}</td>
            <td>{{$game->goals_v}}</td>
            <td class="right">{{$game->team_v}}</td>
        </tr>
    @endforeach
    </tbody>
</table>