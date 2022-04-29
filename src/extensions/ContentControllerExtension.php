<?php

namespace Toast\Favicon;

use SilverStripe\Core\Extension;
use SilverStripe\View\ArrayData;
use SilverStripe\SiteConfig\SiteConfig;

class ContentControllerExtension extends Extension
{
    public function getFaviconMetaTags()
    {
        $output = null;
        $webpEnabled = false;

        if (class_exists(\Intervention\Image\WebP\WebP::class)) {
            if ($webpEnabled = \Intervention\Image\WebP\WebP::isEnabled()) {
                \Intervention\Image\WebP\WebP::disable();
            }
        }

        $siteConfig = SiteConfig::current_site_config();
        $favicon = $siteConfig->hasMethod('Favicon') && $siteConfig->Favicon()->exists() ? $siteConfig->Favicon() : false;

        if ($favicon) {
            $output = ArrayData::create([
                'Favicon' => $favicon
            ])->renderWith('FaviconMetaTags');
        }

        if ($webpEnabled) {
            \Intervention\Image\WebP\WebP::enable();
        }

        return $output;
    }

}