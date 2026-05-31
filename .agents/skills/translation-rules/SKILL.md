---

# @formatter:off
name: translation-rules
description: Contains rules for translating phrases and sentences into other languages. Use when you need to translate text into another language.
# @formatter:on
---

# Translation Rules

## Principles

1. Never translate `_settings.json` and `_exclude.json` files into other languages.
2. Never translate files from the `src/Native*Names` folders into other languages.
3. If the target file is located in a `**/locales/<code>` directory, use the translation rules for the locale language whose code is specified in the directory name.
4. Never translate files in the `**/locales/en` directory into English, because they are already translated into English.
5. In all other cases that do not match items 3 and 4 in this list, always translate into English.

## Translation Process

1. First, determine the locale code from the path of the file whose contents need to be translated into another language. For example, for the path `**/locales/de_AT/php.json`, the locale code is `de_AT`.
2. Using the resulting code, find the matching language name in `src/LocaleList/src/Locale.php` (`value` is the locale code, and `name` is the name).
3. Translate the file contents into the specified language.
