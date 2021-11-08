/*!
* Start Bootstrap - Business Casual v7.0.5 (https://startbootstrap.com/theme/business-casual)
* Copyright 2013-2021 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-business-casual/blob/master/LICENSE)
*/
// Highlights current date on contact page
window.addEventListener('DOMContentLoaded', event => {
    const listHoursArray = document.body.querySelectorAll('.list-hours li');
    listHoursArray[new Date().getDay()].classList.add(('today'));
})

$(function() {
    var validBtn = $("a[href='finish']")
    validBtn.attr("data-bs-toggle", "modal");
    validBtn.attr("data-bs-target", "#exampleModal");

    validBtn.on("click", function() {
        var body =$(".modal-body");
        body.html('cdcdscdscdscds${ $("#date").val() }');
    })
});

/* Show scroll up */
// function scrollUp(){
//     const scrollUp = document.getElementById('scroll-up');
//     // When the scroll is higher than 560 viewport height, add the show-scroll class to the a tag with the btnScrollToTop class
//     if(this.scrollY >= 560) scrollUp.classList.add('show-scroll'); 
//     else scrollUp.classList.remove('show-scroll')
// }
// window.addEventListener('scroll', scrollUp)