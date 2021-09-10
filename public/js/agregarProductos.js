let btnAgregarListado = document.querySelector("#btnAgregarListado");
let listado = document.querySelector("#listado");
let urlEnviarDatos = "http://localhost:8000/api/cliente/productos";
var csrf_token = $('meta[name="csrf-token"]').attr("content");
btnAgregarListado.addEventListener("click", async () => {
    let urlApiProductos = "http://localhost:8000/api/cliente/productos";
    const response = await fetch(urlApiProductos);
    let data = await response.json();
    let productos = data.productos;
    let almacenes = data.almacenes;
    console.log(productos)
    let idPedido = document.querySelector("#idPedido").value;
    let table = "";
    table = `<table class="table table-hover">
    <thead>
    <th>Producto</th>
    <th>Precio</th>
    <th>Stock</th>
    <th>Cantidad</th>
    <th>Agregar</th>
    </thead>
    <tbody>
    `;
    almacenes.forEach(a => {
        productos.forEach(p => {
            if (a.product.id == p.id) {
                table += `
                <tr>
                <td>${p.nombre}</td>
                <td>${p.price.menudeo}</td>
                <td>${a.stock}</td>
                <td><input type="number" class="form-control"  id="input-${p.id}" min="1" pattern="^[0-9]+" max="${a.stock}" value="0" /></td>
                <td>

                <button class="btn btn-primary " onclick="enviarDatos(${idPedido},${a.product.id},${p.price.menudeo})">+</button></td>
                </tr>
                `;
            }
        });
    });

    table += `</tbody></table>`;
    listado.innerHTML = table;

});

function enviarDatos(idPedido, idProducto, precio) {
    let urlagregarproductopedido = document.querySelector("#urlagregarproductospedido").href;
    let inputCantidad = document.querySelector(`#input-${idProducto}`).value;
    let monto = precio * inputCantidad;

    console.log(idPedido);
    console.log(idProducto);
    console.log(inputCantidad);
    console.log(monto);
    console.log(urlagregarproductopedido)
    if (inputCantidad != 0) {
        const data = new FormData();
        data.append('_token', csrf_token);
        data.append('order_id', idPedido);
        data.append('product_id', idProducto);
        data.append('cantidad', inputCantidad);
        data.append('monto', monto);


        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'post',
            dataType: 'json',
            url: urlagregarproductopedido,
            data: {
                '_token': data.get("_token"),
                'order_id': data.get("order_id"),
                'product_id': data.get("product_id"),
                'cantidad': data.get("cantidad"),
                'monto': data.get("monto"),

            },
            beforeSend: function () {

            },
            complete: function () {
                CierraPopup();
                location.reload();
            },
            success: function (response) {
                console.log(response);
            },
            error: function (jqXHR) {
                console.log(jqXHR);
            }
        });

    } else {
        Swal.fire(
            'Debe agregar cantidad',
            'No debe estar en 0',
            'question'
        )
    }

}

function CierraPopup() {
    $("#productosModal").modal('hide');//ocultamos el modal
    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
}
