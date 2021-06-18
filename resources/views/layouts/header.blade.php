
<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top black-bg d-none d-md-block">
                <div class="container">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>
                                    <li><img src="./assets/img/icon/header_icon1.png" alt=""><span id="header_waktu">Tuesday, 18th June, 2019</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-mid d-none d-md-block">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-3 col-lg-3 col-md-3">
                            <div class="logo">
                                <a href="{{ route('index') }}"><img src="/assets/img/logo/UPI.svg" width="185px" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9">
                            <div class="header-banner f-right ">
                                <img src="./assets/img/hero/banner_1.gif" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                            <!-- sticky -->
                                <div class="sticky-logo">
                                    <a href="index.html"><img src="./assets/img/logo/UPI.svg" width="185px" alt=""></a>
                                </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{ route("index") }}">Home</a></li>
                                        <li><a href="{{ route("category") }}">Category</a></li>
                                        <li><a href="#">About</a></li>
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4">
                            <div class="header-right-btn f-right d-none d-lg-block">
                                <i class="fas fa-search special-tag"></i>
                                <div class="search-box">
                                    <form action="#">
                                        <input type="text" placeholder="Search">

                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
<script>
    $(document).ready(() => {
        // GET TIME
            let date_func = new Date();
            let day = date_func.getDay();
            let date = date_func.getDate();
            let month = date_func.getMonth();
            let year = date_func.getFullYear();
            $('#header_waktu').text(`${getDayName(day)}, ${date} ${getMonthName(month)} ${year}`);

        // GET CATEGORIES
            // $.get("{{ route('datas.category.index') }}", (result) => {

            // })
    });

    function getDayName(day) {
        switch (day) {
            case 0:
                return "Minggu";
                break;
            case 1:
                return "Senin";
                break;
            case 2:
                return "Selasa";
                break;
            case 3:
                return "Rabu";
                break;
            case 4:
                return "Kamis";
                break;
            case 5:
                return "Jumat";
                break;
            case 6:
                return "Sabtu";
                break;

            default:
                return getDayName(0);
                break;
        }
    }

    function getMonthName(month) {
        switch (month) {
            case 0:
                return "Januari";
                break;
            case 1:
                return "Februari";
                break;
            case 2:
                return "Maret";
                break;
            case 3:
                return "April";
                break;
            case 4:
                return "Mei";
                break;
            case 5:
                return "Juni";
                break;
            case 6:
                return "Juli";
                break;
            case 7:
                return "Agustus";
                break;
            case 8:
                return "September";
                break;
            case 9:
                return "Oktober";
                break;
            case 10:
                return "November";
                break;
            case 11:
                return "Desember";
                break;

            default:
                return getMonthName(0);
                break;
        }
    }
</script>
