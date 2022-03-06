<div id="root__header-block" class="root__header-block">
    <div id="root__nav" class="root__nav">
        <ul class="root__nav-list">
            <li class="root__nav-item">
                <a href="#" class="root__nav-link"><span>Cổng thông tin</span></a>
            </li>
            <li class="root__nav-item">
                <a href="#" class="root__nav-link"><span>Điều hành tác nghiệp</span></a>
            </li>
            <li class="root__nav-item">
                <a href="#" class="root__nav-link"><span>Hỗ trợ</span></a>
            </li>
            <li class="root__nav-item">
                <a href="#" class="root__nav-link"><span>UBND tỉnh Hà Tĩnh</span></a>
            </li>
        </ul>
        <ul class="root__nav-list">
            <li class="root__nav-item">
                <a href="#" class="root__nav-link"><span>Thông tin</span></a>
            </li>
            <li class="root__nav-item">
                <a href="#" class="root__nav-link"><span>Giới thiệu</span></a>
            </li>
            <li class="root__nav-item">
                <a href="#" class="root__nav-link"><span>Hỗ trợ</span></a>
            </li>
            <li class="root__nav-item">
                <a href="#" class="root__nav-link"><span>Dịch vụ</span></a>
            </li>
            <li class="root__nav-item">
                <a href="#" class="root__nav-link"><span>Liên hệ</span></a>
            </li>
        </ul>
    </div> 
    <div id="root__header" class="root__header">
        <div class="root__header-left">
            <div class="root__navmobi">
                <input type="checkbox" name="" id="root__navmobi__control" hidden>
                <label for="root__navmobi__control" class="root__navmobi-control">
                    <i class="fal fa-bars"></i>
                </label>
                <label for="root__navmobi__control" class="modal__overlay"></label>
                <div id="root__navmobi" class="root__navmobi-list-block">
                    <ul class="root__navmobi-list">
                        <label for="root__navmobi__control" class="root__navmobi-list-close">
                            <i class="fal fa-times"></i>
                        </label>
                        <li class="root__navmobi-item">
                            <a href="./index.html" class="root__navmobi-link">
                                <img src="assets/fe/libs/img/forbidden-city.png" alt="">
                                <span>Danh sách di tích</span>
                            </a>
                        </li>
                        <li class="root__navmobi-item">
                            <a href="./assets/components/festival.html" class="root__navmobi-link">
                                <img src="assets/fe/libs/img/paper-lantern.png" alt="">
                                <span>Lễ hội văn hóa</span>
                            </a>
                        </li>
                        <li class="root__navmobi-item">
                            <a href="./assets/components/artifacts.html" class="root__navmobi-link">
                                <img src="assets/fe/libs/img/vase.png" alt="">
                                <span>Hiện vật</span>
                            </a>
                        </li>
                        <li class="root__navmobi-item">
                            <a href="./assets/components/character.html" class="root__navmobi-link">
                                <img src="assets/fe/libs/img/cpu-tower.png" alt="">
                                <span>Nhân vật được thờ</span>
                            </a>
                        </li>
                        <hr>
                        <li class="root__navmobi-item">
                            <a href="./assets/components/ratings.html" class="root__navmobi-link">
                                <img src="assets/fe/libs/img/star.png" alt="">
                                <span>Xếp hạng di tích</span>
                            </a>
                        </li>
                        <li class="root__navmobi-item">
                            <a href="./assets/components/statistical.html" class="root__navmobi-link">
                                <img src="assets/fe/libs/img/presentation.png" alt="">
                                <span>Thống kê di tích</span>
                            </a>
                        </li>
                        <hr>
                        <li class="root__navmobi-item">
                            <a href="./assets/components/place.html" class="root__navmobi-link">
                                <img src="assets/fe/libs/img/location.png" alt="">
                                <span>Địa điểm di tích</span>
                            </a>
                        </li>
                        <li class="root__navmobi-item">
                            <a href="./assets/components/library.html" class="root__navmobi-link">
                                <img src="assets/fe/libs/img/monitor.png" alt="">
                                <span>Thư viện ảnh</span>
                            </a>
                        </li>
                        <li class="root__navmobi-item">
                            <a href="./assets/components/file.html" class="root__navmobi-link">
                                <img src="assets/fe/libs/img/calligraphy.png" alt="">
                                <span>Hồ sơ di lích</span>
                            </a>
                        </li>                            
                    </ul>
                 
                </div>
            </div>
            <a href="{{ route('fe.relics.index') }}" class="root__header-hot">
                <h2 class="root__header-hot-title">Quản lý Di Tích</h2>
                <h3 class="root__header-hot-desc">Sở văn hóa - Thể thao - Du lịch Hà Tĩnh</h3>
            </a>
            <form class="root__header-search">
                <input type="text" class="root__header-search-input" placeholder="Tìm kiếm di tích, lịch sử, văn hóa, lễ hội...">
                <button class="root__header-search-btn"><i class="fal fa-search"></i></button>
            </form>
        </div>
        <div class="root__header-ac">
            <ul class="root__header-list">
                <li class="root__header-item">
                    <a href="" class="root__header-link"><span>Tin tức</span></a>
                </li>
                <li class="root__header-item">
                    <a href="" class="root__header-link"><span>Hoạt động</span></a>
                </li>
                <li class="root__header-item">
                    <a href="" class="root__header-link"><span>Đặt lịch</span></a>
                </li>
            </ul>
            <div class="root__header-ac-btn btn">
                <img src="assets/fe/libs/img/user.png" alt="">
                <span class="root__userkey-on">Bá Tương</span>
                <span class="root__userkey-off">Tài khoản</span>
                <div class="root__userkey">
                    <div class="root__login">
                        <div class="root__login-header">
                            <h3 class="root__login-header-title">Đăng nhập</h3>
                            <a href="./assets/components/register.html" class="root__login-header-link">Đăng ký</a>
                        </div>
                        <form action="" class="root__login-form form">
                            <div class="root__login-form-group form__group">
                                <input type="text" class="root__login-form-input form__input" placeholder="Tài khoản hoặc Email">
                                <i class="fas fa-user form__icon"></i>
                            </div>
                            <div class="root__login-form-group form__group">
                                <input type="password" class="root__login-form-input form__input" placeholder="Mật khẩu">
                                <i class="fas fa-key form__icon"></i>
                            </div>
                            <div class="root__login-form-mind">
                                <input type="checkbox" name="" id="root__pass" class="root__login-form-mind-check"> 
                                <label for="root__pass" class="root__login-form-mind-desc">Ghi nhớ thông tin đăng nhập</label>
                            </div>
                            <div class="root__login-form-ac">
                                <a href="#" class="root__login-form-ac-forget">Quên mật khẩu?</a>
                                <button class="root__login-form-ac-btn btn">Đăng nhập</button>
                            </div>
                        </form>
                    </div>
                    <div class="root__logged">
                        <div class="root__logged-header">
                            <h3 class="root__logged-header-title">Truy cập chức năng</h3>
                            <a href="#" class="root__logged-header-link">Đăng xuất</a>
                        </div>
                        <div class="root__logged-list">
                            <a href="#" class="root__logged-item">
                                <img src="assets/fe/libs/img/user.png" alt="">
                                <span>Quản lý tài khoản</span>
                            </a>
                            <a href="#" class="root__logged-item">
                                <img src="assets/fe/libs/img/insurance.png" alt="">
                                <span>Vào trang Admin</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>