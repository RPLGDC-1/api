<?php

namespace App\Traits;

trait ApiTrait
{
    public function sendResponse($data, $code = 200)
	{
		$response = ['code' => $code];
        if ($data) $response = array_merge($response, ['data' => $data]);

        return response()->json($response, 200);
	}

    public function sendError($error, $code = 200)
	{
		$response = ['code' => $code];
        if ($error) $response = array_merge($response, ['data' => $error]);

        return response()->json($response, 200);
	}
}