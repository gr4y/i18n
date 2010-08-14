<?php

/**
 * 
 * A simple i18n class for php, without using of gettext
 * 
 * @author sascha
 *
 */
class i18n {

	var $directory = null;

	var $lang = null;

	var $country = null;
	
	function __construct(){
		$this->lang = "en";
		$this->directory = dirname(__FILE__)."/locale";
	}

	/**
	 * sets a new directory where i18n is searching for files
	 * @param string $_directory
	 */
	public function setDirectory($_directory){
		$this->directory = $_directory;
		return $this;
	}

	/**
	 * gets the directory where i18n is searching in
	 */
	public function getDirectory(){
		return $this->directory;
	}

	/**
	 * set a new language code
	 * @param string $_lang
	 */
	public function setLang($_lang){
		$this->lang = $_lang;
		return $this;
	}

	/**
	 * gets the language code
	 */
	public function getLang(){
		return $this->lang;
	}
	
	/**
	 * sets the country code
	 * @param string $_country
	 */
	public function setCountry($_country){
		$this->country = $_country;
		return $this;
	}
	
	/**
	 * gets the country code
	 */
	public function getCountry(){
		return $this->country;
	}

	/**
	 * read the localization file for the actual language
	 */
	public function readLocalizationFile(){
		$filename = sprintf("%s/%s.ini",$this->getDirectory(),$this->getLang());
		if(file_exists($filename)){
			$process_sections = ($this->getCountry()!=null);
			return parse_ini_file($filename,$process_sections);
		} else {
			die(sprintf("localization file %s does not exist!",$filename));
		}
	}

	/**
	 * returns the value of the given key
	 * 
	 * @param $_key
	 * @param $_lang (optional)
	 * @param $_country (optional)
	 */
	public function getTranslation($_key,$_lang=null, $_country=null){
		if($_lang) $this->setLang($_lang);
		if($_country) $this->setCountry($_country);
		$object = $this->readLocalizationFile();
		$country = $this->getCountry();
		if($country): return $object[$country][$_key];
		else: return $object[$_key];
		endif;
	}
	
}

?>