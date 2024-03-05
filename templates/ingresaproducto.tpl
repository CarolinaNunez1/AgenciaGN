{include file='templates/header.tpl'}
  {* AGREGAR PRODUCTO *}
<div class="container d-flex justify-content-center">
    <div class="m-3 w-25">
        <h2>AGREGAR PRODUCTO</h2>
        <form class="form-alta" action="agregar-producto" method="post"> 
            <div class="col-auto mb-2">
                <input class="form-control" placeholder="Nombre.." type="text" name="nombre" id="nombre" >
            </div>
            <div class="col-auto mb-2">
                <input class="form-control" placeholder="descripcion.." type="text" name="descripcion" id="descripcion" >
            </div>
            <div class="col-auto mb-2">
                <input class="form-control" placeholder="precio.." type="text" name="precio" id="precio" >
            </div>
        {if $isAdmin} 
        <input type="submit" class="btn btn-primary">
    {/if}
        </form>
        {* <p>{$aviso}</p> *}
    </div>
</div>
<p>{$aviso}</p>
<a href="index" class="volver">VOLVER</a>
{include file='templates/footer.tpl'}