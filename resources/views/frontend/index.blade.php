<x-frontend-header/>


 <!-- Inner Banner Section -->
 <section class="inner-banner home-banner">
        <div class="image-layer" style="background-image: url(<?=URL::to('/');?>/web-resources/images/slider/slider1.jpg);background-position: bottom;"></div>
        <div class="auto-container">
            <div class="inner">
                <div>
                    <form method="get" action="#" id="filterForm" >
                        <div class="form-group" style="text-align: left;">
                        <span class="s-info tag-badge " data-slug="">Recomanded</span>
                            
                            <input type="hidden" name="cat_val" id="cat_val">
                            <input type="text" class="search-field" autocomplete="off" list="menulist" name="dish" value="" placeholder="Find anythings">
                            <datalist id="menulist" >
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
                       
                                <div class="menu-col col-lg-6 col-md-12 col-sm-12">
                                        <!--Block-->
                                        <div class="dish-block">
                                            <div class="inner-box">
                                                <div class="dish-image">
                                                    <a href="#">
                                                        <img src="https://tandoormahal.in/wp-content/uploads/2023/02/Butter-Chicken-500x500-1.webp" alt="">
                                                    </a>
                                                    <div class="cart-sec"><button class="btn cart-btn ">ADD</button></div>
                                                </div>
                                                <div class="bestsellerWrap">
                                                    <span class="bestsellerleft"></span>Bestseller
                                                    <span class="bestsellerright" style=""></span>
                                                </div>                                                   
                                                <div class="title clearfix">
                                                    <div class="ttl clearfix">
                                                        <h5>
                                                            <a href="#">Chicken Tikka Butter Masala <br>[6 Pieces]</a>
                                                           
                                                        </h5>
                                                    </div>
                                                    <div class="price"><span>₹100</span> </div>
                                                </div>
                                                <div class="text desc">
                                                    <!-- <a href="#">
                                                        <p>Boneless chicken marinated in in butter, tomato based sauce and a variety of our special in house spices.</p>
                                                    </a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-col col-lg-6 col-md-12 col-sm-12">
                                    <div class="inner ">
                                        <!--Block-->
                                        <div class="dish-block">
                                            <div class="inner-box">
                                                <div class="dish-image"><a href="#"><img src="https://tandoormahal.in/wp-content/uploads/2023/02/Chicken-Curry-recipe.jpg" alt=""></a></div>
                                                    <div class="title clearfix">
                                                        <div class="ttl clearfix">
                                                            <h5>
                                                                <a href="#">Chicken Kosha<br>[6 Pieces]<span class="s-info">Best Choice</span></a>
                                                            </h5>
                                                        </div>
                                                        <div class="price"><span>₹100</span> </div>
                                                </div>
                                                <div class="text desc"><a href="#"></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                       
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
    </script>

<x-frontend-footer/>

