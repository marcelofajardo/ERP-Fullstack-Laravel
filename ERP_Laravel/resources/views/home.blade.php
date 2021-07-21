@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="mt-5 row">
        <div class="mx-auto col-md-8">
        <div class="mx-auto rounded jumbotron bg-warning">
              <h2 class="text-center">{{__('Welcome to ShopERP')}}</h2>
              <h4 class="text-center">{{__('Amazing and awesome shop')}}</h4>

          <div class="flex-row d-flex justify-content-around align-items-center">
              <button type="button" data-toggle="modal" data-target="#exampleModal1" class="mt-3 btn btn-secondary">{{__('Terms and conditions')}}</button>
              <button type="button" data-toggle="modal" data-target="#exampleModal2" class="mt-3 btn btn-secondary">{{__('Policy of privacity')}}</button>
              <button type="button" data-toggle="modal" data-target="#exampleModal3" class="mt-3 btn btn-secondary">{{__('Shop Gallery')}}</button>

          </div>
          <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">{{__('Terms and conditions')}}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia similique veritatis nemo, quaerat commodi optio cupiditate tempora, quis doloribus pariatur atque est ab recusandae id delectus ut aliquid rem at, dolorem possimus obcaecati dolor. Magnam recusandae iste eaque consectetur, cupiditate in, nisi pariatur quasi incidunt illum adipisci nihil nemo numquam.</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia similique veritatis nemo, quaerat commodi optio cupiditate tempora, quis doloribus pariatur atque est ab recusandae id delectus ut aliquid rem at, dolorem possimus obcaecati dolor. Magnam recusandae iste eaque consectetur, cupiditate in, nisi pariatur quasi incidunt illum adipisci nihil nemo numquam.</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia similique veritatis nemo, quaerat commodi optio cupiditate tempora, quis doloribus pariatur atque est ab recusandae id delectus ut aliquid rem at, dolorem possimus obcaecati dolor. Magnam recusandae iste eaque consectetur, cupiditate in, nisi pariatur quasi incidunt illum adipisci nihil nemo numquam.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel2">{{__('Policy of privacity')}}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia similique veritatis nemo, quaerat commodi optio cupiditate tempora, quis doloribus pariatur atque est ab recusandae id delectus ut aliquid rem at, dolorem possimus obcaecati dolor. Magnam recusandae iste eaque consectetur, cupiditate in, nisi pariatur quasi incidunt illum adipisci nihil nemo numquam.</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia similique veritatis nemo, quaerat commodi optio cupiditate tempora, quis doloribus pariatur atque est ab recusandae id delectus ut aliquid rem at, dolorem possimus obcaecati dolor. Magnam recusandae iste eaque consectetur, cupiditate in, nisi pariatur quasi incidunt illum adipisci nihil nemo numquam.</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia similique veritatis nemo, quaerat commodi optio cupiditate tempora, quis doloribus pariatur atque est ab recusandae id delectus ut aliquid rem at, dolorem possimus obcaecati dolor. Magnam recusandae iste eaque consectetur, cupiditate in, nisi pariatur quasi incidunt illum adipisci nihil nemo numquam.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel3">{{__('Shop Gallery')}}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                    <div class="mb-4 col-lg-4 col-md-12 mb-lg-0">
                        <img
                          src="https://cdn.pixabay.com/photo/2021/06/21/21/35/car-6354667_960_720.png"
                          class="mb-4 rounded w-100 shadow-1-strong"
                          alt=""
                        />

                        <img
                          src="https://cdn.pixabay.com/photo/2021/06/17/19/13/books-6344402_960_720.png"
                          class="mb-4 rounded w-100 shadow-1-strong"
                          alt=""
                        />
                      </div>

                      <div class="mb-4 col-lg-4 mb-lg-0">
                        <img
                          src="https://cdn.pixabay.com/photo/2021/06/17/19/13/books-6344402_960_720.png"
                          class="mb-4 rounded w-100 shadow-1-strong"
                          alt=""
                        />

                        <img
                          src="https://cdn.pixabay.com/photo/2021/06/21/21/35/car-6354667_960_720.png"
                          class="mb-4 rounded w-100 shadow-1-strong"
                          alt=""
                        />
                      </div>

                      <div class="mb-4 col-lg-4 mb-lg-0">
                        <img
                          src="https://cdn.pixabay.com/photo/2021/06/21/21/35/car-6354667_960_720.png"
                          class="mb-4 rounded w-100 shadow-1-strong"
                          alt=""
                        />

                        <img
                          src="https://cdn.pixabay.com/photo/2021/06/17/19/13/books-6344402_960_720.png"
                          class="mb-4 rounded w-100 shadow-1-strong"
                          alt=""
                        />
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>

          </div>
        </div>
    </div>
   <div class="row">
       <div class="mx-auto col-md-8">
        <div class="card" >

            <div class="card-body">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                      <div class="card-header bg-warning" id="headingOne">
                        <h2 class="mb-0">
                          <button class="text-center btn btn-block" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            {{__('Our Shop')}}
                          </button>
                        </h2>
                      </div>

                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni, saepe amet, eveniet quas in a, distinctio recusandae eius unde architecto commodi? Iste distinctio vel in incidunt ipsam, fugiat soluta! Atque accusantium quo dolore vitae aperiam. Illo, cumque consectetur modi ducimus eum sint ratione maxime dolore eos repellendus unde natus rerum facilis nisi dolor nobis vel expedita! Doloremque mollitia minus totam molestias magni sed dolorem debitis. Ea totam sint dolores voluptas, consequatur numquam temporibus suscipit nesciunt, tempore praesentium tempora quisquam id fugiat non aliquam nam cum inventore animi maiores ut. Quasi error fuga commodi quo officiis, ipsa dolorum ea nam aperiam!</p>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header bg-warning" id="headingTwo">
                        <h2 class="mb-0">
                          <button class="text-center btn btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            {{__('Products')}}
                          </button>
                        </h2>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                          <ul class="list-group">
                              <li class="list-group-item">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, quam.</li>
                              <li class="list-group-item">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, quam.</li>
                              <li class="list-group-item">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, quam.</li>
                              <li class="list-group-item">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, quam.</li>
                              <li class="list-group-item">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, quam.</li>
                              <li class="list-group-item">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, quam.</li>
                              <li class="list-group-item">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, quam.</li>
                              <li class="list-group-item">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, quam.</li>
                              <li class="list-group-item">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, quam.</li>
                              <li class="list-group-item">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, quam.</li>

                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header bg-warning" id="headingThree">
                        <h2 class="mb-0">
                          <button class="text-center btn btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            {{__('Oferts')}}
                          </button>
                        </h2>
                      </div>
                      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, quam.</li>
                                <li class="list-group-item">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, quam.</li>
                                <li class="list-group-item">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, quam.</li>
                                <li class="list-group-item">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, quam.</li>
                                <li class="list-group-item">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, quam.</li>
                                <li class="list-group-item">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, quam.</li>
                                <li class="list-group-item">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, quam.</li>
                                <li class="list-group-item">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, quam.</li>
                                <li class="list-group-item">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, quam.</li>
                                <li class="list-group-item">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, quam.</li>

                            </ul>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
          </div>
       </div>
   </div>
</div>
@endsection
