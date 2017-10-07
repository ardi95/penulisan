<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePelajar;
use App\Pelajar;
use App\Nilai;
use App\User;
use Auth;
use Input;

class AwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $awal = Pelajar::paginate(4);
        $data['awal'] = $awal->setPath('awal');
        return view('Awal.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function search(Request $request)
    {
        $data = $request->all();
        $keyword = $data['keyword'];
        $keyworda = $data['keyworda'];
        $keywordv = "%$keyword%";
        $awal = Pelajar::where($keyworda,'like',$keywordv)->paginate(4);
        $data['awal'] = $awal->setPath('awal');
        return view('Awal.index',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tes()
    {
        //
        $IS = Auth::user()->pelajar_id;
        $nilait = Pelajar::join('nilais','pelajars.id','=','nilais.pelajar_id')->where('pelajars.id','=',$IS)->get();
        $data['nilair'] = $nilait;
        $data['awal'] = Pelajar::find($IS);
        return view('Awal.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function status_login()
    {
        if(Auth::check())
        {
            $user = Auth::user();
            echo "sudah login";
        }
        else
        {
            echo "belum login";
        }
    }

    public function pdf()
    {
        //
        $pdf = new \fpdf\FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(8,8,'No',1,0);
        $pdf->Cell(40,8,'Pelajaran',1,0);
        $pdf->Cell(30,8,'Tipe Ujian',1,0);
        $pdf->Cell(25,8,'Nilai',1,1);

        $IS = Auth::user()->pelajar_id;
        $nilai = Pelajar::join('nilais','pelajars.id','=','nilais.pelajar_id')->where('pelajars.id','=',$IS)->get();
        $no=1;
         $pdf->SetFont('Arial','',11);
        foreach ($nilai as $t) {
        $pdf->Cell(8,8,$no,1,0);
        $pdf->Cell(40,8,$t->pelajaran,1,0);
        $pdf->Cell(30,8,$t->tipe_ujian,1,0);
        $pdf->Cell(25,8,$t->nilai_ujian,1,1);
        $no++;
        }
        $pdf->Output();
        die;
    }
}
