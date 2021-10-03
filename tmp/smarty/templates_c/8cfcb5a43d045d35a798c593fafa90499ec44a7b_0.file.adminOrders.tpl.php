<?php
/* Smarty version 3.1.36, created on 2021-01-24 13:29:53
  from 'C:\xampp\htdocs\myshop.local\views\admin\adminOrders.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_600d6841742f93_81633984',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8cfcb5a43d045d35a798c593fafa90499ec44a7b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\admin\\adminOrders.tpl',
      1 => 1611491392,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_600d6841742f93_81633984 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>Comenzi</h2>
<?php if (!$_smarty_tpl->tpl_vars['rsOrders']->value) {?>
    Nu sunt comenzi
    <?php } else { ?>
        <table border="1" cellpadding="1" cellspacing="1">
            <tr>
                <th>Nr</th>
                <th>Actions</th>
                <th>Id comenzii</th>
                <th width="110">Status</th>
                <th>Data crearii</th>
                <th>Data platii</th>
                <th>Comentarii</th>
                <th>Data schimbarii comenzii</th>
            </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsOrders']->value, 'item', false, NULL, 'orders', array (
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']++;
?>
                <tr >
                    <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration'] : null);?>
</td>
                    <td><a href="#" onclick="showProducts('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
');return false;">Arata comanda</a>
                    </td>
                    <td>
                        <?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>

                    </td>
                    <td>
                        <input type="checkbox" id="itemStatus_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['item']->value['status']) {?>checked='checked'<?php }?> onclick="updateOrderStatus('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
');"/>Inchis
                        
                    </td>
                    <td>
                        <?php echo $_smarty_tpl->tpl_vars['item']->value['date_created'];?>

                    </td>
                    <td>
                        <input id="datePayment_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type='text' value="<?php echo $_smarty_tpl->tpl_vars['item']->value['date_payment'];?>
"/>
                        <input type='button' value='Save' onclick="updateDatePayment('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
');"/>
                    </td>
                    <td>
                        <?php echo $_smarty_tpl->tpl_vars['item']->value['comment'];?>

                    </td>
                    <td>
                        <?php echo $_smarty_tpl->tpl_vars['item']->value['date_modification'];?>

                    </td>
    
                </tr>
                
                
                <tr class='hideme' id='purchaseForOrderId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
'>
                    <td colspan="8">
                        <?php if ($_smarty_tpl->tpl_vars['item']->value['children']) {?>
                            <table border='1' cellspacing='1' cellpadding='1' width='100%'>
                                <tr>
                                    <th>Nr</th>
                                    <th>Id</th>
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
                                       <td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
</td>
                                       <td><a href='/product/<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
/'><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
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
