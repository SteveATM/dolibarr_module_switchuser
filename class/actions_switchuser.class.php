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

		global $langs, $user, $db;

		$contexts = explode(':',$parameters['context']);
		$form = new Form($db);

		if(in_array('toprightmenu',$contexts)) {
			if ($user->entity == 0) {
				$hookmanager->resPrint = '<form action="?" name="f1">';
				$hookmanager->resPrint.= '<fieldset>';
				$hookmanager->resPrint.= '<legend>' . $langs->trans('SwitchUserSelect') . '</legend>';
				$hookmanager->resPrint.= '<input type="hidden" name="action" value="switch"/>';
				$hookmanager->resPrint.= $form->select_dolusers('', 'userid', 0, null, 0, '', '', '0', 0, 0, '', 0, '', '', 1);
				$hookmanager->resPrint.= '<button class="button" type="submit" name="switch" value="Switch" >' . $langs->trans('SwitchUser') . '</button>';
				$hookmanager->resPrint.= '</fieldset>';
				$hookmanager->resPrint.= '</form>';
			}
		}

		return 0;
	}
}
