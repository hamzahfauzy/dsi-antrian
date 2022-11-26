var slideJs = {
    images: [],
    steady:false,
    steadyTimeout:30000,
    _steadyTimeout:false,
    slideIndex: 0,
    timeout: 5000,
    _timeout: false,
    init : async e => {
        var request = await fetch('api/get-slide-images')
        if(request.ok)
        {
            var response = await request.json()
            slideJs.images = response.data
            slideJs.doSlide()
        }
    },
    doSlide : e => {
        var htmlBody = document.body
        htmlBody.style.backgroundImage = 'url('+slideJs.images[slideJs.slideIndex].file+')'

        if(slideJs.images.length-1 == slideJs.slideIndex)
        {
            slideJs.slideIndex = 0
        }
        else
        {
            slideJs.slideIndex++
        }

        slideJs.runTimeout()
    },
    runTimeout : e => {
        if(slideJs._timeout)
        {
            clearTimeout(slideJs._timeout)
        }
        slideJs._timeout = setTimeout(slideJs.doSlide, slideJs.timeout)
    },
    ready: e => {
        if(!slideJs.steady)
        {
            document.body.classList.toggle('ready')
            // load_page('api/page/homepage')
            slideJs.steady = true
        }

        if(slideJs._steadyTimeout)
        {
            clearTimeout(slideJs._steadyTimeout)
        }
        slideJs._steadyTimeout = setTimeout(ev => {
            document.body.classList.toggle('ready')
            // load_page('api/page/wellcome')
            slideJs.steady = false
        }, slideJs.steadyTimeout)
    }
}

slideJs.init()

document.addEventListener('mousemove', slideJs.ready)
document.addEventListener('keypress', slideJs.ready)

async function load_page(url)
{
    document.querySelector('.landing-content').innerHTML = '<div class="centered"><center>Loading...</center></div>'
    var request = await fetch(url)
    if(request.ok)
    {
        var response = await request.text()
        document.querySelector('.landing-content').innerHTML = response

        setTimeout(e => {
            $("#nop").inputmask({"mask": "99.99.999.999.999-9999.9"});
        },500)
    }

    initNavPageHandle()
}

function initNavPageHandle()
{
    document.querySelectorAll('.btn-nav-page').forEach(btn => {
        btn.addEventListener('click', e => {
            var page = btn.dataset.page
            load_page(page)
        })
    })
}

load_page('api/page/homepage')

async function cekPbb(form)
{
    document.querySelector('.result').innerHTML = "Loading..."
    var url = "api/page/cek-pbb-result?nop="
    var nop = form.querySelector('#nop').value
    var request = await fetch(url + nop)
    if(request.ok)
    {
        var response = await request.text()
        document.querySelector('.result').innerHTML = response
    }
}

async function cekPbbWithYear(nop, year)
{
    document.querySelector('.result').innerHTML = "Loading..."
    var url = "api/page/cek-pbb-result?nop="+nop+'&year=' + year
    var request = await fetch(url)
    if(request.ok)
    {
        var response = await request.text()
        document.querySelector('.result').innerHTML = response
    }
}

async function ambilAntrian(service_id)
{
    // alert(service_id)
    var request = await fetch('api/get-antrian',{
        method:'POST',
        body:'service_id='+service_id,
        headers:{
            'content-type':'application/x-www-form-urlencoded'
        }
    })

    if(request.ok)
    {
        var response = await request.json()
        if(response.status == 'success')
        {
            // alert('Antrian berhasil di ambil')
        }
    }
}