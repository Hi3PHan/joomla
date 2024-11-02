<?php

declare(strict_types=1);

namespace Jfcherng\Diff\Utility;

final class Language
{
    /**
     * @var string[] the translation dict
     */
    private $translations = [];

    /**
     * @var string the language name
     */
    private $language = '_custom_';

    /**
     * The constructor.
     *
     * @param array<int,string|string[]>|string|string[] $target the language ID or translations dict
     */
    public function __construct($target = 'eng')
    {
        $this->load($target);
    }

    /**
     * Gets the language.
     *
     * @return string the language
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * Gets the translations.
     *
     * @return array the translations
     */
    public function getTranslations(): array
    {
        return $this->translations;
    }

    /**
     * Loads the target language.
     *
     * @param array<int,string|string[]>|string|string[] $target the language ID or translations dict
     */
    public function load($target): void
    {
        $this->translations = $this->resolve($target);
        $this->language = \is_string($target) ? $target : '_custom_';
    }

    /**
     * Translates the text.
     *
     * @param string $text the text
     */
    public function translate(string $text): string
    {
        return $this->translations[$text] ?? "![{$text}]";
    }

    /**
     * Get the translations from the language file.
     *
     * @param string $language the language
     *
     * @throws \Exception        fail to decode the JSON file
     * @throws \LogicException   path is a directory
     * @throws \RuntimeException path cannot be opened
     *
     * @return string[]
     */
    private static function getTranslationsByLanguage(string $language): array
    {
        $filePath = __DIR__ . "/../languages/{$language}.json";
        $file = new \SplFileObject($filePath, 'r');
        $fileContent = $file->fread($file->getSize());

        /** @todo PHP ^7.3 JSON_THROW_ON_ERROR */
        $decoded = \json_decode($fileContent, true);

        if (\json_last_error() !== \JSON_ERROR_NONE) {
            $msg = \sprintf('Fail to decode JSON file (code %d): %s', \json_last_error(), \realpath($filePath));
            throw new \Exception($msg); // workaround single-line throw + 120-char limit
        }

        return (array) $decoded;
    }

    /**
     * Resolves the target language.
     *
     * @param array<int,string|string[]>|string|string[] $target the language ID or translations array
     *
     * @throws \InvalidArgumentException
     *
     * @return string[] the resolved translations
     */
    private function resolve($target): array
    {
        if (\is_string($target)) {
            return self::getTranslationsByLanguage($target);
        }

        if (\is_array($target)) {
            // $target is an associative array
            if (Arr::isAssociative($target)) {
                return $target;
            }

            // $target is a list of "key-value pairs or language ID"
            return \array_reduce(
                $target,
                function ($carry, $translation) {
                    return \array_merge($carry, $this->resolve($translation));
                },
                []
            );
        }

        throw new \InvalidArgumentException('$target is not in valid form');
    }
}
