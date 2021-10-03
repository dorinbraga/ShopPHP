
<h3>{$rsProduct['name']}</h3>
    
<img width="575" src="/images/products/{$rsProduct['image']}">  
<b>Pret:</b> {$rsProduct['price']}

<a id="addCart_{$rsProduct['id']}" {if $itemInCart}class="hideme"{/if} href="#" onClick="addToCart({$rsProduct['id']}); return false;" alt="Adauga in cos">Adauga in cos</a>     
<a id="removeCart_{$rsProduct['id']}" {if ! $itemInCart}class="hideme"{/if} href="#" onClick="removeFromCart({$rsProduct['id']}); return false;" alt="Stergere din cos">Stergere din cos</a><br/>

<p> <b>Descriere</b> <br />{$rsProduct['description']}</p>