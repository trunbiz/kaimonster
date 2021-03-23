<?php

namespace App\Http\Controllers\Admin;

use App\ApiGuzzle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\DashboardRepository;
use Illuminate\Support\Facades\Gate;

class indexController extends Controller
{
    //
    private $apiGuzzle, $dashboardRepository;

    public function __construct()
    {
        $this->apiGuzzle = new ApiGuzzle();
        $this->dashboardRepository = new DashboardRepository();
    }

    public function index()
    {
        if (! Gate::allows('is_admin')) {
           abort(403);
        }
        $weather = $this->dashboardRepository->getWeather();
        $data['weather'] = json_decode($weather);
        return view('admin.index', $data);
    }
}


?>

  