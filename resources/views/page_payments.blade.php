@extends('layouts.paymentstemplate.paytemplate')

@section('content')

    <style>
        /* Оформление радиокнопок и селектов */
        .form-radio {
            -webkit-appearance: none;
            appearance: none;
            display: inline-block;
            vertical-align: middle;
            background-origin: border-box;
            flex-shrink: 0;
            border-radius: 100%;
            border-width: 2px;
        }

        .form-radio:checked {
            background-color: currentColor;
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat;
        }

        .form-select {
            -webkit-appearance: none;
            appearance: none;
            background-repeat: no-repeat;
            padding: 0.5rem 2.5rem 0.5rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            background-position: right 0.5rem center;
            background-size: 1.5em 1.5em;
        }

        .form-select::-ms-expand {
            display: none;
        }

        .form-input {
            padding: 0.5rem;
            width: 100%;
            border-radius: 0.375rem;
            border: 1px solid #d1d5db;
            background-color: #f9fafb;
            font-size: 1rem;
            color: #1f2937;
        }

        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
        }

        .button {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            background-color: #6366f1;
            color: white;
            font-size: 1rem;
            text-align: center;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #4f46e5;
        }

        .payment-container {
            background-color: #fff;
            padding: 2rem;
            max-width: 500px;
            margin: 2rem auto;
            border-radius: 0.375rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .payment-logos {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px; /* Adjust the space between the logos */
            margin-top: 1rem;
        }

        .payment-logos img {
            width: 60px; /* Adjust the size of the logos */
        }

        .payment-policies {
            text-align: center;
            margin-top: 1rem;
            font-size: 0.8rem;
            color: #6b7280; /* Gray text */
        }

        .payment-policies a {
            color: #6b7280; /* Gray link color */
            text-decoration: none;
        }

        .payment-policies a:hover {
            text-decoration: underline;
        }
    </style>

    <div class="payment-container">
        <h2 class="text-center text-lg font-semibold mb-4">{{ __('Оплата через Interkassa') }}</h2>
        <form id="paymentForm">
            @csrf

            <!-- Поле выбора сервера -->
            <div class="mb-4">
                <label for="select_server" class="block text-sm font-medium text-gray-700">{{ __('Выберите сервер') }}</label>
                <select id="select_server" class="form-select">
                    <option selected>{{ __('messages.payments_select_server') }}</option>
                    @if(isset($arrayServersOnlyNameAndId))
                        @foreach($arrayServersOnlyNameAndId as $arr)
                            <option value={{$arr[0]}}>{{$arr[1]}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <!-- Поле ввода ника персонажа -->
            <div class="mb-4">
                <label for="char_name" class="block mb-2 text-sm font-medium text-gray-900">{{ __('Введите ник персонажа') }}</label>
                <input type="text" id="char_name" class="form-input" placeholder="Введите ник" required>
            </div>

            <!-- Поле суммы -->
            <div class="mb-4">
                <label for="amount" class="block text-sm font-medium text-gray-700">{{ __('Сумма') }}</label>
                <input type="number" name="amount" id="amount" class="form-input" placeholder="Введите сумму" required>
            </div>

            <!-- Поле выбора валюты -->
            <div class="mb-4">
                <label for="currency" class="block text-sm font-medium text-gray-700">{{ __('Валюта') }}</label>
                <select name="currency" id="currency" class="form-select">
                    <option value="UAH">UAH</option>
                    <option value="USD">USD</option>
                </select>
            </div>

            <!-- Описание платежа -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">{{ __('Описание платежа') }}</label>
                <input type="text" name="description" id="description" class="form-input" placeholder="Оплата за услуги" value="Оплата за услуги" required>
            </div>

            <button type="button" class="button w-full" id="submitPayment">{{ __('Оплатить') }}</button>
        </form>

        <div class="payment-logos">
            <img src="{{ asset('images/interkassa-logo.png') }}" alt="Interkassa">
            <img src="{{ asset('images/mastercard-logo.png') }}" alt="Mastercard">
            <img src="{{ asset('images/visa-logo.png') }}" alt="Visa">
        </div>

        <div class="payment-policies">
            <p><a href="{{ route('privacypolicy') }}">{{ __('messages.privacy_policy_title') }}</a></p>
            <p><a href="{{ route('useragreement') }}">{{ __('messages.useragreement_title') }}</a></p>
        </div>
    </div>

    <script src="{{ asset('/js/jquery-2.1.4.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#submitPayment').click(function() {
                var char_name = $('#char_name').val();
                var select_server_id = $('#select_server').val();
                var amount = $('#amount').val();
                var currency = $('#currency').val();
                var description = $('#description').val();

                // Добавить проверку на пустые поля, если требуется

                if(select_server_id && char_name && amount && currency) {
                    // Отправка данных на сервер для обработки
                    $.ajax({
                        url: '{{ route("payment.create") }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            server_id: select_server_id,
                            char_name: char_name,
                            amount: amount,
                            currency: currency,
                            description: description
                        },
                        success: function(response) {
                            // Обработка успешного ответа
                            window.location.href = response.redirect_url;
                        },
                        error: function(error) {
                            // Обработка ошибки
                            alert('Произошла ошибка. Попробуйте еще раз.');
                        }
                    });
                } else {
                    alert('Пожалуйста, заполните все поля');
                }
            });
        });
    </script>

@endsection
