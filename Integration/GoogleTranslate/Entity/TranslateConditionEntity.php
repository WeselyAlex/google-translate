<?php

namespace Integration\GoogleTranslate\Entity;

use Integration\GoogleTranslate\Utils\LanguageCodeUtil;

class TranslateConditionEntity
{
    /**
     * @var LanguageCodeUtil
     */
    public $source;

    /**
     * @var LanguageCodeUtil
     */
    public $target;

    /**
     * Acceptable values are `html` or `text`.
     * Defaults to `html`.
     * @var string
     */
    public $format;

    public function __construct($source, $target, $format = 'html')
    {
        $this->source = $source;
        $this->target = $target;
        $this->format = $format;
    }
}
