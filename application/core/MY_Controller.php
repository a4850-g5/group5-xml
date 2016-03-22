<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 */
class MY_Controller extends CI_Controller {

	protected $data = array();   // parameters for view components
	protected $id;  // identifier for our content

	/**
	 * Constructor.
	 * Establish view parameters & load common helpers
	 */

	function __construct()
	{
		parent::__construct();
		$this->data = array();
		$this->data['siteTitle'] = 'ACIT 4850 - Group 05'; // our default title
		$this->errors = array();
		$this->data['pageTitle'] = 'Welcome';   // our default page
		$this->data['appRoot'] = (strlen(dirname($_SERVER['SCRIPT_NAME'])) === 1 ? "" : dirname($_SERVER['SCRIPT_NAME']));

		/**
		 * Add in additional CSS files used (in the CSS folder) by using
		 * 
		 * 		$this->pageStyles[] = "filename";
		 * 
		 * in the INDIVIDUAL controllers where the filename 
		 * is just the filename WITHOUT the extension
		 */
		$this->pageStyles = array();

		/**
		 * Add in additional JS files used (in the JS folder) by using
		 * 
		 * 		$this->pageScripts[] = "filename";
		 * 
		 * in the INDIVIDUAL controllers where the filename 
		 * is just the filename WITHOUT the extension
		 */
		$this->pageScripts = array();
	}

	/**
	 * Render this page
	 */
	function render()
	{
		$this->data['loadScripts'] = "";
		if (!empty($this->pageScripts))
		{
			$scripts = array();
			foreach ($this->pageScripts as $js)
			{
				$temp['appRoot'] = $this->data['appRoot'];
				$temp['filename'] = $js;
				$scripts['scripts'][] = $temp;
			}

			$this->data['loadScripts'] = $this->parser->parse('__js', $scripts, true);
		}

		$this->data['loadStyles'] = "";
		if (!empty($this->pageStyles))
		{
			$styles = array();
			foreach ($this->pageStyles as $css)
			{
				$temp['appRoot'] = $this->data['appRoot'];
				$temp['filename'] = $css;
				$styles['styles'][] = $temp;
			}
			$this->data['loadStyles'] = $this->parser->parse('__css', $styles, true);
		}

		$this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
		// finally, build the browser page!
		$this->data['data'] = &$this->data;
		$this->parser->parse('_template', $this->data);
	}

}

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */
