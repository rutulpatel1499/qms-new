<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Log;
use Mpdf\Mpdf;
use Carbon;
use App\Models\Quatations\Quatation;
use App\Models\Products\Product;
use App\Models\Quatation_items\Quatation_item;
use Illuminate\Support\Facades\Session;
use App\Models\Clients\Client;
class CreatePdfController extends Controller
{
    
    public function pdfGenrate($id)
    {
        try
        {   
            
            // $quatations = Quatation::where('id',$id)->first();
            // $quatations_items = Quatation_item::where('quatation_id',$quatations->id)->get();
            // // dd($quatations);
            // $total_amount = 0;
            // foreach($quatations_items as $quatations)
            // {
            //     $total_amount += ($quatations->total)- ($quatations->total * $quatations->quatations->discount/100);
            // }


            $quatations=Quatation::find($id);

            $quatations_items = Quatation_item::where('is_active',1)->where('quatation_id',$quatations['id'])->get();
    
            $total_amount = 0;
            foreach($quatations_items as $quatation)
            {
                $total_amount += ($quatation->total)- ($quatation->total * $quatation->quatations->discount/100);
            }
            $date = Carbon\Carbon::now()->format('d-m-Y');
            $data = view('pdf', compact('quatations','quatations_items','date','total_amount'));
            // Log::info($data->render());
            $fileName = 'quatation.pdf'; // name of the pdf file to be generated  
            $mpdf = new Mpdf();
            $mpdf->simpleTables = true;
            $mpdf->SetTitle('My Title');
            $mpdf->setHeader('{PAGENO}');    
            $mpdf->SetDisplayMode('fullwidth');
            $mpdf->setFooter('nextpage');
            // $mpdf->WriteHTML('Quatation pdf');
            $mpdf->writeHtml($data->render());
            $mpdf->output($fileName, 'I'); // view pdf
            // $mpdf->output($fileName, 'D'); //download PDF       
            Log::info('data render');
        }
        catch (\Exception $e) {

        Log::info('message:'.$e->getMessage());
        Log::info('code:'.$e->getCode());

        Session::flash('danger','Internal server error');
        return redirect()->back();
        }
    }
}