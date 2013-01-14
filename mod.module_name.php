<?php if (!defined('BASEPATH')) exit('Invalid file request');

require_once 'config.php';

/**
 * Module Class
 */
class Module_name
{
	/**
	 * @var EE
	 */
	var $EE;

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
		$this->module_name = str_replace("_mcp", "", __CLASS__);
	}
}
//END CLASS