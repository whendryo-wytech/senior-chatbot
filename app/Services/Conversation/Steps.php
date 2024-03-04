<?php

namespace App\Services\Conversation;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Steps
{
    private Request $request;


    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @throws \JsonException
     */
    public function stepValidationCPF(): JsonResponse
    {
        $conversationId = $this->request->json('default')['conversationId'];
        return response()->json(Messages::getValidationCPF(session_api()->get($conversationId)->language));
    }

    /**
     * @throws \JsonException
     */
    public function stepSelectHirePaperwork(): JsonResponse
    {
        $conversationId = $this->request->json('default')['conversationId'];
        session_api()->put($conversationId, [
            'language' => $this->request->json('language')
        ]);
        return response()->json(Messages::getSelectHirePaperworkMessage($this->request->json('language')));
    }

}
