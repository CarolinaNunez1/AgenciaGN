<?php
/* Smarty version 3.1.39, created on 2024-02-28 01:17:41
  from 'C:\xampp\htdocs\AgenciaGN\templates\secciones.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65de7ba571a3d5_85514341',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c59c4c8b72e92c19491409f22a60f4225efb84fd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AgenciaGN\\templates\\secciones.tpl',
      1 => 1709079457,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/header.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
),false)) {
function content_65de7ba571a3d5_85514341 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:templates/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container-fluid container d-flex justify-content-center">
<div class="w-25 mt-4 container-lg">
<?php if ($_smarty_tpl->tpl_vars['mostrarTodo']->value) {?>
   
    <h1 class="display-5"><?php echo $_smarty_tpl->tpl_vars['nombre_producto']->value;?>
</h1>
    
<?php } else { ?>
    <h1 class="display-5">Secciones</h1>
<?php }?>    
    <ul class="list-group">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['secciones']->value, 'seccion');
$_smarty_tpl->tpl_vars['seccion']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['seccion']->value) {
$_smarty_tpl->tpl_vars['seccion']->do_else = false;
?>
            <li class="list-group-item mb-4"><a href="detalle/<?php echo mb_strtolower(str_replace(' ','-',$_smarty_tpl->tpl_vars['seccion']->value->tipo), 'UTF-8');?>
/<?php echo $_smarty_tpl->tpl_vars['seccion']->value->id_seccion;?>
"><?php echo $_smarty_tpl->tpl_vars['seccion']->value->tipo;?>
</a></li>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
    </div>
</div>
<a href="index" class="volver">VOLVER</a>
<?php $_smarty_tpl->_subTemplateRender('file:templates/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
