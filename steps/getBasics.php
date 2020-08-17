<div id="get-basics" class="swiper-slide">
  <div class="card">
    <?php botSay("Vamos lá . Antes de começar, vou precisar que você me passe alguns dados pessoais para identificação, ok?
Me informe o seu CPF, por favor?"); ?>
    
    <div class="choices">
      <label for="name" required>Nome completo</label>
      <input type="text" autocomplete="off" name="name" required/>
      
      <label for="cpf" required>Seu CPF</label>
      <input type="text" autocomplete="off" name="cpf" required/>
    </div>

    <div class="controls">
      <button data-next>Ok</button>
    </div>
  </div>
</div>