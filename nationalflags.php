<?php
/**
*
* @package Board3 Portal national flag Module
* @copyright (c) 2015 Theriddler ( http://www.phpbbservice.nl )
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace theriddler\b3pnationalflags;

/**
* @package national flags Module
*/
class nationalflags extends \board3\portal\modules\module_base
{
	/**
	* Allowed columns: Just sum up your options (Exp: left + right = 10)
	* top		1
	* left		2
	* center	4
	* right		8
	* bottom	16
	*/
	public $columns = 21;

	/**
	* Default modulename
	*/
	public $name = 'NATIONALFLAGS';

	/**
	* Default module-image:
	* file must be in "{T_THEME_PATH}/images/portal/"
	*/
	public $image_src = '';

	/**
	* module-language file
	* file must be in "language/{$user->lang}/portal/"
	*/
	public $language = array(
		'vendor'	=> 'theriddler/b3pnationalflags',
		'file'		=> 'nationalflags',
	);

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\user */
	protected $user;

	/* @var \rmcgirr83\nationalflags\core\nationalflags */
	protected $functions;

	/** @var string phpBB root path */
	protected $root_path;

	/** @var string PHP extension */
	protected $phpEx;

	public function __construct(\phpbb\config\config $config, \phpbb\db\driver\driver_interface $db, \phpbb\template\template $template, \phpbb\user $user, \rmcgirr83\nationalflags\core\nationalflags $functions, $root_path, $phpEx)
	{
		$this->config = $config;
		$this->db = $db;
		$this->template = $template;
		$this->user = $user;
		$this->root_path = $root_path;
		$this->phpEx = $phpEx;
		$this->functions = $functions;
	}

	/**
	* {@inheritdoc}
	*/
	public function get_template_center($module_id)
	{
		//display flags
		$this->functions->top_flags();

		return '@theriddler_b3pnationalflags/nationalflags_center.html';
	}
	
	/**
	* {@inheritdoc}
	*/
	public function get_template_acp($module_id)
	{
		return array(
			'title'	=> 'NATIONALFLAGS',
			'vars'	=> array(
		),
	);
	}

	/**
	* {@inheritdoc}
	*/
	public function install($module_id)
	{
		$this->config->delete('theriddler_b3pnationalflags' . $module_id);
		$this->config->delete('theriddler_b3pnationalflags' . $module_id);
		return true;
	}

	/**
	* {@inheritdoc}
	*/
	public function uninstall($module_id, $db)
	{
		$this->config->delete('theriddler_b3pnationalflags' . $module_id);
		$this->config->delete('theriddler_b3pnationalflags' . $module_id);
		return true;
	}
}