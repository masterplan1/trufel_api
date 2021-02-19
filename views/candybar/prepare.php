<label for="filling-category" class="modal__label">Начинка</label>
<select name="" id="filling-category" class="modal__select">
    <?php foreach ($fillings as $filling): ?>
        <option class="modal__option" value="<?php echo $filling->id; ?>"><?php echo $filling->name; ?></option>
    <?php endforeach; ?>
</select>
<div class="candybar__modal-quantity">
    <span class="candybar__modal-quantity-desc">
        Кількість
    </span>
    <div class="candybar__modal-quantity-value">
        <span class="quantity-value-minus">-</span>
        <span class="quantity-value"><?php echo $item['min_quantity']; ?></span>
        <span class="quantity-value-plus">+</span>
    </div>
    <span class="candybar__modal-quantity-desc">
        Шт.
    </span>
</div>

<span class="products__card-price candybar-order__price"><?php echo $item['price']; ?> грн/шт</span>

<div class="candybar__modal-buttons">
    <span class="candybar__modal-button1">Продовжити покупки</span>

    <span class="candybar__modal-button2 <?php // if(!empty($_SESSION['category'][$filling->category_id])){echo 'candybar__modal-button2-active';} ?>"><?php // if(!empty($_SESSION['category'][$filling->category_id])){echo 'Перейти до кошика';}else{ echo 'Додати до кошика';} ?>Додати до кошика</span>
</div>




