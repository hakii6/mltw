<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <title>製作人企劃書 by蛤蛤</title>

    <style>

        .header{
        border-width:0px;
        border-radius: 20px;

        border-color:#FA8072;
        background-color:#FFA54F;
        color: #8B5A2B;

        margin:10px 0px 10px 0px;
        padding:10px;

        font-align: center;

    }

    .menu{
        border-width:0px;
        border-color:#FA8072;
        background-color:#FFA500;
        margin:10px 0px 10px 0px;

        padding:10px;           
        font-size:24px;
        font-weight:bold;

        border-radius: 15px;
    }






    .content{
        border-style:solid;
        border-width:5px;
        border-color:#FFB90F;
        background-color:#FFFFE0;
        padding:20px;           
    }

    table{

        border:1px solid #FFB90F;

    }

    th{
        padding:1px;
        font-weight:bold;
        border:1px solid #FFB90F;
        text-align: center;

    }
    td{
        padding:1px;
        border:1px solid #FFB90F;
        text-align: center;

    }

    .thumbnail{

        width:75px;

    }
    .status_box{
        border:0px;
        border-radius: 7px;
        background-color: #FFA54F;
        padding: 5px;
        text-align: center;
    }

    .space{
        border:0px solid;
        margin: 6px 0px 6px 0px;
    }
    ._table{
        display: table;

    }
    ._tr {
        
        display: table-row;
    }
    ._td {
        display: table-cell;
        margin: 35px 0px 35px 0px;

    }
    .toumei{

        border-top: 0px;
        border-left: 2px solid #FFB90F;
        border-bottom: 0px;
        border-right:2px solid #FFB90F;
        text-align: center;
        width: 700px;
        padding: 10px;

    }
    .toumei2{

        border-top: 0px;
        border-left: 2px solid #FFB90F;
        border-bottom: 0px;
        border-right:2px solid #FFB90F;
        text-align: center;
        width: 500px;
        padding: 10px;

    }
    .toumei_list{

        border: 0px solid;
        text-align: left;
        width: 200px;
        padding: 0px;

    }
    .toumei_list2{

        border: 0px solid;
        text-align: left;
        width: 350px;
        padding: 0px;

    }
    .on{

        border:0px solid;
        background-color:#FFFFE0;
        color:  #8B6914;

    }

    button{
        font-weight:bold;
        border:0px solid;
        background-color:#FFFFE0;
        color:  #8B6914;

    }

    hr{

        border:1px solid;
        border-radius:2px;  
        margin: 35px 0px 35px 0px;

    }

    body{
        background-color: #FFE4B5;
        color:  #8B6914;
        font-size: 17px;
    }

    a{

        color:#FF8C00;

    }

        .full{
        border-top:5px solid;
        border-left:5px solid;
        border-right:5px solid;
        border-bottom:5px solid;


    }
    .inner{

        margin:10px 10px 10px 10px;
        border-style: hidden;

        border-collapse: collapse;


    }


    

    li{

        font-weight:bold;

    }

    .warn{

        color: red;
        font-weight:bold;

    }

    .mk_gr{

        color: green;
        font-weight: bold;

    }

    .mk_bl{

        color: blue;
        font-weight: bold;

    }

    .p1{

        font-size: 18px;

    }
    .p2{

        text-align: center;

    }

    .p3{

        text-align: left;
        font-size: 18px;

    }
    .claim{

        text-align: center;
        font-weight: bold;
        font-size: 64px;

    }

    .claim2{
        text-align: center;
        font-weight: bold;
        font-size: 24px;

    }


    </style>
</head>

<body>
    <div id="app">
        
        <app></app>

    </div>

    <script src="js/app.js?v=Date.now()"></script>
</body>

</html>
