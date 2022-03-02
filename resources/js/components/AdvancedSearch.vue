<template>
    <div class="row">
        <div class="custom-sidebar col-md-3 col-sm-12">
            <div class="widget dark-widget clearfix">
                <div class="inner-addon right-addon">
                    <i class="glyphicon glyphicon-search"></i>
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </div><!-- end widget -->

            <div class="widget clearfix">
                <div class="search-tab clearfix">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs search-tab-nav" role="tablist">
                        <li role="presentation" class="active"><a href="#tab01" role="tab" data-toggle="tab">Wheels</a></li>
                        <li role="presentation"><a href="#tab02" role="tab" data-toggle="tab">Tires</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane in active" id="tab01">
                            <div class="search-wrapper">
                                <form class="row" @submit.prevent="searchProducts">
                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                      <!--  <div class="form-input">
                                          <label>Wheels By Style:</label>
                                          <select name="orderby" class="selectpicker">
                                              <option>All Styles</option>
                                              <option>Select Dropdown 01</option>
                                              <option>Select Dropdown 02</option>
                                              <option>Select Dropdown 03</option>
                                              <option>Select Dropdown 04</option>
                                              <option>Select Dropdown 05</option>
                                          </select>
                                      </div>&lt;!&ndash; end form-input &ndash;&gt;-->

                                        <div class="form-input">
                                            <label>Wheels By Bolt Pattern:</label>
                                            <select name="boltPattern" v-model="search.boltPattern" class="selectpicker">
                                                <option value="">All </option>
                                                <option v-for="boltPattern in sidebar.boltPatterns">{{ boltPattern }}</option>
                                            </select>
                                        </div><!-- end form-input -->

                                        <div class="form-input">
                                            <label>Wheels By Finish:</label>
                                            <select name="finish" v-model="search.finish" class="selectpicker">
                                                <option value="">All Colors</option>
                                                <option v-for="finish in sidebar.finishes">{{ finish }}</option>
                                            </select>
                                        </div><!-- end form-input -->

                                      <div class="form-input">
                                          <label>Wheels By Diameter:</label>
                                          <select name="diameter" v-model="search.diameter" class="selectpicker">
                                              <option value="">All Diameters</option>
                                              <option v-for="diameter in sidebar.diameter">{{ diameter }}</option>
                                          </select>
                                      </div>
                                    </div><!-- end col -->

                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-input">
                                            <label>Wheels By Brand:</label>
                                            <select name="offset" v-model="search.brand_id" class="selectpicker">
                                                <option value="">All Brands</option>
                                                <option v-for="brand in sidebar.brands" :value="brand.id">{{ brand.description }}</option>
                                            </select>
                                        </div>

                                        <div class="form-input">
                                            <label>Wheels By Offset:</label>
                                            <select name="offset" v-model="search.offset" class="selectpicker">
                                                <option value="">All Offset</option>
                                                <option v-for="offset in sidebar.offset">{{ offset }}</option>
                                            </select>
                                        </div>

                                        <div class="form-input">
                                            <label>Wheels By Size:</label>
                                            <select name="sizeDesc" v-model="search.sizeDesc" class="selectpicker">
                                                <option value="">All Size</option>
                                                <option v-for="sizeDesc in sidebar.sizeDesc">{{ sizeDesc }}</option>
                                            </select>
                                        </div>
                                    </div><!-- end col -->

                                    <div class="col-md-12 col-xs-12">
                                        <button class="btn btn-primary btn-block" type="submit">FILTER WHEELS</button>
                                        <a href="#" class="customa" @click="resetSearch()"><i class="fa fa-refresh"></i> Reset all</a>
                                    </div><!-- end col -->
                                </form><!-- end row -->
                            </div><!-- end search-wrapper -->
                        </div><!-- end tab-pane -->

                        <div role="tabpanel" class="tab-pane" id="tab02">
                            <div class="search-wrapper">
                                <form class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-input">
                                            <label>Make:</label>
                                            <select name="orderby" class="selectpicker">
                                                <option>All Makes</option>
                                                <option>Select Dropdown 01</option>
                                                <option>Select Dropdown 02</option>
                                                <option>Select Dropdown 03</option>
                                                <option>Select Dropdown 04</option>
                                                <option>Select Dropdown 05</option>
                                            </select>
                                        </div><!-- end form-input -->

                                        <div class="form-input">
                                            <label>Models:</label>
                                            <select name="orderby" class="selectpicker">
                                                <option>All Models</option>
                                                <option>Select Dropdown 01</option>
                                                <option>Select Dropdown 02</option>
                                                <option>Select Dropdown 03</option>
                                                <option>Select Dropdown 04</option>
                                                <option>Select Dropdown 05</option>
                                            </select>
                                        </div><!-- end form-input -->

                                        <div class="form-input">
                                            <label>Body:</label>
                                            <select name="orderby" class="selectpicker">
                                                <option>Convertible:</option>
                                                <option>Select Dropdown 01</option>
                                                <option>Select Dropdown 02</option>
                                                <option>Select Dropdown 03</option>
                                                <option>Select Dropdown 04</option>
                                                <option>Select Dropdown 05</option>
                                            </select>
                                        </div><!-- end form-input -->

                                        <div class="form-input">
                                            <label>Year:</label>
                                            <select name="orderby" class="selectpicker">
                                                <option>2012 - 2013</option>
                                                <option>Select Dropdown 01</option>
                                                <option>Select Dropdown 02</option>
                                                <option>Select Dropdown 03</option>
                                                <option>Select Dropdown 04</option>
                                                <option>Select Dropdown 05</option>
                                            </select>
                                        </div><!-- end form-input -->
                                    </div><!-- end col -->

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-input">
                                            <label>Min Price:</label>
                                            <select name="orderby" class="selectpicker">
                                                <option>$30.000</option>
                                                <option>Select Dropdown 01</option>
                                                <option>Select Dropdown 02</option>
                                                <option>Select Dropdown 03</option>
                                                <option>Select Dropdown 04</option>
                                                <option>Select Dropdown 05</option>
                                            </select>
                                        </div><!-- end form-input -->
                                    </div><!-- end col -->

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-input">
                                            <label>Max Price:</label>
                                            <select name="orderby" class="selectpicker">
                                                <option>$130.000</option>
                                                <option>Select Dropdown 01</option>
                                                <option>Select Dropdown 02</option>
                                                <option>Select Dropdown 03</option>
                                                <option>Select Dropdown 04</option>
                                                <option>Select Dropdown 05</option>
                                            </select>
                                        </div><!-- end form-input -->
                                    </div><!-- end col -->

                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-input">
                                            <label>Transmission:</label>
                                            <select name="orderby" class="selectpicker">
                                                <option>Semi Automatic</option>
                                                <option>Select Dropdown 01</option>
                                                <option>Select Dropdown 02</option>
                                                <option>Select Dropdown 03</option>
                                                <option>Select Dropdown 04</option>
                                                <option>Select Dropdown 05</option>
                                            </select>
                                        </div><!-- end form-input -->

                                        <div class="form-input">
                                            <label>Color:</label>
                                            <select name="orderby" class="selectpicker">
                                                <option>Titanium Metalic</option>
                                                <option>Select Dropdown 01</option>
                                                <option>Select Dropdown 02</option>
                                                <option>Select Dropdown 03</option>
                                                <option>Select Dropdown 04</option>
                                                <option>Select Dropdown 05</option>
                                            </select>
                                        </div><!-- end form-input -->
                                    </div><!-- end col -->

                                    <div class="col-md-12 col-xs-12">
                                        <button class="btn btn-primary btn-block">FILTER TIRES</button>
                                    </div><!-- end col -->
                                </form><!-- end row -->
                            </div><!-- end search-wrapper -->
                        </div><!-- end tab-pane -->
                    </div><!-- end tab content -->
                </div>
            </div><!-- end widget -->

            <div class="widget custom-widget clearfix">
                <div class="section-title clearfix">
                    <h5>Customers Reviews</h5>
                    <hr class="custom">
                </div><!-- end section-title -->
                <div class="sidebar-testimonial">
                    <div class="testimonial clearfix">
                        <p class="lead">They have got my project on time with competition well-organized and very
                            experienced team of professional engineers.</p>
                        <div class="testi-meta">
                            <img src="uploads/testi_01.png" alt="" class="img-responsive alignleft">
                            <h4>James Fernando <small>- Manager of Racer</small></h4>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div><!-- end rating -->
                        </div><!-- end testi-meta -->
                    </div><!-- end testimonial -->
                </div><!-- end sidebar-testimonial -->
            </div><!-- end widget -->
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="car-list-wrapper clearfix">
                <div class="list-top clearfix">
                    <div class="pull-left">
                        <div class="form-input">
                            <label class="">Sort by:</label>
                            <select name="orderby" class="selectpicker">
                                <option>Price: Highest First</option>
                                <option>Price: Lowest First</option>
                                <option>Time: End First</option>
                                <option>Time: First First</option>
                            </select>
                        </div><!-- end form-input -->
                    </div><!-- end left -->

                    <div class="pull-right hidden-xs">
                        <ul class="list-inline">
                            <li class="active"><a href="#"><i class="flaticon-grid"></i></a></li>
                            <li><a href="#"><i class="flaticon-list"></i></a></li>
                        </ul><!-- end ul -->
                    </div><!-- end right -->
                </div><!-- end list-top -->

                <div class="row grid-wrapper">
<!--                    <div>
                        <div class="triple-spinner"></div>
                    </div>-->
                    <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn" v-for="product in products">
                        <div class="car-wrapper clearfix">
                            <div class="post-media entry">
                                <img :src="'storage/'+product.product_image" alt="" class="img-responsive">
                                <div class="magnifier">
                                </div><!-- end magnifier -->
                                <div class="car-price">
                                <p>{{ product.price }}</p>
                            </div>
                                <ul class="list-inline">
                                    <li class="car-km">
                                        <p><i class="fa fa-bolt"></i> {{ product.boltPattern }}</p>
                                    </li>
                                    <li class="car-oil">
                                        <p><i class="fa fa-car"></i> {{ product.finishCode }}</p>
                                    </li>

                                </ul>
                            </div><!-- end post-media -->

                            <div class="car-title clearfix">
                                <h4 style="height: 50px"><a
                                    :href="product.detail_route">{{ product.title }}</a>
                                </h4>
                            </div><!-- end car-title -->
                        </div><!-- end clearfix -->
                    </div><!-- end col -->
                </div><!-- end row -->

                <nav class="text-center">
                    <ul class="pagination">
                        <li>
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                            </a>
                        </li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li>
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div><!-- end car-list-wrapper -->
        </div>
    </div>
</template>

<script>
export default {
    name: "AdvancedSearch",
    data(){
        return {
            products : [],
            links : [],
            sidebar : {
                brands: {},
                finishes: {},
                boltPatterns: {},
                diameter: {},
                offset: {},
                sizeDesc: {},
            },
            search:{
                brand_id:null,
                finish:null,
                boltPattern:null,
                diameter:null,
                offset:null,
                sizeDesc:null,
            }
        }
    },
    beforeMount() {
        this.getProducts();
        this.getSideBarData();
    },
    methods : {
        getProducts(){
            this.axios.get('api/products').then((response) => {
                console.log(response);
                this.products = response.data.data.data;
                console.log(this.products);
            })
        },
        getSideBarData(){
            this.axios.get('api/products/sidebar-data').then((response) => {
                console.log(response);
                this.sidebar = response.data.data;
                // this.sidebar = response.data.data.data;
            })
        },
        searchProducts(){
            this.axios.post('api/products/search',this.search).then((response) => {
                console.log(response);
                this.products = response.data.data.data;
                console.log(this.products);
            })
        },
        resetSearch(){
            this.search = {
                brand_id: '',
                finish:'',
                boltPattern:'',
                diameter:'',
                offset:'',
                sizeDesc:'',
            };
            this.searchProducts();
        }
    }
}
</script>

<style scoped>
/* TRIPLE SPINNER */
.triple-spinner {
    display: block;
    position: relative;
    width: 125px;
    height: 125px;
    border-radius: 50%;
    border: 4px solid transparent;
    border-top: 4px solid #FF5722;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
}

.triple-spinner::before,
.triple-spinner::after {
    content: "";
    position: absolute;
    border-radius: 50%;
    border: 4px solid transparent;
}
.triple-spinner::before {
    top: 5px;
    left: 5px;
    right: 5px;
    bottom: 5px;
    border-top-color: #FF9800;
    -webkit-animation: spin 3s linear infinite;
    animation: spin 3.5s linear infinite;
}
.triple-spinner::after {
    top: 15px;
    left: 15px;
    right: 15px;
    bottom: 15px;
    border-top-color: #FFC107;
    -webkit-animation: spin 1.5s linear infinite;
    animation: spin 1.75s linear infinite;
}

</style>
