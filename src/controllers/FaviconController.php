<?php

namespace Toast\Favicon;

use SilverStripe\Control\Controller;
use SilverStripe\SiteConfig\SiteConfig;

class FaviconController extends Controller
{
    public function index()
    {
        if (class_exists(\Intervention\Image\WebP\WebP::class)) {
            \Intervention\Image\WebP\WebP::disable();
        }

        $siteConfig = SiteConfig::current_site_config();
        $favicon = $siteConfig->hasMethod('Favicon') && $siteConfig->Favicon()->exists() ? $siteConfig->Favicon() : false;

        if ($favicon) {
            $this->getResponse()->addHeader('Content-Type', 'image/x-icon');
            return $favicon->Fit(16,16)->getString();            
        }

    }

}