<?php


namespace App\Service;


class QuestionService
{
	public function getQuestions() {
		return [
			"a" => [
				"question" => "Pensez-vous que l'État Français doive rester laïque ?",
				"answers" => [
					0 => "À tout prix.",
					1 => "Oui, c'est une bonne chose.",
					2 => "Peu m'importe.",
					3 => "Non, je ne pense pas.",
					4 => "Il faut arrêter cela le plus vite possible.",
					5 => "Je ne me prononcerai pas sur ce sujet.",
				]
			],
			"b" => [
				"question" => "Il est interdit de montrer des signes de religion en public. Votre avis ?",
				"answers" => [
					0 => "Heureusement !",
					1 => "C'est une bonne chose.",
					2 => "Je ne me sens pas concerné...",
					3 => "C'est anormal.",
					4 => "C'est intolérable !",
					5 => "Je ne répondrai pas.",
				]
			],
			"c" => [
				"question" => "Pensez-vous que la liberté religieuse soit actuellement respectée en France ?",
				"answers" => [
					0 => "Oui, et même peut-être trop.",
					1 => "Oui, la situation est globalement très acceptable.",
					2 => "Je ne sais pas.",
					3 => "Non, il y a beaucoup de choses à améliorer.",
					4 => "Absolument pas, rien ne va sur ce point.",
					5 => "Ne me prononce pas.",
				]
			],
			"d" => [
				"question" => "Selon vous, la religion a-t-elle une influence dans les décisions de l'État ?",
				"answers" => [
					0 => "Beaucoup trop. L'État est censé être laïque.",
					1 => "Oui, c'est une influence puissante.",
					2 => "Je ne sais pas 🤔",
					3 => "Non, l'État ne se laisse pas influencer, car il est laïque.",
					4 => "Non. L'État ferme les yeux aux problèmes de la religion.",
					5 => "Je ne dirai rien.",
				]
			],
			"e" => [
				"question" => "Existe-t-il des discriminiations envers les minorités religieuses en France ?",
				"answers" => [
					0 => "La France n'est plus que ça.",
					1 => "Il n'en existe que trop.",
					2 => "Là, je sais pas...",
					3 => "Non, je n'ai pas connaissance de faits de ce genre.",
					4 => "Mais personne ne les discrimine...",
					5 => "Joker !",
				]
			],
		];
	}
}