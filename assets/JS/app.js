
jQuery(document).ready(function ($) {


// turinio mygtukai, kad scrollintu page
            $(".banner-button button").click(function (){
                $('html, body').animate({
                    scrollTop: $("div.web-container").offset().top
                }, 2000);
            });


            $(".service-button button").click(function (){
                $('html, body').animate({
                    scrollTop: $("div.contact-container").offset().top
                }, 2000);
            });


            $(".phone-button button").click(function (){
                $('html, body').animate({
                    scrollTop: $("div.contact-container").offset().top
                }, 2000);
            });

// navigacijos mygtukai

            $("a[href='#home']").click(function (){
                $('html, body').animate({
                    scrollTop: $(".header").offset().top
                }, 2000);
            });

            $("a[href='#services']").click(function (){
                $('html, body').animate({
                    scrollTop: $(".services-container").offset().top
                }, 2000);
            });

            $("a[href='#portfolio']").click(function (){
                $('html, body').animate({
                    scrollTop: $(".portfolio-section").offset().top
                }, 2000);
            });

            $("a[href='#about']").click(function (){
                $('html, body').animate({
                    scrollTop: $(".about-section").offset().top
                }, 2000);
            });

            $("a[href='#contact']").click(function (){
                $('html, body').animate({
                    scrollTop: $(".contact-container").offset().top
                }, 2000);
            });

// turinio mygtukai

            $(".icon-circle-down").click(function (){
                $('html, body').animate({
                    scrollTop: $(".contact-section").offset().top
                }, 2000);
            });

            $(".subscribe-container button").click(function (){
                $('html, body').animate({
                    scrollTop: $(".contact-container").offset().top
                }, 2000);
            });
            $(function($) {
                $('.links a').click(function() {
                   $("#myTopnav").removeClass("topnav");
                });
            });
});

// sutvarkytas portfolio
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}


// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}

// navigacija
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

// sutvarkytas portfolio
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}


// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}


// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
