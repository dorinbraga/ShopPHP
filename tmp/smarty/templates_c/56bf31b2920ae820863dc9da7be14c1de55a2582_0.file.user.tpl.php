<?php
/* Smarty version 3.1.36, created on 2021-01-23 11:01:26
  from 'C:\xampp\htdocs\myshop.local\views\default\user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_600bf3f6eb0027_14332682',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '56bf31b2920ae820863dc9da7be14c1de55a2582' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\default\\user.tpl',
      1 => 1611395525,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_600bf3f6eb0027_14332682 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1>Datele dvs</h1>
<table border="0">
        <tr>
            <td>Login (email)</td>
            <td><?php echo $_smarty_tpl->tpl_vars['arUser']->value['email'];?>
</td>
        </tr>
        <tr>
            <td>Nume</td>
            <td><input type="text" id="newName" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['name'];?>
" /></td>
        </tr>
        <tr>
            <td>Tel</td>
            <td><input type="text" id="newPhone" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['phone'];?>
" /></td>
        </tr>
        <tr>
            <td>Adresa</td>
            <td><textarea  id="newAdress"  /><?php echo $_smarty_tpl->tpl_vars['arUser']->value['adress'];?>
</textarea></td>
        </tr>
        <tr>
            <td>Parola noua</td>
            <td><input type="password" id="newPwd1" value="" /></td>
        </tr>
        <tr>
            <td>Repet Parola</td>
            <td><input type="password" id="newPwd2" value="" /></td>
        </tr>
        <tr>
            <td>Pentru a salva datele introduceti parola actuala</td>
            <td><input type="password" id="curPwd" value="" /></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="button" value="Salveaza schimbarile" onClick="updateUserData();"/></td>
        </tr>
</table>
		
<h2>Comenzi:</h2>
<?php if (!$_smarty_tpl->tpl_vars['rsUserOrders']->value) {?>
    Nu-s comenzi
<?php } else { ?>
    <table border="1" cellpadding="1" cellspacing="1">
        <tr>
            <th>№</th>
            <th>Action</th>
            <th>ID comenda</th>
            <th>Status</th>
            <th>Data crearii</th>
            <th>Data platii</th>
            <th>Info</th>
        </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsUserOrders']->value, 'item', false, NULL, 'orders', array (
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']++;
?>
            <tr>
                <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration'] : null);?>
</td>
                <td><a href="#" onclick="showProducts('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
'); return false;" >Arata comanda</a></td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_created'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_payment'];?>
&nbsp;</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['comment'];?>
</td>
            </tr>
			
		<tr class="hideme" id="purchasesForOrderId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" >
                <td colspan="7">
                <?php if ($_smarty_tpl->tpl_vars['item']->value['children']) {?>
                    <table border="1" cellpadding="1" cellspacing="1" width="100%">
                        <tr>
                            <th>№</th>
                            <th>ID</th>
                            <th>Denumire</th>
                            <th>Pret</th>
                            <th>Cantitate</th>
                        </tr>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'itemChild', false, NULL, 'products', array (
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['itemChild']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->value) {
$_smarty_tpl->tpl_vars['itemChild']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
						<tr>
							<td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['product_id'];?>
</td>
							<td><a href="/product/<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['product_id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a></td>
							<td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['price'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['amount'];?>
</td>
						</tr>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </table>
                <?php }?>
                </td>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>
<?php }?>		
<?php }
}
