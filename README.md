# SilverStripe Favicon

Manage site's favicon in the CMS

## Requirements

See composer.json

## Install

composer require toastnz/favicon

## Usage

Upload your Favicon under Settings in the CMS and add $FaviconMetaTags to the template, within the <head> tag:

```html
<head>
    ...

    $FaviconMetaTags
</head>
```

Note: this module includes a route to /favicon.ico so you might want to ensure no /favicon.ico file exists in the root folder of the site
