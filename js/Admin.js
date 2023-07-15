$(document).ready(function() {

    $('#ButtonDefault').hide();
    $('#ButtonPDF').hide();
    $('#RE').hide();
    $('#GEMP').hide();

    $('#ButtonDefault').click(function() {
        $('#ButtonDefault').hide();

        $('#ButtonRE').show();
        $('#ButtonGEMP').show();
        $('#ButtonPDF').hide();
        $('#RE').hide();
        $('#GEMP').hide();

        $('#Default').fadeToggle();
    });

    $('#ButtonGEMP').click(function() {
        $('#ButtonGEMP').hide();

        $('#ButtonRE').show();
        $('#ButtonDefault').show();
        $('#RE').hide();
        $('#Default').hide();

        $('#ButtonPDF').fadeToggle();
        $('#GEMP').fadeToggle();
    });

    $('#ButtonRE').click(function() {
        $('#ButtonRE').hide();

        $('#ButtonDefault').show();
        $('#ButtonGEMP').show();
        $('#ButtonPDF').hide();
        $('#Default').hide();
        $('#GEMP').hide();

        $('#RE').fadeToggle();
    });

    $('#ButtonPDF').click(function() {
        gerarPDF();
    });
});

function gerarPDF() {

    const invoice = this.document.getElementById("GEMP");
    var opt = {
        margin: 1,
        filename: 'GempDB.pdf',
        jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait', page_size: 'A0' }
    };
    html2pdf().from(invoice).set(opt).save();
    
}