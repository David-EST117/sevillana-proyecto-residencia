/*$(document).ready(function () {
    $(".btn-pedido").click(function (e) {
        e.preventDefault();
        Swal.fire({
            title: "¿Desea terminar el pedido?",
            text: "¡No podrás revertir esto!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, Deseo terminar!",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.value) {
                var form = $(this).parents("form");
                var url = form.attr("action");
                $.get(url, function (result) {
                    Swal.fire("Pedido Terminado", result.message, "success");

                }).fail(function () {
                    Swal.fire(
                        "No se pudo terminar",
                        "error"
                    );
                });
            }
        });
    });
});
*/

$("#terminarPedido").click(() => {
    window.history.back();
});
