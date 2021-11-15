$(document).on("click", ".annuler", function (){

    //get data-id attribute of the clicked element
    var idCommandeClient = $(this).data('id');
    $(".modal-footer #idCommandeClient").val(idCommandeClient);
});

