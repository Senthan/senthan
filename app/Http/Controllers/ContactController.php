<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactStoreRequest;
use App\Contact;
use Symfony\Component\Process\Process;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
	protected $pdf;
	public function store(ContactStoreRequest $request) {
		Contact::create($request->only(['name', 'email', 'subject', 'message']));

		return response()->json(1);
	}

	public function download() {
		$fileType = request()->input('file_type');
		if($fileType && $fileType == 'docx') {
			$this->pdf = public_path('app/storage') . '/senthan_cv.docx';
			$this->respond('senthan_cv.docx', 'docx');
		} else {

			$this->pdf = public_path('app/storage') . '/senthan_cv.pdf';
			$this->respond('senthan_cv.pdf');

		}
	}

	protected function phantomProcess($path)
	{
		return new Process('phantomjs /home/senthan/Desktop/senthan/src/capture.js ' . $path);
	}

	public function respond($filename, $fileType = 'pdf') 
	{

		$this->fileType = $fileType;
		$contentType = 'application/msword';

		if($this->fileType == 'pdf') {
			$contentType = 'application/pdf';
		}
		$response = new Response(file_get_contents($this->pdf),  200, [
			'Content-Description' => 'File Transfer',
			'Content-Disposition' => 'attachment; filename="'. $filename .'"',
			'Content-Transfer-Encoding' => 'binary',
			'Content-Type' => $contentType,
		]);

		$response->send();

	}

}
