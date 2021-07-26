<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Oswald:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        * {
            font-family: 'Oswald', sans-serif;
        }


    </style>
</head>
<body>
      <div class="container mx-auto ">
          <div class="mx-auto row">
              <div class="mx-auto col-md-6">
                <div class="text-center card">
                    <div class="card-header bg-warning">
                        {{__('Welcome to ShopERP')}}
                    </div>
                    <div class="card-body">
                      <h3 class="card-title ">{{__('Hello')}} {{ $name }}</h3>
                      <h4 class="card-text">{{__('Thanks you')}}</h4>

                    </div>
                    <div class="card-footer">
                      ShopERP
                    </div>
                  </div>

              </div>
          </div>
      </div>
</body>
</html>





























