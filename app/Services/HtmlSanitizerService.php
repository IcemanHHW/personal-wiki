<?php

namespace App\Services;

use HTMLPurifier;
use HTMLPurifier_Config;

class HtmlSanitizerService
{
    /**
     * Sanitize the HTML content using HTMLPurifier.
     *
     * @param string $html
     * @return string
     */
    public function sanitize(string $html): string
    {
        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);
        return $purifier->purify($html);
    }
}
