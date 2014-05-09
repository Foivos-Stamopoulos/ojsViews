<?php

/**
 * @file plugins/generic/customView/CustomViewDAO.inc.php
 *
 * Copyright (c) 2014 Sotirios-Fivos Stamopoulos
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class CustomViewDAO
 * @ingroup plugins_generic_customView
 *
 * @brief Operations for retrieving and modifying CustomView objects.
 */

import('lib.pkp.classes.db.DAO');

class CustomViewDAO extends DAO {
	/** @var $parentPluginName string Name of parent plugin */
	var $parentPluginName;

	/**
	 * Constructor
	 */
	function CustomViewDAO($parentPluginName) {
		$this->parentPluginName = $parentPluginName;
		parent::DAO();
	}

	/**
	 * Retrieve a CustomView by ID.
	 * @param $viewId int
	 * @return CustomView
	 */
	function &getCustomView($viewId) {
		$result =& $this->retrieve(
			'SELECT * FROM views WHERE view_id = ?', $viewId
		);

		$returner = null;
		if ($result->RecordCount() != 0) {
			$returner =& $this->_returnCustomViewFromRow($result->GetRowAssoc(false));
		}
		$result->Close();
		return $returner;
	}

		/**
	 * Retrieve custom view journal ID by view ID.
	 * @param $viewId int
	 * @return int
	 */
	function getCustomViewJournalId($viewId) {
		$result =& $this->retrieve(
			'SELECT journal_id FROM views WHERE view_id = ?', $viewId
		);

		return isset($result->fields[0]) ? $result->fields[0] : 0;	
	}

	/**
	 * Internal function to return CustomView object from a row.
	 * @param $row array
	 * @return CustomView
	 */
	function &_returnCustomViewFromRow(&$row) {
		$customViewPlugin =& PluginRegistry::getPlugin('generic', $this->parentPluginName);
		$customViewPlugin->import('CustomView');

		$customView = new CustomView();
		$customView->setId($row['view_id']);
		$customView->setJournalId($row['journal_id']);
                $customView->setDisplayTitle($row['display_title']);
                $customView->setTitleLabel($row['title_label']);		
                $customView->setDisplayCreator($row['display_creator']);
                $customView->setCreatorLabel($row['creator_label']);
                $customView->setDisplaySubject($row['display_subject']);
                $customView->setSubjectLabel($row['subject_label']);
                $customView->setDisplayKeywords($row['display_keywords']);
                $customView->setKeywordsLabel($row['keywords_label']);
                $customView->setDisplayDescription($row['display_description']);
                $customView->setDescriptionLabel($row['description_label']);
                $customView->setDisplayPublisher($row['display_publisher']);
                $customView->setPublisherLabel($row['publisher_label']);
                $customView->setDisplayContributor($row['display_contributor']);
                $customView->setContributorLabel($row['contributor_label']);
                $customView->setDisplayDate($row['display_date']);
                $customView->setDateLabel($row['date_label']);
                $customView->setDisplayStatus($row['display_status']);
                $customView->setStatusLabel($row['status_label']);
                $customView->setDisplayType($row['display_type']);
                $customView->setTypeLabel($row['type_label']);
                $customView->setDisplayFormat($row['display_format']);
                $customView->setFormatLabel($row['format_label']);
                $customView->setDisplayIdentifier($row['display_identifier']);
                $customView->setIdentifierLabel($row['identifier_label']);
                $customView->setDisplaySource($row['display_source']);
                $customView->setSourceLabel($row['source_label']);
                $customView->setDisplayLanguage($row['display_language']);
                $customView->setLanguageLabel($row['language_label']);
                $customView->setDisplayRelation($row['display_relation']);
                $customView->setRelationLabel($row['relation_label']);
                $customView->setDisplayCoverage($row['display_coverage']);
                $customView->setCoverageLabel($row['coverage_label']);
                $customView->setDisplayRights($row['display_rights']);
                $customView->setRightsLabel($row['rights_label']);

		return $customView;
	}

	/**
	 * Insert a new custom view.
	 * @param $customView
	 * @return int 
	 */
	function insertCustomView($journalId) {
            
                $title = 'Title';
                $creator = 'Creator';
                $subject = 'Subject';
                $keywords = 'Keywords';
                $description = 'Description';
                $publisher = 'Publisher';
                $contributor = 'Contributor';
                $date = 'Date';
                $status = 'Status';
                $type = 'Type';
                $format = 'Format';
                $identifier = 'Identifier';
                $source = 'Source';
                $language = 'Language';
                $relation = 'Relation';
                $coverage = 'Coverage';                
                $rights = 'Rights';
                
		$ret = $this->update(
			'INSERT INTO views
				(journal_id,
                                display_title,
                                title_label,
                                display_creator,
                                creator_label,
                                display_subject,
                                subject_label,
                                display_keywords,
                                keywords_label,
                                display_description,
                                description_label,
                                display_publisher,
                                publisher_label,
                                display_contributor,
                                contributor_label,
                                display_date,
                                date_label,
                                display_status,
                                status_label,
                                display_type,
                                type_label,
                                display_format,
                                format_label,
                                display_identifier,
                                identifier_label,
                                display_source,
                                source_label,
                                display_language,
                                language_label,
                                display_relation,
                                relation_label,
                                display_coverage,
                                coverage_label,
                                display_rights,
                                rights_label
				)
			VALUES
				(?, 1, ?, 1, ?, 1, ?, 1, ?, 1, ?, 1, ?, 1, ?, 1, ?, 1, ?, 1, ?, 1, ?, 1, ?, 1, ?, 1, ?, 1, ?, 1, ?, 1, ? )',                        
			
                        array(
                                $journalId,
                                $title,
                                $creator,
                                $subject,
                                $keywords,
                                $description,
                                $publisher,
                                $contributor,
                                $date,
                                $status,
                                $type,
                                $format,
                                $identifier,
                                $source,
                                $language,
                                $relation,
                                $coverage,
                                $rights                                                                                                      
			)                        
		);
		//$customView->setId($this->getInsertCustomViewId());

		//$this->updateLocaleFields($customView);

		//return $customView->getId();
	}
         
         
	
		/**
	 * Update the localized fields for this object.
	 * @param $customView
	 *
	function updateLocaleFields(&$customView) {
		$this->updateDataObjectSettings('views', $customView, array(
			'view_id' => $customView->getId()
		));
	}
                 * 
                 */
        

	/**
	 * Update an existing custom view.
	 * @param $customView CustomView
	 * @return boolean
	 */
	function updateCustomView(&$customView) {
            //echo $customView->getId();
            //echo $customView->getJournalId();
            //echo $customView->getDisplayTitle();
            //echo $customView->getTitleLabel();
		$this->update(
			'UPDATE views
				SET
					journal_id = ?,
					display_title = ?,
					title_label = ?,
                                        display_creator = ?,
                                        creator_label = ?,
                                        display_subject = ?,
                                        subject_label = ?,
                                        display_keywords = ?,
                                        keywords_label = ?,
                                        display_description = ?,
                                        description_label = ?,
                                        display_publisher = ?,
                                        publisher_label = ?,
                                        display_contributor = ?,
                                        contributor_label = ?,
                                        display_date = ?,
                                        date_label = ?,
                                        display_status = ?,
                                        status_label = ?,
                                        display_type = ?,
                                        type_label = ?,
                                        display_format = ?,
                                        format_label = ?,
                                        display_identifier = ?,
                                        identifier_label = ?,
                                        display_source = ?,
                                        source_label = ?,
                                        display_language = ?,
                                        language_label = ?,
                                        display_relation = ?,
                                        relation_label = ?,
                                        display_coverage = ?,
                                        coverage_label = ?,
                                        display_rights = ?,
                                        rights_label = ?
			WHERE view_id = ?',
			array(
				$customView->getJournalId(),
				$customView->getDisplayTitle(),
                                $customView->getTitleLabel(),
                                $customView->getDisplayCreator(),
                                $customView->getCreatorLabel(),
                                $customView->getDisplaySubject(),
                                $customView->getSubjectLabel(),
                                $customView->getDisplayKeywords(),
                                $customView->getKeywordsLabel(),
                                $customView->getDisplayDescription(),
                                $customView->getDescriptionLabel(),
                                $customView->getDisplayPublisher(),
                                $customView->getPublisherLabel(),
                                $customView->getDisplayContributor(),
                                $customView->getContributorLabel(),
                                $customView->getDisplayDate(),
                                $customView->getDateLabel(),
                                $customView->getDisplayStatus(),
                                $customView->getStatusLabel(),
                                $customView->getDisplayType(),
                                $customView->getTypeLabel(),
                                $customView->getDisplayFormat(),
                                $customView->getFormatLabel(),
                                $customView->getDisplayIdentifier(),
                                $customView->getIdentifierLabel(),
                                $customView->getDisplaySource(),
                                $customView->getSourceLabel(),
                                $customView->getDisplayLanguage(),
                                $customView->getLanguageLabel(),
                                $customView->getDisplayRelation(),
                                $customView->getRelationLabel(),
                                $customView->getDisplayCoverage(),
                                $customView->getCoverageLabel(),
                                $customView->getDisplayRights(),
                                $customView->getRightsLabel(),
				$customView->getId()
			)
		);
                //echo $customView->getTitleLabel();
		//$this->updateLocaleFields($customView);
	}	
	
	/**
	 * Retrieve custom views matching a particular journal ID.
	 * @param $journalId int
	 * @param $rangeInfo object DBRangeInfo object describing range of results to return
	 * @return object DAOResultFactory containing matching Custom Views 
	 */
	function &getCustomViewsByJournalId($journalId, $rangeInfo = null) {
		$result =& $this->retrieveRange(
			'SELECT * FROM views WHERE journal_id = ?',
			$journalId,
			$rangeInfo
		);

		$returner = new DAOResultFactory($result, $this, '_returnCustomViewFromRow');
		return $returner;
	}

	/**
	 * Get the ID of the last inserted custom view.
	 * @return int
	 *
	function getInsertCustomViewId() {
		return $this->getInsertId('views', 'view_id');
	}
        */
         
	function deleteViewById($journalId) {
		$this->update(
			'DELETE FROM views WHERE journal_id = ?', $journalId
		);        
        }
        
        function checkExistingView($journalId){
                $result =& $this->retrieve(
			'SELECT view_id FROM views WHERE journal_id = ?', $journalId
		); 
                $returner = null;
		if ($result->RecordCount() != 0) {
			$returner =& $this->_returnViewIdFromRow($result->GetRowAssoc(false));
		}
		$result->Close();
		return $returner;
        }
        
        function &_returnViewIdFromRow(&$row) {
		$customViewPlugin =& PluginRegistry::getPlugin('generic', $this->parentPluginName);
		$customViewPlugin->import('CustomView');

		$customView = new CustomView();
		$customView->setId($row['view_id']);

		return $customView;
	}
        
        function deleteExistingView($viewId){
                $this->update(
			'DELETE FROM views WHERE view_id = ?', $viewId
		); 
        }
        
}

?>
