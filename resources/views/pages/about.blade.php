@extends('layouts.app')

@section('content')
        <h1>About Us</h1>
        <p>This is the about page</p>
        <?php

        $stamp = date("Ymd");
    $random_id_length = 6;
    $rndid = generateRandomString( $random_id_length );

    $orderid = $stamp ."-". $rndid;
    echo($orderid);

    function generateRandomString($length = 10) {
      $characters = '0123456789';
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
      }
      return $randomString;
    }
        ?>
@endsection