<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewComposingController extends Controller
{
    protected $viewData = array();
    
    public function buildTempalte($page_name)
    {
        //dd(config('pages.'.$page_name));
        $page_config = config('pages.'.$page_name);
       // \dd($page_config['headerSection']);

        if(!empty($page_config))
        {
            $sections = array('headerSection', 'promoSection', 'leftSection', 'rigtSection',
            'middleSection', 'mainSection', 'widgetSection', 'hiddenSection', 'footerSection');
            
             foreach ($sections as $section)
            {
                $this->viewData[$section.'s'] = !empty($page_config[$section])? $page_config[$section]:[];
            }
        }
        //return view('index', $this->viewData);
         return view($page_config['layout'], $this->viewData);

        
    
    
    }

    
}
