<?php

/**
 * @file plugins/generic/customView/CustomView.inc.php
 *
 * Copyright (c) 2014 Sotirios-Fivos Stamopoulos
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class customView
 * @ingroup plugins_generic_customView
 *
 * @brief Basic class describing a custom view.
 */

class CustomView extends DataObject {

	function CustomView() {
		parent::DataObject();
	}

	//
	// Get/set methods
	//
	
	/**
	 * Get the ID of the view.
	 * @return int
	 */
	function getId() {
		return $this->getData('viewId');
	}

	/**
	 * Set the ID of the custom view.
	 * @param $viewId int
	 */
	function setId($viewId) {
		return $this->setData('viewId', $viewId);
	}
	
	/**
	 * Get the journal ID of the custom view.
	 * @return int
	 */
	function getJournalId() {
		return $this->getData('journalId');
	}

	/**
	 * Set the journal ID of the custom view.
	 * @param $journalId int
	 */
	function setJournalId($journalId) {
		return $this->setData('journalId', $journalId);
	}

	/**
	 * Get the title display of the custom view.
	 * @return int
	 */
	function getDisplayTitle() {
		return $this->getData('displayTitle');
	}

	/**
	 * Set the title display of the custom view.
	 * @param $displayTitle int
	 */
	function setDisplayTitle($displayTitle) {
		return $this->setData('displayTitle', $displayTitle);
	}
        
        /**
	 * Get the title label of the custom view.
	 * @return int
	 */
	function getTitleLabel() {
		return $this->getData('titleLabel');
	}

	/**
	 * Set the title label of the custom view.
	 * @param $titleLabel string
	 */
	function setTitleLabel($titleLabel) {
		return $this->setData('titleLabel', $titleLabel);
	}
        
        // Creator
        function getDisplayCreator() {
		return $this->getData('displayCreator');
	}

	function setDisplayCreator($displayCreator) {
		return $this->setData('displayCreator', $displayCreator);
	}
        
	function getCreatorLabel() {
		return $this->getData('creatorLabel');
	}

	function setCreatorLabel($creatorLabel) {
		return $this->setData('creatorLabel', $creatorLabel);
	}
        // Subject
        function getDisplaySubject() {
		return $this->getData('displaySubject');
	}

	function setDisplaySubject($displaySubject) {
		return $this->setData('displaySubject', $displaySubject);
	}
        
	function getSubjectLabel() {
		return $this->getData('subjectLabel');
	}

	function setSubjectLabel($subjectLabel) {
		return $this->setData('subjectLabel', $subjectLabel);
	}
        // Keywords
        function getDisplayKeywords() {
		return $this->getData('displayKeywords');
	}

	function setDisplayKeywords($displayKeywords) {
		return $this->setData('displayKeywords', $displayKeywords);
	}
        
	function getKeywordsLabel() {
		return $this->getData('keywordsLabel');
	}

	function setKeywordsLabel($keywordsLabel) {
		return $this->setData('keywordsLabel', $keywordsLabel);
	}
        // Description
        function getDisplayDescription() {
		return $this->getData('displayDescription');
	}

	function setDisplayDescription($displayDescription) {
		return $this->setData('displayDescription', $displayDescription);
	}
        
	function getDescriptionLabel() {
		return $this->getData('descriptionLabel');
	}

	function setDescriptionLabel($descriptionLabel) {
		return $this->setData('descriptionLabel', $descriptionLabel);
	} 
        
        //Publisher
                function getDisplayPublisher() {
		return $this->getData('displayPublisher');
	}

	function setDisplayPublisher($displayPublisher) {
		return $this->setData('displayPublisher', $displayPublisher);
	}
        
	function getPublisherLabel() {
		return $this->getData('publisherLabel');
	}

	function setPublisherLabel($publisherLabel) {
		return $this->setData('publisherLabel', $publisherLabel);
	} 
        
        // Contributor
        function getDisplayContributor() {
		return $this->getData('displayContributor');
	}

	function setDisplayContributor($displayContributor) {
		return $this->setData('displayContributor', $displayContributor);
	}
        
	function getContributorLabel() {
		return $this->getData('contributorLabel');
	}

	function setContributorLabel($contributorLabel) {
		return $this->setData('contributorLabel', $contributorLabel);
	}         
	
        // Date
        function getDisplayDate() {
		return $this->getData('displayDate');
	}

	function setDisplayDate($displayDate) {
		return $this->setData('displayDate', $displayDate);
	}
        
	function getDateLabel() {
		return $this->getData('dateLabel');
	}

	function setDateLabel($dateLabel) {
		return $this->setData('dateLabel', $dateLabel);
	} 
        
        // TypeStatus
        function getDisplayStatus() {
            return $this->getData('displayStatus');
	}

	function setDisplayStatus($displayStatus) {
		return $this->setData('displayStatus', $displayStatus);
	}
        
	function getStatusLabel() {
		return $this->getData('statusLabel');
	}

	function setStatusLabel($statusLabel) {
		return $this->setData('statusLabel', $statusLabel);
	}                
                
        
        // Type
        function getDisplayType() {
		return $this->getData('displayType');
	}

	function setDisplayType($displayType) {
		return $this->setData('displayType', $displayType);
	}
        
	function getTypeLabel() {
		return $this->getData('typeLabel');
	}

	function setTypeLabel($typeLabel) {
		return $this->setData('typeLabel', $typeLabel);
	} 
        
        // Format
        function getDisplayFormat() {
		return $this->getData('displayFormat');
	}

	function setDisplayFormat($displayFormat) {
		return $this->setData('displayFormat', $displayFormat);
	}
        
	function getFormatLabel() {
		return $this->getData('formatLabel');
	}

	function setFormatLabel($formatLabel) {
		return $this->setData('formatLabel', $formatLabel);
	}
        
        // Identifier
        function getDisplayIdentifier() {
		return $this->getData('displayIdentifier');
	}

	function setDisplayIdentifier($displayIdentifier) {
		return $this->setData('displayIdentifier', $displayIdentifier);
	}
        
	function getIdentifierLabel() {
		return $this->getData('identifierLabel');
	}

	function setIdentifierLabel($identifierLabel) {
		return $this->setData('identifierLabel', $identifierLabel);
	}
        
        // Source
        function getDisplaySource() {
		return $this->getData('displaySource');
	}

	function setDisplaySource($displaySource) {
		return $this->setData('displaySource', $displaySource);
	}
        
	function getSourceLabel() {
		return $this->getData('sourceLabel');
	}

	function setSourceLabel($sourceLabel) {
		return $this->setData('sourceLabel', $sourceLabel);
	}
        
        
        // Language
        function getDisplayLanguage() {
		return $this->getData('displayLanguage');
	}

	function setDisplayLanguage($displayLanguage) {
		return $this->setData('displayLanguage', $displayLanguage);
	}
        
	function getLanguageLabel() {
		return $this->getData('languageLabel');
	}

	function setLanguageLabel($languageLabel) {
		return $this->setData('languageLabel', $languageLabel);
	} 
        
        // Relation
        function getDisplayRelation() {
		return $this->getData('displayRelation');
	}

	function setDisplayRelation($displayRelation) {
		return $this->setData('displayRelation', $displayRelation);
	}
        
	function getRelationLabel() {
		return $this->getData('relationLabel');
	}

	function setRelationLabel($relationLabel) {
		return $this->setData('relationLabel', $relationLabel);
	}
        
        // Coverage
        function getDisplayCoverage() {
		return $this->getData('displayCoverage');
	}

	function setDisplayCoverage($displayCoverage) {
		return $this->setData('displayCoverage', $displayCoverage);
	}
        
	function getCoverageLabel() {
		return $this->getData('coverageLabel');
	}

	function setCoverageLabel($coverageLabel) {
		return $this->setData('coverageLabel', $coverageLabel);
	}
        
        // Rights
        function getDisplayRights() {
		return $this->getData('displayRights');
	}

	function setDisplayRights($displayRights) {
		return $this->setData('displayRights', $displayRights);
	}
        
	function getRightsLabel() {
		return $this->getData('rightsLabel');
	}

	function setRightsLabel($rightsLabel) {
		return $this->setData('rightsLabel', $rightsLabel);
	}        
        
}

?>
