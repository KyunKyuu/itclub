<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\{
    Section,Submenu,Menu,Prestation,Division,ImageDivision,Alumni,Gallery,ImageGallery,Category,Member
    };
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TrashController extends Controller
{
    //
    public function section_get()
    {
        $section = Section::onlyTrashed();
        return DataTables::of($section)
            ->addIndexColumn()
            ->addColumn('check', function ($section) {
                return  '<div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" value="' . $section->id . '" name="id-checkbox" onchange="checkbox_this(this)" id="checkbox-' . $section->id . '" >
                    <label for="checkbox-' . $section->id . '" class="custom-control-label">&nbsp;</label>
                    </div>';
            })
            ->addColumn('btn', function ($section) {
                return '
            <a href="#" class="btn btn-icon btn-sm btn-info" data-value="' . $section->id . '" id="recycle"><i class="fas fa-recycle"></i></a>
            <a href="#" class="btn btn-icon btn-sm btn-danger" data-value="' . $section->id . '" id="delete"><i class="fas fa-trash"></i></a>
            ';
            })
            ->editColumn('created_by', function ($section) {
                return $section->users()->name;
            })
            ->editColumn('created_at', function ($section) {
                return date('d-M-Y H:i', strtotime($section->created_at));
            })
            ->editColumn('deleted_at', function ($section) {
                return date('d-M-Y H:i', strtotime($section->deleted_at));
            })
            ->rawColumns(['check', 'btn', 'status'])
            ->make(true);
    }

    public function section_recovery(Request $request)
    {
        activity('merecovery data sampah section');
        if (is_array($request->value)) {
            foreach ($request->value as $value) {
                Section::onlyTrashed()->where('id', $value)->restore();
            }
            return response()->json(['message' => 'Data berhasil di restore', 'status' => 'success'], 200);
        }
        Section::onlyTrashed()->where('id', $request->value)->restore();
        return response()->json(['message' => 'Data berhasil di restore', 'status' => 'success'], 200);
    }

    public function section_delete(Request $request)
    {
        activity('menghapus data sampah section');
        if (is_array($request->value)) {
            foreach ($request->value as $value) {
                Section::onlyTrashed()->where('id', $value)->forceDelete();
            }
            return response()->json(['message' => 'Data berhasil di hapus', 'status' => 'success'], 200);
        }
        Section::onlyTrashed()->where('id', $request->value)->forceDelete();
        return response()->json(['message' => 'Data berhasil di hapus', 'status' => 'success'], 200);
    }

    public function menu_get()
    {
        $menu = Menu::onlyTrashed();
        return DataTables::of($menu)
            ->addIndexColumn()
            ->addColumn('check', function ($menu) {
                return  '<div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" value="' . $menu->id . '" name="id-checkbox" onchange="checkbox_this(this)" id="checkbox-' . $menu->id . '" >
                    <label for="checkbox-' . $menu->id . '" class="custom-control-label">&nbsp;</label>
                    </div>';
            })
            ->addColumn('btn', function ($menu) {
                return '
            <a href="#" class="btn btn-icon btn-sm btn-info" data-value="' . $menu->id . '" id="recycle"><i class="fas fa-recycle"></i></a>
            <a href="#" class="btn btn-icon btn-sm btn-danger" data-value="' . $menu->id . '" id="delete"><i class="fas fa-trash"></i></a>
            ';
            })
            ->editColumn('created_by', function ($menu) {
                return $menu->users()->name;
            })
            ->editColumn('created_at', function ($menu) {
                return date('d-M-Y H:i', strtotime($menu->created_at));
            })
            ->editColumn('deleted_at', function ($menu) {
                return date('d-M-Y H:i', strtotime($menu->deleted_at));
            })
            ->rawColumns(['check', 'btn', 'status'])
            ->make(true);
    }

    public function menu_recovery(Request $request)
    {
        activity('merecovery data sampah menu');
        if (is_array($request->value)) {
            foreach ($request->value as $value) {
                Menu::onlyTrashed()->where('id', $value)->restore();
            }
            return response()->json(['message' => 'Data berhasil di restore', 'status' => 'success'], 200);
        }
        Menu::onlyTrashed()->where('id', $request->value)->restore();
        return response()->json(['message' => 'Data berhasil di restore', 'status' => 'success'], 200);
    }

    public function menu_delete(Request $request)
    {
        activity('menghapus data sampah menu');
        if (is_array($request->value)) {
            foreach ($request->value as $value) {
                Menu::onlyTrashed()->where('id', $value)->forceDelete();
            }
            return response()->json(['message' => 'Data berhasil di hapus', 'status' => 'success'], 200);
        }
        Menu::onlyTrashed()->where('id', $request->value)->forceDelete();
        return response()->json(['message' => 'Data berhasil di hapus', 'status' => 'success'], 200);
    }

    public function submenu_get()
    {
        $submenu = Submenu::onlyTrashed();
        return DataTables::of($submenu)
            ->addIndexColumn()
            ->addColumn('check', function ($submenu) {
                return  '<div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" value="' . $submenu->id . '" name="id-checkbox" onchange="checkbox_this(this)" id="checkbox-' . $submenu->id . '" >
                    <label for="checkbox-' . $submenu->id . '" class="custom-control-label">&nbsp;</label>
                    </div>';
            })
            ->addColumn('btn', function ($submenu) {
                return '
            <a href="#" class="btn btn-icon btn-sm btn-info" data-value="' . $submenu->id . '" id="recycle"><i class="fas fa-recycle"></i></a>
            <a href="#" class="btn btn-icon btn-sm btn-danger" data-value="' . $submenu->id . '" id="delete"><i class="fas fa-trash"></i></a>
            ';
            })
            ->editColumn('created_by', function ($submenu) {
                return $submenu->users()->name;
            })
            ->editColumn('created_at', function ($submenu) {
                return date('d-M-Y H:i', strtotime($submenu->created_at));
            })
            ->editColumn('deleted_at', function ($submenu) {
                return date('d-M-Y H:i', strtotime($submenu->deleted_at));
            })
            ->rawColumns(['check', 'btn', 'status'])
            ->make(true);
    }

    public function submenu_recovery(Request $request)
    {
        activity('merecovery data sampah submenu');
        if (is_array($request->value)) {
            foreach ($request->value as $value) {
                Submenu::onlyTrashed()->where('id', $value)->restore();
            }
            return response()->json(['message' => 'Data berhasil di restore', 'status' => 'success'], 200);
        }
        Submenu::onlyTrashed()->where('id', $request->value)->restore();
        return response()->json(['message' => 'Data berhasil di restore', 'status' => 'success'], 200);
    }

    public function submenu_delete(Request $request)
    {
        activity('menghapus data sampah submenu');
        if (is_array($request->value)) {
            foreach ($request->value as $value) {
                Submenu::onlyTrashed()->where('id', $value)->forceDelete();
            }
            return response()->json(['message' => 'Data berhasil di hapus', 'status' => 'success'], 200);
        }
        Submenu::onlyTrashed()->where('id', $request->value)->forceDelete();
        return response()->json(['message' => 'Data berhasil di hapus', 'status' => 'success'], 200);
    }

     public function prestation_get()
    {
        $prestation = Prestation::onlyTrashed();
        return DataTables::of($prestation)
            ->addIndexColumn()
            ->addColumn('check', function ($prestation) {
                return  '<div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" value="' . $prestation->id . '" name="id-checkbox" onchange="checkbox_this(this)" id="checkbox-' . $prestation->id . '" >
                    <label for="checkbox-' . $prestation->id . '" class="custom-control-label">&nbsp;</label>
                    </div>';
            })
            ->addColumn('btn', function ($prestation) {
                return '
            <a href="#" class="btn btn-icon btn-sm btn-info" data-value="' . $prestation->id . '" id="recycle"><i class="fas fa-recycle"></i></a>
            <a href="#" class="btn btn-icon btn-sm btn-danger" data-value="' . $prestation->id . '" id="delete"><i class="fas fa-trash"></i></a>
            ';
            })
            ->editColumn('created_at', function ($prestation) {
                return date('d-M-Y H:i', strtotime($prestation->created_at));
            })
            ->editColumn('deleted_at', function ($prestation) {
                return date('d-M-Y H:i', strtotime($prestation->deleted_at));
            })
            ->rawColumns(['check', 'btn', 'status'])
            ->make(true);
    }

    public function prestation_recovery(Request $request)
    {
        activity('merecovery data sampah prestation');
        if (is_array($request->value)) {
            foreach ($request->value as $value) {
                Prestation::onlyTrashed()->where('id', $value)->restore();
            }
            return response()->json(['message' => 'Data berhasil di restore', 'status' => 'success'], 200);
        }
        Prestation::onlyTrashed()->where('id', $request->value)->restore();
        return response()->json(['message' => 'Data berhasil di restore', 'status' => 'success'], 200);
    }

    public function prestation_delete(Request $request)
    {
        activity('menghapus data sampah prestation');
        if (is_array($request->value)) {
            foreach ($request->value as $value) {
               $prestation = Prestation::onlyTrashed()->where('id', $value)->first();
               \Storage::delete($prestation->image);
               $prestation->forceDelete();
            }
            return response()->json(['message' => 'Data berhasil di hapus', 'status' => 'success'], 200);
        }
      
        $prestation = Prestation::onlyTrashed()->where('id', $request->value)->first();
        \Storage::delete($prestation->image);
        $prestation->forceDelete();
        return response()->json(['message' => 'Data berhasil di hapus', 'status' => 'success'], 200);
    }

    public function division_get()
    {
        $division = Division::onlyTrashed();
        return DataTables::of($division)
            ->addIndexColumn()
            ->addColumn('check', function ($division) {
                return  '<div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" value="' . $division->id . '" name="id-checkbox" onchange="checkbox_this(this)" id="checkbox-' . $division->id . '" >
                    <label for="checkbox-' . $division->id . '" class="custom-control-label">&nbsp;</label>
                    </div>';
            })
            ->addColumn('btn', function ($division) {
                return '
            <a href="#" class="btn btn-icon btn-sm btn-info" data-value="' . $division->id . '" id="recycle"><i class="fas fa-recycle"></i></a>
            <a href="#" class="btn btn-icon btn-sm btn-danger" data-value="' . $division->id . '" id="delete"><i class="fas fa-trash"></i></a>
            ';
            })
            ->addColumn('imageDivisi', function ($division) {
                return '<img src="' . $division->image() . '" width="50">';
            })
            ->editColumn('created_at', function ($division) {
                return date('d-M-Y H:i', strtotime($division->created_at));
            })
            ->editColumn('deleted_at', function ($division) {
                return date('d-M-Y H:i', strtotime($division->deleted_at));
            })
            ->rawColumns(['check', 'btn', 'status', 'imageDivisi'])
            ->make(true);
    }

    public function division_recovery(Request $request)
    {
        activity('merecovery data sampah divisi');
        if (is_array($request->value)) {
            foreach ($request->value as $value) {
                 $division = Division::onlyTrashed()->where('id', $value)->first();
                  $division->images->restore();
                  $division->members->restore();
                  $division->members->alumni->restore();  
                  $division->restore();  
            }
            return response()->json(['message' => 'Data berhasil di restore', 'status' => 'success'], 200);
        }
      $division = Division::onlyTrashed()->where('id', $request->value)->first();
      $division->images->restore();
      $division->members->restore();
      $division->members->alumni->restore();  
      $division->restore();  
        return response()->json(['message' => 'Data berhasil di restore', 'status' => 'success'], 200);
    }

    public function division_delete(Request $request)
    {
        activity('menghapus data sampah divisi');

        if (is_array($request->value)) {
            foreach ($request->value as $value) {
               $division = Division::onlyTrashed()->where('id', $value)->first();
               \Storage::delete($division->image);
                
               $division->forceDelete();
            }
            return response()->json(['message' => 'Data berhasil di hapus', 'status' => 'success'], 200);
        }
      
      $division = Division::onlyTrashed()->where('id', $request->value)->first();
      \Storage::delete($division->image);
    
      $division->forceDelete();

        return response()->json(['message' => 'Data berhasil di hapus', 'status' => 'success'], 200);
    }

    public function imageDivision_get()
    {
        $imageDivision = ImageDivision::onlyTrashed();

        return DataTables::of($imageDivision)
            ->addIndexColumn()
            ->addColumn('check', function ($imageDivision) {
                return  '<div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" value="' . $imageDivision->id . '" name="id-checkbox" onchange="checkbox_this(this)" id="checkbox-' . $imageDivision->id . '" >
                    <label for="checkbox-' . $imageDivision->id . '" class="custom-control-label">&nbsp;</label>
                    </div>';
            })
            ->addColumn('btn', function ($imageDivision) {
                return '
            <a href="#" class="btn btn-icon btn-sm btn-info" data-value="' . $imageDivision->id . '" id="recycle"><i class="fas fa-recycle"></i></a>
            <a href="#" class="btn btn-icon btn-sm btn-danger" data-value="' . $imageDivision->id . '" id="delete"><i class="fas fa-trash"></i></a>
            ';
            })
            ->addColumn('imageDivisi', function ($imageDivision) {
                return '<img src="' . $imageDivision->image() . '" width="50">';
            })
            ->editColumn('division_id', function ($imageDivision) {   
                return $imageDivision->division->name;
            })
            ->editColumn('created_at', function ($imageDivision) {
                return date('d-M-Y H:i', strtotime($imageDivision->created_at));
            })
            ->editColumn('deleted_at', function ($imageDivision) {
                return date('d-M-Y H:i', strtotime($imageDivision->deleted_at));
            })
            ->rawColumns(['check', 'btn', 'status', 'division_id', 'imageDivisi'])
            ->make(true);
    }

    public function imageDivision_recovery(Request $request)
    {
        activity('merecovery data sampah image divisi');
        if (is_array($request->value)) {
            foreach ($request->value as $value) {
                ImageDivision::onlyTrashed()->where('id', $value)->restore();
            }
            return response()->json(['message' => 'Data berhasil di restore', 'status' => 'success'], 200);
        }
         ImageDivision::onlyTrashed()->where('id', $request->value)->restore();
        return response()->json(['message' => 'Data berhasil di restore', 'status' => 'success'], 200);
    }

    public function imageDivision_delete(Request $request)
    {
        activity('menghapus data sampah image divisi');
        if (is_array($request->value)) {
            foreach ($request->value as $value) {
               $imageDivision = ImageDivision::onlyTrashed()->where('id', $value)->first();
                \Storage::delete($imageDivision->image);
               $imageDivision->forceDelete();
            }
            return response()->json(['message' => 'Data berhasil di hapus', 'status' => 'success'], 200);
        }
      
       $imageDivision = ImageDivision::onlyTrashed()->where('id', $request->value)->first();
      \Storage::delete($imageDivision->image);
      $imageDivision->forceDelete();
        return response()->json(['message' => 'Data berhasil di hapus', 'status' => 'success'], 200);
    }

    public function alumni_get()
    {
        $alumni = Alumni::onlyTrashed();

        return DataTables::of($alumni)
            ->addIndexColumn()
            ->addColumn('check', function ($alumni) {
                return  '<div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" value="' . $alumni->id . '" name="id-checkbox" onchange="checkbox_this(this)" id="checkbox-' . $alumni->id . '" >
                    <label for="checkbox-' . $alumni->id . '" class="custom-control-label">&nbsp;</label>
                    </div>';
            })
            ->addColumn('btn', function ($alumni) {
                return '
            <a href="#" class="btn btn-icon btn-sm btn-info" data-value="' . $alumni->id . '" id="recycle"><i class="fas fa-recycle"></i></a>
            <a href="#" class="btn btn-icon btn-sm btn-danger" data-value="' . $alumni->id . '" id="delete"><i class="fas fa-trash"></i></a>
            ';
            })
            ->editColumn('image', function ($alumni) {
                return '<img src="' . $alumni->image() . '" width="50">';
            })
            ->editColumn('member_id', function ($alumni) {   
                return $alumni->member->name;
            })
            ->editColumn('created_at', function ($alumni) {
                return date('d-M-Y H:i', strtotime($alumni->created_at));
            })
            ->editColumn('deleted_at', function ($alumni) {
                return date('d-M-Y H:i', strtotime($alumni->deleted_at));
            })
            ->rawColumns(['check', 'btn', 'status', 'member_id', 'image'])
            ->make(true);
    }

    public function alumni_recovery(Request $request)
    {
        activity('merecovery data sampah alumni');
        if (is_array($request->value)) {
            foreach ($request->value as $value) {
                Alumni::onlyTrashed()->where('id', $value)->restore();
            }
            return response()->json(['message' => 'Data berhasil di restore', 'status' => 'success'], 200);
        }
         Alumni::onlyTrashed()->where('id', $request->value)->restore();
        return response()->json(['message' => 'Data berhasil di restore', 'status' => 'success'], 200);
    }

    public function alumni_delete(Request $request)
    {
        activity('menghapus data sampah alumni');
        if (is_array($request->value)) {
            foreach ($request->value as $value) {
               $alumni = Alumni::onlyTrashed()->where('id', $value)->first();
                \Storage::delete($alumni->image);
               $alumni->forceDelete();
            }
            return response()->json(['message' => 'Data berhasil di hapus', 'status' => 'success'], 200);
        }
      
      $alumni = Alumni::onlyTrashed()->where('id', $request->value)->first();
      \Storage::delete($alumni->image);
      $alumni->forceDelete();
        return response()->json(['message' => 'Data berhasil di hapus', 'status' => 'success'], 200);
    }
    // 
     public function member_get()
    {
        $member = Member::onlyTrashed();

        return DataTables::of($member)
            ->addIndexColumn()
            ->addColumn('check', function ($member) {
                return  '<div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" value="' . $member->id . '" name="id-checkbox" onchange="checkbox_this(this)" id="checkbox-' . $member->id . '" >
                    <label for="checkbox-' . $member->id . '" class="custom-control-label">&nbsp;</label>
                    </div>';
            })
            ->addColumn('btn', function ($member) {
                return '
            <a href="#" class="btn btn-icon btn-sm btn-info" data-value="' . $member->id . '" id="recycle"><i class="fas fa-recycle"></i></a>
            <a href="#" class="btn btn-icon btn-sm btn-danger" data-value="' . $member->id . '" id="delete"><i class="fas fa-trash"></i></a>
            ';
            })
            ->addColumn('imageMember', function ($member) {
                return '<img src="' . $member->image() . '" width="50">';
            })
          
            ->editColumn('user_id', function ($member) {
                return $member->user->email;
            })
            ->editColumn('division_id', function ($member) {
                return $member->division->name;
            })
            ->rawColumns(['check', 'btn', 'imageMember','user_id','division_id'])
            ->make(true);
    }

    public function member_recovery(Request $request)
    {
        activity('merecovery data sampah member');
        if (is_array($request->value)) {
            foreach ($request->value as $value) {
                Member::onlyTrashed()->where('id', $value)->restore();
            }
            return response()->json(['message' => 'Data berhasil di restore', 'status' => 'success'], 200);
        }
         Member::onlyTrashed()->where('id', $request->value)->restore();
        return response()->json(['message' => 'Data berhasil di restore', 'status' => 'success'], 200);
    }

    public function member_delete(Request $request)
    {
        activity('menghapus data sampah member');
        if (is_array($request->value)) {
            foreach ($request->value as $value) {
               $member = Member::onlyTrashed()->where('id', $value)->first();
                \Storage::delete($member->image);
               $member->forceDelete();
            }
            return response()->json(['message' => 'Data berhasil di hapus', 'status' => 'success'], 200);
        }
      
      $member = Member::onlyTrashed()->where('id', $request->value)->first();
      \Storage::delete($member->image);
      $member->forceDelete();
        return response()->json(['message' => 'Data berhasil di hapus', 'status' => 'success'], 200);
    }

     public function gallery_get()
    {
        $gallery = Gallery::onlyTrashed();

        return DataTables::of($gallery)
            ->addIndexColumn()
            ->addColumn('check', function ($gallery) {
                return  '<div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" value="' . $gallery->id . '" name="id-checkbox" onchange="checkbox_this(this)" id="checkbox-' . $gallery->id . '" >
                    <label for="checkbox-' . $gallery->id . '" class="custom-control-label">&nbsp;</label>
                    </div>';
            })
            ->addColumn('btn', function ($gallery) {
                return '
            <a href="#" class="btn btn-icon btn-sm btn-info" data-value="' . $gallery->id . '" id="recycle"><i class="fas fa-recycle"></i></a>
            <a href="#" class="btn btn-icon btn-sm btn-danger" data-value="' . $gallery->id . '" id="delete"><i class="fas fa-trash"></i></a>
            ';
            })
            ->editColumn('image', function ($gallery) {
                return '<img src="' . $gallery->image() . '" width="50">';
            })
            ->editColumn('created_at', function ($gallery) {
                return date('d-M-Y H:i', strtotime($gallery->created_at));
            })

            ->editColumn('deleted_at', function ($gallery) {
                return date('d-M-Y H:i', strtotime($gallery->deleted_at));
            })
            ->rawColumns(['check', 'btn', 'status',  'image'])
            ->make(true);
    }

    public function gallery_recovery(Request $request)
    {
        activity('merecovery data sampah gallery');
        if (is_array($request->value)) {
            foreach ($request->value as $value) {
                Gallery::onlyTrashed()->where('id', $value)->restore();
            }
            return response()->json(['message' => 'Data berhasil di restore', 'status' => 'success'], 200);
        }
         Gallery::onlyTrashed()->where('id', $request->value)->restore();
        return response()->json(['message' => 'Data berhasil di restore', 'status' => 'success'], 200);
    }

    public function gallery_delete(Request $request)
    {
        activity('menghapus data sampah gallery');
        if (is_array($request->value)) {
            foreach ($request->value as $value) {
               $gallery = Gallery::onlyTrashed()->where('id', $value)->first();
                \Storage::delete($gallery->image);
               $gallery->forceDelete();
            }
            return response()->json(['message' => 'Data berhasil di hapus', 'status' => 'success'], 200);
        }
      
      $gallery = Gallery::onlyTrashed()->where('id', $request->value)->first();
      \Storage::delete($gallery->image);
      $gallery->forceDelete();
        return response()->json(['message' => 'Data berhasil di hapus', 'status' => 'success'], 200);
    }

    public function imageGallery_get()
    {
        $imageGallery = ImageGallery::onlyTrashed();

        return DataTables::of($imageGallery)
            ->addIndexColumn()
            ->addColumn('check', function ($imageGallery) {
                return  '<div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" value="' . $imageGallery->id . '" name="id-checkbox" onchange="checkbox_this(this)" id="checkbox-' . $imageGallery->id . '" >
                    <label for="checkbox-' . $imageGallery->id . '" class="custom-control-label">&nbsp;</label>
                    </div>';
            })
            ->addColumn('btn', function ($imageGallery) {
                return '
            <a href="#" class="btn btn-icon btn-sm btn-info" data-value="' . $imageGallery->id . '" id="recycle"><i class="fas fa-recycle"></i></a>
            <a href="#" class="btn btn-icon btn-sm btn-danger" data-value="' . $imageGallery->id . '" id="delete"><i class="fas fa-trash"></i></a>
            ';
            })
            ->editColumn('image', function ($imageGallery) {
                return '<img src="' . $imageGallery->image() . '" width="50">';
            })
             ->editColumn('gallery_id', function ($imageGallery) {
                return $imageGallery->gallery->name;
            })
            ->editColumn('created_at', function ($imageGallery) {
                return date('d-M-Y H:i', strtotime($imageGallery->created_at));
            })
            ->editColumn('deleted_at', function ($imageGallery) {
                return date('d-M-Y H:i', strtotime($imageGallery->deleted_at));
            })
            ->rawColumns(['check', 'btn', 'status', 'gallery_id', 'image'])
            ->make(true);
    }


    public function imageGallery_recovery(Request $request)
    {
        activity('merecovery data sampah image gallery');
        if (is_array($request->value)) {
            foreach ($request->value as $value) {
                ImageGallery::onlyTrashed()->where('id', $value)->restore();
            }
            return response()->json(['message' => 'Data berhasil di restore', 'status' => 'success'], 200);
        }
         ImageGallery::onlyTrashed()->where('id', $request->value)->restore();
        return response()->json(['message' => 'Data berhasil di restore', 'status' => 'success'], 200);
    }

    public function imageGallery_delete(Request $request)
    {
        activity('menghapus data sampah image gallery');
        if (is_array($request->value)) {
            foreach ($request->value as $value) {
               $imageGallery = ImageGallery::onlyTrashed()->where('id', $value)->first();
                \Storage::delete($imageGallery->image);
               $imageGallery->forceDelete();
            }
            return response()->json(['message' => 'Data berhasil di hapus', 'status' => 'success'], 200);
        }
      
      $imageGallery = ImageGallery::onlyTrashed()->where('id', $request->value)->first();
      \Storage::delete($imageGallery->image);
      $imageGallery->forceDelete();
        return response()->json(['message' => 'Data berhasil di hapus', 'status' => 'success'], 200);
    }

    public function category_get()
    {
        $category = Category::onlyTrashed();

        return DataTables::of($category)
            ->addIndexColumn()
            ->addColumn('check', function ($category) {
                return  '<div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" value="' . $category->id . '" name="id-checkbox" onchange="checkbox_this(this)" id="checkbox-' . $category->id . '" >
                    <label for="checkbox-' . $category->id . '" class="custom-control-label">&nbsp;</label>
                    </div>';
            })
            ->addColumn('btn', function ($category) {
                return '
            <a href="#" class="btn btn-icon btn-sm btn-info" data-value="' . $category->id . '" id="recycle"><i class="fas fa-recycle"></i></a>
            <a href="#" class="btn btn-icon btn-sm btn-danger" data-value="' . $category->id . '" id="delete"><i class="fas fa-trash"></i></a>
            ';
            })
            ->editColumn('created_at', function ($category) {
                return date('d-M-Y H:i', strtotime($category->created_at));
            })
            ->editColumn('deleted_at', function ($category) {
                return date('d-M-Y H:i', strtotime($category->deleted_at));
            })
            ->rawColumns(['check', 'btn'])
            ->make(true);
    }


    public function category_recovery(Request $request)
    {
        activity('merecovery data sampah category');
        if (is_array($request->value)) {
            foreach ($request->value as $value) {
                Category::onlyTrashed()->where('id', $value)->restore();
            }
            return response()->json(['message' => 'Data berhasil di restore', 'status' => 'success'], 200);
        }
         Category::onlyTrashed()->where('id', $request->value)->restore();
        return response()->json(['message' => 'Data berhasil di restore', 'status' => 'success'], 200);
    }

    public function category_delete(Request $request)
    {
        activity('menghapus data sampah category');
        if (is_array($request->value)) {
            foreach ($request->value as $value) {
               Category::onlyTrashed()->where('id', $value)->forceDelete();
            }
            return response()->json(['message' => 'Data berhasil di hapus', 'status' => 'success'], 200);
        }
      
     Category::onlyTrashed()->where('id', $request->value)->forceDelete();
        return response()->json(['message' => 'Data berhasil di hapus', 'status' => 'success'], 200);
    }
}
