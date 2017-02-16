<?php

namespace App\Http\Controllers\AdminAuth;


use App\Model\Category;
use App\Scopes\StatusScope;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Yajra\Datatables\Datatables;

class CategoryController extends Controller
{
    private $data = array(
        'route' => 'admin.category.',
        'title' => 'Category',
        'menu' => 'category',
        'submenu' => '',
    );
    public function __construct()
    {
        // $this->middleware('auth');
    }
    private function _validate($request, $id = null)
    {
        $this->validate($request, [
            'name' => 'required|alpha|max:255',
        ]);
    }

    public function index(Request $request)
    {

         if ($request->ajax()) {
             $records = Category::select('*');
            return Datatables::of($records)
                  ->editColumn('created_at', function ($record) {
                      return $record->created_at->format('d-m-Y');
                  })
                ->addColumn('status', function ($record) {
                    return '<input id="toggle-demo" value="'.$record->id.'" class="chk_status" data-toggle="toggle" data-on="Active" data-off="Deactive" data-size="small" data-onstyle="success"  type="checkbox" '.($record->status == "Active"?" checked":"" ).' >';
                })
                  ->addColumn('action', function ($record) {
                      return '<a href="'.route($this->data['route'].'show',['id' =>$record->id]).'" class="btn btn-primary btn-sm" title="" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye-slash"></i></a>'.
                            '&nbsp;<a href="'.route($this->data['route'].'edit',['id' =>$record->id]).'" class="btn btn-info btn-sm" title="" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>'.
                            '&nbsp;<button class="btn btn-danger btn-sm data-delete" data-id="'.$record->id.'" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash"></i></button>';


                      //return '<i class="fa fa-trash-o text-success delete-data" aria-hidden="true" id="'.$record->id.'"></i>';
//                      return ' &nbsp; <a href="'.url('admin//'.$record->id.'/edit').'" data-toggle="modal" data-target="#model_ajax"> <i class="fa fa-pencil-square-o text-info" aria-hidden="true" title="Edit" data-toggle="tooltip" style="cursor:pointer"></i></a>' .
//                      ' &nbsp; <i class="fa fa-trash-o text-danger delete-data" data-id="' . $record->id . '"  aria-hidden="true" title="Delete" data-toggle="tooltip" style="cursor:pointer"></i>';
                  })
                  ->make(true);
         }

        $this->data['records'] = Category::all();
        return view('admin.category.index',$this->data);

    }

    public function create()
    {
        return view('admin.category.create',$this->data);
    }


    public function store(Request $request)
    {
        $this->_validate($request);
        $record =  new Category($request->all());
        $record->save();

        Session::flash('success', $this->data['title'].' inserted successfully.');
        return redirect()->route($this->data['route'].'index');
    }


    public function show($id)
    {
        $this->data['record'] = Category::findOrFail($id);
        return view('admin.category.show',$this->data);
    }


    public function edit($id)
    {
        $this->data['record'] = Category::findOrFail($id);
        return view('admin.category.create',$this->data);
    }


    public function update(Request $request, $id)
    {
        $record = Category::findOrFail($id);
        /* Change Status Block */
        if ($request->ajax()) {
            $record->update($request->only(['status']));
            return \Illuminate\Support\Facades\Response::json(['result'=>'success']);
        }

        $this->_validate($request);
        $record->update($request->all());

        Session::flash('info', $this->data['title'].' updated successfully.');
        return redirect()->route($this->data['route'].'index');
    }


    public function destroy($id)
    {
        $record = Category::findOrFail($id);
        $record->delete();
        return \Illuminate\Support\Facades\Response::json(['result'=>'success','message'=>'Deleted Data successfully!']);
    }
}
