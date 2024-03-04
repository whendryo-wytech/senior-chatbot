<?php

namespace App\Services\Conversation;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Steps
{
    private Request $request;
    private string $language;
    private string $conversationId;


    /**
     * @throws \JsonException
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->conversationId = $this->request->json('default')['conversationId'];
        if ($this->request->json('language')) {
            session_api()->delete($this->conversationId);
            session_api()->put($this->conversationId, [
                'language' => $this->request->json('language')
            ]);
        }
        $this->language = session_api()->get($this->conversationId)->language;
    }

    /**
     * @throws \JsonException
     */
    public function stepValidationCPF(): JsonResponse
    {
        return response()->json(Messages::getValidationCPF($this->language));
    }

    public function stepValidationBirthdate(): JsonResponse
    {
        return response()->json(Messages::getValidationCPF($this->language));
    }

    /**
     * @throws \JsonException
     */
    public function stepSelectHirePaperwork(): JsonResponse
    {
        return response()->json(Messages::getSelectHirePaperworkMessage($this->language));
    }

}
