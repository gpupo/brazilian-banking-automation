// var sectionHeight = function() {
//   var total    = $(window).height(),
//       $section = $('main').css('height','auto');

//   if ($section.outerHeight(true) < total) {
//     var margin = $section.outerHeight(true) - $section.height();
//     $section.height(total - margin - 20);
//   } else {
//     $section.css('height','auto');
//   }
// }

// $(window).resize(sectionHeight);

$(document).ready(function(){
  $("ul.c-nav-page").find('li').remove();
  $("main h1, main h2").each(function(){
    $("ul.c-nav-page").append("<li class='tag-" + this.nodeName.toLowerCase() + "'><a href='#" + $(this).text().toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g,'') + "'>" + $(this).text() + "</a></li>");
    $(this).attr("id",$(this).text().toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g,''));
    $("ul.c-nav-page li:first-child a").parent().addClass("active");
  });
  
  $("nav ul li").on("click", "a", function(event) {
    var position = $($(this).attr("href")).offset().top - 190;
    $("html, body").animate({scrollTop: position}, 400);
    $("ul.c-nav-page li a").parent().removeClass("active");
    $(this).parent().addClass("active");
    if($(window).width() < 992) {
      console.log($(window).width());
      toggleMenu();
    }
    
    event.preventDefault();    
  });
  
});

fixScale = function(doc) {

  var addEvent = 'addEventListener',
      type = 'gesturestart',
      qsa = 'querySelectorAll',
      scales = [1, 1],
      meta = qsa in doc ? doc[qsa]('meta[name=viewport]') : [];

  function fix() {
    meta.content = 'width=device-width,minimum-scale=' + scales[0] + ',maximum-scale=' + scales[1];
    doc.removeEventListener(type, fix, true);
  }

  if ((meta = meta[meta.length - 1]) && addEvent in doc) {
    fix();
    scales = [.25, 1.6];
    doc[addEvent](type, fix, true);
  }
};

// TOGGLE MENU
$('.btn-toggle-menu').click(function(){
  toggleMenu();
});
function toggleMenu() {
  $('.btn-toggle-menu').toggleClass('actived');
  $('.sidebar').toggleClass('show').scrollTop(0);
  $('.visible-lg, .visible-md').each(function(){
    $(this).toggleClass('visible-lg');
    $(this).toggleClass('visible-md');
  });
}