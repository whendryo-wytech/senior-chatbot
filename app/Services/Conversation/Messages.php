<?php

namespace App\Services\Conversation;

use App\Enum\Langs;

class Messages
{
    public static function getValidationCPF(string $lang, string $text): array
    {
        if ($lang === Langs::PT_BR->value) {
            return [
                'type' => 'PLAINTEXT',
                'text' => [
                    "O seu CPF é: $text"
                ]
            ];
        }
        if ($lang === Langs::ES_ES->value) {
            return [
                'type' => 'PLAINTEXT',
                'text' => [
                    "Introduzca su CPF"
                ]
            ];
        }
        if ($lang === Langs::EN_US->value) {
            return [
                'type' => 'PLAINTEXT',
                'text' => [
                    "Enter your CPF"
                ],
            ];
        }
        if ($lang === Langs::CR_HA->value) {
            return [
                'type' => 'PLAINTEXT',
                'text' => [
                    "Antre CPF ou"
                ]
            ];
        }
        return [];
    }

    public static function getBirthdate(string $lang): array
    {
        if ($lang === Langs::PT_BR->value) {
            return [
                'type' => 'PLAINTEXT',
                'text' => [
                    "Digite sua data de nascimento"
                ]
            ];
        }
        if ($lang === Langs::ES_ES->value) {
            return [
                'type' => 'PLAINTEXT',
                'text' => [
                    "Ingrese su fecha de nacimiento"
                ]
            ];
        }
        if ($lang === Langs::EN_US->value) {
            return [
                'type' => 'PLAINTEXT',
                'text' => [
                    "Enter your birth date"
                ],
            ];
        }
        if ($lang === Langs::CR_HA->value) {
            return [
                'type' => 'PLAINTEXT',
                'text' => [
                    "Antre dat nesans ou"
                ]
            ];
        }
        return [];
    }

    public static function getSelectHirePaperworkMessage(string $lang): array
    {
        if ($lang === Langs::PT_BR->value) {
            return [
                'type'    => 'BUTTON',
                'text'    => [
                    "Selecione o serviço que deseja"
                ],
                'options' => [
                    [
                        'text'  => 'Documentos Admissionais',
                        'value' => 'DOC_ADM',
                    ],
                    [
                        'text'  => 'Recuperação de Senha do Mercado',
                        'value' => 'SEN_MEC',
                    ],
                    [
                        'text'  => 'Voltar ao atendimento',
                        'value' => 'VOL_ATN',
                    ],
                ]
            ];
        }
        if ($lang === Langs::ES_ES->value) {
            return [
                'type'    => 'BUTTON',
                'text'    => [
                    "Selecciona el servicio que deseas"
                ],
                'options' => [
                    [
                        'text'  => 'Documentos de admisión',
                        'value' => 'DOC_ADM',
                    ],
                    [
                        'text'  => 'Recuperación de contraseña del mercado',
                        'value' => 'SEN_MEC',
                    ],
                    [
                        'text'  => 'Regresar al servicio',
                        'value' => 'VOL_ATN',
                    ],
                ]
            ];
        }
        if ($lang === Langs::EN_US->value) {
            return [
                'type'    => 'BUTTON',
                'text'    => [
                    "Select the service you want"
                ],
                'options' => [
                    [
                        'text'  => 'Admission Documents',
                        'value' => 'DOC_ADM',
                    ],
                    [
                        'text'  => 'Market Password Recovery',
                        'value' => 'SEN_MEC',
                    ],
                    [
                        'text'  => 'Return to service',
                        'value' => 'VOL_ATN',
                    ],
                ]
            ];
        }
        if ($lang === Langs::CR_HA->value) {
            return [
                'type'    => 'BUTTON',
                'text'    => [
                    "Chwazi sèvis ou vle a"
                ],
                'options' => [
                    [
                        'text'  => 'Dokiman Admisyon',
                        'value' => 'DOC_ADM',
                    ],
                    [
                        'text'  => 'Rekiperasyon modpas mache',
                        'value' => 'SEN_MEC',
                    ],
                    [
                        'text'  => 'Retounen nan sèvis',
                        'value' => 'VOL_ATN',
                    ],
                ]
            ];
        }
        return [];
    }


}
