@include('homepage.userheader')
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
<!--Nội dungb bài-->    
  {{-- <div class="container-fluid bg-3 text-center">    
    <h3>Some of my Work</h3><br>
    <div class="row">
      <div class="col-sm-3">
        <p>Some text..</p>
        <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      </div>
      <div class="col-sm-3"> 
        <p>Some text..</p>
        <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      </div>
      <div class="col-sm-3"> 
        <p>Some text..</p>
        <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      </div>
      <div class="col-sm-3">
        <p>Some text..</p>
        <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      </div>
    </div>
  </div><br>
  
  <div class="container-fluid bg-3 text-center">    
    <div class="row">
      <div class="col-sm-3">
        <p>Some text..</p>
        <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      </div>
      <div class="col-sm-3"> 
        <p>Some text..</p>
        <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      </div>
      <div class="col-sm-3"> 
        <p>Some text..</p>
        <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      </div>
      <div class="col-sm-3">
        <p>Some text..</p>
        <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      </div>
    </div>
  </div><br><br> --}}
@include('homepage.footer')