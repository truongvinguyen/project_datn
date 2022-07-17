<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\article;
use Illuminate\Support\Facades\DB;

class articleController extends Controller
{
    public function articles($offset = 0, $limit = 6, String $orderBy = 'article.id', String $sort = 'desc')
    {
        $articles = article::select('*')
        ->join('users','users.id','=','article.employee_id')
        ->join('brand','brand.id','=','article.brand_id')
        ->orderBy($orderBy,$sort)->offset($offset)->limit($limit) ->get();
        return view('client.article.article',compact('articles'));
    }

    public function featured ()
    {
        $articles = article::select('*')
        ->join('users','users.id','=','article.employee_id')
        ->join('brand','brand.id','=','article.brand_id')
        ->orderBy('article.id','DESC')->limit(4)->get();
        return $articles;
    }
}
