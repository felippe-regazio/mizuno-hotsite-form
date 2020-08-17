<div id="get-cellphone" class="swiper-slide">
  <div class="card">
    <?php botSay("Você pode me informar o seu telefone celular, com DDD? (Somente números e sem espaço)"); ?>
    
    <div class="choices">
      <label for="name" required>Seu celular</label>
      <input type="text" name="cellphone" autocomplete="off" required minlength="10"/>

      <label for="name">Número de contato secundário</label>
      <input type="text" autocomplete="off" name="extra-contact"/>      
    </div>

    <div class="controls">
      <button data-prev class="button-clear">Voltar</button>
      <button data-next>Ok</button>
    </div>
  </div>
</div>