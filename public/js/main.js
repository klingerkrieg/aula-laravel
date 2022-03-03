$(function(){

    $(".phone").mask("(00)00000-0000");
    $('.cep').mask('00000-000');


    $('.cep').on('keyup',function(a){
        if ($(this).val().length == 9){
            $.ajax("http://viacep.com.br/ws/"+$(this).val().replace("-","")+"/json/",{
                success:function(res){
                    $("[name=logradouro]").val(res.logradouro);
                    $("[name=bairro]").val(res.bairro);
                    $("[name=localidade]").val(res.localidade);
                    $("[name=uf]").val(res.uf);
                }
            });
        }
    });




    //$(".verifyEmail").on('blur',function(a){
        $(".verifyEmail").on('keyup',function(a){
            //if ($(this).val().length >= 3 && $(this).val().indexOf("@") > -1){
            var re = /\S+@\S+\.\S+/;
            if (re.test($(this).val())){
                $.ajax( SITE_URL + "/verificar_email/"+$(this).val(),{
                    element:$(this),
                    success:function(res){
                        if(res.exists){
                            $("#email_exists").show();
                        } else {
                            $("#email_exists").hide();
                        }
    
                        if (res.exists || res.valid == false){
                            this.element.addClass('is-invalid');
                            this.element.removeClass('is-valid');
                        } else {
                            this.element.removeClass('is-invalid');
                            this.element.addClass('is-valid');
                        }
                    }
                });
            } else {
                $(this).removeClass('is-invalid');
                $(this).removeClass('is-valid');
            }
        });
    


});

var pendingFormConfirmation;
function confirmDeleteModal(button){
    var confModal = new bootstrap.Modal(document.getElementById('confirm_modal'))
    confModal.show('fast');
    pendingFormConfirmation = button.parentElement;
    console.log(pendingFormConfirmation);
}

function confirmButton(){
    pendingFormConfirmation.submit();
}
