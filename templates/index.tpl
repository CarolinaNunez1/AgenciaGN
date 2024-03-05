{include file='templates/header.tpl'}



<a href="secciones" class="m-3"><button type="button" class="btn btn-primary">Ver secciones</button></a>

 {* {if $isAdmin } *} 
    <a href="tablaproductos" class="m-3"><button type="button" class="btn btn-primary">Editar productos</button></a>
    <a href="tablasecciones" class="m-3"><button type="button" class="btn btn-primary">Editar secciones</button></a>
 {* {/if} *}  

{* {if $rol == "true"} *}
    <a href="agregarproducto" class="m-3"><button type="button" class="btn btn-primary">Agregar producto</button></a>
    <a href="agregarseccion" class="m-3"><button type="button" class="btn btn-primary">Agregar seccion</button></a>
{* {/if} *}

{* {if $logged == "false"} *}
    <a href="registro" class="m-3"><button type="button" class="btn btn-primary">Registrarse</button></a>
    <a href="login" class="m-3"><button type="button" class="btn btn-primary">Log In</button></a>
{* {/if} *}
<a href="logout" class="m-3"><button type="button" class="btn btn-primary">Log Out</button></a>
{* {if $rol == "true"} *}
    <a href="panel" class="m-3"><button type="button" class="btn btn-primary">Administrador</button></a>
{* {/if} *}

{foreach from=$productos item=$producto}
<div class="container w-75 d-flex flex-wrap my-2 mb-3">
    
        <div class="producto mx-auto">
            <a href="producto/{str_replace(' ', '-', $producto->nombre)}/{$producto->id_producto}">
                <p>{$producto->nombre}</p>
                <p> {$producto->descripcion}</p>
                <p> {$producto->precio}</p>

            </a>
        </div>

    
</div>
{/foreach}
{include file='templates/footer.tpl'}