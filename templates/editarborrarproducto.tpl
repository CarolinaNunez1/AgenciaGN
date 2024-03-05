{include file="templates/header.tpl"}

<div class="container-fluid w-100 d-flex justify-content-center">
    <div>
        <h1> EDITAR Y BORRAR PRODUCTOS</h1>
        <table class="my-4 table">
            <thead>

                <tr>
                    <th class="col">Producto</th>
                    <th class="col">Descripcion</th>
                    <th class="col">Precio</th>
                    {if $isAdmin}
                        <th class="col"> Borrar</th>
                        <th class="col">Editar</th>
                    {/if}


                </tr>

            </thead>

            <p class="lead">{$aviso}</p>
            {foreach from=$tablaProductos item=item}
                <form class="form-alta" action="editarproducto/{$item->id_producto}" method="POST">

                    <tr>
                        <td><input class="form-control" type="text" name="nombre" value="{$item->nombre}"></td>
                        <td><input class="form-control" type="text" name="descripcion" value="{$item->descripcion}"></td>
                        <td><input class="form-control" type="text" name="precio" value="{$item->precio}"></td>
                        {if $isAdmin}
                            <td><a class="btn btn-primary" id="borrar" href="borrarproducto/{$item->id_producto}">Borrar</a></td>
                            <td><button type="submit" class="btn btn-primary">Editar</button></td>
                        {/if}
                </form>
                </tr>
            {/foreach}
        </table>
    </div>

</div>

<a href="index" class="volver">VOLVER</a>

{include file="templates/footer.tpl"}