<?php namespace Hounddd\GdprPlus\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use Illuminate\Support\Facades\Response;
use OFFLINE\GDPR\Classes\Cookies\ConsentCookie;
use OFFLINE\GDPR\Components\CookieBanner;
use OFFLINE\GDPR\Models\CookieGroup;
use OFFLINE\GDPR\Models\GDPRSettings;
use Winter\Storm\Database\Collection;

// class CookieBannerWide extends ComponentBase
class CookieBannerWide extends CookieBanner
{
    /**
     * @var boolean Determines whether the banner should show a cookie illustration on background.
     */
    public $bgCookies = false;

    /**
     * @var string Partial name to use for update.
     */
    public $colorScheme = 'blue';


    public function componentDetails()
    {
        return [
            'name'        => 'hounddd.gdprplus::lang.components.bannerwide.name',
            'description' => 'hounddd.gdprplus::lang.components.bannerwide.description',
        ];
    }

    public function defineProperties()
    {
        return parent::defineProperties() + [
            'bg_cookie' => [
                'title'       => 'hounddd.gdprplus::lang.components.bannerwide.bg_cookie.title',
                'description' => 'hounddd.gdprplus::lang.components.bannerwide.bg_cookie.description',
                'default'     => 0,
                'type'        => 'checkbox',
            ],
            'color_scheme' => [
                'title'       => 'hounddd.gdprplus::lang.components.bannerwide.color_scheme.title',
                'description' => 'hounddd.gdprplus::lang.components.bannerwide.color_scheme.description',
                'default'     => $this->colorScheme,
                'type'        => 'dropdown',
            ],
        ];
    }


    public function init()
    {
        parent::init();

        $this->bgCookies = $this->property('bg_cookie', false);
        $this->colorScheme = $this->property('color_scheme', false);
    }

    public function onRun()
    {
        if ($this->consentCookie->isDecided()) {
            $this->hide = true;
            return;
        }

        // Disable banner on page having the cookie manager component
        if ($this->getPage()->hasComponent('cookieManager') !== false) {
            $this->hide = true;
            return;
        }

        if (GDPRSettings::get('log_enabled')) {
            Log::updateOrCreate(
                ['session_id' => Session::getId()],
                ['decision' => Log::UNDECIDED, 'useragent' => Request::userAgent()]
            );
        }

        if ($this->property('include_css')) {
            $this->addCss('assets/css/bannerwide.css');
        }
    }


    /**
     * Ajax handler banner form submited.
     */
    public function onSubmit()
    {
        $accepted = post('cookies', []);
        $groups   = CookieGroup::with('cookies')->whereIn('id', $accepted)->get();

        $cookies = $groups->flatMap(function ($group) {
            return $group->cookies;
        })->filter(function ($item) {
            return $item->initial_status;
        })->pluck('max_level', 'code')->toArray();

        $cookie = $this->consentCookie->set($cookies);

        $response = Response::make([]);

        if ($this->updateSelector && $this->updatePartial) {
            $content = $this->renderPartial($this->updatePartial, [
                'cookieGroups' => $this->cookieGroups,
                'consentCookie' => $this->consentCookie,
            ]);

            $response = Response::make([
                $this->updateSelector => $content,
                'content' => $content,
                'consentCookie' => $this->consentCookie->get(),
            ]);
        }

        return $response->withCookie($cookie);
    }


    /**
     * Get all cookie groups.
     *
     * @return void
     */
    protected function getCookieGroups(): Collection
    {
        return CookieGroup::with('cookies')->orderBy('sort_order', 'ASC')->get();
    }

    /**
     * Return the list of CMS pages that have the cookie manager component.
     */
    public function getCookie_manager_pageOptions(): array
    {
        return [null => '-- ' . trans('offline.gdpr::lang.cookie_banner.cookie_manager_page.empty') .' --']
            + array_map(
                function ($page) {
                    return $page->title . ' (' . $page->baseFileName . ')';
                },
                array_filter(
                    Page::sortBy('baseFileName')->all(), 
                    function ($page){
                        return $page->hasComponent('cookieManager');
                    }
                )
            );
    }

    /**
     * Return the list of CMS pages that have the cookie manager component.
     */
    public function getColor_SchemeOptions(): array
    {
        return trans('hounddd.gdprplus::lang.components.bannerwide.color_scheme.colors');
    }
}
