<?php
/* Smarty version 3.1.36, created on 2021-01-23 12:11:29
  from 'C:\xampp\htdocs\myshop.local\views\admin\admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_600c0461639d55_19663243',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f4964ee9987075da7f8029065593b5727ee8be11' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\admin\\admin.tpl',
      1 => 1611400288,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_600c0461639d55_19663243 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="blockNewCategory">
    Categorie noua:
    <input name="newCategoryName" id ="newCategoryName" type="text" value=""/>
    <br />
    
    Este subcategorie pentru
    <select name ="generalCatId">
        <option value="0">Categoria Principala
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    
    </select>
            <br/>
            <input type='button' onclick='newCategory();' value='Adauga categorie'/> 
    
</div>
<?php }
}
