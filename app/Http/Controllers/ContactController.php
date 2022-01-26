<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\ContactService;
use Session;

class ContactController extends Controller
{

    protected $contactService;

    public function __construct(ContactService $contactService) {
        $this->contactService = $contactService;
    }

    public function contacts()
    {
        $data = $this->contactService->contacts();
        return view('contacts.index', ['data' => $data]);
    }

    public function addContact(){
        return view('contacts.add_contact');
    }

    public function storeContact(Request $request){
        Validator::make($request->all(), [
            'firstname' => 'required|array',
            'lastname' => 'required|array',
            'phoneType' => 'required|array',
            'number' => 'required|array',
        ]);
    
        $result = $this->contactService->storeContact($request);
        Session::flash('message', $result['message']);
        return redirect()->back();
    }
}
