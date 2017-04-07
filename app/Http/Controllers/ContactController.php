<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactStoreRequest;
use App\Contact;
use Symfony\Component\Process\Process;

class ContactController extends Controller
{
	public function store(ContactStoreRequest $request) {
		Contact::create($request->only(['name', 'email', 'subject', 'message']));

		return redirect()->to('/');
	}

	public function download() {
		$path = '/home/senthan/Desktop/senthan/resources/views/cv/index.blade.php';
		$this->phantomProcess($path)->setTimeout(100)->mustRun();
	}

	protected function phantomProcess($path)
	{
		return new Process('phantomjs capture.js ' . $path);
	}
}
