<?php

class ActionsSwitchuser
{
	/**
	 * @var array Hook results. Propagated to $hookmanager->resArray for later reuse
	 */
	public $results = array();

	/**
	 * @var string String displayed by executeHook() immediately after return
	 */
	public $resprints;

	/**
	 * @var array Errors
	 */
	public $errors = array();

	/**
	 * Constructor
	 */
	public function __construct()
	{
	}

	/**
	 * Overloading the printTopRightMenuLoginDropdownBody function : replacing the parent's function with the one below
	 *
	 * @param   array()         $parameters     Hook metadatas (context, etc...)
	 * @param   CommonObject    &$object        The object to process (an invoice if you are in invoice module, a propale in propale's module, etc...)
	 * @param   string          &$action        Current action (if set). Generally create or edit or null
	 * @param   HookManager     $hookmanager    Hook manager propagated to allow calling another hook
	 * @return  int                             < 0 on error, 0 on success, 1 to replace standard code
	 */
	function printTopRightMenuLoginDropdownBody($parameters, &$object, &$action, $hookmanager) {

		global $dropdownBody, $langs;

		$contexts = explode(':',$parameters['context']);

		if(in_array('toprightmenu',$contexts)) {

			$hookmanager->resPrint = '<span id="topmenumcmoreinfo-btn"><i class="fa fa-caret-right"></i> '.$langs->trans("Biduledemachin").'</span>';

			//$dropdownBody = '';
			//$dropdownBody.= '<span id="topmenumcmoreinfo-btn"><i class="fa fa-caret-right"></i> '.$langs->trans("ShowMoreInfos").'</span>';
			//$dropdownBody.= '<div id="topmenumcmoreinfo" >';
			//$dropdownBody.= '<br><u>'.$langs->trans("Entity").'</u>'."\n";
			//$dropdownBody.= '<br><b>'.$langs->trans("Label").'</b>: '.$this->label."\n";
			//$dropdownBody.= '<br><b>'.$langs->trans("Country").'</b>: '. ($imgCountry?$imgCountry.' ':'') . $country."\n";
			//$dropdownBody.= '<br><b>'.$langs->trans("Currency").'</b>: '. currency_name($this->currency_code) . ' (' . $langs->getCurrencySymbol($this->currency_code) . ')'."\n";
			//$dropdownBody.= '<br><b>'.$langs->trans("Language").'</b>: '. ($imgLang?$imgLang.' ':'') . ($this->language_code=='auto'?$langs->trans("AutoDetectLang"):$langs->trans("Language_".$this->language_code));
			//if (! empty($this->description)) $dropdownBody.= '<br><b>'.$langs->trans("Description").'</b>: '.$this->description."\n";
			//$dropdownBody.= '</div>';

		}

		return 0;
	}
}
