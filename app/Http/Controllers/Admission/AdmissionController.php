<?php

namespace App\Http\Controllers\Admission;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admission\AdmissionRequest;
use App\Services\Admission\AdmissionServices;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    protected $admissionService;

    public function __construct(AdmissionServices $admissionService)
    {
        $this->admissionService = $admissionService;
    }

    public function index()
    {
        return view('admission.index');
    }

    public function store(AdmissionRequest $request)
    {
        $admission = $this->admissionService->store($request->validated);

        activity()
            ->performedOn($admission)
            ->causedByAnonymous()
            ->log('Applicant ' . $admission->first_name . ' ' . $admission->middle_name . ' ' . $admission->last_name . ' successfully submitted an application.');

        return redirect()
            ->route('admission.show', $admission->uuid)
            ->with('success', 'You have been successfully submitted an application!');
    }

    public function show($uuid)
    {
        $admission = $this->admissionService->admissionDetails($uuid);

        return view('admission.show', compact(
            'admission',
            'uuid',
        ));
    }
}
