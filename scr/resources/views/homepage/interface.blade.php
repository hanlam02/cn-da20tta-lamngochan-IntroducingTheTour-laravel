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
          <h2 style="text-align: center">Các tour du lịch</h2>
          <hr style=" border: 3px solid darkorange; width:10%">
        </div>
        <br>
        <div class="wrapSlide1">
         
          <div class="slideTourToday">
            <ul>
                @foreach($alltour as $item)
                @if ($item->domain == $domain || !isset($domain))
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
                    @endif
                @endforeach
            </ul>
          </div>
        </div>
        <div style="margin-left: 40px">
        {{$alltour->links('pagination::bootstrap-4')}}</div>
      </div>
    </section>
  </main>
  @if (session('success'))
  <script>
      alert("{{ session('success') }}");
  </script>
@endif
@include('homepage.footer')