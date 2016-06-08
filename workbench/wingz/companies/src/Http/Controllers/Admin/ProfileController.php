<?php namespace Wingz\Companies\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Wingz\Foundation\Model\Companies;
use Wingz\Foundation\Model\CompaniesBusinessHour;
use Wingz\Foundation\Model\CompaniesSocialMedia;

//use Orchestra\Routing\Controller;

class ProfileController extends Controller
{

    public function __construct()
    {
        //
    }

    public function index()
    {
        return view('wingz/companies::admin.home');
    }

    public function profile()
    {
        $company = Auth::user()->company()->first();
        return view('wingz/companies::admin.profile.company', compact('company'));
    }


    public function businessHour(Request $request)
    {
        $company = Companies::findOrFail($request->company_id);
        $days = $company->businessHour()->lists('day')->toArray();
        if (in_array($request->day, $days)) {
            messages('error', 'Already added this day.');
            return Redirect::back();
        };

        $this->validate($request, [
            'company_id'=>'required',
            'day' => 'required',
            'from' => 'required',
            'to' => 'required',
            'closed' => ''
        ]);

        if ($request->closed == false) {
            $from = date("H:i:s", strtotime($request->from));
            $to = date("H:i:s", strtotime($request->to));
        }else {
            $from = date("H:i:s", strtotime(0));
            $to = date("H:i:s", strtotime(0));
        }

        $businessHour = new CompaniesBusinessHour();
        $businessHour->company_id = $request->company_id;
        $businessHour->day = $request->day;
        $businessHour->office_from = $from;
        $businessHour->office_to = $to;
        $businessHour->closed = $request->closed;

        $businessHour->save();
        messages('success', 'Hour Added Successfully');
        return Redirect::back();

    }

    public function businessHourDelete($id)
    {
        $companyBusinessHour = CompaniesBusinessHour::findOrFail($id);
        $companyBusinessHour->delete();
        messages('success', 'Hour Deleted Successfully');

        return Redirect::back();

    }

    public function socialMedia(Request $request)
    {
        $this->validate($request, [
            'company_id'=>'required',
            'name' => 'required',
            'url' => 'required'
        ]);

        $businessHour = new CompaniesSocialMedia();
        $businessHour->company_id = $request->company_id;
        $businessHour->social_name = $request->name;
        $businessHour->social_url = $request->url;
        $businessHour->class = $request->class;

        $businessHour->save();
        
        messages('success', 'Social Media Added Successfully');
        return Redirect::back();
    }


}
