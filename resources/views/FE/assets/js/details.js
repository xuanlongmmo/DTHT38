function details__desc() {
    var desc = document.getElementById('details__desc');
    var btn = document.getElementById('details__desc-btn');
    var check = document.getElementById('details__desc-check');
    btn.onclick = function() {
        if (check.checked == 0) {
            desc.style.cssText = '-webkit-line-clamp: unset;';
            btn.innerHTML = 'Ẩn bớt nội dung <i class="fal fa-chevron-up"></i>';
        } else {
            desc.style.cssText = '-webkit-line-clamp: 4;';
            btn.innerHTML = 'Hiển thị nội dung <i class="fal fa-chevron-down"></i>';
        }
    }
}
details__desc();

// slider 
var slideIndex = 1;
    relics__show(slideIndex);

function relics__plus(n) {
    relics__show(slideIndex += n);
}

function relics__current(n) {
    relics__show(slideIndex = n); 
}

function relics__show(n) {
    var i;
    var slides = document.getElementsByClassName("details__relics-lib-view-img");
    var dots = document.getElementsByClassName("details__relics-lib-item");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace("active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
}


// pagination 
function details__pagination() {
    var items = $(".details__relics-media .details__relics-media-item");
    var numItems = items.length;
    var perPage = 5;
    
    items.slice(perPage).hide();
    
    $('#relics__control').pagination({
        items: numItems,
        itemsOnPage: perPage,
        prevText: "<i class='fal fa-chevron-left'></i>",
        nextText: "<i class='fal fa-chevron-right'></i>",
        onPageClick: function (pageNumber) {
            var showFrom = perPage * (pageNumber - 1);
            var showTo = showFrom + perPage;
            items.hide().slice(showFrom, showTo).show();
            $('#relics__today').html(pageNumber);
        }
    });
    $('#relics__page').html( $('#relics__control').pagination('getPagesCount'));
    $('#relics__today').html( $('#relics__control').pagination('getCurrentPage'));
}
details__pagination();

// fast menu  
function fast(e) {
    var list = document.getElementsByClassName('details__fast-item-link');
    var id = e.id;
    var id__get = document.getElementById(id);
    var split = id.split('__');
    var desc = split[1] + "__"+ split[2];
    var target = $(this).attr("href");

    function reset(){
        for (var i = 0; i < list.length; i++) {
            list[i].classList.remove('active');               
        }
    }

    if (!id__get.classList.contains('active')) {
        reset();
        id__get.classList.add('active');
    } 
}
// fast menu 

// count time 
function holiday(e) {
    var id = e.id;
    var get = document.getElementById(id);
    var split = id.split('__');
    var num = split[2];
    var show = document.getElementById('relics__date');
    var key = '';
    var list = document.getElementsByClassName('details__relics-hot-item');

    //count
    if (num == 1) {
        key = '2022-01-18';
    } else if(num == 2) {
        key = '2022-01-19';
    } else if(num == 3) {
        key = '2022-01-20';
    }

    var obj = [
        {
            "Ngay" :  key
        },
        {
            "Ngay" :  key
        },
        {
            "Ngay" :  key
        },
    ];

    const get_day_of_time = (d1, d2) => {
        let ms1 = d1.getTime();
        let ms2 = d2.getTime();
        return Math.ceil((ms1 - ms2) / (24*60*60*1000));
    };
    var numlast = num - 1;
    let past = new Date(obj[numlast].Ngay);
    console.log('Ngày diễn ra lễ hội:', past);
    let today = new Date();
    
    let time = get_day_of_time(past,today)
    console.log('Lễ hội bắt đầu sau', time, 'ngày thôi!');

    show.innerHTML = time;
    //active
    function reset() {
        for (let index = 0; index < list.length; index++) {
            list[index].classList.remove('active');
        }
    }

    if(!get.classList.contains('active')) {
        reset();
        get.classList.add('active');
    } 
}
// count time 

//scroll
function hoverScroll() {
    function scroll(){
        $('.details__fast-item-link').each(function (){
            var scrollPos = $('#root__content').scrollTop();
            var ref = $($(this).attr("href"));
            var refPos = ref.position().top;
            var refHeight = ref.height();
            if(refPos <= scrollPos && refPos + refHeight > scrollPos){
                $('.details__fast-item-link').removeClass("active");
                $(this).addClass("active");
            };
        });
    };

    $(document).ready(function(){
        scroll();
        $('#root__content').on('scroll resize', scroll);
    });
}
hoverScroll();
//scroll

