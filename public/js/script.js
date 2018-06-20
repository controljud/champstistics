$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#team_image').change(function(){
        
    });
    $('.btn-next-round').click(function(){
        round = $('.round-count').text();
        round++;
        getGames(round);
    });
    $('.btn-prev-round').click(function(){
        round = $('.round-count').text();
        if(round > 1){
            round--;
            getGames(round);
        }
    });
});
function getGames(round){
    $.post('../game/games', {round: round}, function(response){
        if(response.length > 0){
            $('.round-count').text(round);
            $('.table-games tr').remove();
            response.forEach((game) => {
                $('.table-games').append('<tr><td>'+game.team_h+'</td><td>'+game.goals_h+'</td><td>'+game.goals_v+'</td><td class="right">'+game.team_v+'</td></tr>');
            });
        }
    });
}