'use strict';

$(document).ready(() => {
    // 65x83
    var images = $('.fit-height');
    $.each(images, (i, v) => {
        var width = $(v).width(),
            height = (width * 83) / 65;
        // console.log(height);
        $(v).height(height)
    })

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    $('.add-to-chart').click(function (e) {
        let biblioId = $(this).attr('data-biblio')
        $.ajax({
            method: 'GET',
            url: 'index.php?p=member',
            data: {biblio: [biblioId], callback: 'json'}
        })
            .done(function (data) {
                console.log(data)
                if (data.status) {
                    toastr.success(data.message)
                } else {
                    toastr.error(data.message)
                }
                $('#count-basket').text(data.count)
            })
            .fail(function (data) {
                console.error('ERROR!', data)
                toastr.error(data.responseJSON.message, '', {
                    timeOut: 2000,
                    onHidden: function () {
                        window.location.replace('index.php?p=member')
                    }
                })
            })
    })

    $('.collapse-detail')
        .on('shown.bs.collapse', e => {
            let id = e.target.getAttribute('id')
            $(`#btn-${id} i`).removeClass('fa-angle-double-down').addClass('fa-angle-double-up')
        })
        .on('hidden.bs.collapse', e => {
            let id = e.target.getAttribute('id')
            $(`#btn-${id} i`).removeClass('fa-angle-double-up').addClass('fa-angle-double-down')
        })
});

// remove &nbsp in pagging
$('.biblioPaging .pagingList').html(function (i, h) {
    return h.replace(/&nbsp;/g, '');
});

// Hide Navbar When Scroll Down, Appear When Scroll Up
let prevScrollPos = window.pageYOffset;
window.onscroll = () => {
    let currentScrollPos = window.pageYOffset;
    const navElement = document.querySelector('.navbar')
    if (prevScrollPos > currentScrollPos) {
        navElement.style.top = "0";
        navElement.style.position = "fixed";
    } else {
        navElement.style.top = "-60px";
    }
    prevScrollPos = currentScrollPos;
}

// Get Color From Image
const colorThief = new ColorThief();
const bgImage = document.querySelector('.bg-image');
const image = document.querySelector('.shadow > img');
// Get hex value
const rgbToHex = (r, g, b) => '#' + [r, g, b].map(x => {
    const hex = x.toString(16)
    return hex.length === 1 ? '0' + hex : hex
}).join('')  
// Assign color to component
setTimeout(() => {
    let getColor = colorThief.getColor(image);
    bgImage.style.backgroundColor = rgbToHex(getColor[0], getColor[1], getColor[2]);
}, 0)

// Dark Theme
const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
function switchTheme(e) {
    if (e.target.checked) {
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark'); //add this
    }
    else {
        document.documentElement.setAttribute('data-theme', 'light');
    }    
}
toggleSwitch.addEventListener('change', switchTheme, false);

const currentTheme = localStorage.getItem('theme') ? localStorage.getItem('theme') : null;
if (currentTheme) {
    document.documentElement.setAttribute('data-theme', currentTheme);

    if (currentTheme === 'dark') {
        toggleSwitch.checked = true;
    }
}