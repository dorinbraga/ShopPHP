<h2>Comenzi</h2>
{if ! $rsOrders}
    Nu sunt comenzi
    {else}
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
            {foreach $rsOrders as $item name=orders}
                <tr >
                    <td>{$smarty.foreach.orders.iteration}</td>
                    <td><a href="#" onclick="showProducts('{$item['id']}');return false;">Arata comanda</a>
                    </td>
                    <td>
                        {$item['id']}
                    </td>
                    <td>
                        <input type="checkbox" id="itemStatus_{$item['id']}"{if $item['status']}checked='checked'{/if} onclick="updateOrderStatus('{$item['id']}');"/>Inchis
                        
                    </td>
                    <td>
                        {$item['date_created']}
                    </td>
                    <td>
                        <input id="datePayment_{$item['id']}" type='text' value="{$item['date_payment']}"/>
                        <input type='button' value='Save' onclick="updateDatePayment('{$item['id']}');"/>
                    </td>
                    <td>
                        {$item['comment']}
                    </td>
                    <td>
                        {$item['date_modification']}
                    </td>
    
                </tr>
                
                
                <tr class='hideme' id='purchaseForOrderId_{$item['id']}'>
                    <td colspan="8">
                        {if $item['children']}
                            <table border='1' cellspacing='1' cellpadding='1' width='100%'>
                                <tr>
                                    <th>Nr</th>
                                    <th>Id</th>
                                    <th>Denumire</th>
                                    <th>Pret</th>
                                    <th>Cantitate</th>
                                </tr>
                               {foreach $item['children'] as $itemChild name=products}
                                   <tr>
                                       <td>{$smarty.foreach.products.iteration}</td>
                                       <td>{$itemChild['id']}</td>
                                       <td><a href='/product/{$itemChild['id']}/'>{$itemChild['name']}</a></td>
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

