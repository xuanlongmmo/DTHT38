// scroll 
var win = document.getElementById('root__content');
win.onscroll = function() {scrollFunction()};

function scrollFunction() {
  var id = document.getElementById('root__header');
  var box = document.getElementById('root__header-block');
  var block = document.getElementById('root__content-block');
  var nav = document.getElementById('root__nav');
  var t = window.matchMedia("(max-width: 63.938em)");
  var m = window.matchMedia("max-width: 46.188em)");
  var bar = document.getElementById('root__sildebar');
  var navmb = document.getElementById('root__navmobi');

  if (win.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    id.style.height = '50px';
    nav.style.display = 'none';
    block.style.marginTop = '50px';
    bar.style.marginTop = '50px';
    navmb.style.top = '50px';
    box.style.height = '50px';
  } else {
    id.style.height = '80px';
    nav.style.display = 'flex';
    block.style.marginTop = '110px';
    bar.style.marginTop = '110px';
    // box.style.height = '110px';
    if(t.matches) {
      bar.style.marginTop = '80px';
      block.style.marginTop = '80px';
      box.style.height = '80px';
    }
    if(m.matches) {
      block.style.marginTop = '80px';
      box.style.height = '80px';
    }
    navmb.style.top = '80px';
  }
}
// scroll 

// select 
var x, i, j, l, ll, selElmnt, a, b, c;
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
    e.stopPropagation();
    closeAllSelect(this);
    this.nextSibling.classList.toggle("select-hide");
    this.classList.toggle("select-arrow-active");
  });
}

function closeAllSelect(elmnt) {
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
document.addEventListener("click", closeAllSelect);
// select 

// pagination 
function home__pagination() {
  var items = $(".home__relics .home__relics-item");
  var numItems = items.length;
  var perPage = 5;
  
  items.slice(perPage).hide();
  
  $('#home__pagination').pagination({
      items: numItems,
      itemsOnPage: perPage,
      prevText: "<i class='fal fa-chevron-left'></i>",
      nextText: "<i class='fal fa-chevron-right'></i>",
      onPageClick: function (pageNumber) {
          var showFrom = perPage * (pageNumber - 1);
          var showTo = showFrom + perPage;
          items.hide().slice(showFrom, showTo).show();
      }
  });
}
home__pagination();


// pagination artifacts 
function pagination__art() {
  var items = $(".pagelist__list .pagelist__item-block");
  var numItems = items.length;
  var perPage = 12;
  
  items.slice(perPage).hide();
  
  $('#pagelist__pagination_1').pagination({
      items: numItems,
      itemsOnPage: perPage,
      prevText: "<i class='fal fa-chevron-left'></i>",
      nextText: "<i class='fal fa-chevron-right'></i>",
      onPageClick: function (pageNumber) {
          var showFrom = perPage * (pageNumber - 1);
          var showTo = showFrom + perPage;
          items.hide().slice(showFrom, showTo).show();
      }
  });
}
pagination__art();

function pagination__ftv() {
  var items = $(".pagelist__list .pagelist__item-block");
  var numItems = items.length;
  var perPage = 12;
  
  items.slice(perPage).hide();
  
  $('#pagelist__pagination_2').pagination({
      items: numItems,
      itemsOnPage: perPage,
      prevText: "<i class='fal fa-chevron-left'></i>",
      nextText: "<i class='fal fa-chevron-right'></i>",
      onPageClick: function (pageNumber) {
          var showFrom = perPage * (pageNumber - 1);
          var showTo = showFrom + perPage;
          items.hide().slice(showFrom, showTo).show();
      }
  });
}
pagination__ftv();

function pagination__crt() {
  var items = $(".pagelist__list .pagelist__item-block");
  var numItems = items.length;
  var perPage = 12;
  
  items.slice(perPage).hide();
  
  $('#pagelist__pagination_3').pagination({
      items: numItems,
      itemsOnPage: perPage,
      prevText: "<i class='fal fa-chevron-left'></i>",
      nextText: "<i class='fal fa-chevron-right'></i>",
      onPageClick: function (pageNumber) {
          var showFrom = perPage * (pageNumber - 1);
          var showTo = showFrom + perPage;
          items.hide().slice(showFrom, showTo).show();
      }
  });
}
pagination__crt();


function pagination__place() {
  var items = $(".pagelist__list .pagelist__item-block");
  var numItems = items.length;
  var perPage = 12;
  
  items.slice(perPage).hide();
  
  $('#place__pagination').pagination({
      items: numItems,
      itemsOnPage: perPage,
      prevText: "<i class='fal fa-chevron-left'></i>",
      nextText: "<i class='fal fa-chevron-right'></i>",
      onPageClick: function (pageNumber) {
          var showFrom = perPage * (pageNumber - 1);
          var showTo = showFrom + perPage;
          items.hide().slice(showFrom, showTo).show();
      }
  });
}
pagination__place();


function pagination__library() {
  var items = $(".library__list .library__item-block");
  var numItems = items.length;
  var perPage = 12;
  
  items.slice(perPage).hide();
  
  $('#library__pagination').pagination({
      items: numItems,
      itemsOnPage: perPage,
      prevText: "<i class='fal fa-chevron-left'></i>",
      nextText: "<i class='fal fa-chevron-right'></i>",
      onPageClick: function (pageNumber) {
          var showFrom = perPage * (pageNumber - 1);
          var showTo = showFrom + perPage;
          items.hide().slice(showFrom, showTo).show();
      }
  });
}
pagination__library();

function pagination__file() {
  var items = $(".file__list .file__item-block");
  var numItems = items.length;
  var perPage = 12;
  
  items.slice(perPage).hide();
  
  $('#file__pagination').pagination({
      items: numItems,
      itemsOnPage: perPage,
      prevText: "<i class='fal fa-chevron-left'></i>",
      nextText: "<i class='fal fa-chevron-right'></i>",
      onPageClick: function (pageNumber) {
          var showFrom = perPage * (pageNumber - 1);
          var showTo = showFrom + perPage;
          items.hide().slice(showFrom, showTo).show();
      }
  });
}
pagination__file();
// pagination artifacts 


// media artifacts pagelist 
var slideIndex = 1;
    artifacts__show(slideIndex);

function artifacts__plus(n) {
    artifacts__show(slideIndex += n);
}

function artifacts__current(n) {
    artifacts__show(slideIndex = n); 
}

function artifacts__show(n) {
    var i;
    var slides = document.getElementsByClassName("artpagelist__media-show-img");
    var dots = document.getElementsByClassName("artpagelist__media-nav-item");
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
// media artifacts pagelist 

