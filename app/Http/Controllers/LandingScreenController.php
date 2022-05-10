<?php

namespace App\Http\Controllers;

use App\Models\AdminTestimonial;
use App\Models\Faq;
use App\Models\LandingAboutUs;
use App\Models\SectionOne;
use App\Models\SectionThree;
use App\Models\SectionTwo;
use App\Models\ServiceSlider;
use App\Models\SubscriptionPlan;
use App\Repositories\SubscriptionPlanRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class LandingScreenController extends Controller
{

    /**
     * @var
     */
    private $subscriptionPlanRepository;

    /**
     * @param SubscriptionPlanRepository $subscriptionPlanRepo
     */
    public function __construct(SubscriptionPlanRepository $subscriptionPlanRepo)
    {
        $this->subscriptionPlanRepository = $subscriptionPlanRepo;
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        $data['sectionOne'] = SectionOne::with('media')->first();
        $data['sectionTwo'] = SectionTwo::first();
        $data['sectionThree'] = SectionThree::with('media')->first();
        $data['subscriptionPricingPlans'] = SubscriptionPlan::get();
        $data['testimonials'] = AdminTestimonial::with('media')->get();
        $data['faqs'] = Faq::orderByDesc('created_at')->get();

        return view('landing.home.index')->with($data);
    }

    /**
     * @return Factory|View
     */
    public function aboutUs()
    {
        $data['landingAboutUs'] = LandingAboutUs::first();
        $data['faqs'] = Faq::orderByDesc('created_at')->get();
        $data['subscriptionPricingMonthPlans'] = SubscriptionPlan::with(['plan', 'plans'])
            ->where('frequency', '=', SubscriptionPlan::MONTH)
            ->get();
        $data['subscriptionPricingYearPlans'] = SubscriptionPlan::with(['plan', 'plans'])
            ->where('frequency', '=', SubscriptionPlan::YEAR)
            ->get();

        return view('landing.home.about_us')->with($data);
    }

    /**
     * @return Factory|View
     */
    public function services()
    {
        $data['subscriptionPricingMonthPlans'] = SubscriptionPlan::with(['plan', 'plans'])
            ->where('frequency', '=', SubscriptionPlan::MONTH)
            ->get();
        $data['subscriptionPricingYearPlans'] = SubscriptionPlan::with(['plan', 'plans'])
            ->where('frequency', '=', SubscriptionPlan::YEAR)
            ->get();
        $data['serviceSlider'] = ServiceSlider::get();
        $data['testimonials'] = AdminTestimonial::get();

        return view('landing.home.services')->with($data);
    }

    /**
     * @return Factory|View
     */
    public function contactUs()
    {
        return view('landing.home.contact_us');
    }

    /**
     * @return Factory|View
     */
    public function faq()
    {
        $faqs = Faq::orderByDesc('created_at')->get();

        return view('landing.home.faq', compact('faqs'));
    }

    /**
     *
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function pricing()
    {
        $data['subscriptionPricingMonthPlans'] = SubscriptionPlan::with(['plan', 'plans'])
            ->where('frequency', '=', SubscriptionPlan::MONTH)
            ->get();
        $data['subscriptionPricingYearPlans'] = SubscriptionPlan::with(['plan', 'plans'])
            ->where('frequency', '=', SubscriptionPlan::YEAR)
            ->get();

        return view('landing.home.pricing')->with($data);
    }
}
