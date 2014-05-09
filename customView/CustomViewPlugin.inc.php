<?php

/**
 * @file plugins/generic/customView/customViewPlugin.inc.php
 *
 * Copyright (c) 2014 Sotirios-Fivos Stamopoulos
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class CustomViewPlugin
 * @ingroup plugins_generic_customView
 *
 * @brief Class for customView
 */

import('lib.pkp.classes.plugins.GenericPlugin');

class CustomViewPlugin extends GenericPlugin {
        

	function register($category, $path) { 
                $success = parent::register($category, $path);
                
                if ($success && $this->getEnabled()) {					
				$this->import('CustomViewDAO');
                                
				$customViewDao = &new CustomViewDAO($this->getName());
				$returner = &DAORegistry::registerDAO('CustomViewDAO', $customViewDao);
                                
                                $templateMgr =& TemplateManager::getManager();
                                $templateMgr->addStyleSheet(Request::getBaseUrl() . '/' . $this->getDefaultStyleSheetFile());
                                
			HookRegistry::register( 'Templates::Article::Footer::PageFooter', array(&$this, 'callback')); 		
			}
		return $success;
	}               
        
        /**
	 * Get the display name of this plugin.
	 * @return String
	 */
	function getDisplayName() {
		return __('plugins.generic.customView.displayName');
	}
        
     	/**
	 * Get a description of the plugin.
	 */
	function getDescription() {
		return __('plugins.generic.customView.description');
	}
        
        		/**
	 * Get the filename of the ADODB schema for this plugin.
	 */
	function getInstallSchemaFile() {
		return $this->getPluginPath() . '/' . 'schema.xml';
	}
        
        /**
	 * Get the filename of the default CSS stylesheet for this plugin.
	 */
	function getDefaultStyleSheetFile() {
		return $this->getPluginPath() . '/' . 'customView.css';
	}
	
	function callback($hookName, $args) {
                $journal =& Request::getJournal();
		$journalId = $journal?$journal->getId():0;
                
		if($this->getEnabled()){
                        $requestedPage = Request::getRequestedPage();
                        
                        //$params =& $args[0]; 
			//$smarty =& $args[1]; 
			$output =& $args[2]; 
                        
			//if (empty($requestedPage) || $requestedPage == 'index') {
				$customViewDao =& DAORegistry::getDAO('CustomViewDAO');				
				$views =& $customViewDao->getCustomViewsByJournalId($journal->getId());
                                $templateMgr = TemplateManager::getManager();
                                $article = $templateMgr->get_template_vars('article');                                                               				
                                
                                while ($currentView =& $views->next()) 
                                {
                                    
                                        $this->import('CustomView');
                                        if($currentView->getDisplayTitle()==1){                                            
                                            $output .= '<h4 id="label">' . $currentView->getTitleLabel() . '</h4>';                                            
                                            $output .= '</br>';
                                            $title = $article->getLocalizedTitle();
                                            if(isset($title)){
                                            $output .= '<h5 id="data">' . $article->getLocalizedTitle() . '</h5>';
                                            }
                                            else{
                                                $output .= '<h5 id="data">' . '-' . '</h5>';
                                            }
                                            $output .= '</br>';
                                        }
                                        
                                        
                                        if($currentView->getDisplayCreator()==1){
                                            $output .= '<h4 id="label">' . $currentView->getCreatorLabel() . '</h4>';
                                            $output .= '</br>';
                                            $authors = $article->getAuthors();
                                            //$count = count($authors);
                                                                                      
                                            foreach ($authors as $author){
                                                $output .= '<h5 id="data">' .$author->getFullName(). '</h5>';
                                            }
                                            $output .= '</br>';
                                            $output .= '</br>';
                                        }
                                        
                                        
                                        if($currentView->getDisplaySubject()==1){
                                            $output .= '<h4 id="label">' . $currentView->getSubjectLabel() . '</h4>';
                                            $output .= '</br>';
                                            $subject = $article->getLocalizedDiscipline();
                                            if(isset($subject)){
                                                $output .= '<h5 id="data">' . $article->getLocalizedDiscipline() . '</h5>';
                                            }
                                            else{
                                                $output .= '<h5 id="data">' . '-' . '</h5>';
                                            }
                                            $output .= '</br>';
                                            
                                        }
                                        
                                        if($currentView->getDisplayKeywords()==1){
                                            $output .= '<h4 id="label">' . $currentView->getKeywordsLabel() . '</h4>';
                                            $output .= '</br>';
                                            $keywords = $article->getLocalizedSubject();
                                            if(isset($keywords)){
                                                $output .= '<h5 id="data">' . $article->getLocalizedSubject() . '</h5>';
                                            }
                                            else{
                                               $output .= '<h5 id="data">' . '-' . '</h5>'; 
                                            }
                                            $output .= '</br>';
                                            
                                        }
                                        
                                        if($currentView->getDisplayDescription()==1){
                                            $output .= '<h4 id="label">' . $currentView->getDescriptionLabel() . '</h4>';
                                            $output .= '</br>';
                                            $description = $article->getLocalizedAbstract();
                                            if(isset($description)){
                                                $output .= '<h5 id="data">' . $description . '</h5>';
                                            }
                                            else{
                                                $output .= '<h5 id="data">' . '-' . '</h5>';
                                            }
                                            $output .= '</br>';                                            
                                        }
                                                                                
                                        if($currentView->getDisplayPublisher()==1){
                                            $output .= '<h4 id="label">' . $currentView->getPublisherLabel() . '</h4>';
                                            $output .= '</br>';
                                                                                        
                                                $output .= $templateMgr->fetch($this->getTemplatePath() . 'publisherView.tpl');
                                            
                                            $output .= '</br>';
                                            $output .= '</br>';                                            
                                        }                                        
                                        
                                        if($currentView->getDisplayContributor()==1){
                                            $output .= '<h4 id="label">' . $currentView->getContributorLabel() . '</h4>';
                                            $output .= '</br>';
                                            $sponsor=$article->getLocalizedSponsor();
                                            if(isset($sponsor)){
                                                $output .= '<h5 id="data">' . $article->getLocalizedSponsor() . '</h5>';
                                            }
                                            else
                                            {
                                                $output .= '<h5 id="data">' .'-'. '</h5>';  
                                            }
                                            $output .= '</br>';                                                                                        
                                        }                                        
                                        
                                        if($currentView->getDisplayDate()==1){
                                            $output .= '<h4 id="label">' . $currentView->getDateLabel() . '</h4>';
                                            $output .= '</br>';
                                            $date = $article->getDatePublished();                                            
                                            $date1 = substr($date,0,10);    //without time created                                         
                                            if(isset($date)){
                                                $output .= '<h5 id="data">' . $date1. '</h5>';                                                
                                            }
                                            else{
                                                $output .= '<h5 id="data">' . '-' . '</h5>';    
                                            }
                                            $output .= '</br>';
                                        }
                                        
                                        if($currentView->getDisplayStatus()==1){
                                            $output .= '<h4 id="label">' . $currentView->getStatusLabel() . '</h4>';
                                            $output .= '</br>';
                                                                                        
                                                $output .= $templateMgr->fetch($this->getTemplatePath() . 'statusView.tpl');
                                            
                                            $output .= '</br>';
                                            $output .= '</br>';                                            
                                        }
                                                                                                                        
                                        if($currentView->getDisplayType()==1){
                                            $output .= '<h4 id="label">' . $currentView->getTypeLabel() . '</h4>';
                                            $output .= '</br>';
                                            $type = $article->getLocalizedType();
                                            if(isset($type)){
                                                $output .= '<h5 id="data">' . $article->getLocalizedType() . '</h5>';
                                            }
                                            else{
                                                $output .= '<h5>' . '-' . '</h5>';
                                            }
                                            $output .= '</br>';                                            
                                        }
                                        
                                        if($currentView->getDisplayFormat()==1){
                                            $output .= '<h4 id="label">' . $currentView->getFormatLabel() . '</h4>';
                                            $output .= '</br>';
                                                                                        
                                                $output .= $templateMgr->fetch($this->getTemplatePath() . 'formatView.tpl');
                                           
                                            $output .= '</br>';
                                            $output .= '</br>';                                            
                                        }
                                        
                                        if($currentView->getDisplayIdentifier()==1){
                                            $output .= '<h4 id="label">' . $currentView->getIdentifierLabel() . '</h4>';
                                            $output .= '</br>';
                                                                                        
                                                $output .= $templateMgr->fetch($this->getTemplatePath() . 'identifierView.tpl');
                                            
                                            $output .= '</br>';
                                            $output .= '</br>';                                            
                                        }
                                        
                                        if($currentView->getDisplaySource()==1){
                                            $output .= '<h4 id="label">' . $currentView->getSourceLabel() . '</h4>';
                                            $output .= '</br>';
                                                                                        
                                                $output .= $templateMgr->fetch($this->getTemplatePath() . 'sourceView.tpl');
                                            
                                            $output .= '</br>';
                                            $output .= '</br>';                                            
                                        }
                                        
                                        if($currentView->getDisplayLanguage()==1){
                                            $output .= '<h4 id="label">' . $currentView->getLanguageLabel() . '</h4>';
                                            $output .= '</br>';
                                            $language = $article->getLanguage();
                                            if(isset($language)){
                                                $output .= '<h5 id="data">' . $article->getLanguage() . '</h5>';
                                                
                                            }
                                            else{
                                                $output .= '<h5 id="data">' . '-' . '</h5>';
                                            }
                                            $output .= '</br>';                                            
                                        }
                                                                                
                                        if($currentView->getDisplayRelation()==1){
                                            $output .= '<h4>' . $currentView->getRelationLabel() . '</h4>';
                                            $output .= '</br>';
                                            $relation = $article->getSuppFiles();
                                            $count = count($relation);                                            
                                            if($count!=0){
                                                //$output .= '<h5>' . $article->getSuppFiles() . '</h5>';
                                                $output .= $templateMgr->fetch($this->getTemplatePath() . 'relationView.tpl');
                                            }
                                            else{
                                                $output .= '<h5>' . '-' . '</h5>';
                                            }
                                            $output .= '</br>';                                            
                                        }
                                                                                
                                        if($currentView->getDisplayCoverage()==1){
                                            $output .= '<h4 id="label">' . $currentView->getCoverageLabel() . '</h4>';
                                            $output .= '</br>';
                                            $coverage = $article->getLocalizedCoverageGeo();
                                            if(isset($coverage)){
                                            //    $output .= '<h5>' . $coverage . '</h5>'; 
                                                $output .= $templateMgr->fetch($this->getTemplatePath() . 'coverageView.tpl');
                                            }
                                            else{
                                                $output .= '<h5 id="data">' . '-' . '</h5>';
                                            }
                                            $output .= '</br>'; 
                                            $output .= '</br>';
                                        }
                                        
                                        if($currentView->getDisplayRights()==1){
                                            $output .= '<h4 id="label">' . $currentView->getRightsLabel() . '</h4>';
                                            $output .= '</br>';
                                            
                                            //if(isset($subject)){
                                                $output .= $templateMgr->fetch($this->getTemplatePath() . 'rightsView.tpl');
                                            //}
                                            //else{
                                            //    $output .= '<h5 id="data">' . '-' . '</h5>';
                                            //}
                                            $output .= '</br>';
                                            $output .= '</br>';                                            
                                        }                                                                                                                        
				}
                                        
                        //}                                                   
		}
        //return false; 
    }
    
    	/**
	 * Extend the {url ...} smarty to support customView plugin.
	 */
	function smartyPluginUrl($params, &$smarty) {
		$path = array($this->getCategory(), $this->getName());
		if (is_array($params['path'])) {
			$params['path'] = array_merge($path, $params['path']);
		} elseif (!empty($params['path'])) {
			$params['path'] = array_merge($path, array($params['path']));
		} else {
			$params['path'] = $path;
		}

		if (!empty($params['id'])) {
			$params['path'] = array_merge($params['path'], array($params['id']));
			unset($params['id']);
		}
		return $smarty->smartyUrl($params, $smarty);
	}
        
        
        
	/**
	 * Display verbs for the management interface.
	 */
	function getManagementVerbs() {
		$verbs = array();
                $journal =& Request::getJournal();
                $journalId = $journal->getId();
                //$customViewDao =& DAORegistry::getDAO('CustomViewDAO');
		if ($this->getEnabled()) {                                        		
			$verbs[] = array(
				'disable',
				Locale::translate('manager.plugins.disable')
			);
                        $verbs[] = array('views', __('plugins.generic.customView.views'));
                        //$verbs[] = array('initialize', __('plugins.generic.customView.initialize'));
                        //$verbs[] = array('clear', __('plugins.generic.customView.clear'));
                        $verbs[] = array('delete', __('plugins.generic.customView.delete'));
                        //kathe fora pou kanw refresh ti selida ftiaxnei k alli eggrafi!!
                        //EBALA ELEGXO, WSTE AN YPARXEI HDH TO JOURNAL ID NA MIN FTIAXNEI NEA EGGRAFI!!
                        
                        $customViewDao =& DAORegistry::getDAO('CustomViewDAO');                   
                        $viewId = $customViewDao->checkExistingView($journalId);
                        //echo 'journal Id =' . $journalId;
                        //echo 'view id='. $viewId;
                        if($viewId == null){
                            $customViewDao =& DAORegistry::getDAO('CustomViewDAO');                   
                            $customViewDao->insertCustomView($journalId);
                        }
                        else{
                            
                            //do nothing
                        }
		} else {
			$verbs[] = array(
				'enable',
				Locale::translate('manager.plugins.enable')
			); 
                        
                        if($journalId!=null){
                            $this->import('CustomViewDAO');
                            $customViewDao =& DAORegistry::getDAO('CustomViewDAO');
                            $customViewDao->deleteViewById($journalId);
                        }
		}
		return $verbs;
				
	}
                
	
	function manage($verb, $args, &$message, &$messageParams) {
		if (!parent::manage($verb, $args, $message, $messageParams)) return false;
		
		$templateMgr =& TemplateManager::getManager();
		$templateMgr->register_function('plugin_url', array(&$this, 'smartyPluginUrl'));
		$journal =& Request::getJournal();
		$journalId = $journal->getId();
		
		switch ($verb) {
                        //case 'disable':
                                   //$this->import('CustomViewDAO');
                                   //$customViewDao =& DAORegistry::getDAO('CustomViewDAO');
                                   //$customViewDao->deleteViewById($journalId);
                                
                        //case 'delete':
                                //$customViewDao =& DAORegistry::getDAO('CustomViewDAO');
                                //$customViewDao->deleteViewById($journalId);
			case 'editViews':				
				$customViewId = !isset($args) || empty($args) ? null : (int) $args[0];
				$customViewDao =& DAORegistry::getDAO('CustomViewDAO');

				// Ensure customView is valid and for this journal
				if (($customViewId != null && $customViewDao->getCustomViewJournalId($customViewId) == $journalId) || ($customViewId == null)) {
					$this->import('EditViews');

					$journalSettingsDao =& DAORegistry::getDAO('JournalSettingsDAO');
					$journalSettings =& $journalSettingsDao->getJournalSettings($journalId);

					$editViews = new EditViews($this, $customViewId);
					if ($editViews->isLocaleResubmit()) {
						$editViews->readInputData();
					} else {
						$editViews->initData();
					}
					//$this->setBreadCrumbs(true);
					$templateMgr->assign('journalSettings', $journalSettings);
					$editViews->display();
				} //else {
				//	Request::redirect(null, 'manager', 'plugin', array('generic', $this->getName(), 'views'));
				//}
				return true;
                        //case 'initialize':
                            //pairnw to journalId k kalw tin insert apo to DAO
                            //$journal =& Request::getJournal();
                            //$journalId = $journal->getId();
                            //$customViewDao =& DAORegistry::getDAO('CustomViewDAO');
                            //$customViewDao->insertCustomView($journalId);
                        //case 'clear':
                                //$customViewDao =& DAORegistry::getDAO('CustomViewDAO');
                                //$customViewDao->deleteViewById($journalId);
                                //Request::redirect(null, 'manager', 'plugin', null);
                        case 'update':
				$customViewId = Request::getUserVar('viewId') == null ? null : (int) Request::getUserVar('viewId');
				$customViewDao =& DAORegistry::getDAO('CustomViewDAO');

				if (($customViewId != null && $customViewDao->getCustomViewJournalId($customViewId) == $journalId) || $customViewId == null) {

					$this->import('EditViews');
					$editViews = new EditViews($this, $customViewId);
					$editViews->readInputData();

					if ($editViews->validate()) {
						$editViews->execute();

						Request::redirect(null, 'manager', 'plugin', array('generic', $this->getName(), 'views'));
						
					} else {
						$journalSettingsDao =& DAORegistry::getDAO('JournalSettingsDAO');
						$journalSettings =& $journalSettingsDao->getJournalSettings($journalId);

						//$this->setBreadCrumbs(true);
						$templateMgr->assign('journalSettings', $journalSettings);
						$editViews->display();
					}
				} else {
					Request::redirect(null, 'manager', 'plugin', array('generic', $this->getName(), 'views'));
				}
				return true;
                        case 'views':
			default:
				// Unknown management verb
				//assert(false);
				//return false;
                            	$this->import('CustomView');
				$rangeInfo =& Handler::getRangeInfo('views');
				$customViewDao =& DAORegistry::getDAO('CustomViewDAO');
				$views =& $customViewDao->getCustomViewsByJournalId($journalId, $rangeInfo);
				$templateMgr->assign('views', $views);
				//$this->setBreadCrumbs();

				$templateMgr->display($this->getTemplatePath() . 'views.tpl');
				return true;
		}
	}                
}


?>
