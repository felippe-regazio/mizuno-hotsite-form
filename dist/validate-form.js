"use strict";function validateEmail(e){return/^[_a-z0-9-]+(\.[_a-z0-9-]+)*(\+[a-z0-9-]+)?@[a-z0-9-]+(\.[a-z0-9-]+)*$/i.test(e)}function validateCPF(e){if(""==(e=e.replace(/[^\d]+/g,"")))return!1;if(11!=e.length||"00000000000"==e||"11111111111"==e||"22222222222"==e||"33333333333"==e||"44444444444"==e||"55555555555"==e||"66666666666"==e||"77777777777"==e||"88888888888"==e||"99999999999"==e)return!1;for(var r=0,t=0;t<9;t++)r+=parseInt(e.charAt(t))*(10-t);var o=11-r%11;if(10!=o&&11!=o||(o=0),o!=parseInt(e.charAt(9)))return!1;for(var a=r=0;a<10;a++)r+=parseInt(e.charAt(a))*(11-a);return 10!=(o=11-r%11)&&11!=o||(o=0),o==parseInt(e.charAt(10))}function toast(e){var r=1<arguments.length&&void 0!==arguments[1]?arguments[1]:"error",t=50;document.querySelectorAll(".toast").forEach(function(e){t+=e.offsetHeight+6});var o=document.createElement("div");o.style.top="".concat(t,"px"),o.classList.add("toast",r),o.innerHTML="<span>".concat(e,"</span>"),document.body.insertAdjacentElement("beforeend",o),o.addEventListener("click",function(){return o.remove()}),setTimeout(function(){o.remove()},7e3)}function validateForm(r){var t=[];return r.querySelectorAll("[required]:not(label)").forEach(function(e){e.value.trim()||(t.push("Ops, há campos obrigatórios vazios"),e.classList.add("has-error"))}),r.querySelectorAll('[name="cpf"], .is-cpf').forEach(function(e){validateCPF(e.value)||(t.push("CPF Inválido"),e.classList.add("has-error"))}),r.querySelectorAll('[type="email"], .is-email').forEach(function(e){validateEmail(e.value)||(t.push("E-Mail Inválido"),e.classList.add("has-error"))}),r.querySelectorAll("[minlength]").forEach(function(e){var r=+e.getAttribute("minlength");e.value.length<r&&(t.push("Há campos com valores incompletos"),e.classList.add("has-error"))}),r.querySelectorAll('[type="radio"], [type="checkbox"]').forEach(function(e){r.querySelector(":checked")||(t.push("Uma opção deve ser selecionada"),e.classList.add("has-error"))}),!t.length||(new Set(t).forEach(function(e){toast(e)}),!1)}function clearErrors(){document.querySelectorAll(".has-error").forEach(function(e){return e.classList.remove("has-error")})}function generateFormResume(){var e=0<arguments.length&&void 0!==arguments[0]?arguments[0]:"#form-resume",r="",e=document.querySelector(e),t=['.swiper-slide input:not([type="radio"]):not([type="file"])',".swiper-slide select",".swiper-slider textarea",".swiper-slide input:checked"].join(", "),o={name:"Nome",cpf:"CPF",email:"E-Mail",gender:"Gênero",birth:"Data de Nascimento",cep:"CEP",street:"Rua",neighborhood:"Bairro","house-number":"Nº",complement:"Complemento",city:"Cidade",region:"Estado",cellphone:"Celular","extra-contact":"Contato","which-product":"Produto","product-type":"Tipo do Produto","product-line":"Linha do Produto","product-size":"Tamanho","purchase-date":"Data de Compra"};return document.querySelectorAll(t).forEach(function(e){r+="<label>".concat(o[e.name],"</label> <p>").concat(e.value||"N/A","</p>")}),e.innerHTML=r}document.querySelectorAll("input, textarea, select").forEach(function(r){r.addEventListener("focus",function(e){r.classList.remove("has-error")}),r.addEventListener("input",function(e){r.classList.remove("has-error")})}),document.querySelectorAll('[type="radio"].has-error, [type="checkbox"], label').forEach(function(e){e.addEventListener("click",function(e){clearErrors()})});