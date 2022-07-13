<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\category;
use _IMAGE;

class CategoryController extends Controller
{
    private $__category;

    public function __construct(category $category)
    {
        $this->__category = $category;
    }

    /**
     * API's queries
     * 
     * @return JSON
     */

    public function getAllRecords(String $orderBy = 'id', String $sort = 'desc')
    {
        $res = $this->__category::orderBy($orderBy, $sort)->get();
        return response()->json($res, 200);
    }

    public function getPageOfRecords(int $offset = 0, int $limit = 10, String $orderBy = 'id', String $sort = 'desc')
    {
        $res = $this->__category::offset($offset)->limit($limit)->orderBy($orderBy, $sort)->get();
        return response()->json($res, 200);
    }

    public function getOneRecord(int $id = 0)
    {
        $res = $this->__category::findOrFail($id);
        return response()->json($res, 200);
    }

    public function getSearchedRecords(Request $req, String $col = 'category_name', int $offset = 0, int $limit = 10)
    {
        $keyword = $req->where;
        $res = $this->__category::where($col, 'like', "%$keyword%")->offset($offset)->limit($limit)->get();
        return response()->json($res, 200);
    }

    public function storeRecord(Request $req)
    {
        try {
            $this->validate(request(), [
                'is_admin' => '',
                'category_name' => 'required',
                'employee_id' => 'required'
            ]);
            $data = $req;

            // Handling slug
            $req->whenFilled('category_slug', function () use ($req, $data) {
                $data->category_slug = Str::slug($req->category_slug);
            }, function () use ($req, $data) {
                $data->category_slug = Str::slug($req->category_name);
            });

            $data->merge([
                'created_at' => now()
            ]);

            $res = $this->__category::create($data->input());
            return response()->json($res, 201);
        } catch (\Throwable $th) {
            return response()->error('Bad request', 400);
        }
    }

    public function updateRecord(Request $req, int $id)
    {
        $record = $this->__category::findOrFail($id);
        $file_name = '';
        if ($req->has('category_image')) {
            $image = $req->category_image;
            $file_name = $image->getClientOriginalName();
            $image->move(base_path('public' . _IMAGE::CATEGORY), $file_name);
        }
        if (($req->category_slug == '') || ($req->category_name != $record->category_name)) {
            $req->category_slug = Str::slug($req->category_name);
        } else {
            $req->category_slug = Str::slug($req->category_slug);
        }

        return $req;
        $record->update([
            'category_name' => $req->category_name,
            'parent_id' => $req->parent_id,
            'employee_id' => $req->employee_id,
            'category_slug' => $req->category_slug,
            'category_description' => $req->category_description,
            'updated_at' => now()
        ]);
    }

    public function uploadImage(Request $req, int $id)
    {
        // Handling image file
        $req->whenHas('category_image', function () use ($req, $data) {
            $image = $req->category_input_image;
            $file_name = $image->getClientOriginalName();
            $image->move(base_path('public' . _IMAGE::CATEGORY), $file_name);
        });
    }

    public function updateImage(Request $req, int $id)
    {
    }
}
