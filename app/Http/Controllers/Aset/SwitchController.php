<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SwitchHub;
use App\Models\Brand;
use App\Models\Lokasi;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class SwitchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = SwitchHub::with('brand', 'lokasi')->get();

        $list_brand = Brand::where('jenis_brand', 'Switch')->get();
        $list_lokasi = Lokasi::all();
        $list_jenis = ['Management', 'Non Management'];
        $list_jenis_port = ['Fast Ethernet', 'Gigabit Ethernet', 'Fast & Gigabit Ethernet'];

        return view('pages.aset.switch.index', [
            'items' => $items,
            'list_brand' => $list_brand,
            'list_lokasi' => $list_lokasi,
            'list_jenis' => $list_jenis,
            'list_jenis_port' => $list_jenis_port
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = IdGenerator::generate(['table' => 'switch_hubs', 'field' => 'idswitch', 'length' => 6, 'prefix' => 'SW-']);
        $idswitch = $id . '/' . 'UBINFRA/' . date('Y');

        $data = $request->all();
        $data['idswitch'] = $idswitch;

        SwitchHub::create($data);
        return redirect()->route('switch.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = SwitchHub::find($id);
        $item->update($data);
        return redirect()->route('switch.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = SwitchHub::find($id);
        $item->delete();
        return redirect()->route('switch.index')->with('success', 'Data berhasil dihapus');
    }
}
