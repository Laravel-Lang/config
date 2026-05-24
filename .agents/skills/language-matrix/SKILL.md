---
name: language-matrix
description: AI skill for managing multilingual translation matrices in Laravel Lang repositories. Defines deterministic rules for translating and synchronizing localization files between source directories and target locales, including path mapping, language routing, exclusion rules, and consistency validation across localization packages.
---

## Localization codes and their languages

Always translate the contents of localization code folders into the corresponding languages.

| Directory            | Language                      |
|----------------------|-------------------------------|
| `locales/af`         | Afrikaans                     |
| `locales/ak`         | Akan                          |
| `locales/am`         | Amharic                       |
| `locales/ar`         | Arabic                        |
| `locales/as`         | Assamese                      |
| `locales/az`         | Azerbaijani                   |
| `locales/be`         | Belarusian                    |
| `locales/bg`         | Bulgarian                     |
| `locales/bho`        | Bhojpuri                      |
| `locales/bm`         | Bambara                       |
| `locales/bn`         | Bangla                        |
| `locales/bs`         | Bosnian                       |
| `locales/ca`         | Catalan                       |
| `locales/ceb`        | Cebuano                       |
| `locales/ckb`        | Central Kurdish               |
| `locales/cs`         | Czech                         |
| `locales/cy`         | Welsh                         |
| `locales/da`         | Danish                        |
| `locales/de_CH`      | German (Switzerland)          |
| `locales/de`         | German                        |
| `locales/doi`        | Dogri                         |
| `locales/ee`         | Ewe                           |
| `locales/el`         | Greek                         |
| `locales/en_CA`      | English (Canada)              |
| `locales/en`         | English                       |
| `locales/eo`         | Esperanto                     |
| `locales/es`         | Spanish                       |
| `locales/et`         | Estonian                      |
| `locales/eu`         | Basque                        |
| `locales/fa`         | Persian                       |
| `locales/fi`         | Finnish                       |
| `locales/fil`        | Filipino                      |
| `locales/fr`         | French                        |
| `locales/fy`         | Western Frisian               |
| `locales/ga`         | Irish                         |
| `locales/gd`         | Scottish Gaelic               |
| `locales/gl`         | Galician                      |
| `locales/gu`         | Gujarati                      |
| `locales/ha`         | Hausa                         |
| `locales/haw`        | Hawaiian                      |
| `locales/he`         | Hebrew                        |
| `locales/hi`         | Hindi                         |
| `locales/hr`         | Croatian                      |
| `locales/ht`         | Haitian Creole                |
| `locales/hu`         | Hungarian                     |
| `locales/hy`         | Armenian                      |
| `locales/id`         | Indonesian                    |
| `locales/ig`         | Igbo                          |
| `locales/is`         | Icelandic                     |
| `locales/it`         | Italian                       |
| `locales/ja`         | Japanese                      |
| `locales/ka`         | Georgian                      |
| `locales/kk`         | Kazakh                        |
| `locales/km`         | Khmer                         |
| `locales/kn`         | Kannada                       |
| `locales/ko`         | Korean                        |
| `locales/ku`         | Kurdish                       |
| `locales/ky`         | Kyrgyz                        |
| `locales/lb`         | Luxembourgish                 |
| `locales/lg`         | Ganda                         |
| `locales/ln`         | Lingala                       |
| `locales/lo`         | Lao                           |
| `locales/lt`         | Lithuanian                    |
| `locales/lv`         | Latvian                       |
| `locales/mai`        | Maithili                      |
| `locales/mg`         | Malagasy                      |
| `locales/mi`         | Māori                         |
| `locales/mk`         | Macedonian                    |
| `locales/ml`         | Malayalam                     |
| `locales/mn`         | Mongolian                     |
| `locales/mni_Mtei`   | Manipuri                      |
| `locales/mr`         | Marathi                       |
| `locales/ms`         | Malay                         |
| `locales/mt`         | Maltese                       |
| `locales/my`         | Burmese                       |
| `locales/nb`         | Norwegian Bokmål              |
| `locales/ne`         | Nepali                        |
| `locales/nl`         | Dutch                         |
| `locales/nn`         | Norwegian Nynorsk             |
| `locales/oc`         | Occitan                       |
| `locales/om`         | Oromo                         |
| `locales/or`         | Odia                          |
| `locales/pa`         | Punjabi                       |
| `locales/pl`         | Polish                        |
| `locales/ps`         | Pashto                        |
| `locales/pt_BR`      | Portuguese (Brazil)           |
| `locales/pt`         | Portuguese                    |
| `locales/qu`         | Quechua                       |
| `locales/ro`         | Romanian                      |
| `locales/ru`         | Russian                       |
| `locales/rw`         | Kinyarwanda                   |
| `locales/sa`         | Sanskrit                      |
| `locales/sc`         | Sardinian                     |
| `locales/sd`         | Sindhi                        |
| `locales/si`         | Sinhala                       |
| `locales/sk`         | Slovak                        |
| `locales/sl`         | Slovenian                     |
| `locales/sn`         | Shona                         |
| `locales/so`         | Somali                        |
| `locales/sq`         | Albanian                      |
| `locales/sr_Cyrl`    | Serbian                       |
| `locales/sr_Latn_ME` | Serbian (Montenegro)          |
| `locales/sr_Latn`    | Serbian                       |
| `locales/su`         | Sundanese                     |
| `locales/sv`         | Swedish                       |
| `locales/sw`         | Swahili                       |
| `locales/ta`         | Tamil                         |
| `locales/te`         | Telugu                        |
| `locales/tg`         | Tajik                         |
| `locales/th`         | Thai                          |
| `locales/ti`         | Tigrinya                      |
| `locales/tk`         | Turkmen                       |
| `locales/tl`         | Tagalog                       |
| `locales/tr`         | Turkish                       |
| `locales/tt`         | Tatar                         |
| `locales/ug`         | Uyghur                        |
| `locales/uk`         | Ukrainian                     |
| `locales/ur`         | Urdu                          |
| `locales/uz_Cyrl`    | Uzbek (Cyrillic)              |
| `locales/uz_Latn`    | Uzbek (Latin)                 |
| `locales/vi`         | Vietnamese                    |
| `locales/xh`         | Xhosa                         |
| `locales/yi`         | Yiddish                       |
| `locales/yo`         | Yoruba                        |
| `locales/zh_CN`      | Chinese (China)               |
| `locales/zh_HK`      | Chinese (Hong Kong Sar China) |
| `locales/zh_TW`      | Chinese (Taiwan)              |
| `locales/zu`         | Zulu                          |
