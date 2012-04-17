<?php

class Translator
{
	protected $translator;
	protected $config;

	public function __construct($config)
	{
		$this->config = $config;
	}

	public function setTranslator($translator = null)
	{
		if ($translator !== null)
		{
			$this->translator = $translator;
		}
		else
		{
			$this->translator = $this->config->get('translator');
		}
	}

	public function translate($post, $translator = null)
	{
		$this->setTranslator($translator);
		require_once("translators/translator.php");
		require_once("translators/{$this->translator}/{$this->translator}.php");
		$translator = new $this->translator;
		return $translator->translate($post);
	}


}