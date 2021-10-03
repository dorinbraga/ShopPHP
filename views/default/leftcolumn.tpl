	{* левый столбец *}

<div id="leftColumn">


<div id="leftMenu">
	<div class="menuCaption">Meniu:</div>
		{foreach $rsCategories as $item}
			<a href="/category/{$item['id']}/">{$item['name']}</a><br />
			
			{if isset($item['children'])}
				{foreach $item['children'] as $itemChild}
					--<a href="/category/{$itemChild['id']}/">{$itemChild['name']}</a><br />
				{/foreach}
			{/if}
			
		{/foreach}
</div>  

{if isset($arUser)}
	<div id="userBox">
		<a href="/user/" id="userLink">{$arUser['displayName']}</a><br />
		<a href="/user/logout/" onclick="logout();">Iesire</a>
	</div>
		
{else}
	
	<div id="userBox" class="hideme">
		<a href="#" id="userLink"></a><br />
		<a href="/user/logout/" onclick="logout();">Iesire</a>
	</div>

	{if ! isset($hideLoginBox)}
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
	{/if}
{/if}




	<div class="menuCaption">Cos</div>
   <a href="/cart/" title="In cos">In cos</a>
    <span id="cartCntItems">
        {if $cartCntItems > 0}{$cartCntItems}{else}gol{/if}
    </span>
</div>



