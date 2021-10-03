<?php
/* Smarty version 3.1.36, created on 2021-02-03 09:10:10
  from 'C:\xampp\htdocs\myshop.local\views\default\leftcolumn.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_601a5a62a33d16_61178967',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '726de5a813a061ae61eb7f6a7f9d3c2d9f4d4f8c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\default\\leftcolumn.tpl',
      1 => 1612339808,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_601a5a62a33d16_61178967 (Smarty_Internal_Template $_smarty_tpl) {
?>	
<div id="leftColumn">


<div id="leftMenu">
	<div class="menuCaption">Meniu:</div>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
			<a href="/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a><br />
			
			<?php if ((isset($_smarty_tpl->tpl_vars['item']->value['children']))) {?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'itemChild');
$_smarty_tpl->tpl_vars['itemChild']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->value) {
$_smarty_tpl->tpl_vars['itemChild']->do_else = false;
?>
					--<a href="/category/<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a><br />
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			<?php }?>
			
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>  

<?php if ((isset($_smarty_tpl->tpl_vars['arUser']->value))) {?>
	<div id="userBox">
		<a href="/user/" id="userLink"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['displayName'];?>
</a><br />
		<a href="/user/logout/" onclick="logout();">Iesire</a>
	</div>
		
<?php } else { ?>
	
	<div id="userBox" class="hideme">
		<a href="#" id="userLink"></a><br />
		<a href="/user/logout/" onclick="logout();">Iesire</a>
	</div>

	<?php if (!(isset($_smarty_tpl->tpl_vars['hideLoginBox']->value))) {?>
		<div id="loginBox">
			<div class="menuCaption">Autorizare</div>
			<input type="text" id="loginEmail" name="loginEmail" value=""/><br />
			<input type="password" id="loginPwd" name="loginPwd" value=""/><br />
			<input type="button" onclick="login();" value="Intra"/>
		</div>

		<div id="registerBox">
			<div class="menuCaption showHidden" onclick="showRegisterBox();"><a href='#'>Inregistrare</a></div>
			<div id="registerBoxHidden" class="hideme">
				email:<br />
				<input type="text" id="email" name="email" value=""/><br />
				parola: <br />
				<input type="password" id="pwd1" name="pwd1" value=""/><br />
				Repetati parola:<br />
				<input type="password" id="pwd2" name="pwd2" value=""/><br />
				<input type="button" onclick="registerNewUser();" value="Inregistrare"/>
			</div>
		</div>
	<?php }
}?>




	<div class="menuCaption">Cos</div>
   <a href="/cart/" title="In cos">In cos</a>
    <span id="cartCntItems">
        <?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value > 0) {
echo $_smarty_tpl->tpl_vars['cartCntItems']->value;
} else { ?>gol<?php }?>
    </span>
</div>



<?php }
}
