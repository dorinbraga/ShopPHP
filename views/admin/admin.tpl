<div id="blockNewCategory">
    Categorie noua:
    <input name="newCategoryName" id ="newCategoryName" type="text" value=""/>
    <br />
    
    Este subcategorie pentru
    <select name ="generalCatId">
        <option value="0">Categoria Principala
            {foreach $rsCategories as $item}
                <option value="{$item['id']}">{$item['name']}
            {/foreach}
                    
    </select>
            <br/>
            <input type='button' onclick='newCategory();' value='Adauga categorie'/> 
    
</div>
