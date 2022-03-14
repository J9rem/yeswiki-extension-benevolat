<?php

namespace YesWiki\Benevolat;

use Exception;
use YesWiki\Bazar\Field\CheckboxEntryField;
use YesWiki\Bazar\Field\LinkedEntryField;
use YesWiki\Bazar\Field\RadioEntryField;
use YesWiki\Bazar\Field\SelectEntryField;
use YesWiki\Bazar\Service\EntryManager;
use YesWiki\Bazar\Service\FormManager;
use YesWiki\Core\YesWikiHandler;

class SuiviAnnuelHandler extends YesWikiHandler
{
    protected $entryManager;
    protected $formManager;

    public function run()
    {
        $this->denyAccessUnlessGranted('read');
        // get services
        $this->entryManager = $this->getService(EntryManager::class);
        $this->formManager = $this->getService(FormManager::class);

        $tag = $this->wiki->GetPageTag();
        if (empty($tag)) {
            throw new Exception("\$tag should not be empty");
        }
        if (!$this->entryManager->isEntry($tag)) {
            return $this->wiki->header().$this->render('@templates/alert-message.twig', [
                'type' => 'info',
                'message' => _t('BENEVOLAT_THIS_HANDLER_IS_ONLY_USABLE_FOR_ENTRIES')
            ]).$this->wiki->footer();
        }

        $entry = $this->entryManager->getOne($tag);
        if (empty($entry)) {
            throw new Exception("\$entry should not be empty !");
        }
        
        $volunteerFormId = $this->params->get('benevolat')['forms']['Benevole_id'] ?? null;
        if (empty($volunteerFormId)) {
            throw new Exception("\$volunteerFormId should not be empty !");
        }

        if (empty($entry['id_typeannonce']) || empty(trim($entry['id_typeannonce']))) {
            throw new Exception("\$entry['id_typeannonce'] should not be empty !");
        }

        $entryFormId = trim($entry['id_typeannonce']);

        if (intval($entryFormId) != intval($volunteerFormId)) {
            return $this->wiki->header().$this->render('@templates/alert-message.twig', [
                'type' => 'warning',
                'message' => _t('BENEVOLAT_THIS_HANDLER_IS_ONLY_USABLE_FOR_VOLUNTEER_ENTRIES')
            ]).$this->wiki->footer();
        }

        $year = filter_input(INPUT_GET, 'bf_annee', FILTER_SANITIZE_STRING);

        $tasksFormId = $this->params->get('benevolat')['forms']['Benevolat_id'] ?? null;
        $volunteerForm =  $this->formManager->getOne($volunteerFormId);
        $tasksForm =  $this->formManager->getOne($tasksFormId);
        $queries = $this->getQueryForLinkedLabels($tasksForm, $entry);
        $anneeField = $this->formManager->findFieldFromNameOrPropertyName('bf_annee', $tasksFormId);
        $moisField = $this->formManager->findFieldFromNameOrPropertyName('bf_mois', $tasksFormId);

        $anneeFieldName = empty($anneeField) ? 'bf_annee' : $anneeField->getPropertyName();
        $moisFieldName = empty($moisField) ? 'bf_mois' : $moisField->getPropertyName();

        $tasks = $this->entryManager->search([
            'formIds' => [$tasksFormId],
            'queries' => $queries + (empty($year) ? [] : [$anneeFieldName => $year]),
        ]);

        $output = $this->render('@benevolat/suivi-annuel-handler.twig', [
            'contactDetails' => $this->params->get('benevolat')['contactDetails'] ?? [],
            'entry' => $entry,
            'tasks' => $tasks,
            'translatedKeys' => [
                'bf_annee' => $anneeFieldName,
                'bf_mois' => $moisFieldName,
            ],
            'year' => $year,
        ]);
        return $this->wiki->header().$output.$this->wiki->footer();
    }

    protected function getQueryForLinkedLabels($form, $entry): array
    {
        if (!is_array($form) || !is_array($form['prepared'])
                || empty($entry['id_typeannonce'])
                || empty($entry['id_fiche'])) {
            return '';
        }
        $queries = [] ;
        // find CheckboxEntryField or SelectEntryField or RadioEntryField with right name
        foreach ($form['prepared'] as $field) {
            if (
            (
                $field instanceof SelectEntryField
                || $field instanceof CheckboxEntryField
                || $field instanceof RadioEntryField
            )
            && $field->getLinkedObjectName() == $entry['id_typeannonce']
                ) {
                $queries[$field->getPropertyName()] = $entry['id_fiche'];
            }
        }

        return $queries ;
    }
}
