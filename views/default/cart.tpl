{* шаблон корзины *}

<h1>Cos</h1>

{if ! $rsProducts}
Cosul e gol

{else}
<form action="/cart/order/" method="POST">
	<h2>Detalii comanda</h2>
	<table>
		<tr>
			<td>
				№
			</td>
			<td>
				Denumire
			</td>
			<td>  
			   Cantitate
			</td>
			<td>  
			   Pret per unitate
			</td>
			<td>  
			   Pret total
			</td>
			<td>  
			   Action
			</td>
		</tr>
	   {foreach $rsProducts as $item name=products}
	   <tr>
		   <td>
			   {$smarty.foreach.products.iteration}
		   </td>

		   <td>
				<a href="/product/{$item['id']}/">{$item['name']}</a><br />
		   </td>

		   <td>
			   <input name="itemCnt_{$item['id']}" id="itemCnt_{$item['id']}" type="text" value="1" onchange="conversionPrice({$item['id']});"/>
		   </td>

		   <td>
			   <span id="itemPrice_{$item['id']}" value="{$item['price']}">
				   {$item['price']}
			   </span>
		   </td>

		   <td>
				<span id="itemRealPrice_{$item['id']}">
			   {$item['price']}
			   </span>		
		   </td>

		   <td>
			   <a id="removeCart_{$item['id']}" href="#" onClick="removeFromCart({$item['id']}); return false;" title="Sterge din cos">Sterge</a>
			   <a id="addCart_{$item['id']}" class="hideme" href="#" onClick="addToCart({$item['id']}); return false;" title="Adauga">Adauga</a>

		   </td>

		</tr>
	   {/foreach}

	</table>

   <input type="submit" value="Comanda"/>    
</form>	
	
{/if} 