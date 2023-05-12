$(document).ready(function() {

    $('#body2').hide();
    $('#butao_Esq').hide();

    $('#butao_Dir').click(function() {
        $('#body').hide();
        $('#body2').slideToggle();
        $('#butao_Esq2').show();
        $('#butao_Dir2').hide();
    });

    $('#butao_Esq2').click(function() {
        $('#body2').hide();
        $('#body').slideToggle();
        $('#butao_Esq').hide();
        $('#butao_Dir').show();
    });

});