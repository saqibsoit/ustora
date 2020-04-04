<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewComposingController extends Controller
{


    protected $viewData = array();
    protected $serveHeaderCssLinks = array();
    protected $serveHeaderJsLinks = array();
    protected $serveFooterJsLinks = array();
    protected $mergeHeaderCssLinks = array();
    protected $mergeHeaderJsLinks = array();
    protected $mergeFooterJsLinks = array();

    public function buildTempalte($page_name)
    {
        dd($page_name);

        $page_config = config('pages.' . $page_name);
        $headerCss = $page_config['headerCss'];
        $headerJs = $page_config['headerJs'];
        $footerJs = $page_config['footerJs'];
        $globalCssLinks = config('globalcss');
        $globalJsLinks = config('globaljs');



        // Merge Css and Js Links
        $this->mergeHeaderCssLinks = array_merge($headerCss, $this->mergeHeaderCssLinks);
        $this->mergeHeaderJsLinks = array_merge($headerJs, $this->mergeHeaderJsLinks);
        $this->mergeFooterJsLinks = array_merge($footerJs, $this->mergeFooterJsLinks);


        if (!empty($page_config)) {

            $sections = array('headSection','headerSection', 'promoSection', 'leftSection', 'rigtSection',
            'middleSection', 'mainSection', 'widgetSection', 'hiddenSection', 'footerSection','footSection');


            foreach ($sections as $section) {

                $components = $page_config[$section];

                $this->getComponentsReader($components);

                $this->viewData[$section . 's'] = !empty($page_config[$section]) ? $page_config[$section] : [];
            }

            //  read header css
            foreach ($this->mergeHeaderCssLinks as $css_name) {

                if (!empty($globalCssLinks[$css_name])) {
                    $this->serveHeaderCssLinks[$css_name] = $globalCssLinks[$css_name];


                }
            }

            //  read header js
            foreach ($this->mergeHeaderJsLinks as $js_name) {
                if (!empty($globalJsLinks[$js_name])) {
                    $this->serveHeaderJsLinks[$js_name] = $globalJsLinks[$js_name];
                }
            }

            //  read footer js
            foreach ($this->mergeFooterJsLinks as $js_name) {
                if (!empty($globalJsLinks[$js_name])) {
                    $this->serveFooterJsLinks[$js_name] = $globalJsLinks[$js_name];
                }
            }


            $this->viewData['headerCssLinks'] = $this->serveHeaderCssLinks;
            $this->viewData['headerJsLinks'] = $this->serveHeaderJsLinks;
            $this->viewData['footerJsLinks'] = $this->serveFooterJsLinks;

             dd($this->viewData);
            return view($page_config['layout'], $this->viewData);
        }

        return 'Create Page Config File';
    }

    public function getComponentsReader($components){
        foreach ($components as $component) {
            $componentConfig = config('components.' . $component);

            if (!empty($componentConfig)) {
                $this->mergeHeaderCssLinks = array_merge($this->mergeHeaderCssLinks, $componentConfig['headerCss']);
                $this->mergeHeaderJsLinks = array_merge($this->mergeHeaderJsLinks, $componentConfig['headerJs']);
                $this->mergeFooterJsLinks = array_merge($this->mergeFooterJsLinks, $componentConfig['footerJs']);
            }
        }
    }
}
