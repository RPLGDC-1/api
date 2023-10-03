<?php

return [
    'api_key' => (env('APP_MODE_PRODUCTION') == false) ? env('XENDIT_KEY_DEV') : env('XENDIT_KEY_PROD'),
    'callback_token' =>(env('APP_MODE_PRODUCTION') == false) ? env('XENDIT_TOKEN_CALLBACK_DEV') : env('XENDIT_TOKEN_CALLBACK_PROD')
];
