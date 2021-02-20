<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripayPayment extends Model
{
    use HasFactory;

    public function channelPembayaran()
    {
        $apiKey = 'N4HKoik0M2YT4RQCnGPgUTEUzZ8ok5y0jYTtsAo7';

        $payload = [
            // 'code'    => 'BRIVA'
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_FRESH_CONNECT     => true,
            CURLOPT_URL               => "https://payment.tripay.co.id/api/merchant/payment-channel?" . http_build_query($payload),
            CURLOPT_RETURNTRANSFER    => true,
            CURLOPT_HEADER            => false,
            CURLOPT_HTTPHEADER        => array(
                "Authorization: Bearer " . $apiKey
            ),
            CURLOPT_FAILONERROR       => false
        ));

        $response = json_decode(curl_exec($curl), true)['data'];
        $err = curl_error($curl);

        curl_close($curl);

        return $response;
        // echo !empty($err) ? $err : $response;
    }

    public function instruksiPembayaran()
    {
        $apiKey = 'N4HKoik0M2YT4RQCnGPgUTEUzZ8ok5y0jYTtsAo7';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_FRESH_CONNECT     => true,
            CURLOPT_URL               => "https://payment.tripay.co.id/api/payment/channel",
            CURLOPT_RETURNTRANSFER    => true,
            CURLOPT_HEADER            => false,
            CURLOPT_HTTPHEADER        => array(
                "Authorization: Bearer " . $apiKey
            ),
            CURLOPT_FAILONERROR       => false
        ));

        $response = json_decode(curl_exec($curl), true)['data'][0]['payment'];
        $err = curl_error($curl);

        curl_close($curl);

        return $response;
        // echo !empty($err) ? $err : $response;
    }

    public function requestPembayaran($bank, $harga, $items)
    {
        $user = auth()->user();

        $apiKey = 'N4HKoik0M2YT4RQCnGPgUTEUzZ8ok5y0jYTtsAo7';
        $privateKey = 'MIe7T-aZdTk-x8dr3-p0yCk-iZ0AH';
        $merchantCode = 'T2642';
        $merchantRef = 'INV-' . time();
        $amount = $harga + 10000;

        $data = [
            'method'            => $bank,
            'merchant_ref'      => $merchantRef,
            'amount'            => $amount,
            'customer_name'     => $user->name,
            'customer_email'    => $user->email,
            'customer_phone'    => '-',
            'order_items'       => [
                [
                    'name'      => $items->title,
                    'price'     => $amount,
                    'quantity'  => 1
                ]
            ],
            'callback_url'      => url('/') . '/callback-tripay',
            'return_url'        => url('/'),
            'expired_time'      => (time() + (24 * 60 * 60)), // 24 jam
            'signature'         => hash_hmac('sha256', $merchantCode . $merchantRef . $amount, $privateKey)
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_FRESH_CONNECT     => true,
            CURLOPT_URL               => "https://payment.tripay.co.id/api/transaction/create",
            CURLOPT_RETURNTRANSFER    => true,
            CURLOPT_HEADER            => false,
            CURLOPT_HTTPHEADER        => array(
                "Authorization: Bearer " . $apiKey
            ),
            CURLOPT_FAILONERROR       => false,
            CURLOPT_POST              => true,
            CURLOPT_POSTFIELDS        => http_build_query($data)
        ));

        $response = json_decode(curl_exec($curl), true)['data'];
        // $instruksi = json_decode(curl_exec($curl), true)['data']['instructions'][0]['steps'];
        $err = curl_error($curl);

        curl_close($curl);

        return $response;
        // echo !empty($err) ? $err : $response;
    }
}
