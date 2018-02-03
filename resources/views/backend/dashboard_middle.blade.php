@extends('backend.dashboard')
@section('content')
<div class="content-page">
    <style type="text/css">
        .mini-stat{
            background: green;
            border: 3px solid #ffffff;
            box-shadow: 2px 2px 3px green;
            position: relative;
            -webkit-transition: all 200ms ease-in;
            -webkit-transform: scale(1); 
            -ms-transition: all 200ms ease-in;
            -ms-transform: scale(1); 
            -moz-transition: all 200ms ease-in;
            -moz-transform: scale(1);
            transition: all 200ms ease-in;
            transform: scale(1);  
            margin-bottom:  25px;
            width: 80%;
            height: auto;
        }
        .mini-stat:hover{
            box-shadow: 3px 3px 150px #000000;
            z-index: 2;
            -webkit-transition: all 200ms ease-in;
            -webkit-transform: scale(1.5);
            -ms-transition: all 200ms ease-in;
            -ms-transform: scale(1.5);   
            -moz-transition: all 200ms ease-in;
            -moz-transform: scale(1.5);
            transition: all 200ms ease-in;
            transform: scale(1.02);

        }

    </style>
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                 
            </div>
 
</div> <!-- container -->

</div> <!-- content -->

@include('backend/footer')

</div>
@stop()


