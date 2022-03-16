@extends('frontend.layout.master')
@section('content')
    <div class="root__page">
        <div class="home grid">
            <div class="home__header-block">
                <div class="home__header row">
                    <div class="home__header-i4-block col l-6 m-6 c-12">
                        <div class="home__header-i4">
                            <div class="home__header-i4-media">
                                <img src="assets/fe/libs/img/forbidden-city.png" alt="">
                            </div>
                            <div class="home__header-i4-content">
                                <h1 class="home__header-i4-title text__key">Di tích Lịch Sử Hà Tĩnh</h1>
                                <p class="home__header-i4-num text__desc">Tổng {{ count($relics) }} di tích</p>
                            </div>
                        </div>
                    </div>
                    <div class="home__header-ac-block col l-6 m-6 c-0">
                        <div class="home__header-ac">
                                <span>Quảng cáo & Tuyên truyền</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="home__box row">
                <div class="home__relics-block col l-9 m-12 c-12">
                        <div class="home__filter">
                            <div class="home__filter-list">
                                <div class="home__filter-item">
                                    <img src="assets/fe/libs/img/menu.png" alt="" class="home__filter-item-img">
                                    <div class="custom-select home__filter-item-select">
                                        <select>
                                            <option value="0">Tất cả danh mục</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="home__filter-item">
                                    <img src="assets/fe/libs/img/location.png" alt="" class="home__filter-item-img">
                                    <div class="custom-select home__filter-item-select">
                                        <select>
                                            <option value="0">Tất cả</option>
                                            <option value="1">TP Hà Tĩnh</option>
                                            <option value="2">Lộc Hà</option>
                                            <option value="3">Cẩm Xuyên</option>
                                            <option value="4">Kỳ Anh</option>
                                            <option value="5">Nghi Xuân</option>
                                            <option value="6">Thịch Lộc</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="home__filter-item">
                                    <img src="assets/fe/libs/img/star.png" alt="" class="home__filter-item-img">
                                    <div class="custom-select home__filter-item-select">
                                        <select>
                                            <option value="0">Xếp hạng</option>
                                            @foreach ($ranks as $rank)
                                                <option value="{{ $rank->id }}">{{ $rank->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @if (Auth::check() && Auth::user()->group_id != 3)
                                <a href="{{ route('relics.create') }}" class="home__filter-add">
                                    <span>Thêm mới</span>
                                    <img src="assets/fe/libs/img/plus.png" alt="">
                                </a>
                            @endif
                        </div>
                        <div class="home__relics">
                            @foreach ($relics as $relic)
                                <div class="home__relics-item">
                                    <a href="{{ route('fe.relics.detail', ['slug'=>$relic->slug]) }}" class="home__relics-link">
                                        <div class="home__relics-item-media">
                                            <img src="{{ $relic->featured_img }}" alt="">
                                        </div>
                                        <div class="home__relics-item-content">
                                            <h2 class="home__relics-item-title">{{ $relic->name }}</h2>
                                            <p class="home__relics-item-desc compact">{{ $relic->description }}</p>
                                            <div class="home__relics-item-ac">
                                                <div class="home__relics-item-ac-list">
                                                    <div class="home__relics-item-ac-it tooltip">
                                                        <img src="assets/fe/libs/img/star.png" alt="">
                                                        <span>{{ $relic->getrate[0]->name }}</span>
                                                        <div class="ttip">Xếp hạng</div>
                                                    </div>
                                                    <div class="home__relics-item-ac-it tooltip">
                                                        <img src="assets/fe/libs/img/folder.png" alt="">
                                                        @php
                                                            $countd = !empty($relic->document) ? count($relic->document): 0;
                                                            $counti = !empty($relic->image) ? count($relic->image): 0;
                                                            $count = $countd + $counti;
                                                        @endphp
                                                        <span>{{ $count }} Tập tin</span>
                                                        <div class="ttip">Thư viện</div>
                                                    </div>
                                                    {{--  <div class="home__relics-item-ac-it tooltip">
                                                        <img src="assets/fe/libs/img/insurance.png" alt="">
                                                        <span>Huyện Thạch Hà</span>
                                                        <div class="ttip">Địa điểm</div>
                                                    </div>  --}}
                                                </div>
                                                <div class="home__relics-item-ac-btn btn">Xem chi tiết</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="home__pagination">
                            <div id="home__pagination" class="home__pagination-ac"></div>
                        </div>
                </div>
                <div class="home__other-block col l-3 m-0 c-0">
                        <div class="home__other">
                            <div class="home__other-header">
                                <img src="assets/fe/libs/img/paper-lantern.png" alt="" class="home__other-header-img">
                                <div class="home__other-header-content">
                                    <h2 class="home__other-header-title">Lễ hội</h2>
                                    <p class="home__other-header-desc">Danh sách sắp diễn ra</p>
                                </div>
                            </div>
                            <div class="home__other-list">
                               @foreach ($festivals as $festival)
                                    <a href="{{ route('fe.festivals.detail', ['slug'=>$festival->slug]) }}" class="home__other-item item">
                                        <div class="home__other-item-box">
                                            <div style="height: 48px;" class="home__other-item-media">
                                                <img src="{{ $festival->featured_img }}" alt="">
                                            </div>
                                            <div class="home__other-item-content">
                                                <h3 class="home__other-item-title item__title compact">{{ $festival->name }}</h3>
                                                <div class="home__other-item-desc item__desc compact">{!! html_entity_decode($festival->description) !!}</div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <div class="home__other-ac">
                                    <a href="{{ route('fe.festivals.index') }}" class="home__other-ac-btn">Xem thêm</a>
                                </div>
                        </div>
                        {{--  <div class="home__other">
                            <div class="home__other-header">
                                <img src="assets/fe/libs/img/customer-review.png" alt="" class="home__other-header-img">
                                <div class="home__other-header-content">
                                    <h2 class="home__other-header-title">Hoạt động</h2>
                                    <p class="home__other-header-desc">Tương tác trên trang</p>
                                </div>
                            </div>
                            <div class="home__other-list">
                                <a href="#" class="home__other-item item">
                                    <div class="home__other-item-box">
                                        <div class="home__other-item-media">
                                            <img src="https://vannghetiengiang.vn/uploads/news/2012_10/hung-vuong.jpg" alt="">
                                        </div>
                                        <div class="home__other-item-content">
                                            <h3 class="home__other-item-title item__title compact">Chào em anh đứng đây từ chiều Chào em anh đứng đây từ chiều Chào em anh đứng đây từ chiều</h3>
                                            <p class="home__other-item-desc item__desc compact">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus voluptas blanditiis, ratione dignissimos officia ipsa perspiciatis amet veniam, placeat est unde maxime similique quasi ducimus soluta eveniet iusto beatae iste!</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="home__other-item item">
                                    <div class="home__other-item-box">
                                        <div class="home__other-item-media">
                                            <img src="https://vannghetiengiang.vn/uploads/news/2012_10/hung-vuong.jpg" alt="">
                                        </div>
                                        <div class="home__other-item-content">
                                            <h3 class="home__other-item-title item__title compact">Chào em anh đứng đây từ chiều Chào em anh đứng đây từ chiều Chào em anh đứng đây từ chiều</h3>
                                            <p class="home__other-item-desc item__desc compact">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus voluptas blanditiis, ratione dignissimos officia ipsa perspiciatis amet veniam, placeat est unde maxime similique quasi ducimus soluta eveniet iusto beatae iste!</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="home__other-item item">
                                    <div class="home__other-item-box">
                                        <div class="home__other-item-media">
                                            <img src="https://vannghetiengiang.vn/uploads/news/2012_10/hung-vuong.jpg" alt="">
                                        </div>
                                        <div class="home__other-item-content">
                                            <h3 class="home__other-item-title item__title compact">Chào em anh đứng đây từ chiều Chào em anh đứng đây từ chiều Chào em anh đứng đây từ chiều</h3>
                                            <p class="home__other-item-desc item__desc compact">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus voluptas blanditiis, ratione dignissimos officia ipsa perspiciatis amet veniam, placeat est unde maxime similique quasi ducimus soluta eveniet iusto beatae iste!</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="home__other-ac">
                                <a href="#" class="home__other-ac-btn">Xem thêm</a>
                            </div>
                        </div>  --}}
                        <div class="home__other">
                            <div class="home__other-header">
                                <img src="assets/fe/libs/img/quill.png" alt="" class="home__other-header-img">
                                <div class="home__other-header-content">
                                    <h2 class="home__other-header-title">Tin tức</h2>
                                    <p class="home__other-header-desc">Về di tích & Văn hóa</p>
                                </div>
                            </div>
                            <div class="home__other-list">
                                <a href="#" class="home__other-item item">
                                    <div class="home__other-item-box">
                                        <div class="home__other-item-media">
                                            <img src="https://vannghetiengiang.vn/uploads/news/2012_10/hung-vuong.jpg" alt="">
                                        </div>
                                        <div class="home__other-item-content">
                                            <h3 class="home__other-item-title item__title compact">Chào em anh đứng đây từ chiều Chào em anh đứng đây từ chiều Chào em anh đứng đây từ chiều</h3>
                                            <p class="home__other-item-desc item__desc compact">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus voluptas blanditiis, ratione dignissimos officia ipsa perspiciatis amet veniam, placeat est unde maxime similique quasi ducimus soluta eveniet iusto beatae iste!</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="home__other-item item">
                                    <div class="home__other-item-box">
                                        <div class="home__other-item-media">
                                            <img src="https://vannghetiengiang.vn/uploads/news/2012_10/hung-vuong.jpg" alt="">
                                        </div>
                                        <div class="home__other-item-content">
                                            <h3 class="home__other-item-title item__title compact">Chào em anh đứng đây từ chiều Chào em anh đứng đây từ chiều Chào em anh đứng đây từ chiều</h3>
                                            <p class="home__other-item-desc item__desc compact">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus voluptas blanditiis, ratione dignissimos officia ipsa perspiciatis amet veniam, placeat est unde maxime similique quasi ducimus soluta eveniet iusto beatae iste!</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="home__other-item item">
                                    <div class="home__other-item-box">
                                        <div class="home__other-item-media">
                                            <img src="https://vannghetiengiang.vn/uploads/news/2012_10/hung-vuong.jpg" alt="">
                                        </div>
                                        <div class="home__other-item-content">
                                            <h3 class="home__other-item-title item__title compact">Chào em anh đứng đây từ chiều Chào em anh đứng đây từ chiều Chào em anh đứng đây từ chiều</h3>
                                            <p class="home__other-item-desc item__desc compact">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus voluptas blanditiis, ratione dignissimos officia ipsa perspiciatis amet veniam, placeat est unde maxime similique quasi ducimus soluta eveniet iusto beatae iste!</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="home__other-ac">
                                <a href="#" class="home__other-ac-btn">Xem thêm</a>
                            </div>
                        </div>
                        <div class="home__other">
                            <div class="home__other-header">
                                <img src="assets/fe/libs/img/quill.png" alt="" class="home__other-header-img">
                                <div class="home__other-header-content">
                                    <h2 class="home__other-header-title">Thư viện ảnh</h2>
                                    <p class="home__other-header-desc">Về di tích & Văn hóa</p>
                                </div>
                            </div>
                            <div class="home__other-media row">
                                @foreach ($relic->image as $image)
                                    <div class="home__other-media-item-block col l-4 m-6 c-4">
                                        <div class="home__other-media-item">
                                            <img src="{{ $image }}" alt="">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="home__other-ac">
                                <a href="#" class="home__other-ac-btn">Xem thêm</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection