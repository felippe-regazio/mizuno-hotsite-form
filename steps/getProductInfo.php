<div id="get-product-info" class="swiper-slide">
  <div class="card">
    <?php botSay("Você pode me Informar a data da compra? Se você não lembrar do dia exato, pode colocar uma data aproximada 🙂 Vou precisar também do tamanho do produto"); ?>
    
    <div class="choices">
      <label for="name" required>Data da compra</label>
      <input type="text" autocomplete="off" name="purchase-date" minlength="8" required/>

      <label for="email" required>Tamanho</label>
      <input type="text" autocomplete="off" name="product-size" required/>
    </div>

    <div class="controls">
      <button data-prev class="button-clear">Voltar</button>
      <button data-next>Ok</button>
    </div>
  </div>
</div>