<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Het :attribute veld moet geaccepteerd worden.',
    'accepted_if' => 'Het :attribute veld moet geaccepteerd worden wanneer :other :value is.',
    'active_url' => 'Het :attribute veld moet een geldige URL zijn.',
    'after' => 'Het :attribute veld moet een datum zijn na :date.',
    'after_or_equal' => 'Het :attribute veld moet een datum zijn op of na :date.',
    'alpha' => 'Het :attribute veld mag alleen letters bevatten.',
    'alpha_dash' => 'Het :attribute veld mag alleen letters, cijfers, streepjes en underscores bevatten.',
    'alpha_num' => 'Het :attribute veld mag alleen letters en cijfers bevatten.',
    'array' => 'Het :attribute veld moet een array zijn.',
    'ascii' => 'Het :attribute veld mag alleen enkel-byte alfanumerieke tekens en symbolen bevatten.',
    'before' => 'Het :attribute veld moet een datum zijn voor :date.',
    'before_or_equal' => 'Het :attribute veld moet een datum zijn op of voor :date.',
    'between' => [
        'array' => 'Het :attribute veld moet tussen :min en :max items bevatten.',
        'file' => 'Het :attribute veld moet tussen :min en :max kilobytes zijn.',
        'numeric' => 'Het :attribute veld moet tussen :min en :max zijn.',
        'string' => 'Het :attribute veld moet tussen :min en :max tekens bevatten.',
    ],
    'boolean' => 'Het :attribute veld moet waar of onwaar zijn.',
    'can' => 'Het :attribute veld bevat een niet-geautoriseerde waarde.',
    'confirmed' => 'De bevestiging van het :attribute veld komt niet overeen.',
    'contains' => 'Het :attribute veld mist een vereiste waarde.',
    'current_password' => 'Het wachtwoord is onjuist.',
    'date' => 'Het :attribute veld moet een geldige datum zijn.',
    'date_equals' => 'Het :attribute veld moet een datum zijn die gelijk is aan :date.',
    'date_format' => 'Het :attribute veld moet het formaat :format hebben.',
    'decimal' => 'Het :attribute veld moet :decimal decimalen bevatten.',
    'declined' => 'Het :attribute veld moet afgewezen worden.',
    'declined_if' => 'Het :attribute veld moet afgewezen worden wanneer :other :value is.',
    'different' => 'Het :attribute veld en :other moeten verschillend zijn.',
    'digits' => 'Het :attribute veld moet :digits cijfers bevatten.',
    'digits_between' => 'Het :attribute veld moet tussen :min en :max cijfers bevatten.',
    'dimensions' => 'Het :attribute veld heeft ongeldige afbeeldingsafmetingen.',
    'distinct' => 'Het :attribute veld bevat een dubbele waarde.',
    'doesnt_end_with' => 'Het :attribute veld mag niet eindigen met een van de volgende: :values.',
    'doesnt_start_with' => 'Het :attribute veld mag niet beginnen met een van de volgende: :values.',
    'email' => 'Het :attribute veld moet een geldig e-mailadres zijn.',
    'ends_with' => 'Het :attribute veld moet eindigen met een van de volgende: :values.',
    'enum' => 'De geselecteerde :attribute is ongeldig.',
    'exists' => 'De geselecteerde :attribute is ongeldig.',
    'extensions' => 'Het :attribute veld moet een van de volgende extensies hebben: :values.',
    'file' => 'Het :attribute veld moet een bestand zijn.',
    'filled' => 'Het :attribute veld moet een waarde hebben.',
    'gt' => [
        'array' => 'Het :attribute veld moet meer dan :value items bevatten.',
        'file' => 'Het :attribute veld moet groter zijn dan :value kilobytes.',
        'numeric' => 'Het :attribute veld moet groter zijn dan :value.',
        'string' => 'Het :attribute veld moet meer dan :value tekens bevatten.',
    ],
    'gte' => [
        'array' => 'Het :attribute veld moet :value items of meer bevatten.',
        'file' => 'Het :attribute veld moet groter of gelijk zijn aan :value kilobytes.',
        'numeric' => 'Het :attribute veld moet groter of gelijk zijn aan :value.',
        'string' => 'Het :attribute veld moet :value tekens of meer bevatten.',
    ],
    'hex_color' => 'Het :attribute veld moet een geldige hexadecimale kleur zijn.',
    'image' => 'Het :attribute veld moet een afbeelding zijn.',
    'in' => 'De geselecteerde :attribute is ongeldig.',
    'in_array' => 'Het :attribute veld moet bestaan in :other.',
    'integer' => 'Het :attribute veld moet een geheel getal zijn.',
    'ip' => 'Het :attribute veld moet een geldig IP-adres zijn.',
    'ipv4' => 'Het :attribute veld moet een geldig IPv4-adres zijn.',
    'ipv6' => 'Het :attribute veld moet een geldig IPv6-adres zijn.',
    'json' => 'Het :attribute veld moet een geldige JSON-string zijn.',
    'lowercase' => 'Het :attribute veld moet kleine letters bevatten.',
    'lt' => [
        'array' => 'Het :attribute veld moet minder dan :value items bevatten.',
        'file' => 'Het :attribute veld moet kleiner zijn dan :value kilobytes.',
        'numeric' => 'Het :attribute veld moet kleiner zijn dan :value.',
        'string' => 'Het :attribute veld moet minder dan :value tekens bevatten.',
    ],
    'lte' => [
        'array' => 'Het :attribute veld mag niet meer dan :value items bevatten.',
        'file' => 'Het :attribute veld moet kleiner of gelijk zijn aan :value kilobytes.',
        'numeric' => 'Het :attribute veld moet kleiner of gelijk zijn aan :value.',
        'string' => 'Het :attribute veld moet maximaal :value tekens bevatten.',
    ],
    'mac_address' => 'Het :attribute veld moet een geldig MAC-adres zijn.',
    'max' => [
        'array' => 'Het :attribute veld mag niet meer dan :max items bevatten.',
        'file' => 'Het :attribute veld mag niet groter zijn dan :max kilobytes.',
        'numeric' => 'Het :attribute veld mag niet groter zijn dan :max.',
        'string' => 'Het :attribute veld mag niet meer dan :max tekens bevatten.',
    ],
    'max_digits' => 'Het :attribute veld mag niet meer dan :max cijfers bevatten.',
    'mimes' => 'Het :attribute veld moet een bestand zijn van het type: :values.',
    'mimetypes' => 'Het :attribute veld moet een bestand zijn van het type: :values.',
    'min' => [
        'array' => 'Het :attribute veld moet minstens :min items bevatten.',
        'file' => 'Het :attribute veld moet minstens :min kilobytes zijn.',
        'numeric' => 'Het :attribute veld moet minstens :min zijn.',
        'string' => 'Het :attribute veld moet minstens :min tekens bevatten.',
    ],
    'missing' => 'Het :attribute veld moet ontbreken.',
    'not_regex' => 'De indeling van het :attribute veld is ongeldig.',
    'numeric' => 'Het :attribute veld moet een getal zijn.',
    'required' => 'Het :attribute veld is verplicht.',
    'same' => 'Het :attribute veld moet overeenkomen met :other.',
    'size' => [
        'array' => 'Het :attribute veld moet :size items bevatten.',
        'file' => 'Het :attribute veld moet :size kilobytes zijn.',
        'numeric' => 'Het :attribute veld moet :size zijn.',
        'string' => 'Het :attribute veld moet :size tekens bevatten.',
    ],
    'string' => 'Het :attribute veld moet een tekenreeks zijn.',
    'timezone' => 'Het :attribute veld moet een geldige tijdzone zijn.',
    'unique' => 'Het :attribute is al in gebruik.',
    'uploaded' => 'Het uploaden van :attribute is mislukt.',
    'url' => 'Het :attribute veld moet een geldige URL zijn.',
    'uuid' => 'Het :attribute veld moet een geldige UUID zijn.',

    /*
   |--------------------------------------------------------------------------
   | Custom Validation Language Lines
   |--------------------------------------------------------------------------
   |
   | Here you may specify custom validation messages for attributes using the
   | convention "attribute.rule" to name the lines. This makes it quick to
   | specify a specific custom language line for a given attribute rule.
   |
   */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'aangepast-bericht',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
