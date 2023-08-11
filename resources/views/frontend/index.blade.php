<x-frontend-header />


<!-- Inner Banner Section -->
<section class="inner-banner home-banner">
    <div class="image-layer"
        style="background-image: url(<?=URL::to('/');?>/web-resources/images/slider/slider1.jpg);background-position: bottom;">
    </div>
    <div class="auto-container">
        <div class="inner">
            <div>
                <form method="get" action="#" id="filterForm">
                    <div class="form-group" style="text-align: left;">
                        <span class="s-info tag-badge " data-slug="">Recomanded</span>

                        <input type="hidden" name="cat_val" id="cat_val">
                        <input type="text" class="search-field" autocomplete="off" list="menulist" name="dish" value=""
                            placeholder="Find anythings">
                        <datalist id="menulist">
                            <option value="Tandoor">
                        </datalist>
                        <button type="submit" class="search-btn">
                            <span class="btn-wrap">
                                <span class="text-one"><i class="fa fa-search"></i></span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--End Banner Section -->

<!--Menu Section-->
<section class="menu-section pattern1">

    <div class="auto-container">

        <div class="tabs-box menu-tabs">

            <div class="tabs-content">
                <!--Tab-->

                <div class="row clearfix">
                    @if(!empty($products))
                        @foreach($products as $p)
                        <div class="menu-col col-lg-6 col-md-12 col-sm-12">
                        <!--Block-->
                            <div class="dish-block">
                                <div class="inner-box">
                                    <div class="dish-image">
                                        <a href="#">
                                            <img src="{{asset('storage/products/'.$p->prodImg)}}"
                                                alt="">
                                        </a>
                                        <div class="cart-sec prod{{$p->id}}" >
                                            @if( $p->count < '1')
                                                <button class="btn cart-btn" onclick="add_to_cart('{{$p->id}}','add')">ADD</button>
                                            @else
                                                <button class="btn addbtn "><span onclick="add_to_cart('{{$p->id}}','remove')" class="minus">-</span><span class="count">{{$p->count}}</span><span class="plus" onclick="add_to_cart('{{$p->id}}','add')">+</span></button>
                                            @endif
                                        </div>
                                    </div>
                                    @if($p->tags != '')
                                        <div class="bestsellerWrap">
                                            <span class="bestsellerleft"></span>{{$p->tags}}
                                            <span class="bestsellerright" style=""></span>
                                        </div>
                                    @endif
                                    <div class="title clearfix">
                                        <div class="ttl clearfix">
                                            <h5>
                                                <a href="#"><?=$p->product?>
                                                <!-- <span class="s-info">Best Choice</span> -->
                                                </a>

                                            </h5>
                                        </div>
                                        <div class="price">
                                            @if($p->rgPrice != '')
                                            <small><del >₹{{$p->rgPrice}}</del></small>
                                            @endif
                                            <span class="text-danger">₹{{$p->slPrice}}</span> 
                                        </div>
                                    </div>
                                    <div class="text desc">
                                        <!-- <a href="#">
                                                            <p>Boneless chicken marinated in in butter, tomato based sauce and a variety of our special in house spices.</p>
                                                        </a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif;

            </div>

            <!--Tab-->
        </div>
    </div>
    </div>
</section>
<script>
// $('.tag-badge').click(function(){
//     var slug = $(this).data('slug');
//     $('#cat_val').val(slug);
//     $('.tag-badge').removeClass('select');
//     $(this).addClass('select');
// 	$('#filterForm').submit();

// })
// $('.cart-btn').click(function(){
//     var id = $(this).data('id');
// })

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