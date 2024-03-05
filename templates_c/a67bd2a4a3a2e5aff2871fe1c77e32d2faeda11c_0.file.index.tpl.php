<?php
/* Smarty version 3.1.39, created on 2024-02-28 01:31:37
  from 'C:\xampp\htdocs\AgenciaGN\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65de7ee9191e98_31914035',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a67bd2a4a3a2e5aff2871fe1c77e32d2faeda11c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AgenciaGN\\templates\\index.tpl',
      1 => 1709080295,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/header.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
),false)) {
function content_65de7ee9191e98_31914035 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:templates/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<a href="secciones" class="m-3"><button type="button" class="btn btn-primary">Ver secciones</button></a>

  
    <a href="tablaproductos" class="m-3"><button type="button" class="btn btn-primary">Editar productos</button></a>
    <a href="tablasecciones" class="m-3"><button type="button" class="btn btn-primary">Editar secciones</button></a>
   

    <a href="agregarproducto" class="m-3"><button type="button" class="btn btn-primary">Agregar producto</button></a>
    <a href="agregarseccion" class="m-3"><button type="button" class="btn btn-primary">Agregar seccion</button></a>

    <a href="registro" class="m-3"><button type="button" class="btn btn-primary">Registrarse</button></a>
    <a href="login" class="m-3"><button type="button" class="btn btn-primary">Log In</button></a>
<a href="logout" class="m-3"><button type="button" class="btn btn-primary">Log Out</button></a>
    <a href="panel" class="m-3"><button type="button" class="btn btn-primary">Administrador</button></a>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productos']->value, 'producto');
$_smarty_tpl->tpl_vars['producto']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['producto']->value) {
$_smarty_tpl->tpl_vars['producto']->do_else = false;
?>
<div class="container w-75 d-flex flex-wrap my-2 mb-3">
    
        <div class="producto mx-auto">
            <a href="producto/<?php echo str_replace(' ','-',$_smarty_tpl->tpl_vars['producto']->value->nombre);?>
/<?php echo $_smarty_tpl->tpl_vars['producto']->value->id_producto;?>
">
                <p><?php echo $_smarty_tpl->tpl_vars['producto']->value->nombre;?>
</p>
                <p> <?php echo $_smarty_tpl->tpl_vars['producto']->value->descripcion;?>
</p>
                <p> <?php echo $_smarty_tpl->tpl_vars['producto']->value->precio;?>
</p>

            </a>
        </div>

    
</div>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_smarty_tpl->_subTemplateRender('file:templates/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
