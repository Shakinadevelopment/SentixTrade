<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Ratio;
use App\Models\TransactionApi;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use DataTables;

class TradersSentimentController extends Controller
{
    public function chart(Request $request)
    {
        $filterCurrency = $request->input('filter_currency');
        $filterBroker = $request->input('filter_broker');
        $type = $request->input('type');
    
        $lastTransactionApi = TransactionApi::orderBy('last_update', 'desc')->first();
    
        $ratios = Ratio::where('transaction_api_id', optional($lastTransactionApi)->id)
                        ->where('type', 'Pairs');
    
        if ($filterCurrency) {
            $ratios->where('currency', $filterCurrency);
        } else {
            $ratios->where('currency', 'AUDJPY');
        }
    
        $ratios = $ratios->latest('updated_at')->get();
    
        $ratio_brokers = Ratio::where('transaction_api_id', optional($lastTransactionApi)->id)
                                ->where('type', 'Brokers');
    
        if ($filterBroker) {
            $ratio_brokers->where('currency', $filterBroker);
        } else {
            $ratio_brokers->where('currency', 'amarkets');
        }
    
        $ratio_brokers = $ratio_brokers->latest('updated_at')->get();
    
        $cur = $filterCurrency ?: 'AUDJPY';
        $brok = $filterBroker ?: 'amarkets';
    
        $lastUpdate = optional($lastTransactionApi)->last_update ? Carbon::parse($lastTransactionApi->last_update)->diffForHumans() : null;
    
        $currency = Ratio::select('currency')->where('type','Pairs')->groupBy('currency')->orderBy('currency')->get();
        $brokers = Ratio::select('currency')->where('type','Brokers')->groupBy('currency')->orderBy('currency')->get();
    
    
        return view('sentiment.chart', compact('currency', 'ratios', 'cur', 'lastUpdate', 'brokers', 'brok', 'ratio_brokers'));
    }

    public function dashboard(Request $request){

        $data= Ratio::get();
        return view('sentiment.dashboard', compact('data'));


    }

    public function getDatatablexx(Request $request)
    {
        if ($request->ajax()) {
            $query = Ratio::select('ratios.*')
                // ->join('transaction_api', 'transaction_api.id', '=', 'ratios.transaction_api_id')
                ->orderBy('updated_at', 'DESC');
                if ($request->has('date_range')) {
                    // dd($request->input('date_range'));die;
                    // Split the date_range into start and end date
                    $dateRange = explode(' - ', $request->input('date_range'));
                    $startDate = Carbon::parse($dateRange[0])->startOfDay();
                    $endDate = Carbon::parse($dateRange[1])->endOfDay();
        
                    // Add where clause to filter data within the date range
                    $query->whereBetween('updated_at', [$startDate, $endDate]);
                }

    
            return Datatables::of($query)
                ->addIndexColumn()
                ->addColumn('last_update22', function ($row) {
                    return Carbon::parse($row->updated_at)->format('d-M-Y H:i:s');
                })
                ->addColumn('action', function($row){
                    $deleteButton = "<button class='btn btn-sm btn-danger deleteUser' data-id='".$row->id."'><i class='fa fa-solid fa-trash'></i></button>";
                    return $deleteButton;
                })
                ->make(true);
        }
    }

    public function getDatatable(Request $request)
    {
        if ($request->ajax()) {
            $query = Ratio::select('ratios.*')
                // ->join('transaction_api', 'transaction_api.id', '=', 'ratios.transaction_api_id')
                ->orderBy('updated_at', 'DESC');
                if ($request->has('date_range')) {
                    // dd($request->input('date_range'));die;
                    // Split the date_range into start and end date
                    $dateRange = explode(' - ', $request->input('date_range'));
                    $startDate = Carbon::parse($dateRange[0])->startOfDay();
                    $endDate = Carbon::parse($dateRange[1])->endOfDay();
        
                    // Add where clause to filter data within the date range
                    $query->whereBetween('updated_at', [$startDate, $endDate]);
                }

    
            return Datatables::of($query)
                ->addIndexColumn()
                ->addColumn('last_update22', function ($row) {
                    return Carbon::parse($row->updated_at)->format('d-M-Y H:i:s');
                })
                ->addColumn('action', function($row){
                    $deleteButton = "<button class='btn btn-sm btn-danger deleteUser' data-id='".$row->id."'><i class='fa fa-solid fa-trash'></i></button>";
                    return $deleteButton;
                })
                ->make(true);
        }
    }


    public function fetchAndSaveRatios()
    {
        $response = Http::get('https://c.fxssi.com/api/current-ratios');

        // $data = $response->json();
        // dd($data);

        $currentDate = Carbon::now()->format('Ymd');
        $countTransactions = TransactionApi::whereDate('last_update', Carbon::today())->count();
        $sequenceNumber = str_pad($countTransactions + 1, 4, '0', STR_PAD_LEFT);
        $generateNo = 'API' . $currentDate . $sequenceNumber;
        $transactionApi = new TransactionApi();
        $transactionApi->generate_no = $generateNo;
        $transactionApi->last_update = Carbon::now();
        $transactionApi->save();

        if ($response->successful()) {
            $data = $response->json();
            $transactionApiId = $transactionApi->id;
            



            // save pairs
            foreach ($data['pairs'] as $currency => $pair) {
                foreach ($pair as $company => $value) {
                    // Hitung nilai sell
                    
                    if ($value > 100.00) {
                        // Ambil dua digit pertama sebelum titik (.)
                        $value = substr($value, 0, 2) . substr($value, strpos($value, '.'));
                    }
            
                    // Hitung nilai sell
                    $sell = 100 - (float)$value;
                    
                    // Simpan data ke dalam tabel ratios
                    Ratio::create([
                        'currency' => $currency,
                        'type' => 'Pairs',
                        'transaction_api_id' => $transactionApiId,
                        'company' => $company,
                        'buy' => (float)$value,
                        'sell' => $sell,
                    ]);
                }
            }

            // save brokers
            foreach ($data['brokers'] as $currency_brokers => $brokers) {
                foreach ($brokers as $company_brokers => $value_brokers) {
                    // Hitung nilai sell
                    
                    if ($value_brokers > 100.00) {
                        // Ambil dua digit pertama sebelum titik (.)
                        $value_brokers = substr($value_brokers, 0, 2) . substr($value_brokers, strpos($value_brokers, '.'));
                    }
            
                    // Hitung nilai sell
                    $sell_brokers = 100 - (float)$value_brokers;
                    
                    // Simpan data ke dalam tabel ratios
                    Ratio::create([
                        'currency' => $currency_brokers,
                        'type' => 'Brokers',
                        'transaction_api_id' => $transactionApiId,
                        'company' => $company_brokers,
                        'buy' => (float)$value_brokers,
                        'sell' => $sell_brokers,
                    ]);
                }
            }

             
            // return redirect()->back()->with('status', 'Data saved successfully');
            return redirect()->route('admin.dashboard')->with('success', 'Data saved successfully.');
        }
        else 
        {
            return redirect()->route('admin.dashboard')->with('error', 'Failed to save data from API.');
        }
    }

    // delete one row
    function deleteData(Request $request){
        $id = $request->id;
        //  dd($id);
        // Lakukan penghapusan data di sini
        // Misalnya, jika menggunakan Eloquent, Anda bisa melakukan seperti ini:
        Ratio::destroy($id);
        // Anda juga dapat menambahkan logika lainnya di sini
        // Misalnya, mengirimkan pesan ke klien tentang keberhasilan atau kegagalan penghapusan
        return response()->json(['success' => 1]);
        
    }

    // delete all
    function deleteSelected(Request $request){
        $ids = $request->ids;
        // dd($ids);
        // Lakukan penghapusan data dengan beberapa ID di sini
        // Misalnya, jika menggunakan Eloquent, Anda bisa melakukan seperti ini:
        Ratio::whereIn('id', $ids)->delete();

        //    $cek =  TransactionApi::where('transaction_api_id', $ids)->get();
        // Anda juga dapat menambahkan logika lainnya di sini
        // Misalnya, mengirimkan pesan ke klien tentang keberhasilan atau kegagalan penghapusan
        return response()->json(['success' => 1]);
        }

    }
