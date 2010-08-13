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
	 * set a new contry code
	 * @param string $_lang
	 */
	public function setLang($_lang){
		$this->lang = $_lang;
		return $this;
	}

	/**
	 * gets the country code
	 */
	public function getLang(){
		return $this->lang;
	}

	/**
	 * read the localization file for the actual language
	 */
	public function readLocalizationFile(){
		$filename = sprintf("%s/%s.ini",$this->getDirectory(),$this->getLang());
		if(file_exists($filename)){			
			$content = parse_ini_file($filename);
			return $content;
		} else {
			die(sprintf("localization file %s does not exist!",$filename));
		}
	}

	/**
	 * returns the value of the given key
	 * @param $_key
	 */
	public function getTranslation($_key){
		$object = $this->readLocalizationFile();
		return $object[$_key];
	}

}

?>