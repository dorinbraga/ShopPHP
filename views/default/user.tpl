{* страница пользователя *}

<h1>Datele dvs</h1>
<table border="0">
        <tr>
            <td>Login (email)</td>
            <td>{$arUser['email']}</td>
        </tr>
        <tr>
            <td>Nume</td>
            <td><input type="text" id="newName" value="{$arUser['name']}" /></td>
        </tr>
        <tr>
            <td>Tel</td>
            <td><input type="text" id="newPhone" value="{$arUser['phone']}" /></td>
        </tr>
        <tr>
            <td>Adresa</td>
            <td><textarea  id="newAdress"  />{$arUser['adress']}</textarea></td>
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
{if ! $rsUserOrders}
    Nu-s comenzi
{else}
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
        {foreach $rsUserOrders as $item name=orders}
            <tr>
                <td>{$smarty.foreach.orders.iteration}</td>
                <td><a href="#" onclick="showProducts('{$item['id']}'); return false;" >Arata comanda</a></td>
                <td>{$item['id']}</td>
                <td>{$item['status']}</td>
                <td>{$item['date_created']}</td>
                <td>{$item['date_payment']}&nbsp;</td>
                <td>{$item['comment']}</td>
            </tr>
			
		<tr class="hideme" id="purchasesForOrderId_{$item['id']}" >
                <td colspan="7">
                {if $item['children']}
                    <table border="1" cellpadding="1" cellspacing="1" width="100%">
                        <tr>
                            <th>№</th>
                            <th>ID</th>
                            <th>Denumire</th>
                            <th>Pret</th>
                            <th>Cantitate</th>
                        </tr>
					{foreach $item['children'] as $itemChild name=products}
						<tr>
							<td>{$smarty.foreach.products.iteration}</td>
							<td>{$itemChild['product_id']}</td>
							<td><a href="/product/{$itemChild['product_id']}/">{$itemChild['name']}</a></td>
							<td>{$itemChild['price']}</td>
							<td>{$itemChild['amount']}</td>
						</tr>
					{/foreach}
                </table>
                {/if}
                </td>
            </tr>
        {/foreach}
    </table>
{/if}		
