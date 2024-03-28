<?php

namespace Hounddd\GdprPlus;

use System\Classes\PluginBase;

/**
 * GdprPlus Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * @var array Plugin dependencies
     */
    public $require = ['Offline.Gdpr'];

    /**
     * Returns information about this plugin.
     */
    public function pluginDetails(): array
    {
        return [
            'name'        => 'hounddd.gdprplus::lang.plugin.name',
            'description' => 'hounddd.gdprplus::lang.plugin.description',
            'author'      => 'Hounddd',
            'icon'        => 'icon-cookie-bite'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     */
    public function register(): void
    {
    }

    /**
     * Boot method, called right before the request route.
     */
    public function boot(): void
    {
    }

    /**
     * Registers any frontend components implemented in this plugin.
     */
    public function registerComponents(): array
    {
        return [
            'Hounddd\GdprPlus\Components\CookieBannerWide' => 'cookieBannerWide',
        ];
    }

    /**
     * Registers any backend permissions used by this plugin.
     */
    public function registerPermissions(): array
    {
        return [];
    }

    /**
     * Registers backend navigation items for this plugin.
     */
    public function registerNavigation(): array
    {
        return [];
    }
}
