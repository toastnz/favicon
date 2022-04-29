<?php

namespace Toast\Favicon;

use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;
use SilverStripe\AssetAdmin\Forms\UploadField;

class SiteConfigExtension extends DataExtension
{

    private static $has_one = [
        'Favicon' => Image::class
    ];

    private static $owns = [
        'Favicon'
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldsToTab('Root.Theme', [
            UploadField::create('Favicon', 'Favicon')
                ->setDescription('Recommended: square (1024x1024 pixels) PNG with transparency')
                ->setAllowedExtensions(['png', 'jpg', 'jpeg'])
                ->setFolderName('Favicon')
        ]);
    }

}