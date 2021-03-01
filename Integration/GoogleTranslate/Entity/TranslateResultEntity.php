<?php

namespace Integration\GoogleTranslate\Entity;

use Integration\GoogleTranslate\Utils\LanguageCodeUtil;

class TranslateResultEntity
{
    /**
     * @var LanguageCodeUtil
     */
    public $source;

    /**
     * @var string
     */
    public $inputContent;

    /**
     * @var string
     */
    public $translateText;

    public function __construct($source, $inputContent, $translateText)
    {
        $this->source = $source;
        $this->inputContent = $inputContent;
        $this->translateText = $translateText;
    }
}
