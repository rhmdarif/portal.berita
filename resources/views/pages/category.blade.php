<x-base-layout>
    <x-slot name="title">- Kategori</x-slot>

    <!-- Trending Area Start -->
    <div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <!-- Trending Tittle -->
                <x-tranding-section></x-tranding-section>
            </div>
        </div>
    </div>
    <!-- Trending Area End -->

   <!-- Whats New Start -->
    <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-3 col-md-3">
                            <div class="section-tittle mb-30">
                                <h3>Categories</h3>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="properties__button">
                                <!--Nav Button  -->
                                <nav>
                                    <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                                    </ul>
                                </nav>
                                <!--End Nav Button  -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- Nav Card -->
                            <!-- card one -->
                            <div class="whats-news-caption">
                                <div class="row" id="postings">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-what-news mb-100">
                                            <div class="what-img">
                                                <img src="assets/img/news/whatNews1.jpg" alt="">
                                            </div>
                                            <div class="what-cap">
                                                <span class="color1">Night party</span>
                                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-what-news mb-100">
                                            <div class="what-img">
                                                <img src="assets/img/news/whatNews2.jpg" alt="">
                                            </div>
                                            <div class="what-cap">
                                                <span class="color1">Night party</span>
                                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-what-news mb-100">
                                            <div class="what-img">
                                                <img src="assets/img/news/whatNews3.jpg" alt="">
                                            </div>
                                            <div class="what-cap">
                                                <span class="color1">Night party</span>
                                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-what-news mb-100">
                                            <div class="what-img">
                                                <img src="assets/img/news/whatNews4.jpg" alt="">
                                            </div>
                                            <div class="what-cap">
                                                <span class="color1">Night party</span>
                                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- End Nav Card -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Section Tittle -->
                    <div class="section-tittle mb-40">
                        <h3>Iklan</h3>
                    </div>
                    <!-- New Poster -->
                    <div class="news-poster d-none d-lg-block">
                        <img src="assets/img/news/news_card.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Whats New End -->
    <div id="paging"></div>


    <x-slot name="js">
        <script>
            // $(document).ready(() => {

                // CATEGORY
                $.get("{{ route('datas.category.index') }}", (categories) => {
                    let show = `<li class="nav-item">
                                    <a class="nav-link" onclick="post_category()" style="color:#8f8f96">All</a>
                                </li>`;
                    let hide = `<li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" style="color:#8f8f96" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Other
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">`;
                    categories.forEach((category, index) => {
                        if(index < 3) {
                            show += `<li class="nav-item">
                                        <a class="nav-link" onclick="post_category(${category.id})" style="color:#8f8f96">${category.name}</a>
                                    </li>`;
                        } else {
                            hide += `<a class="dropdown-item" onclick="post_category(${category.id})">${category.name}</a>`
                        }
                    })
                    hide += `</div></li>`;

                    show += hide;
                    console.log(show)

                    $('#nav-tab').html(show)
                })

                // POST CATEGORY
                function post_category(id='all') {
                    $.get("/datas/by-category-2/"+id+"/8", (posts) => {
                        let posting = ``;
                        posts.data.forEach(post => {
                            posting += `<div class="col-lg-6 col-md-6">
                                            <div class="single-what-news mb-100">
                                                <div class="what-img">
                                                    <img src="${post.image}" alt="">
                                                </div>
                                                <div class="what-cap">
                                                    <span class="color1">${post.category.name}</span>
                                                    <h4><a href="/${post.url}">${post.title}</a></h4>
                                                </div>
                                            </div>
                                        </div>`
                        });
                        $('#postings').html(posting);
                        makePaging(posts.next_page_url ?? '', posts.prev_page_url ?? '');
                    });
                }
                post_category();

                function makePaging(next='', prev='') {
                    let paginate = `<!--Start pagination -->
                                    <div class="pagination-area pb-45 text-center">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="single-wrap d-flex justify-content-center">
                                                        <nav aria-label="Page navigation example">
                                                            <ul class="pagination justify-content-start">`;

                                                                if(prev != '') {
                                                                    paginate += `<li class="page-item"><a class="page-link" onclick="loadPaging('${prev}')"><i class="fa fa-arrow-left"></i> Prev </a></li>`
                                                                }

                                                                if(next != '') {
                                                                    paginate += `<li class="page-item"><a class="page-link" onclick="loadPaging('${next}')">Next <i class="fa fa-arrow-right"></i> </a></li>`
                                                                }

                        paginate += `</ul>
                                                        </nav>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End pagination  -->`;
                        $('#paging').html(paginate);
                }

                function loadPaging(url) {
                    $.get(url, (posts) => {
                        let posting = ``;
                        posts.data.forEach(post => {
                            posting += `<div class="col-lg-6 col-md-6">
                                            <div class="single-what-news mb-100">
                                                <div class="what-img">
                                                    <img src="${post.image}" alt="">
                                                </div>
                                                <div class="what-cap">
                                                    <span class="color1">${post.category.name}</span>
                                                    <h4><a href="/${post.url}">${post.title}</a></h4>
                                                </div>
                                            </div>
                                        </div>`
                        });
                        $('#postings').html(posting);
                        makePaging(posts.next_page_url ?? '', posts.prev_page_url ?? '');
                    })
                }

            // })
        </script>
    </x-slot>
</x-base-layout>
