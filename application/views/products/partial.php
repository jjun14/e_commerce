<?php
              foreach($all_products[0] as $product)
              { 
?>
              <div class="product">
                <a href="/products/show/<?= $product['id']; ?>"><img src="<?= $product['url']; ?>" alt="item_image"></a>
                <p><?= $product['name']; ?></p>
                <p><?= $product['price']; ?></p>
              </div>
<?php         }
?>  