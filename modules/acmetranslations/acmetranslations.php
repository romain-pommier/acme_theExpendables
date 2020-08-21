<?php

if (!defined('_PS_VERSION_'))
	exit;
class AcmeTranslations extends Module {


	/**
	 * AcmeTranslations constructor.
	 */
	public function __construct()
	{
		$this->name = 'acmetranslations';
		$this->tab = 'back_office_features';
		$this->version = '1.0.0';
		$this->author = 'Expendables';
		$this->need_instance = 0;
		$this->bootstrap = true;
		parent::__construct();
		$this->displayName = $this->l('Acme translations');
		$this->ps_versions_compliancy = array('min' => '1.6', 'max' => '1.7.99.99');
	}

	/**
	 * permet de copier les fichiers à override à l'instalation du module
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

	/**
	 * permet de setter du js et css dans le back office
	 */
	public function hookActionAdminControllerSetMedia()
	{

		$this->context->controller->addJs($this->_path.'/views/js/translate.js');
	}


//	/**
//	 * @return bool
//	 */
//    public function uninstallTab()
//    {
//        $id_tab = (int)Tab::getIdFromClassName('AcmeTranslations');
//        if ($id_tab) {
//            $tab = new Tab($id_tab);
//            return $tab->delete();
//        } else
//            return false;
//    }

//	/**
//	 * permet de faire un lien dans le menu du backoffice vers le module
//	 * @return void
//	 */
//    public function installTab()
//    {
//        $tab = new Tab();
//        $tab->active = 1;
//        $tab->name = array();
//        $tab->class_name = 'AcmeTranslations';
//
//        foreach (Language::getLanguages(true) as $lang) {
//            $tab->name[$lang['id_lang']] = 'Traductions';
//        }
//        $tab->id_parent = 10;
//        $tab->module = 'acmetranslations';
//        $tab->add();
//    }

	/**
	 * fonction de désinstalation
	 * @return bool
	 */
	public function uninstall()
	{
		return
			parent::uninstall();
//            $this->uninstallTab() &&
//			Configuration::deleteByName($this->name) &&
//			$this->deleteDir();
	}

	/**
	 * @param $params
	 * permet de linker du javascript
	 */
	public function hookDisplayHeader($params)
	{
		$this->context->controller->addJS($this->_path.'js/translate.js');
//		$this->registerJavascript('modules-algofactorytranslations','modules/'.$this->name.'/js/translate.js', array('server' => 'remote','position' => 'top' ,'priority' => 0) // Arguments
//		);
	}

	/**
	 * permet de créer une page de configuration au module
	 * @return string
	 */
	public function getContent()
	{
		$output = null;

		if (Tools::isSubmit('submit'.$this->name))
		{
			$my_module_name = strval(Tools::getValue('acmetranslations'));
			if (!$my_module_name
			    || empty($my_module_name)
			    || !Validate::isGenericName($my_module_name))
				$output .= $this->displayError($this->l('Invalid Configuration value'));
			else
			{
				Configuration::updateValue('acmetranslations', $my_module_name);
				$output .= $this->displayConfirmation($this->l('Settings updated'));
			}
		}
		return $output.$this->displayForm();
	}

	/**
	 * permet de créer un formulaire de configuration pour le module
	 * @return mixed
	 */
	public function displayForm(){

		$default_lang = (int)Configuration::get('PS_LANG_DEFAULT');

		$fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->l('Settings'),
			),
			'input' => array(
				array(
					'type' => 'text',
					'label' => $this->l('Google Translate API KEY'),
					'name' => 'acmetranslations',
					'size' => 50,
					'required' => true
				),
			),
			'submit' => array(
				'title' => $this->l('Save'),
				'class' => 'btn btn-default pull-right'
			),
		);
		$helper = new HelperForm();
		$helper->module = $this;
		$helper->name_controller = $this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
		$helper->title = $this->displayName;
		$helper->show_toolbar = true;        // false -> remove toolbar
		$helper->toolbar_scroll = true;      // yes - > Toolbar is always visible on the top of the screen.
		$helper->submit_action = 'submit'.$this->name;
		$helper->toolbar_btn = array(
			'save' =>
				array(
					'desc' => $this->l('Save'),
					'href' => AdminController::$currentIndex.'&configure='.$this->name.'&save'.$this->name.
					          '&token='.Tools::getAdminTokenLite('AdminModules'),
				),
			'back' => array(
				'href' => AdminController::$currentIndex.'&token='.Tools::getAdminTokenLite('AdminModules'),
				'desc' => $this->l('Back to list')
			)
		);
		$helper->fields_value['acmetranslations'] = Configuration::get('acmetranslations');
		return $helper->generateForm($fields_form);

	}

	/**
	 * permet de supprimer les overrides lors de la désinstalation
	 * @return void
	 */
	public function deleteDir(){
		@unlink(_PS_OVERRIDE_DIR_.'controllers/admin/templates/translations/helpers/view/af_translation_form.tpl');
	}
}
