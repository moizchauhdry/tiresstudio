<div class="row grid-wrapper">
    @forelse($response['products'] as $product)
        <div class="col-md-4 col-sm-6 col-xs-12 ">
            <div class="car-wrapper clearfix">
                <div class="post-media entry">
                    <img src="{{ imageURL($product->product_image) }}" alt="" class="img-responsive">
                    <div class="magnifier">
                    </div><!-- end magnifier -->
                    <div class="car-price">
                        <p>{{ getCurrency().$product->price }}</p>
                    </div>
                    <ul class="list-inline">
                        <li class="car-km">
                            <p><i class="fa fa-bolt"></i> {{ $product->boltPattern }}</p>
                        </li>
                        <li class="car-oil">
                            <p><i class="fa fa-car"></i> {{ $product->sizeDesc }}</p>
                        </li>

                    </ul>
                </div><!-- end post-media -->

                <div class="car-title clearfix">
                    <h4><a
                            href="{{route('frontend.pages.product', $product->id)}}">{{$product->title}}</a>
                    </h4>
                </div><!-- end car-title -->
            </div><!-- end clearfix -->
        </div><!-- end col -->
    @empty
            <div class="text-center">
                <img src="{{asset('frontend/images/logo.png')}}" alt="" class="img-responsive text-center" style="max-width: 300px;margin: 50px auto;">
                <h3>No Product Found</h3>
            </div>
    @endforelse
</div>

{{ $response['products']->onEachSide(2)->links('vendor.pagination.theme-default') }}
