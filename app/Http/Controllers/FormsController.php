<?php

namespace Sprint\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Sprint\Form;

class FormsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Form::all();
        return view('pages.form');
    }

    public function confirmData (Request $getConfirmation)
    {
        $formdata = $getConfirmation->all();
        
        $formdata['VAT'] = $formdata['VAT_sales']*0.12;
        $formdata['total'] = $formdata['VAT'] + $formdata['VAT_sales'] + $formdata['NVAT_sales'];

        session(['payee' => $formdata['payee'], 'VAT_sales' => $formdata['VAT_sales'], 
        'VAT' => $formdata['VAT'], 'NVAT_sales' => $formdata['NVAT_sales'], 
        'notes' => $formdata['notes'], 'date' => $formdata['date'], 
        'total' => $formdata['total']]);

        return view('pages.confirm')->with(['payee' => $formdata['payee'], 'VAT_sales' => $formdata['VAT_sales'], 
            'VAT' => $formdata['VAT'], 'NVAT_sales' => $formdata['NVAT_sales'], 
            'notes' => $formdata['notes'], 'date' => $formdata['date'], 
            'total' => $formdata['total']]);
    }

    public function writeData (Request $confirmation)
    {
        $formdata = Session::all();

        require 'C:\xampp\htdocs\webapp\vendor\autoload.php';

        $client = new \Google_Client();
        $client->setApplicationName('My PHP App');
        $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $client->setAccessType('offline');

        $client->setAuthConfig('C:\xampp\htdocs\webapp\php-to-sheets-2cfb03ff2c93.json');

        $sheets = new \Google_Service_Sheets($client);

        $currentRow = 2;

        $spreadsheetId = '1uKAOjHLfqVnAteA7ln2zCFCxzcecZ1iBK1AdjpRcs4A';

        $range = 'B2:G';
        $rows = $sheets->spreadsheets_values->get($spreadsheetId, $range, ['majorDimension' => 'ROWS']);
        if (isset($rows['values'])) {
            foreach ($rows['values'] as $row) {
                if (!empty($row[0])) { $currentRow++; }
            }
        }
            $updateRange = 'B'.$currentRow.":H";
            $values = [
                [
                    Session::get('payee'),
                    Session::get('VAT_sales'),
                    Session::get('NVAT_sales'),
                    Session::get('VAT'),
                    Session::get('total'),
                    Session::get('date'),
                    date('c')
                ]
            ];
            $body = new \Google_Service_Sheets_ValueRange([
                'values' => $values
              ]);
            $params = [
                'valueInputOption' => 'USER_ENTERED'
            ];
            $result = $sheets->spreadsheets_values->update($spreadsheetId, $updateRange,
                $body, $params);
                $transdata = '';
                $readRange = 'A'.$currentRow.':G';
                $rows = $sheets->spreadsheets_values->get($spreadsheetId, $readRange, ['majorDimension' => 'ROWS']);
                if (isset($rows['values'])) {
                    foreach ($rows['values'] as $row) {
                        print_r($rows['values']);
                    }
                }
                return view('pages.form', ['transid' => $transdata]);

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
}
