<div id="get-birth" class="swiper-slide">
  <div class="card">
    <?php botSay("Qual é a sua data de nascimento?"); ?>
    
    <div class="choices">
      <label for="name" required>Data de nascimento</label>
      <input type="text" name="birth" autocomplete="off" minlength="8" required/>
    </div>

    <div class="controls">
      <button data-prev class="button-clear">Voltar</button>
      <button data-next>Ok</button>
    </div>
  </div>
</div>