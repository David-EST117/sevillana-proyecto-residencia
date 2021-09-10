$(document).ready(function () {
    $(".btn-delete").click(function (e) {
        e.preventDefault();
        Swal.fire({
            title: "¿Desea borrar este elemento?",
            text: "¡No podrás revertir esto y se perderan todos los datos!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, Deseo eliminar!",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.value) {
                var row = $(this).parents("tr");
                var form = $(this).parents("form");
                var url = form.attr("action");

                $.post(url, form.serialize(), function (result) {
                    row.fadeOut();
                    Swal.fire("Eliminado Correctamente", result.message, "success");
                }).fail(function () {
                    Swal.fire(
                        "No se pudo eliminar",
                        "error"
                    );
                });
            }
        });
    });
});
