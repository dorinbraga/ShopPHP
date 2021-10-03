<?php
/* Smarty version 3.1.36, created on 2021-01-25 12:07:41
  from 'C:\xampp\htdocs\myshop.local\views\admin\adminHeader.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_600ea67d0607b9_45903167',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '781245165c5fba7731678318a661c54b39485ffc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\admin\\adminHeader.tpl',
      1 => 1611572859,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:adminLeftcolumn.tpl' => 1,
  ),
),false)) {
function content_600ea67d0607b9_45903167 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
        <link rel="stylesheet" href ="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/main.css" type="text/css"/>
        <?php echo '<script'; ?>
 type="text/javascript" src="/js/jquery-1.7.1.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
js/admin.js"><?php echo '</script'; ?>
>
    </head>
    <body>
        <div id="header">
            <h1>Administration</h1>

        </div>
        <?php $_smarty_tpl->_subTemplateRender('file:adminLeftcolumn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        
        <div id="centerColumn">
<?php }
}
