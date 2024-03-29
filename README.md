# Hounddd.GdprPlus Plugin for WinterCMS

![Winter GDPRPlus plugin banner](https://github.com/hounddd/wn-gdprplus-plugin/blob/main/.github/GDPRPlus-plugin.png?raw=true)

This plugin adds additional features for managing personal data to the [OFFLINE.GDPR](https://github.com/OFFLINE-GmbH/oc-gdpr-plugin) plugin.


## Wide banner

A new component is available to replace the simple banner provided by the original plugin.  
It can be implemented by just substituting the name of the `cookieBanner` component in your layout with `cookieBannerWide`: 

```twig
...
[cookieBannerWide]
...
==
...
{% component 'cookieBannerWide' %}
...
``` 

#### Additional and optional properties of the `cookieBannerWide` component**

The component offers two new (optionals) properties that allow you to configure its appearance.

| Property         | Type    | Description                                                    |
| ---------------- | ------- | -------------------------------------------------------------- |
| `bg_cookie`      | Boolean | Show or not a cookie background in the banner (default off)    |
| `color_scheme`   | String  | The color scheme to use for toggles and buttons (default blue) |

The available color schemes are blue (default), red, orange, amber, yellow, lime, green, emerald, teal, cyan, sky, indigo, violet, purple, fuchsia, pink and rose.

#### Colors schemes

![Winter GDPRPlus plugin color schemes](https://github.com/hounddd/wn-gdprplus-plugin/blob/main/.github/GDPRPlus-color-schemes.png?raw=true)

### Make it your own

#### Appearance

If you wish, you can define your own color scheme by specifying the following css variables in a `.gdpr-bannerwide` selector:

```css
.gdpr-bannerwide {
    --color-background: #bfdbfe;
    --color-border: #3b82f6;
    --color-accent: #1d4ed8;
}
```
You can also define the size of the toggles by setting the `--toggle-size` variable in a `.gdpr-bannerwide` selector:

```css
.gdpr-bannerwide {
    --toggle-size: 20px;
}
```
The default size is 20px on smartphones, 22px on small screens, 24px on medium screens and 28px on large screens.

#### Texts

You can replace the basic title and message by defining a translation file in your site `./lang/en/hounddd/gdprplus/lang.php`:

```php
<?php  

return [
    'components' => [
        'bannerwide' => [
            'title' => 'We love cookies.',
            'message' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque et quos quam! Beatae, culpa consectetur!',
        ],
    ],
];
````

---

## Installation
*Let assume you're in the root of your wintercms installation.*

### Using composer
Just run this command
```bash
composer require hounddd/wn-gdprplus-plugin
```

### Clone
Clone this repository into your winter plugins folder.

```bash
cd plugins
mkdir hounddd && cd hounddd
git clone https://github.com/Hounddd/wn-gdprplus-plugin gdprplus
```

***
Make awesome sites with ❄ [WinterCMS](https://wintercms.com)!