{include file="templates/header.tpl"}

<div class="container-fluid w-100 d-flex justify-content-center">
    <div>

        <h1> EDITAR Y BORRAR SECCIONES</h1>
        <table class="my-4 table">
            <thead>

                <tr>


                    <th class="col">Tipo</th>
                    <th class="col">Producto</th>

                    {if $isAdmin}
                        <th class="col">Borrar</th>
                        <th class="col">Editar</th>
                    {/if}


                </tr>

            </thead>


            {foreach from=$tablasSecciones item=item}
                <form class="form-alta" action="editarseccion/{$item->id_seccion}" method="POST">
                    <tr style=text-align:center>

                        <td><input class="form-control" type="text" name="tipo" >{$item->tipo}</td>
                        <td><input class="form-control" type="number" name="id_producto">{$item->id_producto}</td>
                        {if $isAdmin}
                            <td><a class="btn btn-primary" href="borrarseccion/{$item->id_seccion}">Borrar</a></td>
                            <td><button type="submit" class="btn btn-primary">Editar</button></td>
                        {/if}
                    </tr>
                </form>

            {/foreach}

        </table>

    </div>
</div>
<a href="index" class="volver">VOLVER</a>
{include file="templates/footer.tpl"}