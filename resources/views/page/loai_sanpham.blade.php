@extends('home')
@section('content')
<!-- Page info -->
<div class="page-top-info">
    <div class="container">
        <h4>DANH MỤC</h4>
        <div class="site-pagination">
            <a href="{{route('trang-chu')}}">Trang chủ</a> / Trang phục / 
            <a href="{{route('loai-san-pham',$tenloai->id_loai_san_pham)}}">{{$tenloai->ten_LSP}}</a> /
        </div>
    </div>
</div>
<!-- Page info end -->

<section class="category-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-2 order-lg-1">
                <div class="filter-widget">
                    <h2 class="fw-title">Danh mục</h2>
                    <ul class="category-menu">
                        @foreach($loai as $ls)
                        @if($ls->trang_thai==1)
                        @php
                        $count =0;
                        @endphp
                        <li><a href="{{route('loai-san-pham',$ls->id_loai_san_pham)}}">{{$ls ->ten_LSP}}
                            @foreach($sanpham as $sp)
                            @if($sp->id_loai_san_pham == $ls->id_loai_san_pham)
                            @php
                            $count +=1;
                            @endphp
                            @endif
                            @endforeach
                            <span>{{$count}}</span>
                        </a></li>  
                        @endif
                        @endforeach
                    </ul>
                </div>
                <div class="filter-widget mb-0">
                    <h2 class="fw-title">Sắp xếp giá cả (VND)</h2>
                    <div class="price-range-wrap">
                        <h4>Giá</h4>
                        <div class="price-range ui-spider ui-corner-all ui-spider-horizontal ui-widget ui-widget-content" data-min="50" data-max="2000000">
                            <div class="ui-spider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div>
                            <span tabindex="0" class="ui-spider-handle ui-corner-all ui-state-default" style="left: 0%;">
                            </span>
                            <span tabindex="0" class="ui-spider-handle ui-corner-all ui-state-default" style="left: 100%;">
                            </span>
                        </div>
                        <div class="range-spider">
                            <div class="price-input">
                                <input type="text" id="minamount">
                                <input type="text" id="maxamount">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter-widget mb-0">
                    <h2 class="fw-title">color by</h2>
                    <div class="fw-color-choose">
                        <div class="cs-item">
                            <input type="radio" name="cs" id="gray-color">
                            <label class="cs-gray" for="gray-color">
                                <span>(3)</span>
                            </label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" name="cs" id="orange-color">
                            <label class="cs-orange" for="orange-color">
                                <span>(25)</span>
                            </label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" name="cs" id="yollow-color">
                            <label class="cs-yollow" for="yollow-color">
                                <span>(112)</span>
                            </label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" name="cs" id="green-color">
                            <label class="cs-green" for="green-color">
                                <span>(75)</span>
                            </label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" name="cs" id="purple-color">
                            <label class="cs-purple" for="purple-color">
                                <span>(9)</span>
                            </label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" name="cs" id="blue-color" checked="">
                            <label class="cs-blue" for="blue-color">

                            </label>
                        </div>
                    </div>
                </div>
                <div class="filter-widget mb-0">
                    <h2 class="fw-title">Size</h2>
                    <div class="fw-size-choose">
                        <div class="sc-item">
                            <input type="radio" name="sc" id="xs-size">
                            <label for="xs-size">XS</label>
                        </div>
                        <div class="sc-item">
                            <input type="radio" name="sc" id="s-size">
                            <label for="s-size">S</label>
                        </div>
                        <div class="sc-item">
                            <input type="radio" name="sc" id="m-size" checked="">
                            <label for="m-size">M</label>
                        </div>
                        <div class="sc-item">
                            <input type="radio" name="sc" id="l-size">
                            <label for="l-size">L</label>
                        </div>
                        <div class="sc-item">
                            <input type="radio" name="sc" id="xl-size">
                            <label for="xl-size">XL</label>
                        </div>
                        <div class="sc-item">
                            <input type="radio" name="sc" id="xxl-size">
                            <label for="xxl-size">XXL</label>
                        </div>
                    </div>
                </div>
              
            </div>
            <div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
                <div class="row">
                    @foreach($sp_theoloai as $sp)
                    <div class="col-lg-4 col-sm-6">
                     <div class="product-item">
                        <div class="pi-pic"  onclick="window.location='{{route('chi-tiet-san-pham',$sp->id)}}';">
                            @if($sp->gia_khuyen_mai != 0)
                            <div class="tag-sale">ON SALE</div>
                            @endif
                            <img src="resources/img/product/{{$sp->hinh}}" alt="">
                            <div class="pi-links">
                                <a href="#" class="add-card"><i class="flaticon-bag"></i><span>THÊM VÀO GIỎ</span></a>
                                <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                            </div>
                        </div>
                        <div class="pi-text">

                            @if($sp->gia_khuyen_mai > 0)
                            <h6 class="sale">{{number_format($sp->gia_khuyen_mai)}}₫</h6>
                            <p>{{$sp->ten_san_pham}} </p>
                            <br>
                            <span>{{number_format($sp->gia)}}₫</span>
                            @else
                            <h6>{{number_format($sp->gia)}}₫</h6>
                            <p>{{$sp->ten_san_pham}} </p>
                            @endif
                            
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="text-center w-100 pt-3">
                    <button class="site-btn sb-line sb-dark">LOAD MORE</button>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- Category section end -->
@endsection