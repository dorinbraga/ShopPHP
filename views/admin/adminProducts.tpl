<h2>Produse</h2>

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
                    {foreach $rsCategories as $itemCat}
                        <option value='{$itemCat['id']}'>{$itemCat['name']}
                    {/foreach}
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
                {foreach $rsProducts as $item name=products}
                    <tr>
                        <td>
                            {$smarty.foreach.products.iteration}
                        </td>
                        <td>
                            {$item['id']}
                        </td>
                        <td>
                            <input type="edit" id="itemName_{$item['id']}" value="{$item['name']}"/>
                        </td>
                        <td>
                            <input type='edit' id='itemPrice_{$item['id']}'value="{$item['price']}"/>
                        </td>
                        <td>
                            <select id='itemCatId_{$item['id']}'>
                                <option value='0'>Categoria generala
                                    {foreach $rsCategories as $itemCat}
                                        <option value='{$itemCat['id']}' {if $item['category_id'] == $itemCat['id']}selected{/if}>{$itemCat['name']}
                                            {/foreach}
                            </select>
                        </td>
                        <td>
                            <textarea id='itemDesc_{$item['id']}'>
                            {$item['description']}
                            </textarea>
                        </td>
                        <td>
                            <input type='checkbox' id='itemStatus_{$item['id']}'{if $item['status']==0}checked='checked'{/if}/>
                        </td>
                        <td>
                            {if $item['image']}
                                <img src="/images/products/{$item['image']}"width='100'/>
                                {/if}
                                <form action='/admin/upload/' method='post' enctype='multipart/form-data'>
                                    <input type='file' name='filename'><br>
                                    <input type='hidden' name='itemId' value='{$item['id']}'>
                                    <input type='submit' value='Incarca'><br>
                                </form>
                        </td>
                        <td>
                            <input type='button' value='Salveaza' onclick="updateProduct('{$item['id']}');"/>
                        </td>    
                        
                      </tr>  
                        
                        
                        {/foreach}
                    
            </table>