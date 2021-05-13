<?php


namespace App\Service;


class QuestionService
{
    public function getQuestions()
    {
        return [
            "a" => [
                "question" => "Pensez-vous que l'État Français doive rester laïque ?",
                "answers"  => [
                    0 => "À tout prix.",
                    1 => "Oui, c'est une bonne chose.",
                    2 => "Peu m'importe.",
                    3 => "Non, je ne pense pas.",
                    4 => "Il faut arrêter cela le plus vite possible.",
                    5 => "Je ne me prononcerai pas sur ce sujet.",
                ],
            ],
            "b" => [
                "question" => "Il est interdit de porter des signes de religion ostensibles en publique. Votre avis ?",
                "answers"  => [
                    0 => "Heureusement !",
                    1 => "C'est une bonne chose.",
                    2 => "Je ne me sens pas concerné·e...",
                    3 => "C'est anormal.",
                    4 => "C'est intolérable !",
                    5 => "Je ne répondrai pas.",
                ],
            ],
            "c" => [
                "question" => "Pensez-vous que la liberté religieuse soit actuellement respectée en France ?",
                "answers"  => [
                    0 => "Oui, et même peut-être trop.",
                    1 => "Oui, la situation est globalement très acceptable.",
                    2 => "Je ne sais pas.",
                    3 => "Non, il y a beaucoup de choses à améliorer.",
                    4 => "Absolument pas, rien ne va sur ce point.",
                    5 => "Ne me prononce pas.",
                ],
            ],
            "d" => [
                "question" => "Selon vous, la religion a-t-elle une influence dans les décisions de l'État ?",
                "answers"  => [
                    0 => "Beaucoup trop. L'État est censé être laïque.",
                    1 => "Oui, c'est une influence puissante.",
                    2 => "Je ne sais point.",
                    3 => "Non, l'État est peu influencé par la religion",
                    4 => "Non. L'État ne se laisse pas influencer, car il est laïque.",
                    5 => "Je ne dirai rien.",
                ],
            ],
            "e" => [
                "question" => "Pensez-vous qu'il existe des discriminations envers les religions en France ?",
                "answers"  => [
                    0 => "Il n'en existe que trop.",
                    1 => "Il n'est pas rare de se faire persécuter pour sa religion.",
                    2 => "Je n'ai pas de réponse à apporter.",
                    3 => "Non, je n'ai pas connaissance de faits de ce genre.",
                    4 => "Non, ce genre de discrimination n'existe pas.",
                    5 => "Je ne souhaite pas répondre.",
                ],
            ],
            "f" => [
                "question" => "Dans la loi de séparation de l'Église et de l'État, <a href='https://www.gouvernement.fr/partage/8764-le-9-decembre-1905-est-promulguee-la-loi-concernant-la-separation-des-eglises-et-de-l-etat' class'text-mute' style='font-weight=lighter;font-style:italic;text-decoration:underline'>l'Article 2</a> stipule :
					<br><i>“La République ne reconnait, ne salarie ni ne subventionne aucun culte.”</i><br>Pensez-vous que c'est le cas ?",
                "answers"  => [
                    0 => "Oui, tout à fait.",
                    1 => "Oui, presque tout le temps.",
                    2 => "Je n'ai pas d'opinion à ce sujet.",
                    3 => "Ça laisse encore à désirer...",
                    4 => "La loi n'est clairement pas respectée.",
                    5 => "Je ne veux pas donner mon avis.",
                ],
            ],
            "g" => [
                "question" => "Vous arrive-t-il de fréquenter des lieux de culte dans votre commune ?",
                "answers"  => [
                    0 => "Oui, cela m'arrive souvent.",
                    1 => "Oui, de temps en temps.",
                    2 => "Je ne me rappelle pas.",
                    3 => "Non, très rarement.",
                    4 => "Non. Jamais.",
                    5 => "Je n'ai rien à dire à ce sujet.",
                ],
            ],
        ];
    }
}
