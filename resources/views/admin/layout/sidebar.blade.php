<aside class="app-sidebar">
    <div class="app-sidebar__logo">
        <a class="header-brand" href="index.html">
            <img src="assets/images/brand/logo.png" class="header-brand-img desktop-lgo" alt="Dayonelogo">
            <img src="assets/images/brand/logo-white.png" class="header-brand-img dark-logo" alt="Dayonelogo">
            <img src="assets/images/brand/favicon.png" class="header-brand-img mobile-logo" alt="Dayonelogo">
            <img src="assets/images/brand/favicon1.png" class="header-brand-img darkmobile-logo" alt="Dayonelogo">
        </a>
    </div>
    <div class="app-sidebar3">
        <div class="app-sidebar__user">
            <div class="dropdown user-pro-body text-center">
                <div class="user-pic">
                    <img src="assets/images/users/16.jpg" alt="user-img" class="avatar-xxl rounded-circle mb-1">
                </div>
                <div class="user-info">
                    <h5 class=" mb-2">{{ Auth::user()->username }}</h5>
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="feather feather-home sidemenu_icon"></i>
                    <span class="side-menu__label">HR Dashboard</span><i class="angle fa fa-angle-right"></i>
                </a>
                <ul class="slide-menu">
                    <li><a href="index.html" class="slide-item">Dashboard</a></li>
                    <li><a href="hr-department.html" class="slide-item">Department</a></li>
                    <li class="sub-slide">
                        <a class="sub-side-menu__item" data-toggle="sub-slide" href="#"><span class="sub-side-menu__label">Employees</span><i class="sub-angle fa fa-angle-right"></i></a>
                        <ul class="sub-slide-menu">
                            <li><a class="sub-slide-item" href="hr-emplist.html">Employees List</a></li>
                            <li><a class="sub-slide-item" href="hr-empview.html">View Employee</a></li>
                            <li><a class="sub-slide-item" href="hr-addemployee.html">Add Employee</a></li>
                        </ul>
                    </li>
                    <li class="sub-slide">
                        <a class="sub-side-menu__item" data-toggle="sub-slide" href="#"><span class="sub-side-menu__label">Attendance</span><i class="sub-angle fa fa-angle-right"></i></a>
                        <ul class="sub-slide-menu">
                            <li><a class="sub-slide-item" href="hr-attlist.html">Attendance List</a></li>
                            <li><a class="sub-slide-item" href="hr-attuser.html">Attendance By User</a></li>
                            <li><a class="sub-slide-item" href="hr-attview.html">Attendance View</a></li>
                            <li><a class="sub-slide-item" href="hr-overviewcldr.html">Overview Calender</a></li>
                            <li><a class="sub-slide-item" href="hr-attmark.html">Attendance Mark </a></li>
                            <li><a class="sub-slide-item" href="hr-leaves.html">Leave Settings</a></li>
                            <li><a class="sub-slide-item" href="hr-leavesapplication.html">Leave Applications</a></li>
                            <li><a class="sub-slide-item" href="hr-recentleaves.html">Recent Leaves </a></li>
                        </ul>
                    </li>
                    <li><a href="hr-award.html" class="slide-item">Awards</a></li>
                    <li><a href="hr-holiday.html" class="slide-item">Holidays</a></li>
                    <li><a href="hr-notice.html" class="slide-item">Notice Board</a></li>
                    <li><a href="hr-expenses.html" class="slide-item">Expenses</a></li>
                    <li class="sub-slide">
                        <a class="sub-side-menu__item" data-toggle="sub-slide" href="#"><span class="sub-side-menu__label">Payroll</span><i class="sub-angle fa fa-angle-right"></i></a>
                        <ul class="sub-slide-menu">
                            <li><a class="sub-slide-item" href="hr-empsalary.html">Employee Salary</a></li>
                            <li><a class="sub-slide-item" href="hr-addpayroll.html">Add Payroll</a></li>
                            <li><a class="sub-slide-item" href="hr-editpayroll.html">Edit Payroll</a></li>
                        </ul>
                    </li>
                    <li><a href="hr-events.html" class="slide-item">Events</a></li>
                    <li><a href="hr-settings.html" class="slide-item">Settings</a></li>
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="feather feather-book-open sidemenu_icon"></i>
                    <span class="side-menu__label">Di tích</span></i>
                </a>
            </li>
        </ul>
        <div class="Annoucement_card">
            <div class="text-center">
                <div>
                    <h5 class="title mt-0 mb-1 ml-2 font-weight-bold tx-12">Announcement</h5>
                    <div class="bg-layer py-4">
                        <img src="assets/images/users/16.jpg" class="py-3 text-center mx-auto" alt="img">
                    </div>
                    <p class="subtext mt-0 mb-0 ml-2 fs-13 text-center my-2">Make an Announcement to Our Employee</p>
                </div>
            </div>
            <button class="btn btn-block btn-primary my-4 fs-12">Create Announcement</button>
            <button class="btn btn-block btn-outline fs-12">See history</button>
        </div>
    </div>
</aside>