@include('homepage.userheader')

    <form action="" method="POST">
    <div>
        @if ($product)
        <h3 class="h3_detail">{{$product->nametour}}</h3>
        <section class="section1" >  
            <div >
            <div class="div1">
            <div class="col-md-8" style=" height: 600px;">
               
                <img src="{{asset('storage/images')}}/{{$product->image}}" class="img1"></div>
               
              
            <div class="col-md-4">
                <div class="ct1">
                    <p class="pdetail1">{{$product->nametour}}</p>
                    <hr>
                    <p><span class="span1">Mã tour:</span> {{$product->id_tour}}</p>
                    <hr>
                    <p><span class="span1">Thời gian:</span> {{$product->schedule}}</p>
                    <hr>
                    <p><span class="span1">Ngày khởi hành:</span> {{$product->startdate}}</p>
                    <hr>
                    <p><span class="span1">Ngày kết thúc:</span> {{$product->enddate}}</p>
                    <hr>
                    <p><span class="span1">Phương tiện:</span> {{$product->vehicle}}</p>
                    <hr>
                    <p><span class="span1">Số chỗ còn lại:</span> {{$product->numberguests}}</p>
                    <p style="height:20%; background-color: #11d81b; font-weight: bold; font-size: 40px">
                        <span class="span1">Giá:</span>
                        @if($product->sale_price)               
                            <span style="color: #000;">{{$product->sale_price}}</span>
                            <span style="text-decoration: line-through; font-size: 20px">{{$product->price}}</span>
                        @else
                            {{$product->price}}
                        @endif
                    </p>
                     <a href="{{route('booktour', $product->id_tour)}}"><button type="button" class="btn-order-tour">đặt tour</button></a>
                </div>
            </div>
        </div>
        <br>
        </div>
       <div>
        <p style="width: 200px;">
            {!!$product->description!!}</p>
       </div>
{{-- các tour du lịch liên quan --}}
<section class="hotTourToday">
    <div class="container1" style="width:80%;">
      <div class="titleSection1">
        {{-- <h2 style="text-align:left">Các tour du lịch liên quan</h2> --}}
      </div>
      <br>
      <div class="wrapSlide1">
        <div class="slideTourToday">
          <ul>
              @foreach($relatedTours as $item)
              {{-- @if ($item->domain == $domain || !isset($domain)) --}}
                  <li>
                      <a href="{{ route('detail', $item->id_tour) }}" style="text-decoration: none" class="a1">
                          <img src="{{ asset('storage/images')}}/{{$item->image}}" class="imgapp2" alt="img" style="width:100%; height: 220px;">
                          <div style="margin: 5px 5px 5px 10px;">
                              <p>{{ $item->nametour }}</p>
                              <p><i class="far fa-thin fa-clock"></i> {{ $item->schedule }}</p>
                              <hr style="width:70%">
                              <div style="display: flex; align-items: center;">
                                  @if ($item->sale_price)
                                      {{-- Nếu có giá khuyến mãi --}}
                                      <p style="margin-right: 10px; text-decoration: line-through;">{{ $item->price }}</p>
                                      <p style="color: red; margin-right: 10px;">{{ $item->sale_price }}</p>
                                  @else
                                      {{-- Nếu không có giá khuyến mãi --}}
                                      <p style="margin-right: 10px;">{{ $item->price }}</p>
                                  @endif
                                  <div style="margin-left: auto;">
                                      <div style="display: flex; justify-content: center;">
                                          <i class="nav-icon fas fa-map-marker-alt"></i>
                                      </div>
                                      @if ($location = $locations->firstWhere('id_location', $item->id_location))
                                          <p>{{ $location->name_location }}</p>
                                      @else
                                          <p>Không có địa điểm</p>
                                      @endif
                                  </div>
                              </div>
                          </div>
                      </a>
                  </li>
                  {{-- @endif --}}
              @endforeach
          </ul>
          {{-- <div class="text-center">
            <a class="btn btn-primary" id="prevBtn">Previous</a>
            <a class="btn btn-primary" id="nextBtn">Next</a>
        </div> --}}
        </div>
      </div>
      
  </section>
        @else
            <div class="col-md-12">
                <p>Không tìm thấy sản phẩm</p>
            </div>
    </section>
    @endif
    </div>
    </form>
</body>
@include('homepage.footer')