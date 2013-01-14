<?php if (!defined('BASEPATH')) exit('Invalid file request');

require_once 'config.php';

/**
 * Module Update
 */
class Module_name_upd
{
	/**
	 * @var EE
	 */
	var $EE;

	/**
	 * @var string
	 */
	var $version = THIS_MODULE_VER;

	/**
	 * @var string
	 */
	var $module_name = "";

	/**
	 * Constructor
	 */
	function __construct()
	{
		$this->EE =& get_instance();
		$this->module_name = str_replace("_upd", "", __CLASS__);
	}


	/**
	 * Install
	 *
	 * @return bool
	 */
	function install()
	{
		//Module
		$this->EE->db->insert('modules', array(
			'module_name' => $this->module_name,
			'module_version' => $this->version,
			'has_cp_backend' => 'n',
			'has_publish_fields' => 'n'
		));

		//Register Actions
		$this->EE->db->insert('actions', array(
			'class' => $this->module_name,
			'method' => 'action_method'
		));

		return TRUE;
	}


	/**
	 * Uninstall
	 *
	 * @return bool
	 */
	function uninstall()
	{
		//Module
		$this->EE->db->where('module_name', $this->module_name)->delete('modules');

		//Actions
		$this->EE->db->where('class', $this->module_name)->delete('actions');

		return TRUE;
	}

}
//END CLASS