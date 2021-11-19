<div>
  <div class="filter__item">
    <div class="row">
      <div class="col-lg-4 col-md-5">
        <div class="filter__sort">
          <span>Sort By</span>
          <select>
            <option value="0">Default</option>
            <option value="0">Default</option>
          </select>
        </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="filter__found">
          <h6><span>16</span> Products found</h6>
        </div>
      </div>
      <div class="col-lg-4 col-md-3">
        <div class="filter__option">
          <span class="icon_grid-2x2"></span>
          <span class="icon_ul"></span>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    @foreach ($products as $product )
    <div class="col-lg-4 col-md-6 col-sm-6">
      <div class="product__item">
        <div class="product__item__pic set-bg" data-setbg="{{url('uploads')}}/{{$product->anh}}">
          <ul class="product__item__pic__hover">
            <li><a href="#"><i class="fa fa-heart"></i></a></li>
            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
            <li><a href="#"  wire:click.prevent="store({{$product->id}},'{{$product->ten}}', {{$product->gia}})">
                <i class="fa fa-shopping-cart"></i></a>
            </li>
          </ul>
        </div>
        <div class="product__item__text">
          <h6><a href="#">{{$product->ten}}</a></h6>
          <h5>
              @if ($product->giaban)
                {{number_format($product->giaban,0)}} * <del class="font-weight-light"> {{number_format($product->gia,0)}} </del>
              @else
                {{number_format($product->gia,0)}}
              @endif

          </h5>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="product__pagination">
    <a href="#">1</a>
    <a href="#">2</a>
    <a href="#">3</a>
    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
  </div>
</div>