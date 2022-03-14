<?php

return [
    'BENEVOLAT_BENEVOLE' => 'Bénévole',
    'BENEVOLAT_TOTALS' => 'Totaux',
    'BENEVOLAT_BENEVOLE_TIME' => 'Temps bénévole de {benevoleId} pour {period}',
    'BENEVOLAT_UPDATE_TITLE' => 'Extension Bénévolat',
    'BENEVOLAT_MANAGE' => 'Gérer l\'extension Bénévolat',
    'BENEVOLAT_MANAGEMENT_TITLE' => 'Gestion de l\'extension Bénévolat',
    'BENEVOLAT_CREATE_LIST' => "Créer la liste '{listName}'",
    'BENEVOLAT_UPDATE_LIST' => "Mettre à jour la liste '{listName}'",
    'BENEVOLAT_UPDATE_LIST_ERROR' => "Impossible de mettre à jour la liste '{listName}' car le fichier '{filePath}' est introuvable.",
    'BENEVOLAT_UPDATE_LIST_SUCCESS' => "Mise à jour de la liste '{listName}' réussie.",
    'BENEVOLAT_UPDATE_FORM_SUCCESS' => "Mise à jour du formulaire '{formName}' réussie.",
    'BENEVOLAT_UPDATE_PAGERAPIDEHAUT' => "Ajouter la page de suivi dans 'PageRapideHaut'.",
    'BENEVOLAT_UPDATE_PAGERAPIDEHAUT_NOT_FOUND' => "Impossible de mettre à jour 'PageRapideHaut' car elle n'est pas trouvable.",
    'BENEVOLAT_UPDATE_PAGERAPIDEHAUT_FILE_NOT_FOUND' => "Impossible de mettre à jour 'PageRapideHaut' car le fichier '{filePath}' est introuvable.",
    'BENEVOLAT_UPDATE_PAGERAPIDEHAUT_SUCCESS' => "Mise à jour de 'PageRapideHaut' réussie.",
    'BENEVOLAT_UPDATE_PAGERAPIDEHAUT_NOT_UPDATE' => "Mise à jour de 'PageRapideHaut' non réussie.",
    'BENEVOLAT_CREATE_FORM' => "Créer le formulaire '{formName}'",
    'BENEVOLAT_UPDATE_FORM' => "Mettre à jour et écraser le formulaire '{formName}'",
    'BENEVOLAT_UPDATE_FORM_ERROR' => "Impossible de mettre à jour le formulaire '{formName}' car le fichier '{filePath}' est introuvable.",
    'BENEVOLAT_UPDATE_FORM_ERROR_CREATION' => "Impossible de créer le formulaire '{formName}'.",
    'BENEVOLAT_CREATE_PAGE' => "Créer la page '{pageTag}'",
    'BENEVOLAT_UPDATE_PAGE' => "Mettre à jour la page '{pageTag}'",
    'BENEVOLAT_UPDATE_PAGE_ERROR' => "Impossible de mettre à jour la page '{pageTag}' car le fichier '{filePath}' est introuvable.",
    'BENEVOLAT_UPDATE_PAGE_SUCCESS' => "Mise à jour de la page '{pageTag}' réussie.",
    'BENEVOLAT_UPDATE_SAVE_PAGE_ERROR' => "Impossible de créer la page '{pageTag}'.",
    'BENEVOLAT_UPDATE_UPDATE_PAGE_ERROR' => "Impossible de mettre à jour la page '{pageTag}'.",
    'BENEVOLAT_SEE_ALL_YEARS' => 'Voir toutes les années',
    'BENEVOLAT_ADD_TIME' => 'ajouter du temps bénévole',
    'BENEVOLAT_NAME_TO_USE' => 'Nom à utiliser',
    'BENEVOLAT_EXPLICATIONS_SUIVI' => "La valorisation du bénévolat peut avoir plusieurs bonnes raisons dont 'soigner la communication externe', 'suivre les compétences internes', 'mettre en avant l'aspect non lucratif' ...\n".
        "Retrouvez tous les détails dans le guide 'Bénévolat : valorisation comptable' disponible ici : https://www.associations.gouv.fr/guide-pratique-vie-associative.html",

    // handlers/GestionBenevolatHandler.php
    'BENEVOLAT_UPDATE_CONTACT_DETAILS' => 'Mise à jour réussie des coordonnées de l\'association',

    // handlers/SuiviAnnuelHandler.php
    'BENEVOLAT_THIS_HANDLER_IS_ONLY_USABLE_FOR_ENTRIES' => 'Cet handler n\'est utilisable que pour les fiches bazar !',
    'BENEVOLAT_THIS_HANDLER_IS_ONLY_USABLE_FOR_VOLUNTEER_ENTRIES' => 'Cet handler n\'est utilisable que pour les fiches bazar du formulaire \'Benevole\' !',

    // templates/gestion-benevolat.twig
    'BENEVOLAT_ASSOCIATION_CONTACT_DETAILS' => 'Coordonnées de l\'association',
    'BENEVOLAT_ASSOCIATION_NAME' => 'Nom :',
    'BENEVOLAT_ASSOCIATION_ADDRESS' => 'Adresse :',
    'BENEVOLAT_ASSOCIATION_ADDRESS_COMPLEMENT' => 'Complément d\'adresse :',
    'BENEVOLAT_ASSOCIATION_POSTAL_CODE' => 'Code postal :',
    'BENEVOLAT_ASSOCIATION_TOWN' => 'Ville :',

    // templates/suivi-annuel-handler.twig
    'BENEVOLAT_SUIVI_ANNUEL_TITLE' => 'Suivi annuel du bénévolat',
    'BENEVOLAT_ASSOCIATION' => 'Association',
    'BENEVOLAT_VOLUNTEER' => 'Bénévole',
    'BENEVOLAT_DATE' => 'Date',
    'BENEVOLAT_DESIGNATION' => 'Désignation',
    'BENEVOLAT_HOURS' => 'Heures',
    'BENEVOLAT_TOTAL' => 'Total',
];
