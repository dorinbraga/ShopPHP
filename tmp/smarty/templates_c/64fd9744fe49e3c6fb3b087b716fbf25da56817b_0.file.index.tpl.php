<?php
/* Smarty version 3.1.36, created on 2021-01-25 12:27:54
  from 'C:\xampp\htdocs\myshop.local\views\default\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_600eab3a4129f1_45078738',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '64fd9744fe49e3c6fb3b087b716fbf25da56817b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\default\\index.tpl',
      1 => 1611574072,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_600eab3a4129f1_45078738 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
    <div style="float:left;padding:0px 30px 40px 0px;">
        <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">
        <img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" width="100"/>
  
        </a><br/>
        <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
    </div>
    <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null) % 4 == 0) {?>
        <div style="clear:both;"></div>
    <?php }?>
    
    
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
