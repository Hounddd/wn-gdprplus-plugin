<?php

return [
    'plugin' => [
        'name' => 'GdprPlus',
        'description' => 'Ce plugin ajoute des fonctionnalités supplémentaires plugin OFFLINE.Gdpr',
    ],
    'components' => [
        'bannerwide' => [
            'name' => 'Bannière cookies',
            'description' => 'Affiche une large bannière de cookies',
            'title' => 'Ce site web utilise des cookies.',
            'message' => 'Ce site web utilise les cookies pour traiter des données personnelles. Ces traitements ont notamment pour finalités l’intégration de contenus et services fournis par des partenaires avec qui nous partageons également des informations, qu’ils peuvent combiner avec d’autres informations que vous leur avez fournies ou qu’ils ont collectées lors de votre utilisation de leurs services. <br />Vous êtes libre d’accepter ou de refuser. Votre consentement est optionnel, il n’est pas indispensable à l’utilisation du site et il peut être annulé ou modifiée à tout moment.',
            'bg_cookie' => [
                'title' => 'Illustration de cookies',
                'description' => 'Inclue l\'image de fond de la bannière de cookies',
            ],
            'buttons' => [
                'accept_all' => 'Tout accepter',
                'accept_selection' => 'Enregistrer mon choix',
            ],
            'color_scheme' => [
                'title' => 'Thème de couleur',
                'description' => 'Couleurs utilisées pour l\'affichage de la bannière de cookies (bascules et boutons)',
                'colors' => [
                    'red' => 'Rouge',
                    'orange' => 'Orange',
                    'amber' => 'Ambre',
                    'yellow' => 'Jaune',
                    'lime' => 'Vert clair',
                    'green' => 'Vert',
                    'emerald' => 'Émeraude',
                    'teal' => 'Turquoise',
                    'cyan' => 'Cyan',
                    'sky' => 'Bleu ciel',
                    'blue' => 'Bleu',
                    'indigo' => 'Indigo',
                    'violet' => 'Violet',
                    'purple' => 'Pourpre',
                    'fuchsia' => 'Fuchsia',
                    'pink' => 'Rose doux',
                    'rose' => 'Rose',
                ]
            ],
        ],
    ],
];
