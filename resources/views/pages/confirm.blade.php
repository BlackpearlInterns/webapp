@extends('layouts.app')

@section('content')        
        
        <h1>Confirm Input</h1>
        <div class="alert alert-danger" role="alert">
            <strong>Warning!</strong> Please confirm the data inputted are correct.
        </div>
        
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="row">Date of Transaction</th>
                <td>{{$date}}</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Payee</th>
                <td>{{$payee}}</td>
              </tr>
              <tr>
                <th scope="row">VAT Sales</th>
                <td>{{$VAT_sales}}</td>
              </tr>
              <tr>
                <th scope="row">VAT</th>
                <td>{{$VAT}}</td>
              </tr>
              <tr>
                <th scope="row">Non-VAT Sales</th>
                <td>{{$NVAT_sales}}</td>
              </tr>
              <tr>
                <th class="table-secondary" scope="row">Total</th>
                <th class="table-secondary">{{$total}}</th>
              </tr>
              <tr>
                    <td class="table-primary" colspan="2" scope="row"><b>Note:</b>
                            {{$notes}}
                    </td>
                  </tr>
            </tbody>
        </table>

        
        {{ Form::open(array('action' => 'FormsController@writeData'), ['method' => 'POST']) }}
            {{ Form::submit('Confirm', ['class' => 'btn btn-success float-right']) }}
        {{ Form::close() }}
        <a href="/webapp/public/form" class="btn btn-danger float-left">Go Back and Edit</a>

       
        
@endsection