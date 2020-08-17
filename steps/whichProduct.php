<div id="which-product" class="swiper-slide">
  <div class="card">
    <?php botSay("O produto que você gostaria de fazer a reclamação é um:"); ?>
    
    <div class="choices">
      <label for="name" required>Qual o produto?</label>
      
      <label>
        <input type="radio" name="which-product" value="Chinelo/Sandália" required>
        Chinelo/Sandália
      </label>

      <label>
        <input type="radio" name="which-product" value="Calçado Fechado" required>
        Calçado Fechado
      </label>

      <label>
        <input type="radio" name="which-product" value="Vestuário" required>
        Vestuário
      </label>     

      <label>
        <input type="radio" name="which-product" value="Acessórios" required>
        Acessórios
      </label>

    </div>

    <div class="controls">
      <button data-prev class="button-clear">Voltar</button>
      <button data-next>Ok</button>
    </div>
  </div>
</div>