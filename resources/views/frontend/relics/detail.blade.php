@extends('frontend.layout.master')
@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"/>
@endsection

@section('content')
    <div class="root__page">
        <div class="details-block">
            <div id="details" class="details row ">
                    <div class="details__content-block col l-9 m-12 c-12">
                        <div class="details__content">
                            <div class="details__relics">
                                <div class="details__relics-header">
                                    <div class="details__relics-header-media">
                                        <img src="assets/fe/libs/img/forbidden-city.png" alt="">
                                    </div>
                                    <div class="details__relics-header-content">
                                        <h1 class="details__relics-header-title">{{ $relic->name }}</h1>
                                        <p class="details__relics-header-desc">Cập nhật ngày: {{ $relic->updated_at->format('d/m/Y') }}</p>
                                    </div>
                                </div>
                                <div class="details__relics-lib">
                                    <div class="details__relics-lib-view">
                                        <img data-fancybox="gallery" data-src="{{ $relic->featured_img }}" class="details__relics-lib-view-img" src="{{ $relic->featured_img }}" alt="">
                                        @foreach ($relic->image as $image)
                                            <img data-fancybox="gallery" data-src="{{ $image }}" class="details__relics-lib-view-img" src="{{ $image }}" alt="">
                                        @endforeach
                                        <div onclick="relics__plus(-1)" class="details__relics-lib-control-btn left">
                                            <i class="fal fa-chevron-left"></i>
                                        </div>
                                        <div onclick="relics__plus(1)" class="details__relics-lib-control-btn right">
                                            <i class="fal fa-chevron-right"></i>
                                        </div>
                                    </div>
                                    <div class="details__relics-lib-footer">
                                        <div class="details__relics-lib-place">
                                            <div class="details__relics-lib-place-desc">
                                                <img src="assets/fe/libs/img/placeholder.png" alt="">
                                                <span>{{ $relic->address }}</span>
                                            </div>
                                            <a href="#">Chỉ đường</a>
                                        </div>
                                        <div class="details__relics-lib-list">
                                            @php
                                                $id = 1;
                                            @endphp
                                            <img onclick="relics__current({{ $id }})" class="details__relics-lib-item" src="{{ $relic->featured_img }}" alt="">      
                                            @foreach ($relic->image as $image)
                                                @php $id++; @endphp
                                                <img onclick="relics__current({{ $id }})" class="details__relics-lib-item" src="{{ $image }}" alt="">      
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div id="relics__intro" class="details__relics-word">
                                    <div class="details__relics-word-header">
                                        <img class="details__relics-word-img" src="assets/fe/libs/img/sticky-note.png" alt="" class="">
                                        <h2 class="details__relics-word-title">Giới thiệu</h2>
                                    </div>
                                    <p class="details__relics-word-desc compact">
                                        {{ $relic->description }}
                                    </p>
                                </div>
                                <div id="relics__content" class="details__relics-word">
                                    <div class="details__relics-word-header">
                                        <img class="details__relics-word-img" src="assets/fe/libs/img/verified.png" alt="" class="">
                                        <h2 class="details__relics-word-title">Nội dung về di tích</h2>
                                    </div>
                                    <input type="checkbox" name="" id="details__desc-check" hidden>
                                    <p id="details__desc" class="details__relics-word-desc compact hidden">
                                        {!! html_entity_decode($relic->content) !!}
                                    </p>
                                    <div class="details__relics-word-ac">
                                        <hr>
                                        <label for="details__desc-check" id="details__desc-btn" class="details__relics-word-btn btn">
                                            <span>Hiển thị nội dung <i class="fal fa-chevron-down"></i></span>
                                        </label>
                                    </div>
                                </div>
                                <div id="relics__hot" class="details__relics-box">
                                    <div class="details__relics-box-header">
                                        <img src="assets/fe/libs/img/paper-lantern.png" alt="" class="details__relics-box-img">
                                        <h2 class="details__relics-box-title">Lễ hội đền chợ củi</h2>
                                    </div>
                                    <div class="details__relics-box-body row">
                                        <div class="details__relics-hot-list col l-8 m-7 c-12">
                                            <div onclick="return holiday(this)" id="relisc__time__1" class="details__relics-hot-item active">
                                                <div class="details__relics-hot-item-number"><span>1</span></div>
                                                <div class="details__relics-hot-item-content">
                                                    <div class="details__relics-hot-item-title">Giỗ Đức Thánh Mẫu Liễu Hạnh</div>
                                                    <p class="details__relics-hot-item-desc compact">
                                                        <img src="assets/fe/libs/img/calendar.png" alt="">
                                                        <span>Ngày 03 tháng 03 Âm lịch</span>
                                                    </p>
                                                    <p class="details__relics-hot-item-desc compact">
                                                        <img src="assets/fe/libs/img/calendar2.png" alt="">
                                                        <span>Thứ 4 ngày 14 tháng 04 Dương lịch</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div onclick="return holiday(this)" id="relisc__time__2" class="details__relics-hot-item">
                                                <div class="details__relics-hot-item-number"><span>2</span></div>
                                                <div class="details__relics-hot-item-content">
                                                    <div class="details__relics-hot-item-title">Giỗ Hưng Đạo đại Vương</div>
                                                    <p class="details__relics-hot-item-desc compact">
                                                        <img src="assets/fe/libs/img/calendar.png" alt="">
                                                        <span>Ngày 20 tháng 08 Âm lịch</span>
                                                    </p>
                                                    <p class="details__relics-hot-item-desc compact">
                                                        <img src="assets/fe/libs/img/calendar2.png" alt="">
                                                        <span>Thứ 4 ngày 14 tháng 04 Dương lịch</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div onclick="return holiday(this)" id="relisc__time__3" class="details__relics-hot-item">
                                                <div class="details__relics-hot-item-number"><span>3</span></div>
                                                <div class="details__relics-hot-item-content">
                                                    <div class="details__relics-hot-item-title">Lễ hội Đức Quan Hoàng Mười</div>
                                                    <p class="details__relics-hot-item-desc compact">
                                                        <img src="assets/fe/libs/img/calendar.png" alt="">
                                                        <span>LNgày 10 tháng 10 Âm lịch</span>
                                                    </p>
                                                    <p class="details__relics-hot-item-desc compact">
                                                        <img src="assets/fe/libs/img/calendar2.png" alt="">
                                                        <span>Thứ 4 ngày 14 tháng 04 Dương lịch</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="details__relics-box-stt-block col l-4 m-5 c-12">
                                            <div class="details__relics-box-stt">
                                                <div class="details__relics-box-stt-key">Còn lại</div>
                                                <div id="relics__date" class="details__relics-box-stt-number">129</div>
                                                <div class="details__relics-box-stt-title">Ngày nữa đến lễ hội</div>
                                                <a href="#" class="details__relics-box-stt-btn btn">Xem lễ hội</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="relics__people" class="details__relics-box">
                                    <div class="details__relics-box-border">
                                        <div class="details__relics-box-header">
                                            <img src="assets/fe/libs/img/cpu-tower.png" alt="" class="details__relics-box-img">
                                            <h2 class="details__relics-box-title">Thờ nhân vật</h2>
                                        </div>
                                        <div class="details__relics-box-body nop">
                                            <ul class="details__relics-box-list row">
                                                <li class="details__relics-box-item empty__appear col l-12 m-12 c-12">
                                                    <p class="details__relics-box-item-link">
                                                        <span>Chưa có <strong>nhân vật</strong> được liệt kê</span>
                                                    </p>
                                                </li>
                                                <li class="details__relics-box-item col l-6 m-12 c-12">
                                                    <a href="#" class="details__relics-box-item-link">Đức Quan Hoàng Mười</a>
                                                </li>
                                                <li class="details__relics-box-item col l-6 m-12 c-12">
                                                    <a href="#" class="details__relics-box-item-link">Thánh mẫu Liễu Hạnh</a>
                                                </li>
                                                <li class="details__relics-box-item col l-6 m-12 c-12">
                                                    <a href="#" class="details__relics-box-item-link">Đức Thánh Trần</a>
                                                </li>
                                                <li class="details__relics-box-item col l-6 m-12 c-12">
                                                    <a href="#" class="details__relics-box-item-link">Đức Quan Hoàng Mười</a>
                                                </li>
                                                <li class="details__relics-box-item col l-6 m-12 c-12">
                                                    <a href="#" class="details__relics-box-item-link">Thánh mẫu Liễu Hạnh</a>
                                                </li>
                                                <li class="details__relics-box-item col l-6 m-12 c-12">
                                                    <a href="#" class="details__relics-box-item-link">Đức Thánh Trần</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div id="relics__arti" class="details__relics-box empty">
                                    <div class="details__relics-box-border">
                                        <div class="details__relics-box-header">
                                            <img src="assets/fe/libs/img/vase.png" alt="" class="details__relics-box-img">
                                            <h2 class="details__relics-box-title">Hiện vật</h2>
                                        </div>
                                        <div class="details__relics-box-body nop">
                                            <ul class="details__relics-box-list row">
                                                <li class="details__relics-box-item empty__appear col l-12 m-12 c-12">
                                                    <p class="details__relics-box-item-link">
                                                        <span>Chưa có <strong>hiện vật</strong> được liệt kê</span>
                                                    </p>
                                                </li>
                                                <li class="details__relics-box-item col col l-6 m-12 c-12">
                                                    <a href="#" class="details__relics-box-item-link">Trống đồng</a>
                                                </li>
                                                <li class="details__relics-box-item col col l-6 m-12 c-12">
                                                    <a href="#" class="details__relics-box-item-link">Trống đồng</a>
                                                </li>
                                                <li class="details__relics-box-item col col l-6 m-12 c-12">
                                                    <a href="#" class="details__relics-box-item-link">Trống đồng</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div id="relics__media" class="details__relics-box">
                                    <div class="details__relics-box-border">
                                        <div class="details__relics-box-header">
                                            <img src="assets/fe/libs/img/paper-lantern.png" alt="" class="details__relics-box-img">
                                            <h2 class="details__relics-box-title">Thư viện ảnh</h2>
                                        </div>
                                        <div class="details__relics-box-body">
                                            <div class="details__relics-media row">
                                                <div class="details__relics-media-item col l-2-4 c-4">
                                                    <img data-fancybox="trigger-element-gallery" data-src="https://i.ytimg.com/vi/FMVspELWnKs/maxresdefault.jpg" src="https://i.ytimg.com/vi/FMVspELWnKs/maxresdefault.jpg" alt="" class="details__relics-media-item-img">
                                                </div>
                                                <div class="details__relics-media-item col l-2-4 c-4">
                                                    <img data-fancybox="trigger-element-gallery" data-src="https://i.pinimg.com/736x/94/89/38/9489388287dbd82da03c203ed3ec4675.jpg" src="https://i.pinimg.com/736x/94/89/38/9489388287dbd82da03c203ed3ec4675.jpg" alt="" class="details__relics-media-item-img">
                                                </div>
                                                <div class="details__relics-media-item col l-2-4 c-4">
                                                    <img data-fancybox="trigger-element-gallery" data-src="https://fandom.vn/wp-content/uploads/2019/04/naruto-uchiha-itachi-1.jpg" src="https://fandom.vn/wp-content/uploads/2019/04/naruto-uchiha-itachi-1.jpg" alt="" class="details__relics-media-item-img">
                                                </div>
                                                <div class="details__relics-media-item col l-2-4 c-4">
                                                    <img data-fancybox="trigger-element-gallery" data-src="https://s199.imacdn.com/ta/2018/02/28/93dfbf3de96910c6_14537b5811453342_5984815198095753184552.jpg" src="https://s199.imacdn.com/ta/2018/02/28/93dfbf3de96910c6_14537b5811453342_5984815198095753184552.jpg" alt="" class="details__relics-media-item-img">
                                                </div>
                                                <div class="details__relics-media-item col l-2-4 c-4">
                                                    <img data-fancybox="trigger-element-gallery" data-src="https://product.hstatic.net/1000132959/product/o1cn01xqy7ip1kmodvyq55w___187321206_266ae68154fe436390c690e983e2c3a3.jpg" src="https://product.hstatic.net/1000132959/product/o1cn01xqy7ip1kmodvyq55w___187321206_266ae68154fe436390c690e983e2c3a3.jpg" alt="" class="details__relics-media-item-img">
                                                </div>
                                                <div class="details__relics-media-item col l-2-4 c-4">
                                                    <img data-fancybox="trigger-element-gallery" data-src="https://i.pinimg.com/originals/25/55/9f/25559f4667c608e97a290e17f6073be0.jpg" src="https://i.pinimg.com/originals/25/55/9f/25559f4667c608e97a290e17f6073be0.jpg" alt="" class="details__relics-media-item-img">
                                                </div>
                                                <div class="details__relics-media-item col l-2-4 c-4">
                                                    <img data-fancybox="trigger-element-gallery" data-src="https://genk.mediacdn.vn/2019/6/5/anh-1-1559721573863507176697.jpg" src="https://genk.mediacdn.vn/2019/6/5/anh-1-1559721573863507176697.jpg" alt="" class="details__relics-media-item-img">
                                                </div>
                                                <div class="details__relics-media-item col l-2-4 c-4">
                                                    <img data-fancybox="trigger-element-gallery" data-src="https://cuongtruyen.com/wp-content/uploads/2019/02/itachi-wallpaper-1024x576.jpg" src="https://cuongtruyen.com/wp-content/uploads/2019/02/itachi-wallpaper-1024x576.jpg" alt="" class="details__relics-media-item-img">
                                                </div>
                                                <div class="details__relics-media-item col l-2-4 c-4">
                                                    <img data-fancybox="trigger-element-gallery" data-src="https://i.pinimg.com/736x/de/eb/d1/deebd16ded8da1f14531ce4ce581855b.jpg" src="https://i.pinimg.com/736x/de/eb/d1/deebd16ded8da1f14531ce4ce581855b.jpg" alt="" class="details__relics-media-item-img">
                                                </div>
                                                <div class="details__relics-media-item col l-2-4 c-4">
                                                    <img data-fancybox="trigger-element-gallery" data-src="https://rapchieuphim.com/photos/3/tin-tong-hop/phim-chuyen-the-manga.jpg" src="https://rapchieuphim.com/photos/3/tin-tong-hop/phim-chuyen-the-manga.jpg" alt="" class="details__relics-media-item-img">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="details__relics-box-footer">
                                            <div class="details__relics-box-page">
                                                <div class="details__relics-box-page-content">Trang 
                                                    <span id="relics__today"></span>/<span id="relics__page"></span> 
                                                    trong tổng <span>34</span> ảnh
                                                </div>
                                                <div id="relics__control" class="details__relics-box-page-ac"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="relics__document" class="details__relics-box row">
                                    <div class="details__relics-box-left col l-8 m-7 c-12">
                                        <div class="details__relics-document">
                                            <div class="details__relics-document-header">
                                                <img src="assets/fe/libs/img/down.png" alt="" class="details__relics-document-header-img">
                                                <h2 class="details__relics-document-header-title">Tài liệu di tích</h2>
                                            </div>
                                            <div class="details__relics-document-list">
                                                <a href="#" class="details__relics-document-item" download>
                                                    <span class="details__relics-document-item-title">Tài kiệu về sắc phong đền Củi thờ ong Hoàng Mười</span>
                                                    <span class="details__relics-document-item-desc">Cập nhật: 24/09/2021 File.docx</span>
                                                </a>
                                                <a href="#" class="details__relics-document-item" download>
                                                    <span class="details__relics-document-item-title">Tài kiệu về sắc phong đền Củi thờ ong Hoàng Mười</span>
                                                    <span class="details__relics-document-item-desc">Cập nhật: 24/09/2021 File.docx</span>
                                                </a>
                                                <a href="#" class="details__relics-document-item" download>
                                                    <span class="details__relics-document-item-title">Tài kiệu về sắc phong đền Củi thờ ong Hoàng Mười</span>
                                                    <span class="details__relics-document-item-desc">Cập nhật: 24/09/2021 File.docx</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="details__relics-box-right col l-4 m-5 c-12">
                                        <div class="details__relics-news">
                                            <a href="#" class="details__relics-news-item">
                                                <span class="details__relics-news-title compact">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt, nulla eveniet! Accusamus consectetur reprehenderit voluptate, consequatur illum, quidem laborum laudantium minus eos ea possimus nulla nisi. Optio ipsam eveniet libero.</span>
                                                <span class="details__relics-news-desc compact">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Saepe commodi eos, vel dolorum molestias voluptatem labore praesentium dolorem odio, voluptas eum veniam, iure ad adipisci veritatis delectus reiciendis ducimus soluta!</span>
                                            </a>
                                            <a href="#" class="details__relics-news-item">
                                                <span class="details__relics-news-title compact">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt, nulla eveniet! Accusamus consectetur reprehenderit voluptate, consequatur illum, quidem laborum laudantium minus eos ea possimus nulla nisi. Optio ipsam eveniet libero.</span>
                                                <span class="details__relics-news-desc compact">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Saepe commodi eos, vel dolorum molestias voluptatem labore praesentium dolorem odio, voluptas eum veniam, iure ad adipisci veritatis delectus reiciendis ducimus soluta!</span>
                                            </a>
                                            <a href="#" class="details__relics-news-item">
                                                <span class="details__relics-news-title compact">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt, nulla eveniet! Accusamus consectetur reprehenderit voluptate, consequatur illum, quidem laborum laudantium minus eos ea possimus nulla nisi. Optio ipsam eveniet libero.</span>
                                                <span class="details__relics-news-desc compact">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Saepe commodi eos, vel dolorum molestias voluptatem labore praesentium dolorem odio, voluptas eum veniam, iure ad adipisci veritatis delectus reiciendis ducimus soluta!</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="details__fast-block">
                                <div class="details__fast">
                                    <ul class="details__fast-list">
                                        <li class="details__fast-item">
                                            <a onclick="return fast(this)" id="fast__relics__intro" href="#relics__intro" class="details__fast-item-link">
                                                <img src="assets/fe/libs/img/sticky-note.png" alt="" class="details__fast-item-img">
                                                <span>Giới thiệu</span>
                                            </a>
                                        </li>
                                        <hr>
                                        <li class="details__fast-item">
                                            <a onclick="return fast(this)" id="fast__relics__content" href="#relics__content" class="details__fast-item-link">
                                                <img src="assets/fe/libs/img/verified.png" alt="" class="details__fast-item-img">
                                                <span>Nội dung</span>
                                            </a>
                                        </li>
                                        <hr>
                                        <li class="details__fast-item">
                                            <a onclick="return fast(this)" id="fast__relics__hot" href="#relics__hot" class="details__fast-item-link">
                                                <img src="assets/fe/libs/img/paper-lantern.png" alt="" class="details__fast-item-img">
                                                <span>Lễ hội</span>
                                            </a>
                                        </li>
                                        <hr>
                                        <li class="details__fast-item">
                                            <a onclick="return fast(this)" id="fast__relics__other" href="#relics__people" class="details__fast-item-link">
                                                <img src="assets/fe/libs/img/cpu-tower.png" alt="" class="details__fast-item-img">
                                                <span>Nhân vật</span>
                                            </a>
                                        </li>
                                        <hr>
                                        <li class="details__fast-item">
                                            <a onclick="return fast(this)" id="fast2__relics__other" href="#relics__arti" class="details__fast-item-link">
                                                <img src="assets/fe/libs/img/vase.png" alt="" class="details__fast-item-img">
                                                <span>Hiện vật</span>
                                            </a>
                                        </li>
                                        <hr>
                                        <li class="details__fast-item">
                                            <a onclick="return fast(this)" id="fast__relics__media" href="#relics__media" class="details__fast-item-link">
                                                <img src="assets/fe/libs/img/magazine.png" alt="" class="details__fast-item-img">
                                                <span>Hình ảnh</span>
                                            </a>
                                        </li>
                                        <hr>
                                        <li class="details__fast-item">
                                            <a onclick="return fast(this)" id="fast__relics__document" href="#relics__document" class="details__fast-item-link">
                                                <img src="assets/fe/libs/img/document.png" alt="" class="details__fast-item-img">
                                                <span>Tài liệu</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <a href="./details.html#details" class="details__fast-ac">
                                        <img src="assets/fe/libs/img/news.png" alt="" class="details__fast-ac-img">
                                        <span>Đầu trang</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="details__slidebar-block col l-3 m-12 c-12">
                        <div class="root__help">
                            <div class="root__help-header">
                                <div class="root__help-header-media">
                                    <img src="assets/fe/libs/img/lifebuoy.png" alt="">
                                </div>
                                <div class="root__help-content">
                                    <h2 class="root__help-header-title">Trợ giúp</h2>
                                    <p class="root__help-header-desc">Cho hệ thống đăng nhập</p>
                                </div>
                            </div>
                            <div class="root__help-list">
                                <a href="" class="root__help-item item">
                                    <div class="root__help-item-media">
                                        <img src="https://lh3.googleusercontent.com/proxy/PWKswzKm1AQcqY7x5d_5i9my7xYmePcSqWiKx4hnY2j_ueTytGZVpqSf8azNDnsw8rH644jPRpDFcC929d9d6luc3yI-77h2-f0oAlz3ITbsige3Jqtl" alt="">
                                    </div>
                                    <div class="root__help-item-content">
                                        <h3 class="root__help-item-title item__title compact">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo aspernatur aperiam deserunt autem, placeat quasi dolor illum? Ullam reiciendis adipisci recusandae consequuntur harum, rerum at atque porro culpa dolores in!</h3>
                                        <p class="root__help-item-desc item__desc compact">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam rem, minima, architecto numquam officiis impedit voluptatum, assumenda corporis illo suscipit iure incidunt doloremque exercitationem vitae quam earum natus nemo debitis?</p>
                                    </div>
                                </a>
                                <a href="" class="root__help-item item">
                                    <div class="root__help-item-media">
                                        <img src="https://lh3.googleusercontent.com/proxy/PWKswzKm1AQcqY7x5d_5i9my7xYmePcSqWiKx4hnY2j_ueTytGZVpqSf8azNDnsw8rH644jPRpDFcC929d9d6luc3yI-77h2-f0oAlz3ITbsige3Jqtl" alt="">
                                    </div>
                                    <div class="root__help-item-content">
                                        <h3 class="root__help-item-title item__title compact">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo aspernatur aperiam deserunt autem, placeat quasi dolor illum? Ullam reiciendis adipisci recusandae consequuntur harum, rerum at atque porro culpa dolores in!</h3>
                                        <p class="root__help-item-desc item__desc compact">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam rem, minima, architecto numquam officiis impedit voluptatum, assumenda corporis illo suscipit iure incidunt doloremque exercitationem vitae quam earum natus nemo debitis?</p>
                                    </div>
                                </a>
                                <a href="" class="root__help-item item">
                                    <div class="root__help-item-media">
                                        <img src="https://lh3.googleusercontent.com/proxy/PWKswzKm1AQcqY7x5d_5i9my7xYmePcSqWiKx4hnY2j_ueTytGZVpqSf8azNDnsw8rH644jPRpDFcC929d9d6luc3yI-77h2-f0oAlz3ITbsige3Jqtl" alt="">
                                    </div>
                                    <div class="root__help-item-content">
                                        <h3 class="root__help-item-title item__title compact">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo aspernatur aperiam deserunt autem, placeat quasi dolor illum? Ullam reiciendis adipisci recusandae consequuntur harum, rerum at atque porro culpa dolores in!</h3>
                                        <p class="root__help-item-desc item__desc compact">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam rem, minima, architecto numquam officiis impedit voluptatum, assumenda corporis illo suscipit iure incidunt doloremque exercitationem vitae quam earum natus nemo debitis?</p>
                                    </div>
                                </a>
                            </div>
                            <div class="root__help-all">
                                <a href="#" class="root__help-all-link">Xem thêm</a>
                            </div>
                            <a href="./register.html" class="root__help-ac">Đăng ký tài khoản</a>
                        </div>
                    </div>                                                                                      
            </div>                  
        </div>
        <!-- related -->
        <div class="root__related">
            <h2 class="root__related-title">Các bài liên quan</h2>
            <div class="root__related-list row">
                <div class="root__related-item-block col l-3 m-4 c-12 ">
                    <a href="" class="root__related-item">
                        <div class="root__related-item-media">
                            <img src="https://sachxua.vn/wp-content/uploads/2020/01/lich-su-viet-nam-bg.jpg" alt="" class="root__related-item-media-img">
                        </div>
                        <div class="root__related-content">
                            <div class="root__related-content-title compact">Chào em anh đứng đây từ chiều</div>
                            <p class="root__related-content-desc compact">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptas doloribus quibusdam amet sint, velit perferendis explicabo. Voluptate est perspiciatis aut minima nostrum animi at delectus optio impedit temporibus, eligendi consequatur.
                            </p>
                        </div>
                    </a>
                </div>
                <div class="root__related-item-block col l-3 m-4 c-12 ">
                    <a href="" class="root__related-item">
                        <div class="root__related-item-media">
                            <img src="https://sachxua.vn/wp-content/uploads/2020/01/lich-su-viet-nam-bg.jpg" alt="" class="root__related-item-media-img">
                        </div>
                        <div class="root__related-content">
                            <div class="root__related-content-title compact">Chào em anh đứng đây từ chiều Chào em anh đứng đây từ chiều Chào em anh đứng đây từ chiều</div>
                            <p class="root__related-content-desc compact">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            </p>
                        </div>
                    </a>
                </div>
                <div class="root__related-item-block col l-3 m-4 c-12 ">
                    <a href="" class="root__related-item">
                        <div class="root__related-item-media">
                            <img src="https://sachxua.vn/wp-content/uploads/2020/01/lich-su-viet-nam-bg.jpg" alt="" class="root__related-item-media-img">
                        </div>
                        <div class="root__related-content">
                            <div class="root__related-content-title compact">Chào em anh đứng đây từ chiều Chào em anh đứng đây từ chiều Chào em anh đứng đây từ chiều</div>
                            <p class="root__related-content-desc compact">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            </p>
                        </div>
                    </a>
                </div>
                <div class="root__related-item-block col l-3 m-4 c-12 ">
                    <a href="" class="root__related-item">
                        <div class="root__related-item-media">
                            <img src="https://sachxua.vn/wp-content/uploads/2020/01/lich-su-viet-nam-bg.jpg" alt="" class="root__related-item-media-img">
                        </div>
                        <div class="root__related-content">
                            <div class="root__related-content-title compact">Chào em anh đứng đây từ chiều Chào em anh đứng đây từ chiều Chào em anh đứng đây từ chiều</div>
                            <p class="root__related-content-desc compact">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div> 
        <!-- related -->
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script src="assets/fe/js/details.js"></script>
@endsection