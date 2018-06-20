<h4>@lang('home.u_games')</h4>
<div class="row">
    <div class="col col-md-3">
        <button type="button" class="btn btn-default btn-prev-round" aria-label="Left Align">
            <i class="fa fa-arrow-left fa-fw"></i>
        </button>
    </div>
    <div class="col col-md-6 center">
        <span class="round-count">{{$round}}</span>º @lang('game.round')
    </div>
    <div class="col col-md-3 right">
        <button type="button" class="btn btn-default btn-next-round" aria-label="Left Align">
            <i class="fa fa-arrow-right fa-fw"></i>
        </button>
    </div>
</div>
<table class="table table-hover table-games">
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