<div id="get-product-line" class="swiper-slide">
  <div class="card">
    <?php botSay("O produto é da linha:"); ?>
    
    <div class="choices">
      <label for="name" required>Linha do produto</label>
      
      <label>
        <input type="radio" name="product-line" value="Masculino" required>
        Masculino
      </label>

      <label>
        <input type="radio" name="product-line" value="Feminino" required>
        Feminino
      </label>

    </div>

    <div class="controls">
      <button data-prev class="button-clear">Voltar</button>
      <button data-next>Ok</button>
    </div>
  </div>
</div>