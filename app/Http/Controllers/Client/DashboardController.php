<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\AppBaseController;
use App\Repositories\DashboardRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class DashboardController extends AppBaseController
{
    /* @var DashboardRepository */
    public $dashboardRepository;
    /**
     * @param  DashboardRepository  $dashboardRepo
     */
    public function __construct(DashboardRepository $dashboardRepo)
    {
        $this->dashboardRepository = $dashboardRepo;
    }
    /**
     *
     * @return Application|Factory|View
     */
    function index()
    {
        $dashboardData = $this->dashboardRepository->getClientDashboardData();

        return view('client_panel.dashboard.index')->with($dashboardData);
    }
}
