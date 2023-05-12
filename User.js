$(document).ready(function() {

    $('#ButtonDefault').hide();
    $('#AF').hide();
    $('#AP').hide();
    $('#AlF').hide();
    $('#AlP').hide();

    $('#ButtonDefault').click(function() {
        $('#ButtonDefault').hide();

        $('#ButtonAF').show();
        $('#ButtonAP').show();
        $('#ButtonAlF').show();
        $('#ButtonAlP').show();

        $('#AF').hide();
        $('#AP').hide();
        $('#AlF').hide();
        $('#AlP').hide();

        $('#Default').fadeToggle();
    });

    $('#ButtonAF').click(function() {
        $('#ButtonAF').hide();

        $('#ButtonDefault').show();
        $('#ButtonAP').show();
        $('#ButtonAlF').show();
        $('#ButtonAlP').show();

        $('#Default').hide();
        $('#AP').hide();
        $('#AlF').hide();
        $('#AlP').hide();

        $('#AF').fadeToggle();
    });

    $('#ButtonAP').click(function() {
        $('#ButtonAP').hide();

        $('#ButtonDefault').show();
        $('#ButtonAF').show();
        $('#ButtonAlF').show();
        $('#ButtonAlP').show();

        $('#Default').hide();
        $('#AF').hide();
        $('#AlF').hide();
        $('#AlP').hide();

        $('#AP').fadeToggle();
    });

    $('#ButtonAlF').click(function() {
        $('#ButtonAlF').hide();

        $('#ButtonDefault').show();
        $('#ButtonAF').show();
        $('#ButtonAP').show();
        $('#ButtonAlP').show();

        $('#Default').hide();
        $('#AF').hide();
        $('#AP').hide();
        $('#AlP').hide();

        $('#AlF').fadeToggle();
    });

    $('#ButtonAlP').click(function() {
        $('#ButtonAfP').hide();

        $('#ButtonDefault').show();
        $('#ButtonAF').show();
        $('#ButtonAP').show();
        $('#ButtonAlF').show();

        $('#Default').hide();
        $('#AF').hide();
        $('#AP').hide();
        $('#AlF').hide();

        $('#AlP').fadeToggle();
    });

});