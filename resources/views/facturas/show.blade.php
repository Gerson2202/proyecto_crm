<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>      
        #imagen{
        position: absolute;
        /* width: 100px; */
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
}
    </style>    

    <div id="centrador">
        <img  id="imagen" src="{{asset($factura->documento)}}" class="img-responsive"  alt="Product Image">
        {{-- <div class="h-30"></div> --}}
    </div>

    {{-- <div class="card border-white text-white bg-dark">
        <div class="card-header">
            TITLE
        </div>  
        <img class="mx-auto d-block" src="{{asset($factura->documento)}}" alt="Card image cap">
        <div class="card-body">
            <h4 class="card-title">Title</h4>
            <p class="card-text">Text</p>
        </div>
        <div class="card-footer">
            Any text
        </div>
    </div> --}}
    
    
</body>
</html>