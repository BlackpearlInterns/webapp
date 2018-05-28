@extends('layouts.app')

@section('content')

        @if ($transid)
      
        @endif
        <div class="alert alert-success">
                Transaction successful! Trans ID: <?php echo $transid; ?>
            </div>
        <h1>Form</h1>
        <p>This page will display the form that passes data to a Google Spreadsheet</p>
    
<?php
        echo Form::open(array('action' => 'FormsController@confirmData'), ['method' => 'POST']);
            echo "<div class='form-group'>";
               echo Form::label('payee', 'Payee');
               echo Form::text('payee', '', ['class' => 'form-control', 'placeholder' => "Payee's Full Name"]);
            echo "</div>";
            echo "<div class='form-group'>";
               echo Form::label('VAT_sales', 'VAT (Value Added Tax)');
               echo Form::number('VAT_sales', '', ['class' => 'form-control', 'placeholder' => 'VAT Amount']); 
            echo "</div>";
            echo "<div class='form-group'>";
               echo Form::label('NVAT_sales', 'Non-VAT (Non-Value Added Tax)');
               echo Form::number('NVAT_sales', '', ['class' => 'form-control', 'placeholder' => 'Non-VAT Amount']);
            echo "</div>";
            echo "<div class='form-group'>";
               echo Form::label('notes', 'Notes');
               echo Form::text('notes', '', ['class' => 'form-control', 'placeholder' => 'Write something about the transaction']);
            echo "</div>";
            echo '<div class="form-group">';
                echo Form::label('date', 'Published On:');
                echo Form::date('date', date('Y-m-d'), ['class' => 'form-control']);
            echo "</div>";
               echo Form::submit('Submit', ['class' => 'btn btn-success float-right']);
        echo Form::close();
        ?>

       
        
@endsection