<?php

namespace App\Http\Controllers\Admin\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Services\DashboardServices;
// use App\Models\ {
//     Gallery,
//     AdditionalSolutions,
//     OurSolutions,
//     ResourcesAndInsights,
//     WebsiteContactDetails,
//     AboutUsContact,
//     ContactUs,
//     Subcribers

// };
use Validator;

class DashboardController extends Controller {
    /**
     * Topic constructor.
     */
    public function __construct()
    {
        // $this->service = new DashboardServices();
    }

    public function index()
    {
        // $return_data = array();
        // $return_data['gallary'] = count(Gallery::where('is_active',true)->orderBy('updated_at', 'desc')->get());
        // $return_data['addtional_solution'] = count(AdditionalSolutions::where('is_active',true)->orderBy('updated_at', 'desc')->get());
        // $return_data['our_solution'] = count(OurSolutions::where('is_active',true)->orderBy('updated_at', 'desc')->get());
        // $return_data['resouce_insight'] = count(ResourcesAndInsights::where('is_active',true)->orderBy('updated_at', 'desc')->get());
        // $return_data['about_contact'] = count(AboutUsContact::all());
        // $return_data['contact_us'] = count(ContactUs::all());
        // $return_data['subcribers'] = count(Subcribers::all());

        

        return view('admin.pages.dashboard.dashboard');
    }



}