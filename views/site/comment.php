        <section class="comment">
                <h1 class="comment__title">Відгуки</h1>
                <p class="comment__description">Думка наших незалежних експертів дуже важлива для нас. 
                Маєте, що сказати про нас, будь-ласка, залиште нам Ваш відгук.</p>
            <div class="comment__content carousel">
                <span class="comment__arrow prev"></span>
                <div class="comment__cards-wrapper">
                    <div class="comment__cards">
                        
                        <?php foreach ($comments as $comment): ?>
                        <div class="comment__card">
                           <h3 class="comment__card-name"><?php echo $comment->user_name; ?></h3>
                           <div class="comment__card-stars">
                               <span class="comment-card-star"></span>
                               <span class="comment-card-star"></span>
                               <span class="comment-card-star"></span>
                               <span class="comment-card-star"></span>
                               <span class="comment-card-star"></span>
                           </div>
                           <div class="comment__card-line"></div>
                           <p class="comment__card-text">
                               <?php echo $comment->content; ?>
                           </p>
                        </div>
                        <?php endforeach; ?>
                        
                    </div>
                </div>    
                <span class="comment__arrow next"></span>
            </div>
            
<!--                    comment form, modal window        -->
            <a href="#openModal" class="comment__create-link"><div class="comment__add-button"></div></a>
            
            <div id="openModal" class="modalDialog">
                <div>
                    <a href="#close" title="Закрити" class="close">X</a>
                    
                    <form action="/site/addcomment" class="contact_form" name="contact_form" method="post"> 
                        <ul>
                            <li>
                                <h2>Написати відгук</h2>
                            </li>
                            <li>
                                <label for="name">Ім'я:</label>
                                <input type="text" name="name" required minlength="3">
                            </li>
                            <li>
                                <label for="message">Текст:</label>
                                <textarea name="message" cols="30" rows="6" required maxlength="140"></textarea>
                                <span class="form_hint">до 140 символів</span>
                            </li>
                            <li>
                                <button class="submit" type="submit">Відправити</button>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
<!--                    comment form, modal window        -->
        </section>