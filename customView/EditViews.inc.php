<?php

/**
 * @file plugins/generic/customView/EditViews.inc.php
 *
 * Copyright (c) 2014 Sotirios-Fivos Stamopoulos
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class EditViews
 * @ingroup plugins_generic_customView
 *
 * @brief Form for journal managers to modify customView plugin settings
 */

import('lib.pkp.classes.form.Form');

class EditViews extends Form {

	/** @var $plugin object */
	var $plugin;
	
        /** @var $viewId int */
	var $viewId;

	/**
	 * Constructor
	 * @param $plugin object
	 * @param $journalId int
	 */
	function EditViews(&$plugin, $viewId) {		
		$this->plugin =& $plugin;
		$this->viewId = isset($viewId) ? $viewId : null;

		parent::Form($plugin->getTemplatePath() . 'editViews.tpl');
		
                // Check if form labels are provided
		$this->addCheck(new FormValidatorLocale($this, 'titleLabel', 'optional', 'plugins.generic.customView.form.titleRequired'));
                $this->addCheck(new FormValidatorLocale($this, 'creatorLabel', 'optional', 'plugins.generic.customView.form.creatorRequired'));
                $this->addCheck(new FormValidatorLocale($this, 'subjectLabel', 'optional', 'plugins.generic.customView.form.subjectRequired'));
                $this->addCheck(new FormValidatorLocale($this, 'keywordsLabel', 'optional', 'plugins.generic.customView.form.keywordsRequired'));
                $this->addCheck(new FormValidatorLocale($this, 'descriptionLabel', 'optional', 'plugins.generic.customView.form.descriptionRequired'));
                $this->addCheck(new FormValidatorLocale($this, 'publisherLabel', 'optional', 'plugins.generic.customView.form.publisherRequired'));
                $this->addCheck(new FormValidatorLocale($this, 'contributorLabel', 'optional', 'plugins.generic.customView.form.contributorRequired'));
                $this->addCheck(new FormValidatorLocale($this, 'statusLabel', 'optional', 'plugins.generic.customView.form.statusRequired'));
                $this->addCheck(new FormValidatorLocale($this, 'typeLabel', 'optional', 'plugins.generic.customView.form.typeRequired'));
                $this->addCheck(new FormValidatorLocale($this, 'formatLabel', 'optional', 'plugins.generic.customView.form.formatRequired'));
                $this->addCheck(new FormValidatorLocale($this, 'identifierLabel', 'optional', 'plugins.generic.customView.form.identifierRequired'));
                $this->addCheck(new FormValidatorLocale($this, 'sourceLabel', 'optional', 'plugins.generic.customView.form.sourceRequired'));
                $this->addCheck(new FormValidatorLocale($this, 'languageLabel', 'optional', 'plugins.generic.customView.form.languageRequired'));
                $this->addCheck(new FormValidatorLocale($this, 'relationLabel', 'optional', 'plugins.generic.customView.form.relationRequired'));
                $this->addCheck(new FormValidatorLocale($this, 'coverageLabel', 'optional', 'plugins.generic.customView.form.coverageRequired'));
                $this->addCheck(new FormValidatorLocale($this, 'rightsLabel', 'optional', 'plugins.generic.customView.form.rightsRequired'));
                
                $this->addCheck(new FormValidatorPost($this));
	}
	
		/**
	 * Display the form.
	 */
	function display() {
		$templateMgr =& TemplateManager::getManager();
		$templateMgr->assign('viewId', $this->viewId);

		$plugin =& $this->plugin; 
		$plugin->import('CustomView');

		parent::display();
	}

	/**
	 * Initialize form data.
	 */
	function initData() {
		if (isset($this->viewId)) {
			$viewDao =& DAORegistry::getDAO('CustomViewDAO');
			$view =& $viewDao->getCustomView($this->viewId);

			if ($view != null) {
				$this->_data = array(					
					'displayTitle' => $view->getDisplayTitle(),
                                        'titleLabel' => $view->getTitleLabel(),
                                        'displayCreator' => $view->getDisplayCreator(),
                                        'creatorLabel' => $view->getCreatorLabel(),
                                        'displaySubject' => $view->getDisplaySubject(),
                                        'subjectLabel' => $view->getSubjectLabel(),
                                        'displayKeywords' => $view->getDisplayKeywords(),
                                        'keywordsLabel' => $view->getKeywordsLabel(),
                                        'displayDescription' => $view->getDisplayDescription(),
                                        'descriptionLabel' => $view->getDescriptionLabel(),
                                        'displayPublisher' => $view->getDisplayPublisher(),
                                        'publisherLabel' => $view->getPublisherLabel(),
                                        'displayContributor' => $view->getDisplayContributor(),
                                        'contributorLabel' => $view->getContributorLabel(),
                                        'displayDate' => $view->getDisplayDate(),                                        
                                        'dateLabel' => $view->getDateLabel(),
                                        'displayStatus' => $view->getDisplayStatus(),
                                        'statusLabel' => $view->getStatusLabel(),
                                        'displayType' => $view->getDisplayType(),
                                        'typeLabel' => $view->getTypeLabel(),
                                        'displayFormat' => $view->getDisplayFormat(),
                                        'formatLabel' => $view->getFormatLabel(),
                                        'displayIdentifier' => $view->getDisplayIdentifier(),
                                        'identifierLabel' => $view->getIdentifierLabel(),
                                        'displaySource' => $view->getDisplaySource(),
                                        'sourceLabel' => $view->getSourceLabel(),
                                        'displayLanguage' => $view->getDisplayLanguage(),
                                        'languageLabel' => $view->getLanguageLabel(),
                                        'displayRelation' => $view->getDisplayRelation(),
                                        'relationLabel' => $view->getRelationLabel(),
                                        'displayCoverage' => $view->getDisplayCoverage(),
                                        'coverageLabel' => $view->getCoverageLabel(),
                                        'displayRights' =>$view->getDisplayRights(),
                                        'rightsLabel' => $view->getRightsLabel()
				);
			} else {
				$this->viewId = null;
			}
		}
	}

/**
	 * Assign form data to user-submitted data.
	 */
	function readInputData() {
		$this->readUserVars(
			array(
				'displayTitle',
                                'titleLabel',
                                'displayCreator',
                                'creatorLabel',
                                'displaySubject',
                                'subjectLabel',
                                'displayKeywords',
                                'keywordsLabel',
                                'displayDescription',
                                'descriptionLabel',
                                'displayPublisher',
                                'publisherLabel',                            
                                'displayContributor',
                                'contributorLabel',
                                'displayDate',
                                'dateLabel',
                                'displayStatus',
                                'statusLabel',                            
                                'displayType',
                                'typeLabel',
                                'displayFormat',
                                'formatLabel',
                                'displayIdentifier',
                                'identifierLabel',
                                'displaySource',
                                'sourceLabel',
                                'displayLanguage',
                                'languageLabel',
                                'displayRelation',
                                'relationLabel',
                                'displayCoverage',
                                'coverageLabel',
                                'displayRights',
                                'rightsLabel'
			)
		);
	}

	/**
	 * Save button settings. 
	 */
	function execute() {
		$journal =& Request::getJournal();
		$journalId = $journal->getId();
		$plugin =& $this->plugin;
                
		$customViewDao =& DAORegistry::getDAO('CustomViewDAO');
		$plugin->import('CustomView');

		if (isset($this->viewId)) {                    
			$view =& $customViewDao->getCustomView($this->viewId);
		}

		if (!isset($view)) {
			$view = new CustomView();
		}

		$view->setJournalId($journalId);
		$view->setDisplayTitle($this->getData('displayTitle') ? 1 : 0);
                $view->setTitleLabel($this->getData('titleLabel'));
                $view->setDisplayCreator($this->getData('displayCreator') ? 1 :0);
                $view->setCreatorLabel($this->getData('creatorLabel'));
                $view->setDisplaySubject($this->getData('displaySubject') ? 1 :0);
                $view->setSubjectLabel($this->getData('subjectLabel'));
                $view->setDisplayKeywords($this->getData('displayKeywords') ? 1 :0);
                $view->setKeywordsLabel($this->getData('keywordsLabel'));
                $view->setDisplayDescription($this->getData('displayDescription') ? 1 :0);
                $view->setDescriptionLabel($this->getData('descriptionLabel'));                
                $view->setDisplayPublisher($this->getData('displayPublisher') ? 1 :0);
                $view->setPublisherLabel($this->getData('publisherLabel'));               
                $view->setDisplayContributor($this->getData('displayContributor') ? 1 :0);
                $view->setContributorLabel($this->getData('contributorLabel'));
                $view->setDisplayDate($this->getData('displayDate') ? 1 :0);
                $view->setDateLabel($this->getData('dateLabel'));                
                $view->setDisplayStatus($this->getData('displayStatus') ? 1 :0);
                $view->setStatusLabel($this->getData('statusLabel'));                
                $view->setDisplayType($this->getData('displayType') ? 1 :0);
                $view->setTypeLabel($this->getData('typeLabel'));                 
                $view->setDisplayFormat($this->getData('displayFormat') ? 1 :0);
                $view->setFormatLabel($this->getData('formatLabel'));                
                $view->setDisplayIdentifier($this->getData('displayIdentifier') ? 1 :0);
                $view->setIdentifierLabel($this->getData('identifierLabel'));                
                $view->setDisplaySource($this->getData('displaySource') ? 1 :0);
                $view->setSourceLabel($this->getData('sourceLabel'));                
                $view->setDisplayLanguage($this->getData('displayLanguage') ? 1 :0);
                $view->setLanguageLabel($this->getData('languageLabel'));
                $view->setDisplayRelation($this->getData('displayRelation') ? 1 :0);
                $view->setRelationLabel($this->getData('relationLabel'));                
                $view->setDisplayCoverage($this->getData('displayCoverage') ? 1 :0);
                $view->setCoverageLabel($this->getData('coverageLabel'));                
                $view->setDisplayRights($this->getData('displayRights') ? 1 :0);
                $view->setRightsLabel($this->getData('rightsLabel'));
                
		
                // Update or insert custom view
		//if ($view->getId() != null) {
			$customViewDao->updateCustomView($view);
		//} 
	}

}

?>
