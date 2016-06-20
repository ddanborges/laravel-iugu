@section('css')
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
@endsection

<form id="payment-form" target="_blank" action="{{ url('/subscribe') }}" method="POST">
    {{ csrf_field() }}
    <div class="usable-creditcard-form">
        <div class="wrapper">
            <div class="input-group nmb_a">
                <div class="icon ccic-brand"></div>
                <input autocomplete="off" class="credit_card_number" data-iugu="number" placeholder="Número do Cartão" type="text" value="" />
            </div>
            <div class="input-group nmb_b">
                <div class="icon ccic-cvv"></div>
                <input autocomplete="off" class="credit_card_cvv" data-iugu="verification_value" placeholder="CVV" type="text" value="" />
            </div>
            <div class="input-group nmb_c">
                <div class="icon ccic-name"></div>
                <input class="credit_card_name" data-iugu="full_name" placeholder="Titular do Cartão" type="text" value="" />
            </div>
            <div class="input-group nmb_d">
                <div class="icon ccic-exp"></div>
                <input autocomplete="off" class="credit_card_expiration" data-iugu="expiration" placeholder="MM/AA" type="text" value="" />
            </div>
        </div>
        <div class="footer">
            <img src="http://storage.pupui.com.br/9CA0F40E971643D1B7C8DE46BBC18396/assets/cc-icons.e8f4c6b4db3cc0869fa93ad535acbfe7.png" alt="Visa, Master, Diners. Amex" border="0" />
            <a class="iugu-btn" href="http://iugu.com" tabindex="-1"><img src="http://storage.pupui.com.br/9CA0F40E971643D1B7C8DE46BBC18396/assets/payments-by-iugu.1df7caaf6958f1b5774579fa807b5e7f.png" alt="Pagamentos por Iugu" border="0" /></a>
        </div>
    </div>

    <div class="token-area">
        <label for="token">Token do Cartão de Crédito - Enviar para seu Servidor</label>
        <input type="text" name="token" id="token" value="" readonly="true" size="64" style="text-align:center" />
    </div>

    <div>
        <button type="submit">Salvar</button>
    </div>

</form>

@section('javascript')
    <script type="text/javascript" src="https://js.iugu.com/v2"></script>
    <script type="text/javascript">
        Iugu.setAccountID("c0aa2d5d-deff-429d-8c3b-1ef76667b351");
        Iugu.setTestMode(true);

        jQuery(function($) {
            $('#payment-form').submit(function(evt) {
                var form = $(this);
                var tokenResponseHandler = function(data) {

                    if (data.errors) {
                        // console.log(data.errors);
                        alert("Erro salvando cartão: " + JSON.stringify(data.errors));
                    } else {
                        $("#token").val( data.id );
                        form.get(0).submit();
                    }

                    // Seu código para continuar a submissão
                    // Ex: form.submit();
                }

                Iugu.createPaymentToken(this, tokenResponseHandler);
                return false;
            });
        });
    </script>

@endsection