<div id="get-address" class="swiper-slide">
  <div class="card">
    <?php botSay("Agora vou precisar do seu endereço, vou solicitar por etapas 😃 Me envia o seu CEP, por favor?"); ?>
    
    <div class="choices">
      <label for="name" required>Seu CEP</label>
      <input type="text" name="cep" autocomplete="off" data-cep-search required/>

      <label for="name" required>Sua Rua</label>
      <input type="text" autocomplete="off" name="street" required/>

      <label for="name" required>Seu Bairro</label>
      <input type="text" autocomplete="off" name="neighborhood" required/>      

      <label for="name" required>Número da sua residência</label>
      <input type="text" autocomplete="off" name="house-number" required/>

      <label for="name">Complemento</label>
      <input type="text" autocomplete="off" name="complement"/>                  
    </div>

    <div class="controls">
      <button data-prev class="button-clear">Voltar</button>
      <button data-next>Ok</button>
    </div>
  </div>
</div>