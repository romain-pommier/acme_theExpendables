<?php
/*
* 2007-2016 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_'))
    exit;

class AcmeStyle extends Module
{

	/**
	 * AcmeStyle constructor.
	 */
    public function __construct()
    {
        $this->name = 'acmestyle';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Expendables';
        $this->need_instance = 0;

        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->l('Acme Styles');
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => '1.7.99.99');
    }


	/**
	 * fonctions d'instalation du module
	 * @return bool
	 */
	public function install()
	{
		if (!parent::install()) {
			return false;
		}

		// After a module installation, register the hook
		if (!$this->registerHook('actionAdminControllerSetMedia')) {
			return false;
		}
		if (!$this->registerHook('displayHeader')) {
			return false;
		}

		return true;
	}

//    public function install()
//    {
//        return
//            parent::install() &&
//             &&
//            $this->registerHook('displayBackOfficeHeader') &&
//            $this->registerHook('actionAdminControllerSetMedia');
//    }

	/**
	 * Permet de setter du js / css sur le front office
	 *
	 * @param $params
	 *
	 * @return void
	 */
    public function hookDisplayHeader($params)
    {
        $this->context->controller->addCSS($this->_path.'acme.css', 'all');
        $this->context->controller->addJs($this->_path.'acme.js', 'all');
    }

	/**
	 * permet de setter du js et css dans le back office
	 */
	public function hookActionAdminControllerSetMedia()
	{

		$this->context->controller->addCss($this->_path.'acme.css');
		$this->context->controller->addJs($this->_path.'acme.js');
	}


	public function hookDisplayBackOfficeHeader($params)

	{
		$this->context->controller->addCss($this->_path.'acme.css');
		$this->context->controller->addJs($this->_path.'acme.js');
	}
}
