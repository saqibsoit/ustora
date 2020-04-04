<?php

namespace App\Http\Controllers;

use Dotenv\Validator as DotenvValidator;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Validator;
use Image;

class UsersController extends ViewComposingController
{
    public function getRegistrationPage(){
        $countries = ['Pakistan', 'India', 'Iran', 'China'];
        $this->viewData['countries'] = $countries;
        $this->viewData['meta_title'] = 'Registration Page';

        return $this->buildTempalte('registration');
    }


    public function addUsers(Request $request) {

        $countries = ['Pakistan', 'India' , 'Iran', 'China'];
        $this->viewData['countries'] = $countries;

        $rules = [
            'name' => 'required|min:3|max:10',
            'user_name' => 'required|min:3|max:10',
            'email' => 'email',
            'password' => 'required|min:5',
            'retype-password' => 'required|same:password',
            'gender' => 'required',
            'dob' => 'required|date',
            'country' => 'required',
            'image' => 'required|mimes:png,jpeg',
        ];

        $message = [
            'name.numeric' => 'First name allow numbers',
        ];

        $validator = Validator::make($request->all(),$rules, $message);

        if($validator->fails()){
            $this->viewData['errors']  = $validator->messages()->all();
            return $this->buildTempalte('registration');
        }


        $dir_path = '';



    }

}
