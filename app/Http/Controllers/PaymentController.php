<?php
namespace App\Http\Controllers;

use App\Service\InterkassaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    protected $interkassaService;

    public function __construct(InterkassaService $interkassaService)
    {
        $this->interkassaService = $interkassaService;
    }

    public function createPayment(Request $request)
    {
        // Валидация входных данных
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:0.01',
            'currency' => 'required|in:UAH,USD', // Убедитесь, что валюта допустима 'currency' => 'required|in:UAH,USD,RUB,EUR',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $paymentNumber = 'ID_' . uniqid(); // Генерация уникального ID для платежа
        $amount = $request->input('amount');
        $currency = $request->input('currency', 'UAH');
        $description = 'Payment for services'; // Временно используем латиницу

        // \Log::info("Creating payment with: paymentNumber={$paymentNumber}, amount={$amount}, currency={$currency}, description={$description}");

        try {
            // Генерация ссылки на оплату
            $paymentLink = $this->interkassaService->createInvoice($paymentNumber, $amount, $currency, $description);
            // \Log::info('Payment link generated: ' . $paymentLink);

            // Проверка корректности URL
            if (!filter_var($paymentLink, FILTER_VALIDATE_URL)) {
                throw new \Exception('Invalid payment link.');
            }

            return redirect($paymentLink);
        } catch (\Exception $e) {
            // Логирование ошибки
            // \Log::error('Error creating payment: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function processPayment(Request $request)
    {
        $data = [
            'ik_co_id' => 'YOUR_CO_ID',
            'ik_pm_no' => uniqid(),
            'ik_am' => $request->input('amount'),
            'ik_cur' => $request->input('currency'),
            'ik_desc' => $request->input('description'),
        ];

        $data['ik_sign'] = $this->generateSignature($data);

        return redirect()->away('https://sci.interkassa.com?' . http_build_query($data));
    }

    private function generateSignature($data)
    {
        $secretKey = 'YOUR_SECRET_KEY';
        ksort($data, SORT_STRING);
        array_push($data, $secretKey);
        return base64_encode(md5(implode(':', $data), true));
    }

}
