<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\ContactModel;
use App\Models\UserInformationModel;

class ContactService 
{
    public function contacts(){
        return ContactModel::query()->with('numberTypes','users')->OrderBy('id','desc')->get()->toArray();
    }

    public function storeContact(Request $request){
        $userIds = [];

        if(!$request->has('firstname') || !$request->has('lastname') || !$request->has('phoneType') || !$request->has('number')){
            return ['message' => 'Submitted data is missing!', 'status' => 'error'];
        }
        
        $totalSubmitted = count($request->get('firstname'));
        try{
            for($i = 0; $i < $totalSubmitted; $i++){
                $userIds[] = UserInformationModel::create(['firstname' => $request->get('firstname')[$i], 'lastname' => $request->get('lastname')[$i]])->id;    
            }
    
            for($i = 0; $i < $totalSubmitted; $i++){
                ContactModel::create(['number_type_id' => intval($request->get('phoneType')[$i]), 'user_id' => intval($userIds[$i]), 'number' => $request->get('number')[$i]]);
            }
    
            return ['message' => 'Contacts added successufuly!', 'status' => 'success'];
        }catch(Error $e){
            return ['message' => $e->getMessage(), 'status' => 'error'];
        }
    }
}