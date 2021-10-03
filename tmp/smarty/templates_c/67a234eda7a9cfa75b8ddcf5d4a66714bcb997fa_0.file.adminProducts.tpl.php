<?php
/* Smarty version 3.1.36, created on 2021-01-25 11:33:58
  from 'C:\xampp\htdocs\myshop.local\views\admin\adminProducts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_600e9e9663bc27_29125314',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '67a234eda7a9cfa75b8ddcf5d4a66714bcb997fa' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\admin\\adminProducts.tpl',
      1 => 1611570835,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_600e9e9663bc27_29125314 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>Produse</h2>

<table border='1' cellpadding='1' cellspacing='1'>
    <caption>Adauga un produs</caption>
    <tr>
        <th>Denumire</th>
        <th>pret</th>
        <th>Categoria</th>
        <th>Descriere</th>
        <th>Salveaza</th>
    </tr>
    <tr>
        <td>
            <input type='edit' id='newItemName' value=''/>
        </td>
         <td>
            <input type='edit' id='newItemPrice' value=''/>
        </td>
        <td>
            <select id='newItemCatId'>
                <option value='0'>Categorie generala
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'itemCat');
$_smarty_tpl->tpl_vars['itemCat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemCat']->value) {
$_smarty_tpl->tpl_vars['itemCat']->do_else = false;
?>
                        <option value='<?php echo $_smarty_tpl->tpl_vars['itemCat']->value['id'];?>
'><?php echo $_smarty_tpl->tpl_vars['itemCat']->value['name'];?>

                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
            
        </td>
        <td>
            <textarea id='newItemDesc'></textarea>
        </td>
        <td>
            <input type='button' value='Salveaza' onclick='addProduct();'/>
        </td>
        
    </tr>
    
    
</table>

            
            <table border='1' cellpadding='1' cellspacing='1'>
                <caption>Redactare</caption>
                <tr>
                    <th>Nr</th>
                    <th>ID</th>
                    <th>Denumire</th>
                    <th>Pret</th>
                    <th>Categoria</th>
                    <th>Descriere</th>
                    <th>Stergere</th>
                    <th>Poza</th>
                    <th>Salvare</th>
                </tr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
                    <tr>
                        <td>
                            <?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>

                        </td>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>

                        </td>
                        <td>
                            <input type="edit" id="itemName_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"/>
                        </td>
                        <td>
                            <input type='edit' id='itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
'value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
"/>
                        </td>
                        <td>
                            <select id='itemCatId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
'>
                                <option value='0'>Categoria generala
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'itemCat');
$_smarty_tpl->tpl_vars['itemCat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemCat']->value) {
$_smarty_tpl->tpl_vars['itemCat']->do_else = false;
?>
                                        <option value='<?php echo $_smarty_tpl->tpl_vars['itemCat']->value['id'];?>
' <?php if ($_smarty_tpl->tpl_vars['item']->value['category_id'] == $_smarty_tpl->tpl_vars['itemCat']->value['id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['itemCat']->value['name'];?>

                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                        </td>
                        <td>
                            <textarea id='itemDesc_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
'>
                            <?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>

                            </textarea>
                        </td>
                        <td>
                            <input type='checkbox' id='itemStatus_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
'<?php if ($_smarty_tpl->tpl_vars['item']->value['status'] == 0) {?>checked='checked'<?php }?>/>
                        </td>
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value['image']) {?>
                                <img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
"width='100'/>
                                <?php }?>
                                <form action='/admin/upload/' method='post' enctype='multipart/form-data'>
                                    <input type='file' name='filename'><br>
                                    <input type='hidden' name='itemId' value='<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
'>
                                    <input type='submit' value='Incarca'><br>
                                </form>
                        </td>
                        <td>
                            <input type='button' value='Salveaza' onclick="updateProduct('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
');"/>
                        </td>    
                        
                      </tr>  
                        
                        
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    
            </table><?php }
}
