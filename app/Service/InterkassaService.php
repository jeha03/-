<?php
namespace App\Service;

use Interkassa\Helper\Config;
use Interkassa\Interkassa;

class InterkassaService
{
    protected $interkassa;

    public function __construct()
    {
       // \Log::info('Interkassa Secret Key: ' . config('interkassa.secret_key'));

        $config = new Config();
        $config->setCheckoutSecretKey(config('interkassa.secret_key'));
        $config->setAuthorizationKey(config('interkassa.authorization_key'));
        $config->setAccountId(config('interkassa.account_id'));

        $this->interkassa = new Interkassa($config);
    }

    public function createInvoice($paymentNumber, $amount, $currency, $description)
    {
        $checkoutId = config('interkassa.checkout_id');
        $secretKey = config('interkassa.secret_key');

        // Создаем массив с параметрами ik_
        $dataSet = [
            'ik_co_id' => $checkoutId,
            'ik_pm_no' => $paymentNumber,
            'ik_am' => $amount,
            'ik_cur' => $currency,
            'ik_desc' => $description
        ];

        // Сортируем по ключам
        ksort($dataSet, SORT_STRING);

        // Удаляем подпись
        unset($dataSet['ik_sign']);

        // Добавляем секретный ключ
        $dataSet[] = $secretKey;

        // Формируем строку для подписи
        $signString = implode(':', $dataSet);

        // Генерируем подпись
        $ik_sign = base64_encode(hash('sha256', $signString, true));

        // Логируем
       // \Log::info('Sign String: ' . $signString);
       // \Log::info('Generated Sign: ' . $ik_sign);

        // Кодируем описание для URL
        $descriptionEncoded = urlencode($description);

        // Формируем URL
        $paymentLink = "https://sci.interkassa.com/?ik_co_id={$checkoutId}&ik_pm_no={$paymentNumber}&ik_am={$amount}&ik_cur={$currency}&ik_desc={$descriptionEncoded}&ik_sign={$ik_sign}";

        return $paymentLink;
    }

}
