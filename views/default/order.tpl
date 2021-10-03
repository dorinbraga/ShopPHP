
{* страница заказа *}

<h2>Данные заказа</h2>
<form id="frmOrder" action="/cart/saveorder/" method="POST">
<table>
	<tr>
         <td>№</td>
         <td>Denumire</td>
         <td>Cantitate</td>
         <td>Pret per unitate</td>
         <td>Pret total</td>
     </tr>
	 
	{foreach $rsProducts as $item name=products}
		<tr>
			<td>{$smarty.foreach.products.iteration}</td>
			<td><a href="/product/{$item['id']}/">{$item['name']}</a></td>
			<td>  
				<span id="itemCnt_{$item['id']}">
				  <input type="hidden" name="itemCnt_{$item['id']}" value="{$item['cnt']}" /> 
					{$item['cnt']}
				</span>
			</td>
			<td>  
				<span id="itemPrice_{$item['id']}">
				   <input type="hidden" name="itemPrice_{$item['id']}" value="{$item['price']}" /> 
					{$item['price']}
			   </span>
			 </td>
			<td>  
				 <span id="itemRealPrice_{$item['id']}">
					 <input type="hidden" name="itemRealPrice_{$item['id']}" value="{$item['realPrice']}" /> 
					{$item['realPrice']}
				 </span>
			 </td>
		</tr>
	{/foreach}
	 
</table>
	
{if isset($arUser)}
	{$buttonClass = ""}
	<h2>Datele cumparatorului</h2>
	<div id="orderUserInfoBox" {$buttonClass}>
		{$name = $arUser['name']}
		{$phone = $arUser['phone']}
		{$adress = $arUser['adress']}
		<table>
				<tr>
					<td>Nume*</td>
					<td><input type="text" id="name"   name="name"  value="{$name}" /></td>
				</tr>
				<tr>
					<td>Tel*</td>
					<td><input type="text" id="phone"  name="phone" value="{$phone}" /></td>
				</tr>
				<tr>
					<td>Adresa*</td>
					<td><textarea id="adress" name="adress" />{$adress}</textarea></td>
				</tr>
		</table>   
	</div>
{else}
	
	<div id="loginBox">
		<div class="menuCaption">Autorizare</div>
			<table>
			<tr>
				<td>Login</td>
				<td><input type="text" id="loginEmail" name="loginEmail" value=""/></td>
			</tr>
			<tr>
				<td>Parola</td>
				<td><input type="password" id="loginPwd" name="loginPwd" value=""/></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="button" onclick="login();" value="Войти"/></td>
			</tr>
			</table> 
	</div> 
	
	<div id="registerBox">sau <br />
            <div class="menuCaption">Inregistrare unui cont nou:</div>
            email* :<br />
            <input type="text" id="email" name="email" value=""/><br />
            parola* : <br />
            <input type="password" id="pwd1" name="pwd1" value=""/><br />
            repeta parola* :<br />
            <input type="password" id="pwd2" name="pwd2" value=""/><br />

            Nume* :<input type="text" id="name" name="name" value="" /><br />
            Tel* :<input type="text" id="phone" name="phone" value="" /><br />
            Adresa* :<textarea  id="adress" name="adress" /></textarea><br />

            <input type="button" onclick="registerNewUser();" value="Intregistreaza"/>
        </div>
	{$buttonClass = "class='hideme'"}	
{/if}

<input {$buttonClass} id="btnSaveOrder" type="button" value="Comanda!" onclick="saveOrder();"/>
</form>