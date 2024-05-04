<?php 

return [
    'serverKey'=> env('MIDTRANS_SERVER_KEY'),
    'isProduction'=> env('MIDTRANS_IS_PRODUCTION'), 
    'client_Key'=> env('MIDTRANS_CLIENT_KEY'),
    'isSanitized' => env('MIDTRANS_IS_SANITIZED'),
    'is3ds' => env('MIDTRANS_IS_3DS'),
    'merchant_id' =>env('MIDTRANS_MERCHANT_ID'),
];