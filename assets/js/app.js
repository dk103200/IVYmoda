// Header ------------------------------------------------

const header = document.querySelector("header")

window.addEventListener("scroll", function() {
    x = window.pageYOffset
    if (x > 0) {
        header.classList.add("sticky")
    } else {
        header.classList.remove("sticky")

    }
})

// Slider ------------------------------------------------
if (document.querySelector(".aspect-ratio")) {
    const imgPositon = document.querySelectorAll(".aspect-ratio img")
    const imgContainer = document.querySelector(".aspect-ratio")
    const dots = document.querySelectorAll(".dot")
    var index = 0
    var len = imgPositon.length

    imgPositon.forEach(function(image, index) {
        image.style.left = index * 100 + "%"
        dots[index].addEventListener("click", function() {
            slider(index)
        })
    })

    function imgSlide() {
        index++
        if (index >= len) {
            index = 0
        }
        slider(index)
    }

    function slider(index) {
        imgContainer.style.left = "-" + index * 100 + "%"
        document.querySelector('.active').classList.remove("active")
        dots[index].classList.add("active")
    }
    setInterval(imgSlide, 4000)
}


// Info Product ------------------------------------------------
const preserved = document.querySelector(".title-preserved")
const detail = document.querySelector(".title-detail")

preserved.addEventListener("click", function() {
    preserved.classList.add("active")
    detail.classList.remove("active")
    document.querySelector(".info-detail").classList.remove("active")
    document.querySelector(".info-preserved").classList.add("active")
})
detail.addEventListener("click", function() {
    preserved.classList.remove("active")
    detail.classList.add("active")
    document.querySelector(".info-detail").classList.add("active")
    document.querySelector(".info-preserved ").classList.remove("active")
})

// Info Product show/hidden -------------------------------------------
const show = document.querySelector('.product-info-show')
const content = document.querySelector('.product-info-content')
show.addEventListener("click", function() {
    content.classList.toggle("hidden")
    if (content.classList.contains("hidden")) {
        show.querySelector("i").classList.replace('fa-chevron-down', 'fa-chevron-up')
    } else {

        show.querySelector("i").classList.replace('fa-chevron-up', 'fa-chevron-down')
    }
})

// change big img --------------------------------------------------------
const bigImg = document.querySelector('.big-img img')
const smallImgs = document.querySelectorAll('.small-imgs img')
smallImgs.forEach(function(img, X) {
    img.addEventListener("click", function() {
        bigImg.src = img.src
    })
})