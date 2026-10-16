<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Request;
use DB;
use PDF;
use App;

class ReportController extends Controller
{
    public function day()
    {
        $data['data'] = Complaint::with(['Society', 'Satker'])->orderBy('id','desc')->get();
        return view('admin.report.day.index', $data);
    }

    public function day_search()
    {
        $date1 = Request::get('date1');
        $date2 = Request::get('date2');
        $data['data'] = Complaint::with(['Society', 'Satker'])
            ->whereBetween('date_complaint', [$date1, $date2])
            ->orderBy('id', 'desc')
            ->get();
        return view('admin.report.day.index', $data);
    }

    public function day_pdf()
    {
        $date1 = Request::get('date1');
        $date2 = Request::get('date2');
        $data['data'] = Complaint::with(['Society', 'Satker', 'Response'])
            ->whereBetween('date_complaint', [$date1, $date2])
            ->orderBy('id', 'asc')
            ->get();
        $data['date1'] = $date1;
        $data['date2'] = $date2;
        return view('admin.report.day.print_data', $data);
    }
}
