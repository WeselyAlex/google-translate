<?php

namespace Integration\GoogleTranslate;

use Google\Cloud\Translate\V2\TranslateClient;
use Integration\GoogleTranslate\Entity\DetectResultEntity;
use Integration\GoogleTranslate\Entity\LanguageCodeEntity;
use Integration\GoogleTranslate\Entity\TranslateConditionEntity;
use Integration\GoogleTranslate\Entity\TranslateResultEntity;

class GoogleTranslate
{
    /**
     * @return TranslateClient|null
     */
    private static function getClient() {
        return new TranslateClient(['key' => env('GOOGLE_TRANSLATE_KEY')]);
    }

    /**
     * @return languageCodeEntity[]
     */
    public static function localizedLanguages() {
        $client = self::getClient();
        return array_map(function($languageCode){
            return new languageCodeEntity($languageCode['name'], $languageCode['code']);
        }, $client->localizedLanguages());
    }

    /**
     * @param string $inputContent
     * @param TranslateConditionEntity $translateCondition
     *
     * @return TranslateResultEntity | null
     */
    public static function translate($inputContent, $translateCondition) {
        $result = self::translateBatch([$inputContent], $translateCondition);
        return count($result) > 0 ? $result[0] : null;
    }

    /**
     * @param array $inputContents
     * @param TranslateConditionEntity $translateCondition
     *
     * @return TranslateResultEntity[]
     */
    public static function translateBatch($inputContents, $translateCondition) {
        $client = self::getClient();
        $result = $client->translateBatch(
            $inputContents,
            [
                'source' => $translateCondition->source ?? null,
                'target' => $translateCondition->target,
                'format' => $translateCondition->format
            ]
        );
        return array_map(function($translateResult) {
            return new TranslateResultEntity(
                $translateResult['source'],
                $translateResult['input'],
                $translateResult['text']);
        }, $result);
    }

    /**
     * @param string $inputContent
     *
     * @return DetectResultEntity | null
     */
    public static function detectLanguage($inputContent) {
        $result = self::detectLanguageBatch([$inputContent]);
        return count($result) > 0 ? $result[0] : null;
    }

    /**
     * @param array $inputContents
     *
     * @return DetectResultEntity[]
     */
    public static function detectLanguageBatch($inputContents) {
        $client = self::getClient();
        $result = $client->detectLanguageBatch($inputContents);
        return array_map(function($detectLanguageResult) {
            return new DetectResultEntity(
                $detectLanguageResult['languageCode'],
                $detectLanguageResult['input'],
                $detectLanguageResult['confidence']
            );
        }, $result);
    }
}
