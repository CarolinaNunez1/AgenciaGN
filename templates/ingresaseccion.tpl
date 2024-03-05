{include file='templates/header.tpl'}
<div class="container d-flex justify-content-center">
    <div class="m-3 w-25">
           <h2>AGREGAR SECCION</h2>
            <form class="form-alta" action="agregar-seccion" method="POST"> 
                <div class="col-auto mb-2">
                    <input placeholder="tipo" type="text" name="tipo" id="tipo" required>
                </div>
                </div>
                <select class="custom-select mb-2 col-7" name="id_producto">
                    {foreach $productos as $producto}
                       <option value="{$producto->id_producto}">{$producto->nombre}</option>
                    {/foreach}
                </select>
                <br>
              {if $isAdmin} 
             <input type="submit" class="btn btn-primary">
             {/if} 
            </form>
    </div>

</div>
<a href="index" class="volver">VOLVER</a>
{include file="templates/footer.tpl"}