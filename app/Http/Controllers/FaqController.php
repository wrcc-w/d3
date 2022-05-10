<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFaqsRequest;
use App\Models\Faq;
use App\Repositories\FaqsRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FaqController extends AppBaseController
{
    /**
     * @var FaqsRepository
     */
    private $faqsRepo;

    /**
     * @param FaqsRepository $faqsRepository
     */
    public function __construct(FaqsRepository $faqsRepository)
    {
        $this->faqsRepo = $faqsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @throws Exception
     *
     * @return Application|Factory|View|Response
     */
    public function index(Request $request)
    {
        return view('landing.faqs.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateFaqsRequest $request
     *
     * @return JsonResponse
     */
    public function store(CreateFaqsRequest $request)
    {
        $input = $request->all();
        $totalFAQs = Faq::count();
        if ($totalFAQs != 5) {
            $this->faqsRepo->store($input);

            return $this->sendSuccess('FAQs created successfully.');
        } else {
            return $this->sendError('You cannot create more than five FAQs.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param $id
     *
     * @return JsonResponse
     */
    public function show($id)
    {
        $faqs = Faq::findOrFail($id);

        return $this->sendResponse($faqs, 'FAQs retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     *
     * @return JsonResponse
     */
    public function edit($id)
    {
        $faqs = Faq::findOrFail($id);

        return $this->sendResponse($faqs, 'FAQs retrieved successfully.');
    }

    /**
     * @param CreateFaqsRequest $request
     * @param Faq $faqs
     *
     *
     * @return mixed
     */
    public function update(CreateFaqsRequest $request, Faq $faqs)
    {
        $input = $request->all();
        $this->faqsRepo->updateFaqs($input, $faqs);

        return $this->sendSuccess('FAQs updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     *
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $faqs = Faq::findOrFail($id);
        $faqs->delete();

        return $this->sendSuccess('FAQs deleted successfully.');
    }
}
