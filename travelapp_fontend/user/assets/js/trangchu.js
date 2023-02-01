
const $$ = document.querySelector.bind(document);
const $$$$ = document.querySelectorAll.bind(document);

const tabs = $$$$('.tab-item');
const tabActive = $$('.tab-item.active')
const line = $$('.tabs .line');
line.style.width = tabActive.offsetWidth + 'px';
line.style.left = tabActive.offsetLeft + 'px';

tabs.forEach((tab, i) => {
    tab.onclick = function () {
        $$('.tab-item.active').classList.remove('active')

        line.style.width = this.offsetWidth + 'px';
        line.style.left = this.offsetLeft + 'px';
        this.classList.add('active');
    }
    window.onresize = () => {
        line.style.width = $$('.tab-item.active').offsetWidth + 'px';
        line.style.left = $$('.tab-item.active').offsetLeft + 'px';
    }
})
const dropdownnenu = $$('.dropdown_list');
dropdownnenu.onclick = ()=>{
    $$(".fa-list-ul").classList.toggle('fa-times');
    $$(".tabs").classList.toggle('active');
}
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    autoplay: {
        delay: 3500,
        disableOnInteraction: false,
      },
      
});
var swiper = new Swiper(".review-slider", {
    spaceBetween: 20,
    centeredSlides: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    loop:true,
    breakpoints: {
      0: {
          slidesPerView: 1,
      },
      640: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
    },
  });
