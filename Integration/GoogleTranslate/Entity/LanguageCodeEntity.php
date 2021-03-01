<?php

namespace Integration\GoogleTranslate\Entity;

class LanguageCodeEntity
{
    /**
     * @var string
     */
    public $language;

    /**
     * @var string
     */
    public $code;

    public function __construct($language, $code)
    {
        $this->language = $language;
        $this->code = $code;
    }
}
