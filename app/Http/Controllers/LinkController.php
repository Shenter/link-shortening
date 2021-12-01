<?php

namespace App\Http\Controllers;

use App\Http\Classes\LinkRepository;


class LinkController extends Controller
{
    /**
     * @param $url
     * @param LinkRepository $urlRepository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index($url, LinkRepository $urlRepository): \Illuminate\Http\RedirectResponse
    {
        $fullUrl = $urlRepository->getUrl($url);
        return redirect()->away($fullUrl);
    }
}
