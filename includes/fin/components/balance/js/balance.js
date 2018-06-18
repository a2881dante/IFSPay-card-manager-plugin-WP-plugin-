var Balance = (function ($) {

    var form_balance = $('#balance-login');

    function init(){
        initValidation();
        form_balance.on('submit', function(e) {
            submitAccount(e);
        });
    }

    function initValidation() {

        form_balance.validate({
            errorClass: "warning",
            rules: {
                card_no: {
                    required: true,
                    number: true,
                    minlength: 16,
                },
                pin_code: {
                    required: true,
                    number: true,
                    minlength: 6,
                }
            },
            messages: {
                card_no: {
                    required: "This field required.",
                    number: "only numbers",
                    minlength: "length must be 16 characters"
                },
                pin_code: {
                    required: "This field required.",
                    number: "only numbers",
                    email: "minimum 6 characters."
                }
            }
        });
    }

    function submitAccount(e) {
        // e.preventDefault();
        if (!form_balance.valid()) {
            return false;
        }
    }

    return {
        init: init
    }

}(jQuery));


Balance.init();