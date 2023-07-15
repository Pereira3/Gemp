$(document).ready(function() {

    $('#ButtonDefault').hide();
    $('#AF').hide();
    $('#AP').hide();
    $('#VF').hide();
    $('#VP').hide();
    $('#RF').hide();
    $('#RP').hide();

    $('#ButtonDefault').click(function() {
        $('#ButtonDefault').hide();

        $('#ButtonAF').show();
        $('#ButtonAP').show();
        $('#ButtonVP').show();
        $('#ButtonVF').show();
        $('#ButtonRP').show();
        $('#ButtonRF').show();

        $('#AF').hide();
        $('#AP').hide();
        $('#VF').hide();
        $('#VP').hide();
        $('#RF').hide();
        $('#RP').hide();

        $('#Default').fadeToggle();
    });

    $('#ButtonAF').click(function() {
        $('#ButtonAF').hide();

        $('#ButtonDefault').show();
        $('#ButtonAP').show();
        $('#ButtonVF').show();
        $('#ButtonVP').show();
        $('#ButtonRP').show();
        $('#ButtonRF').show();

        $('#Default').hide();
        $('#AP').hide();
        $('#VF').hide();
        $('#VP').hide();
        $('#RF').hide();
        $('#RP').hide();

        $('#AF').fadeToggle();
    });

    $('#ButtonAP').click(function() {
        $('#ButtonAP').hide();

        $('#ButtonDefault').show();
        $('#ButtonAF').show();
        $('#ButtonVF').show();
        $('#ButtonVP').show();
        $('#ButtonRP').show();
        $('#ButtonRF').show();

        $('#Default').hide();
        $('#AF').hide();
        $('#VF').hide();
        $('#VP').hide();
        $('#RF').hide();
        $('#RP').hide();

        $('#AP').fadeToggle();
    });

    $('#ButtonVF').click(function() {
        $('#ButtonVF').hide();

        $('#ButtonDefault').show();
        $('#ButtonAF').show();
        $('#ButtonAP').show();
        $('#ButtonVP').show();
        $('#ButtonRP').show();
        $('#ButtonRF').show();

        $('#Default').hide();
        $('#AF').hide();
        $('#AP').hide();
        $('#VP').hide();
        $('#RF').hide();
        $('#RP').hide();

        $('#VF').fadeToggle();
    });

    $('#ButtonVP').click(function() {
        $('#ButtonVP').hide();

        $('#ButtonDefault').show();
        $('#ButtonAF').show();
        $('#ButtonAP').show();
        $('#ButtonVF').show();
        $('#ButtonRP').show();
        $('#ButtonRF').show();

        $('#Default').hide();
        $('#AF').hide();
        $('#AP').hide();
        $('#VF').hide();
        $('#RF').hide();
        $('#RP').hide();

        $('#VP').fadeToggle();
    });

    $('#ButtonRF').click(function() {
        $('#ButtonRF').hide();

        $('#ButtonDefault').show();
        $('#ButtonAF').show();
        $('#ButtonAP').show();
        $('#ButtonVP').show();
        $('#ButtonRP').show();
        $('#ButtonVF').show();

        $('#Default').hide();
        $('#AF').hide();
        $('#AP').hide();
        $('#VP').hide();
        $('#VF').hide();
        $('#RP').hide();

        $('#RF').fadeToggle();
    });

    $('#ButtonRP').click(function() {
        $('#ButtonRP').hide();

        $('#ButtonDefault').show();
        $('#ButtonAF').show();
        $('#ButtonAP').show();
        $('#ButtonVF').show();
        $('#ButtonVP').show();
        $('#ButtonRF').show();

        $('#Default').hide();
        $('#AF').hide();
        $('#AP').hide();
        $('#VF').hide();
        $('#RF').hide();
        $('#VP').hide();

        $('#RP').fadeToggle();
    });

});