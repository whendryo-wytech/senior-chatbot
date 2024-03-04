<?php

namespace App\Http\Controllers\Conversation;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Services\Conversation\Steps;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @throws \JsonException
     */
    public function store(Request $request)
    {
        Conversation::create([
            'header'  => json_encode($request->header(), JSON_THROW_ON_ERROR),
            'payload' => json_encode($request->all(), JSON_THROW_ON_ERROR),
        ]);

        $steps = new Steps($request);

        if ($request->json('step') === 'validationCPF') {
            return $steps->stepValidationCPF();
        }

        if ($request->json('step') === 'validationBirthdate') {
            return $steps->stepValidationBirthdate();
        }

        if ($request->json('step') === 'SelectHirePaperwork') {
            return $steps->stepSelectHirePaperwork();
        }

        //        session_api()->put($token, [
        //            'hcm_id'       => $profile->hcm_id,
        //            'hcm_user'     => $profile->hcm_username,
        //            'hcm_password' => $request->json('password')
        //        ]);

        //        Session::put($conversationId, [
        //            'language' => 'PT_BR'
        //        ]);


        //        {
        //            "type": "PLAINTEXT" || "HTML" || "BUTTON" || "IMAGE",
        //	"text": [
        //            "Texto que o serviço vai retornar"
        //        ],
        //	"options": [
        //		{
        //            "text":"Título da opção",
        //			"value":"Valor da resposta a ser enviada quando a opção for selecionada",
        //			"url":"Url a ser aberta quando a opção for selecionada"
        //		}
        //	],
        //	"image": {
        //            "url":"url da imagem, disponível na nuvem",
        //		"link":"link a ser aberto quando clicar na imagem",
        //		"text":"texto a enviar quando clicar na imagem"
        //	}
        //}


//        return response()->json([
//            'type'    => 'BUTTON',
//            'text'    => [
//                "Selecione a sua língua"
//            ],
//            'options' => [
//                [
//                    'text'  => 'Eu falo português',
//                    'value' => 'PT_BR',
//                ],
//                [
//                    'text'  => 'I speak english',
//                    'value' => 'EN_US',
//                ],
//                [
//                    'text'  => 'Yo hablo español',
//                    'value' => 'ES_SS',
//                ],
//                [
//                    'text'  => 'Mwen pale ayisyen',
//                    'value' => 'CR_HA',
//                ],
//            ]
//        ]);


//        return response()->json([
//            'data'  => (Conversation::create([
//                'header'  => json_encode($request->header(), JSON_THROW_ON_ERROR),
//                'payload' => json_encode($request->all(), JSON_THROW_ON_ERROR),
//            ]))->id,
//            'error' => false
//        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
