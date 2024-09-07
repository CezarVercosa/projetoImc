import Inputmask from 'inputmask';


//validacao foco de erro
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.form-control').forEach(function (input) {
        input.addEventListener('focus', function () {
            var errorId = 'error-' + this.name;
            var errorElement = document.getElementById(errorId);
            if (errorElement) {
                errorElement.remove();
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    var pesoInput = document.querySelector('#peso');
    var alturaInput = document.querySelector('#altura');

    function limitToThreeIntegersAndTwoDecimals(event) {
        var inputElement = event.target;
        var value = inputElement.value;

        // Permite apenas valores no formato 999.99 (até 3 dígitos inteiros e 2 decimais) sem negativos
        var regex = /^\d{0,3}(\.\d{0,2})?$/;

        // Se o valor não estiver dentro do formato permitido, remove o último caractere
        if (!regex.test(value)) {
            inputElement.value = value.slice(0, -1);
        }
    }

    if (pesoInput) {
        pesoInput.addEventListener('input', limitToThreeIntegersAndTwoDecimals);
    }

    if (alturaInput) {
        alturaInput.addEventListener('input', limitToThreeIntegersAndTwoDecimals);
    }
});





// mascara telefone.
document.addEventListener('DOMContentLoaded', function () {
    var phoneInput = document.querySelector('#telefone');
    if (phoneInput) {
        var mask = new Inputmask({
            mask: '(99) 99999-9999',
            placeholder: ' ',
            clearMaskOnLostFocus: true
        });
        mask.mask(phoneInput);
    }
    var listagem = document.querySelectorAll('.phone-format');
    if (listagem) {
        var mask = new Inputmask({
            mask: '(99) 99999-9999',
            placeholder: ' ',
            clearMaskOnLostFocus: true
        });
        mask.mask(listagem);
    }
    
});


