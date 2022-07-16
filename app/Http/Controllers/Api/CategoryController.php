<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\category;
use _ROLE, _IMAGE, _STATUS;

class CategoryController extends Controller
{
    private $__category;
    private $__user;
    private $__isAdmin;
    private $__msgForbidden;

    public function __construct(category $category)
    {
        $this->__category = $category;
        $this->__isAdmin = _ROLE::MANAGER;
        $this->__msgForbidden = response()->error(null, 403);

        if (isset(Auth::user()->user_rule) && Auth::user()->user_rule >= _ROLE::EMPLOYEE) {
            $this->__isAdmin = Auth::user()->user_rule;
        }
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

    public function getCount(int $offset = 0, int $limit = 10, String $orderBy = 'id', String $sort = 'desc')
    {
        $res = $this->__category::offset($offset)->limit($limit)->orderBy($orderBy, $sort)->get();
        return response()->json($res, 200);
    }

    public function getOneRecord(int $id = 0)
    {
        $res = $this->__category::findOrFail($id);
        return response()->json($res, 200);
    }

    public function getSearchedRecords(Request $req, int $offset = 0, int $limit = 10, String $col = 'category_name')
    {
        // return Auth::user()->user_rule;
        // if (!$this->__isAdmin) {
        //     return $this->__msgForbidden;
        // }
        $res = $this->__category::where($col, 'like', "%$req->where%")->offset($offset)->limit($limit)->get();
        return response()->json($res, 200);
    }

    public function storeRecord(Request $req)
    {
        if (!$this->__isAdmin) {
            return $this->__msgForbidden;
        }
        $this->validate($req, [
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
            'category_slug' => $data->category_slug,
            'created_at' => now()
        ]);

        $res = $this->__category::create($data->input());
        return response()->json($res, 201);
    }

    public function updateRecord(Request $req, int $id)
    {
        if (!$this->__isAdmin) {
            return $this->__msgForbidden;
        }
        $this->validate($req, [
            'category_name' => 'required',
            'employee_id' => 'required'
        ]);

        $data = $req;
        $record = category::findOrFail($id);
        // Handling slug
        $req->whenFilled('category_slug', function () use ($req, $data, $record) {
            if ($req->category_name != $record->category_name) {
                $data->category_slug = Str::slug($req->category_name);
                return;
            }
            $data->category_slug = Str::slug($req->category_slug);
        }, function () use ($req, $data) {
            $data->category_slug = Str::slug($req->category_name);
        });

        $data->merge([
            'category_slug' => $data->category_slug,
            'updated_at' => now()
        ]);
        $res = $record->update($data->input());
        return response()->json($res, 200);
    }

    public function uploadImage(Request $req, int $id)
    {
        if (!$this->__isAdmin) {
            return $this->__msgForbidden;
        }

        // Handling image file
        $uploaded_name = '';
        $req->whenHas('category_upload_image', function () use ($req, &$uploaded_name) {
            $file = $req->category_upload_image;
            $file_name = $file->getClientOriginalName();
            $name = pathinfo($file_name, PATHINFO_FILENAME);
            $extension = pathinfo($file_name, PATHINFO_EXTENSION);
            $uploaded_name = md5($name) . ".$extension";
            $file->move(base_path('public' . _IMAGE::CATEGORY), $uploaded_name);
        });

        $res = $this->__category::findOrFail($id)->update(['category_image' => $uploaded_name]);
        return response()->json($res, 201);
    }

    public function deleteRecord(Request $req, int $id)
    {
        if (!$this->__isAdmin || $this->__isAdmin < _ROLE::MANAGER) {
            return $this->__msgForbidden;
        }
        $res = $this->__category::findOrFail($id)->update([
            'category_status' => _STATUS::DISABLED,
            'updated_at' => now(),
            'deleted_at' => now()
        ]);
        return response()->json($res, 200);
    }

    public function restoreRecord(Request $req, int $id)
    {
        if (!$this->__isAdmin || $this->__isAdmin < _ROLE::MANAGER) {
            return $this->__msgForbidden;
        }
        $res = $this->__category::findOrFail($id)->update([
            'category_status' => _STATUS::PENDING,
            'deleted_at' => null
        ]);
        return response()->json($res, 200);
    }

    public function activateRecord(Request $req, int $id)
    {
        if (!$this->__isAdmin || $this->__isAdmin < _ROLE::MANAGER) {
            return $this->__msgForbidden;
        }
        $res = $this->__category::findOrFail($id)->update(['category_status' => _STATUS::ACTIVED]);
        return response()->json($res, 200);
    }

    public function disableRecord(Request $req, int $id)
    {
        if (!$this->__isAdmin || $this->__isAdmin < _ROLE::MANAGER) {
            return $this->__msgForbidden;
        }
        $res = $this->__category::findOrFail($id)->update(['category_status' => _STATUS::DISABLED]);
        return response()->json($res, 200);
    }

    public function destroyRecord(Request $req, int $id)
    {
        if (!$this->__isAdmin || $this->__isAdmin < _ROLE::MANAGER) {
            return $this->__msgForbidden;
        }
        $res = $this->__category::findOrFail($id)->delete();
        return response()->json($res, 200);
    }
}
