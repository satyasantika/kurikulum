<?php

namespace App\Http\Controllers\Prodi;

use App\Models\Prodi;
use Illuminate\Http\Request;
use App\DataTables\ProdisDataTable;
use App\Http\Controllers\Controller;

class ProdiController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:read roles', ['only' => ['index','show']]);
        $this->middleware('permission:create roles', ['only' => ['create','store']]);
        $this->middleware('permission:update roles', ['only' => ['edit','update']]);
        $this->middleware('permission:delete roles', ['only' => ['destroy']]);
    }

    public function index(ProdisDataTable $dataTable)
    {
        $add_route = 'prodis.create';
        return $dataTable->render('layouts.setting',compact('add_route'));
    }

    public function create()
    {
        $prodi = new Prodi();
        return view('prodi.prodi-form', array_merge(
            [
                'prodi'=> $prodi,
            ],
        ));
    }

    public function store(Request $request)
    {
        $name = strtoupper($request->name);
        // dd($request->all());
        Prodi::create($request->all());

        return to_route('prodis.index')->with('success','prodi '.$name.' telah ditambahkan');
    }

    public function edit(Prodi $prodi)
    {
        return view('prodi.prodi-form', array_merge(
            [
                'prodi'=> $prodi,
            ],
        ));
    }

    public function update(Request $request, Prodi $prodi)
    {
        $name = strtoupper($prodi->name);
        $data = $request->all();
        $prodi->fill($data)->save();

        return to_route('prodis.index')->with('success','menu '.$name.' telah diperbarui');
    }

    public function destroy(Prodi $prodi)
    {
        $name = strtoupper($prodi->name);
        $prodi->delete();
        return to_route('prodis.index')->with('warning','menu '.$name.' telah dihapus');
    }

}
