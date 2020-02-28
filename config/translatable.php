<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Locales
    |--------------------------------------------------------------------------
    |
    | Contains an array with the applications available locales.
    |
    */
    'locales' => [
        'en',
        'vi',
    ],

    /*
    |--------------------------------------------------------------------------
    | Locale separator
    |--------------------------------------------------------------------------
    |
    | This is a string used to glue the language and the country when defining
    | the available locales. Example: if set to '-', then the locale for
    | colombian spanish will be saved as 'es-CO' into the database.
    |
    */
    'locale_separator' => '-',

    /*
    |--------------------------------------------------------------------------
    | Ngôn ngữ mặc định
    |--------------------------------------------------------------------------
    |
    | Là một miền địa phương mặc định, Dịch có thể lấy miền địa phương của Laravel
    | người dịch Nếu vì lý do nào đó bạn muốn ghi đè lên điều này,
    | bạn có thể chỉ định mặc định nào sẽ được sử dụng ở đây.
    | Nếu bạn đặt một giá trị ở đây, nó sẽ chỉ sử dụng giá trị cấu hình hiện tại
    | và không bao giờ dự phòng cho người dịch.
    |
    */
    'locale' => null,

    /*
    |--------------------------------------------------------------------------
    | Use fallback
    |--------------------------------------------------------------------------
    |
    | Determine if fallback locales are returned by default or not. To add
    | more flexibility and configure this option per "translatable"
    | instance, this value will be overridden by the property
    | $useTranslationFallback when defined
    |
    */
    'use_fallback' => false,

    /*
    |--------------------------------------------------------------------------
    | Use fallback per property
    |--------------------------------------------------------------------------
    |
    | The property fallback feature will return the translated value of
    | the fallback locale if the property is empty for the selected
    | locale. Note that 'use_fallback' must be enabled.
    |
     */
    'use_property_fallback' => true,

    /*
    |--------------------------------------------------------------------------
    | Fallback Locale
    |--------------------------------------------------------------------------
    |
    | A fallback locale is the locale being used to return a translation
    | when the requested translation is not existing. To disable it
    | set it to false.
    | If set to null it will loop through all configured locales until
    | one existing is found or end of list reached. The locales are looped
    | from top to bottom and for country based locales the simple one
    | is used first. So "es" will be checked before "es_MX".
    |
    */
    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Translation Model Namespace
    |--------------------------------------------------------------------------
    |
    | Defines the default 'Translation' class namespace. For example, if
    | you want to use App\Translations\CountryTranslation instead of App\CountryTranslation
    | set this to 'App\Translations'.
    |
    */
    'translation_model_namespace' => null,

    /*
    |--------------------------------------------------------------------------
    | Translation Suffix
    |--------------------------------------------------------------------------
    |
    | Defines the default 'Translation' class suffix. For example, if
    | you want to use CountryTrans instead of CountryTranslation
    | application, set this to 'Trans'.
    |
    */
    'translation_suffix' => 'Translation',

    /*
    |--------------------------------------------------------------------------
    | Locale key
    |--------------------------------------------------------------------------
    |
    | Defines the 'locale' field name, which is used by the
    | translation model.
    |
    */
    'locale_key' => 'locale',

    /*
    |--------------------------------------------------------------------------
    | Always load translations when converting to array
    |--------------------------------------------------------------------------
    | Setting this to false will have a performance improvement but will
    | not return the translations when using toArray(), unless the
    | translations relationship is already loaded.
    |
     */
    'to_array_always_loads_translations' => true,

    /*
    |--------------------------------------------------------------------------
    | Configure the default behavior of the rule factory
    |--------------------------------------------------------------------------
    | The default values used to control the behavior of the RuleFactory.
    | Here you can set your own default format and delimiters for
    | your whole app.
     *
     */
    'rule_factory' => [
        'format' => \Astrotomic\Translatable\Validation\RuleFactory::FORMAT_ARRAY,
        'prefix' => '%',
        'suffix' => '%',
    ],
];
