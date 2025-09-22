<?php

namespace App\Http\Controllers\Admission;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admission\AdmissionRequest;
use App\Models\Cms\Barangay;
use App\Models\Cms\CivilStatus;
use App\Models\Cms\District;
use App\Models\Cms\Gender;
use App\Models\Cms\Program;
use App\Models\Cms\Religion;
use App\Models\Cms\Strand;
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
        $genders = Gender::getAllGenders();
        $districts = District::getAllDistrict();
        $barangays = Barangay::getAllBarangay();
        $strands = Strand::getAllStrands();
        $religions = Religion::getAllReligions();
        $civilStatuses = CivilStatus::getAllCivilStatuses();
        $programs = Program::getAllPrograms();
        
        return view('admission.index', compact(
            'genders',
            'districts',
            'barangays',
            'strands',
            'religions',
            'civilStatuses',
            'programs',
        ));
    }

    public function store(AdmissionRequest $request)
    {
        $data = $request->validated();
        $admission = $this->admissionService->store($data, $request->file('comelec_file'));

        activity()
            ->performedOn($admission)
            ->causedByAnonymous()
            ->event('created')
            ->log("Applicant {$admission->first_name} {$admission->middle_name} {$admission->last_name} successfully submitted an application.");

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'You have successfully submitted an application!',
                'data'    => $admission,
            ], 201);
        }

        return redirect()
            ->route('admission.show', $admission->uuid)
            ->with('success', 'You have successfully submitted an application!');
    }

    public function show(string $uuid)
    {
        $admission = $this->admissionService->admissionDetails($uuid);

        $docPath = optional($admission->guardian)->comelec_file
                ?? optional($admission->guardian)->voters_path;

        return view('admission.show', compact('admission','uuid', 'docPath'));
    }
}
