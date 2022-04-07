<div style="display: inline-flex">
    @if(isset($response['filter']['search'])) <h3 style="margin-right: 4px"><span class="label label-danger">
            {{ $response['filter']['search'] }}
            <a href="javascript:void(0)" onclick="removeFromFilter(this)" data-target="#search">X</a>
        </span></h3>
    @endif
    @if(isset($response['filter']['year'])) <h3 style="margin-right: 4px"><span class="label label-danger">
            {{ $response['filter']['year'] }}
            <a href="javascript:void(0)" onclick="removeFromFilter(this)" data-target="#year">X</a>
        </span></h3>
    @endif
    @if(isset($response['filter']['make'])) <h3 style="margin-right: 4px"><span class="label label-danger">
            {{ getMakeNameById($response['filter']['make']) }}
            <a href="javascript:void(0)" onclick="removeFromFilter(this)" data-target="#make">X</a>
        </span></h3>
    @endif
    @if(isset($response['filter']['model'])) <h3 style="margin-right: 4px"><span class="label label-danger">
            {{ getModelNameById($response['filter']['model']) }}
            <a href="javascript:void(0)" onclick="removeFromFilter(this)" data-target="#model">X</a>
        </span></h3>
    @endif
    @if(isset($response['filter']['brand_id'])) <h3 style="margin-right: 4px"><span class="label label-danger">
            {{ getBrandNameById($response['filter']['brand_id']) }}
            <a href="javascript:void(0)" onclick="removeFromFilter(this)" data-target="#brands">X</a>
        </span></h3>
    @endif
    @if(isset($response['filter']['finishCode'])) <h3 style="margin-right: 4px"><span class="label label-danger">
            {{ $response['filter']['finishCode'] }}
            <a href="javascript:void(0)" onclick="removeFromFilter(this)" data-target="#finishes">X</a>
        </span></h3>
    @endif
    @if(isset($response['filter']['diameter'])) <h3 style="margin-right: 4px"><span class="label label-danger">
            {{ $response['filter']['diameter'] }}
            <a href="javascript:void(0)" onclick="removeFromFilter(this)" data-target="#diameter">X</a>
        </span></h3>
    @endif
    @if(isset($response['filter']['offset'])) <h3 style="margin-right: 4px"><span class="label label-danger">
            {{ $response['filter']['offset'] }}
            <a href="javascript:void(0)" onclick="removeFromFilter(this)" data-target="#offset">X</a>
        </span></h3>
    @endif
    @if(isset($response['filter']['sizeDesc'])) <h3 style="margin-right: 4px"><span class="label label-danger">
            {{ $response['filter']['sizeDesc'] }}
            <a href="javascript:void(0)" onclick="removeFromFilter(this)" data-target="#sizeDesc">X</a>
        </span></h3>
    @endif
    @if(isset($response['filter']['boltPattern'])) <h3 style="margin-right: 4px"><span class="label label-danger">
            {{ $response['filter']['boltPattern'] }}
            <a href="javascript:void(0)" onclick="removeFromFilter(this)" data-target="#boltPatterns">X</a>
        </span></h3>
    @endif
@if(isset($response['filter']['width'])) <h3 style="margin-right: 4px"><span class="label label-danger">
            {{ $response['filter']['width'] }}
            <a href="javascript:void(0)" onclick="removeFromFilter(this)" data-target="#width">X</a>
        </span></h3>
    @endif
@if(isset($response['filter']['rimDiameter'])) <h3 style="margin-right: 4px"><span class="label label-danger">
            {{ $response['filter']['rimDiameter'] }}
            <a href="javascript:void(0)" onclick="removeFromFilter(this)" data-target="#rimDiameter">X</a>
        </span></h3>
    @endif
@if(isset($response['filter']['series'])) <h3 style="margin-right: 4px"><span class="label label-danger">
            {{ $response['filter']['series'] }}
            <a href="javascript:void(0)" onclick="removeFromFilter(this)" data-target="#series">X</a>
        </span></h3>
    @endif

</div>
<div class="row grid-wrapper">
    @php
        $products = $products ?? $response['products'];
    @endphp
    @forelse($products as $product)
    <div class="col-md-4 col-sm-6 col-xs-12 ">
        <div class="car-wrapper clearfix">
            <div class="post-media entry">
                <a href="{{route('frontend.pages.product', $product->id)}}"><img src="{{ asset('images/placeholder.gif') }}" data-src="{{ imageURL($product->product_image) }}" alt="" class="img-responsive"></a>
            </div><!-- end post-media -->

            <div class="car-title clearfix">
                <h4><a href="{{route('frontend.pages.product', $product->id)}}">{{getProductName($product->id)}}</a>
                </h4>
            </div><!-- end car-title -->
        </div><!-- end clearfix -->
    </div><!-- end col -->
    @empty
    <div class="text-center">
        <img src="{{asset('frontend/images/logo.png')}}" alt="" class="img-responsive text-center"
            style="max-width: 300px;margin: 50px auto;">
        <h3>No Product Found</h3>
    </div>
    @endforelse
</div>

{{ $products->onEachSide(2)->links('vendor.pagination.theme-default') }}
