<?php

namespace App\Services\Conversation;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Steps
{

    /**
     * @throws \JsonException
     */
    public static function step0(Request $request): JsonResponse
    {
        $conversationId = $request->json('default')['conversationId'];
        session_api()->put($conversationId, [
            'language' => $request->json('language')
        ]);
        return response()->json(Messages::getFirstServiceMessage($request->json('language')));
    }

}
