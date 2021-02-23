<?php

namespace App\Repositories\Admin;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\ApiGuzzle;
//use Your Model

/**
 * Class DashboardRepository.
 */
class DashboardRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    private $apiGuzzle;
    public function __construct()
    {
        $this->apiGuzzle = new apiGuzzle();
    }

    public function model()
    {
        //return YourModel::class;
    }

    public function getWeather(){
        $data = $data = $this->apiGuzzle->getGuzzleRequest('http://api.openweathermap.org/data/2.5/weather', 'lang=vi&q=HaNoi&APPID=f0660460ec526b71f82b4256da706eff');
        return $data;
    }
}
