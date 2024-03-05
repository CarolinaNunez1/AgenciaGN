<?php
/* Smarty version 3.1.39, created on 2024-02-28 01:22:09
  from 'C:\xampp\htdocs\AgenciaGN\templates\productos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65de7cb13930b4_75118464',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5b78ac754f299c9eda689335cce728dd9a165029' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AgenciaGN\\templates\\productos.tpl',
      1 => 1709079725,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/header.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
),false)) {
function content_65de7cb13930b4_75118464 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:templates/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container-fluid container d-flex justify-content-center">
<div class="w-25 mt-4 container-lg">  
    <ul class="list-group">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productos']->value, 'prod');
$_smarty_tpl->tpl_vars['prod']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['prod']->value) {
$_smarty_tpl->tpl_vars['prod']->do_else = false;
?>
            <li class="list-group-item mb-4"><a href="detalle/<?php echo mb_strtolower(str_replace(' ','-',$_smarty_tpl->tpl_vars['prod']->value->nombre), 'UTF-8');?>
/<?php echo $_smarty_tpl->tpl_vars['prod']->value->descripcion;?>
"><?php echo $_smarty_tpl->tpl_vars['prod']->value->precio;?>
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
