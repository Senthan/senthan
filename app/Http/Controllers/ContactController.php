<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactStoreRequest;
use App\Contact;

class ContactController extends Controller
{
	public function store(ContactStoreRequest $request) {
		Contact::create($request->only(['name', 'email', 'subject', 'message']));

		return redirect()->to('/');
	}
}
