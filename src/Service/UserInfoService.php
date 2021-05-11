<?php


namespace App\Service;


class UserInfoService
{
    public function getInfo(): array
    {
        return [
            "sexe"   => [
                "question" => "Quel est votre sexe ?",
                "answers"  => [
                    0 => "Femme",
                    1 => "Homme",
                    2 => "Non-binaire",
                ],
            ],
            "age"    => [
                "question" => "Votre âge ?",
                "answers"  => [
                    0 => "7-14",
                    1 => "15-19",
                    2 => "20-30",
                    3 => "32-39",
                    4 => "40-49",
                    5 => "50-59",
                    6 => "60-65",
                    7 => "66+",
                ],
            ],
            "belief" => [
                "question" => "Êtes-vous croyant ?",
                "answers"  => [
                    0 => "Oui",
                    1 => "Non",
                ],
            ],
        ];
    }
}