$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

$(document).ready(function () {
    $('#generar').on('click', function () {
        $.post("genera_qr.php", {
            campo: $("#campo").val(),
            tamanio: $("#tamanio").val(),
            ecc: $("#ecc").val()
        }, function (data) {
            $("#img-qr").attr("src", data);
        });
    });

    $('#descargar').on('click', function () {
        $.post("genera_qr.php", {
            campo: $("#campo").val(),
            tamanio: $("#tamanio").val(),
            ecc: $("#ecc").val()
        }, function (data) {
            $("#link-img").attr("href", data);
            document.getElementById('link-img').click();
        });
    });
});