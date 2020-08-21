<?php

require_once(_PS_MODULE_DIR_.'acmetranslations'.DIRECTORY_SEPARATOR.'libs/autoload.php');



class AcmeTranslationsController extends ModuleAdminController{

    public function __construct()
    {
        parent::__construct();
    }

	/**
	 * @return void
	 */
    public function initContent()
	{
        parent::initContent();

        echo '<pre>';
        var_dump('tytyt');
        echo '</pre>';
        die();
        $this->display_header = false;
		$this->display_header_javascript = false;
		$this->display_footer = false;
		if (Tools::getValue('stringtotranslate')){
			$this->translateOneText();
		}
		else{
			$this->translateAllText();

		}


	}


	/**
	 * permet de traduire une seule chaine de caractere à la fois
	 */
	public function translateOneText(){

		$text = Tools::getValue('stringtotranslate');
		$googleApiKey = Configuration::get('acmetranslations');
		$targetLanguage = Tools::getValue('lang');
		echo '<pre>';
		var_dump($text);
		var_dump($googleApiKey);
		var_dump($targetLanguage);
		echo '</pre>';
		$translate = new Google\Cloud\Translate\TranslateClient();
		$result = $translate->translate($text, [
			'target' => $targetLanguage,
			'key' => $googleApiKey,

		]);
		$jsonresult =  json_encode($result);

		echo $jsonresult;
		die;
	}

	/**
	 * permet de traduire plusieurs chaine de caractère en meme temps
	 */
	public function translateAllText(){
		$text = $_GET['tab'];
		$googleApiKey = Configuration::get('acmetranslations');
		$targetLanguage = Tools::getValue('lang');
		$options = [
			'key' => $googleApiKey,
			'target' => $targetLanguage,
		];
		$translate = new TranslateClient();
		$results = $translate->translateBatch($text,$options);
		foreach ($results as $result) {
			$arrayResults [] =  $result['text'];
		}
		$jsonresult =  json_encode($arrayResults);

		echo $jsonresult;
		die;


	}
}
