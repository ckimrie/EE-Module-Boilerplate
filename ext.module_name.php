<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'config.php';

/**
 * Extension
 */
class Module_name_ext {

	/**
	 * @var EE
	 */
	var $EE;
	/**
	 * @var string
	 */
	var $name = THIS_MODULE_NAME;

	/**
	 * @var string
	 */
	var $version = THIS_MODULE_VER;

	/**
	 * @var string
	 */
	var $description = THIS_MODULE_DESC;

	/**
	 * @var string
	 */
	var $settings_exist = 'n';

	/**
	 * @var string
	 */
	var $docs_url = THIS_MODULE_DOCS;

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
		$this->module_name = str_replace("_ext", "", __CLASS__);
	}

	/**
	 * Activate Extension
	 *
	 * @return null
	 */
	function activate_extension()
	{
		$this->EE->db->insert('extensions', array(
			'class'    => __CLASS__,
			'method'   => 'extension_method',
			'hook'     => 'nonexistent_hook',
			'settings' => '',
			'priority' => 5,
			'version'  => $this->version,
			'enabled'  => 'y'
		));
		return null;
	}

	/**
	 * Update Extension
	 *
	 * @return null
	 */
	function update_extension($current = FALSE)
	{
		if (! $current || $current == $this->version)
		{
			return FALSE;
		}

		/**
		 * Version Specific Updates
		 *
		if (version_compare($current, '1.0.0', '<'))
		{
			//Code...
		}
		 */

		$this->EE->db->where('class', __CLASS__);
		$this->EE->db->update('extensions', array('version' => $this->version));
	}

	/**
	 * Disable Extension
	 *
	 * @return null
	 */
	function disable_extension()
	{
		$this->EE->db->where('class', __CLASS__)->delete('extensions');
	}
}
//END CLASS