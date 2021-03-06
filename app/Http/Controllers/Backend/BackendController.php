<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\CarRepository;
use Repositories\NewsRepository;
use App\Repositories\ContactRepository;
use Repositories\ConfigRepository;



class BackendController  extends Controller
{
    

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(CarRepository $carRepo, NewsRepository $newRepo, ContactRepository $contactRepo, \Repositories\ConfigRepository $configRepo) {
        $this->carRepo = $carRepo;
        $this->newsRepo = $newRepo;
        $this->contactRepo = $contactRepo;
        $this->configRepo = $configRepo;
    }
    public function index()
    {
        // $cart_count = $this->cartRepo->all()->count();
        // $news_count = $this->newsRepo->all()->count();
        // $contact_count = $this->contactRepo->all()->count();
        // return view('backend/index', compact('cart_count', 'news_count', 'contact_count'));
        return view('backend/index');
    }


}