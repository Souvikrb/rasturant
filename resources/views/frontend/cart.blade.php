<x-frontend-header />
<section class="inner-banner" style="background:#000000">
    <div class="image-layer" style="background-image: url(<?=URL::to('/');?>/web-resources/images/slider/cart.jpg);">
    </div>
    <div class="auto-container">
        <div class="inner">

        </div>
    </div>
</section>

<section class="contact-page pattern1">
    <!--location Section-->


    <!--Location form Section-->
    <div class="auto-container">
        <div>
            <div class="row clearfix justify-content-md-center">
                <!--form Section-->
                <!--form image Section-->
                <div class="col-lg-6 col-md-12 col-sm-12 col-sm-push-12 col-xs-push-12 menu-tabs">
                @if($cartdata->count() != 0)
                    <div class="tabs-box menu-tabs cart-details pattern1">
                        <div class="tabs-content">
                            <div class="row clearfix">
                                
                                    @foreach($cartdata as $data)
                                    <div class="menu-col col-lg-12 col-md-12 col-sm-12">
                                        <div class="inner ">
                                            <!--Block-->
                                            <div class="dish-block">
                                                <div class="inner-box">
                                                    <div class="dish-image">
                                                        <a href="#">
                                                            <img src="{{asset('storage/products/'.$data->prodImg)}}"
                                                                alt="">
                                                        </a>
                                                        <div class="cart-sec prod{{$data->prodid}}" >
                                                            @if( $data->count < '1')
                                                                <button class="btn cart-btn" onclick="add_to_cart('{{$data->prodid}}','add')">ADD</button>
                                                            @else
                                                                <button class="btn addbtn "><span onclick="add_to_cart('{{$data->prodid}}','remove')" class="minus">-</span><span class="count">{{$data->count}}</span><span class="plus" onclick="add_to_cart('{{$data->prodid}}','add')">+</span></button>
                                                            @endif;
                                                        </div>
                                                    </div>
                                                    @if($data->tags != '')
                                                        <div class="bestsellerWrap">
                                                            <span class="bestsellerleft"></span>{{$data->tags}}
                                                            <span class="bestsellerright" style=""></span>
                                                        </div>
                                                    @endif
                                                    <div class="title clearfix">
                                                        <div class="ttl clearfix">
                                                            <h5>
                                                                <a href="#">{{$data->productname}}</a>

                                                            </h5>
                                                        </div>
                                                        <div class="price"><span>₹{{$data->slPrice * $data->count}}</span> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <h5>Bill Details</h5>
                                    <hr>
                                    <div class="row clearfix  ">
                                        <div class="col-md-8 col-8">
                                            <h6>Item Total</h6>
                                        </div>
                                        <div class="col-md-3 col-3 text-right">
                                            <h6>₹200</h6>
                                        </div>
                                    </div>
                                    <div class="row clearfix pt-1 ">
                                        <div class="col-md-8 col-8 ">
                                            <h6>Delivery Fee | 1.0 kms</h6>
                                        </div>
                                        <div class="col-md-3 col-3 text-right">
                                            <h6>₹10</h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row clearfix pt-1 ">
                                        <div class="col-md-8 col-8 ">
                                            <h6>Grand Total</h6>
                                        </div>
                                        <div class="col-md-3 col-3 text-right">
                                            <h6>₹210</h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row clearfix pt-1 ">
                                        <div class="col-md-12 text-right">
                                            <a  href="{{route('/order/submit')}}" class="theme-btn btn-style-one clearfix"
                                                style="background:rgb(0,0,0);color:white!important">
                                                <span class="btn-wrap">
                                                    <span class="text-one " style="color:white!important">Place Your
                                                        Order</span>
                                                    <span class="text-two">Place Your Order</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>


                                </div>
                            </div>

                    
                            <!--Tab-->
                        </div>
                    </div>
                    @else
                    <div class="title-box centered mt-5 mb-5">
                       
                        <h2 class="mb-3">Your cart is empty</h2>
                        
                        <a  href="{{url('/')}}" class="theme-btn btn-style-one clearfix" style="background:rgb(0,0,0);color:white!important">
                            <span class="btn-wrap">
                                <span class="text-one " style="color:white!important">View more items</span>
                                <span class="text-two">View more items</span>
                            </span>
                        </a>
                    </div>
                    @endif
                </div>
                
            </div>
        </div>
    </div>

</section>
<br>
<script>
    function add_to_cart(id,type){
    $.ajax({
        url: '{{ url('/cart/add') }}',
        type: 'POST',              
        data: {'id':id,'type':type},
        dataType: 'JSON',
        success: function(result)
        {
            if(result.count > 0){
                $('.prod'+id).html('<button class="btn addbtn "><span onclick="add_to_cart('+"'"+id+"'"+","+"'remove'"+')"  class="minus">-</span><span class="count">'+result.count+'</span><span class="plus" onclick="add_to_cart('+"'"+id+"'"+","+"'add'"+')">+</span></button>');
            }
            if(result.count < 1){
                $('.prod'+id).html('<button onclick="add_to_cart('+"'"+id+"'"+","+"'add'"+')" class="btn cart-btn" >ADD</button>');
            }
        
        }
    });
}

</script>
<x-frontend-footer />