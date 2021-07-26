<div class="container-fluid px-0">
    <div id="myCarousel" class="carousel slide" data-ride="carousel" >
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
            <li data-target="#myCarousel" data-slide-to="2" class=""></li>
        </ol>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="first-slide img-fluid" src="{{asset('images/sports-1.jpg')}}" alt="First slide">
                <div class="container">
                    <div class="carousel-caption text-left">
                        <h1>{{__('Welcome to ShopERP')}}</h1>
                        
                        <p class="rgba-complement-letter-3">{{__('Newsletter')}}</p>
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" >
                <img class="second-slide img-fluid" src="{{asset('images/sports-2.jpg')}}"  alt="Second slide">
                <div class="container">
                    <div class="carousel-caption text-left">
                        <h1>{{__('Welcome to ShopERP')}}</h1>
                        <p class="rgba-complement-letter-3">{{__('Amazing and awesome shop')}}</p>
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item ">
                <img class="third-slide img-fluid" src="{{asset('images/sports-3.jpg')}}" alt="Third slide">
                <div class="container">
                    <div class="carousel-caption text-right">
                        <h1>{{__('Welcome to ShopERP')}}</h1>
                        <p class="rgba-complement-letter-3">{{__('Oferts')}}</p>
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
