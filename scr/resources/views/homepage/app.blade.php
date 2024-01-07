@include('homepage.userheader')
  <main>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
    
      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="images/L1.jpg" class="d-block w-100" alt="First slide" alt="Image">
          <div class="carousel-caption">
          </div>      
        </div>
        <div class="item">
          <img src="images/L2.jpg" class="d-block w-100" alt="Second slide" alt="Image">
          <div class="carousel-caption">
          </div>      
        </div>
        <div class="item">
          <img src="images/L3.jpg" class="d-block w-100" alt="Second slide" alt="Image">
          <div class="carousel-caption">
          </div>      
        </div>
      </div>
    
      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <br>
    {{-- content --}}
    <section class="hotTourToday">
      <div class="container1" style="width:80%; margin: auto;">
        <div class="titleSection1">
          <h2 style="text-align: center">Hot nhất hôm nay</h2>
          <hr style=" border: 3px solid darkorange; width:10%">
        </div>
        <br>
        <div class="wrapSlide1">
         
          <div class="slideTourToday">
            <ul>
              @foreach($featuredTour as $item)
             
              <li>
                <a href="{{route('detail',$item->id_tour)}}" style="text-decoration: none" class="a1">
                <img src="{{ asset('storage/images')}}/{{$item->image}}" class="imgapp2" alt="img" style="width:100%; height: 220px;">
                <div style="margin: 5px 5px 5px 10px;">
                  <p>{{$item->nametour}}</p>
                  <p><i class="far fa-thin fa-clock"></i> {{$item->schedule}}</p>
                  <hr style="width:70%">
                  
                  <div style="display: flex; align-items: center;">
                    <p style="margin-right: 10px;"> Giá: {{ number_format($item->price, 0, '.', '.') }}đ</p>
                    <div style="margin-left: auto;">
                      <div  style="display: flex; justify-content: center;">
                      <i class="nav-icon fas fa-map-marker-alt"></i>
                      </div>
                    @if ($location = $locations->firstWhere('id_location', $item->id_location))
                    
                        <p >{{ $location->name_location }}</p>
                    @else
                        <p >Không có địa điểm</p>
                    @endif
                    </div>
                    
                    
                </div>
                <p>{{$item->sale_price}}</p>
                </div>
              </a>
              </li>
             
              @endforeach
            </ul>

          </div>
        </div>
      </div>

    </section>


    <section class="spaceWish">
      <div class="container">
          <div class="titleSection">
              <h2 style="text-align: center">Điểm đến yêu thích</h2>
              <hr style=" border: 3px solid darkorange; width:10%">
          </div>
          <div class="wrapSlide">
              <div class="row">
                  <div class="col-lg-4">
                      <a href="{{Route('hanoi')}}" class="wrapSpace">
                          <div class="img">
                              <img src="../images/a2.jpg" alt="">
                          </div>
                          <div class="content">
                              <h2>Hà Nội</h2>
                          </div>
                      </a>
                  </div>
                  <div class="col-lg-4">
                      <div class="row">
                          <div class="col-md-6">
                              <a href="tour.html" class="wrapSpace">
                                  <div class="img">
                                      <img src="../images/b7.jpg" alt="">
                                  </div>
                                  <div class="content">
                                      <h2>Đà Nẵng</h2>
                                  </div>
                              </a>
                          </div>
                          <div class="col-md-6">
                              <a href="tour.html" class="wrapSpace">
                                  <div class="img">
                                      <img src="../images/b11.png" alt="">
                                  </div>
                                  <div class="content">
                                      <h2>Hội An</h2>
                                  </div>
                              </a>
                          </div>          
                      </div>
                  </div>
                  <div class="col-lg-4">
                      <a href="tour.html" class="wrapSpace">
                          <div class="img">
                              <img src="../images/a5.jpg" alt="">
                          </div>
                          <div class="content">
                              <h2>Phú Quốc</h2>
                          </div>
                      </a>
                  </div>
                  <div class="col-lg-4">
                      <a href="tour.html" class="wrapSpace">
                          <div class="img">
                              <img src="../images/a5.jpg" alt="">
                          </div>
                          <div class="content">
                              <h2>Nha Trang</h2>
                          </div>
                      </a>
                  </div>
                  <div class="col-lg-4">
                      <a href="tour.html" class="wrapSpace">
                          <div class="img">
                              <img src="../images/a3.jpg" alt="">
                          </div>
                          <div class="content">
                              <h2>Đà Lạt</h2>
                          </div>
                      </a>
                  </div>
                  <div class="col-lg-4">
                      <a href="tour.html" class="wrapSpace">
                          <div class="img">
                              <img src="../images/a5.jpg" alt="">
                          </div>
                          <div class="content">
                              <h2>Ninh Bình</h2>
                          </div>
                      </a>
                  </div>
                  
              </div>
          </div>
      </div>
  </section>
  <section class="boxCatting">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="wrapCat">
                    <img src="../images/f1.png" alt="">
                    <h3>RẺ HƠN GIÁ RẺ NHẤT, NGẠI GÌ KHÔNG ĐẶT?</h3>
                    <p>Để được mua giá rẻ hơn giá rẻ nhất hãy đến đây</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="wrapCat">
                    <img src="../images/f1.png" alt="">
                    <h3>THANH TOÁN LINH HOẠT AN TOÀN</h3>
                    <p>Chấp nhận mọi hình thức thanh toán, không cần thẻ tín dụng. Bảo mật tuyệt đối thông tin cá nhân</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="wrapCat">
                    <img src="../images/f1.png" alt="">
                    <h3>HỖ TRỢ 24/7</h3>
                    <p>Gọi ngay 0963 266 688 kể cả 2h sáng để được hỗ trợ</p>
                </div>
            </div>
            
        </div>
    </div>
</section>
  </main>
@include('homepage.footer')