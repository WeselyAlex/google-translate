<?php

namespace Integration\GoogleTranslate\Entity;

use Integration\GoogleTranslate\Utils\LanguageCodeUtil;

class DetectResultEntity
{
    /**
     * @var LanguageCodeUtil
     */
    public $languageCode;

    /**
     * @var string
     */
    public $inputContent;

    /**
     * @var float
     */
    public $confidence;

    public function __construct($languageCode, $inputContent, $confidence)
    {
        $this->languageCode = $languageCode;
        $this->inputContent = $inputContent;
        $this->confidence = $confidence;
    }
}
