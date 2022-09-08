<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Auth\Events\Validated;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',[
            'projects' => Project::orderby('id', 'desc')->get(),
        ]);
    }

    public function create(){
        return view('tambah');
    }

    public function store(Request $request){
        $request->validate([
            'nama_project' => 'required',
            'keterangan' => 'required'
        ]);

        Project::create([
            'nama_project' => $request->nama_project,
            'keterangan' => $request->keterangan,
            'status' => $request->status
        ]);

        return redirect()->route('home')->with('status', 'Berhasil tambah data');
    }

    public function edit($id){
        $project = Project::where('id',$id)->first();
        return view('edit', [
            'project' => $project
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama_project' => 'required',
            'keterangan' => 'required'
        ]);

        Project::where('id', $id)->
        update([
            'nama_project' => $request->nama_project,
            'keterangan' => $request->keterangan,
            'status' => $request->status
        ]);

        return redirect()->route('home')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        Project::where('id',$id)->delete();
        return redirect()->route('home')->with('success', 'Data berhasil dihapus');
    }
}
