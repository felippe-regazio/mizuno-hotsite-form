(function () {
  const form = document.getElementById('main-form');

  const swiper = new Swiper('.swiper-container', {
    allowTouchMove: false,
    preventInteractionOnTransition: true,
    on: {
      slideChangeTransitionEnd: sw => {
        const slide = swiper.slides[swiper.activeIndex];
        const input = slide.querySelector('input');
        
        if (slide.id === 'render-resume') {
          generateFormResume();
        }

        if (input) {
          input.focus();
        }
      }
    } 
  });

  document.querySelectorAll('.swiper-slide').forEach((slide, index) => {
    slide.dataset.index = index;
  });

  document.querySelectorAll('[data-goto]').forEach(el => {
    el.addEventListener('click', e => {
      const destEl = document.querySelector(`#${el.dataset.goto}`);
      const index = +(destEl.dataset.index);
      
      if (index) {
        setTimeout(() => swiper.slideTo(index), 200);
      }
    });
  });

  document.querySelectorAll('[data-next]').forEach(el => {
    el.addEventListener('click', e => {
      e.preventDefault();
      
      const currentSlide = swiper.slides[swiper.activeIndex];
      const stepInputs = currentSlide.querySelectorAll('input, textarea');

      if (!stepInputs.length) {
        return swiper.slideNext();
      } else {
        if (validateForm(currentSlide)) {
          swiper.slideNext();
        }
      }
    });
  });

  document.querySelectorAll('[data-prev]').forEach(el => {
    el.addEventListener('click', e => {
      e.preventDefault();

      swiper.slidePrev();
    });
  });

  // ------------------------------------------------------------

  document.querySelectorAll('input[type="file"]').forEach(inputFile => {
    inputFile.addEventListener('change', e => {
      const fileURL = URL.createObjectURL(e.target.files[0]);
      e.target.parentElement.querySelector('.preview img[src]').src = fileURL;
    });
  });

  document.querySelectorAll('.preview-remove-image').forEach(removeImgPreview => {
    removeImgPreview.addEventListener('click', e => {
      e.preventDefault();
      
      removeImgPreview.parentElement.querySelector('img').src = '';
      removeImgPreview.parentElement.parentElement.querySelector('input[type="file"]').value = '';
    });
  });

  document.querySelectorAll('.preview img').forEach(previewImg => {
    previewImg.addEventListener('click', e => {
      previewImg.parentElement.parentElement.querySelector(`input[type="file"]`).click();
    });
  });

  document.querySelectorAll('[data-cep-search]').forEach(input => {
    input.addEventListener('blur', e => {
      if (!input.value.trim().length || !window.fetch) {
        return false;
      }

      input.parentElement.parentElement.style.opacity = '0.5';
      input.parentElement.parentElement.style.pointerEvents = 'none';

      fetch(`https://viacep.com.br/ws/${input.value}/json/unicode/`)
        .then(val => val.json())
        .then(result => {
          clearErrors();

          document.querySelector('[name="street"]').value = result.logradouro || '';
          document.querySelector('[name="complement"]').value = result.complemento || '';
          document.querySelector('[name="neighborhood"]').value = result.bairro || '';
          document.querySelector('[name="city"]').value = result.localidade || '';
          document.querySelector('[name="region"]').value = result.uf || '';

          if (!result.logradouro && !result.bairro && !result.cidade && !result.uf) {
            toast('Cep não encontrado automaticamente, por favor, preencha manualmente');
          }
        })
        .catch(() => {
          toast('Cep não encontrado automaticamente, por favor, preencha manualmente');
        })
        .finally(() => {
          input.parentElement.parentElement.style.opacity = '1';
          input.parentElement.parentElement.style.pointerEvents = 'initial';
        });
    });
  });

  document.querySelectorAll('input, select, textarea').forEach(el => {
    el.setAttribute('autocomplete', 'off');
  });

  // ------------------------------------------------------------

  Inputmask({ mask: "999.999.999-9[9]", autoUnmask: true }).mask('[name="cpf"]');
  Inputmask({ mask: "99/99/9999", autoUnmask: true }).mask('[name="birth"]');
  Inputmask({ mask: "99/99/9999", autoUnmask: true }).mask('[name="purchase-date"]');
  Inputmask({ mask: "99999-999", autoUnmask: true }).mask('[name="cep"]');
  Inputmask({ mask: "(99) [9]9999-9999", autoUnmask: true, jitMasking: true }).mask('[name="cellphone"]');
  Inputmask({ mask: "(99) [9]9999-9999", autoUnmask: true, jitMasking: true }).mask('[name="extra-contact"]');
})();