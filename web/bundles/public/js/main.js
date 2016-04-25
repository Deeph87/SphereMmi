$('.close').click(function(){
  $('.responsive-menu').css({'display':'none', 'background-color':'rgba(0, 0, 0, 0)'});
  $('.responsive-navbar').css({'right':'-300px'});
});
  $('.open').click(function(){
    $('.responsive-menu').css({'display':'block', 'background-color':'rgba(0, 0, 0, 0.5)'});
    $('.responsive-navbar').css({'right':'0'});
  });
$(document).mouseup(function (e){
  var container = $(".responsive-navbar");
  if (!container.is(e.target) // if the target of the click isn't the container...
  && container.has(e.target).length === 0) // ... nor a descendant of the container
  {
    $(".responsive-menu").css({'display':'none'});
  }
});

var ocw = $('.object-content').width();
var ratio = ocw/4;
$('.bloc').css({'height':ratio+'px'});
$('.bloc').css({'margin-bottom':ocw*1.7/100+'px'});
$(window).on('resize', function() {
  ocw = $('.object-content').width();
  var ratio = ocw/4;
  $('.bloc').css({'height':ratio+'px'});
  $('.bloc').css({'margin-bottom':ocw*1.7/100+'px'});
});

  $(window).scroll(function(){
    if ($(this).scrollTop() > $('.main-header').height() - 60) {
      $('.main-navbar').addClass('navbar-fixed');
    }
    else {
      $('.main-navbar').removeClass('navbar-fixed');
    }
  });$(document).ready(function () {
    // Load the first 3 list items from another HTML file
    //$('#myList').load('externalList.html li:lt(3)');
    var items =  $('.bloc').size();
    var shown =  8;
    $('.bloc').hide();
    $('.bloc:lt('+ shown +')').show();
    // $('#showLess').hide();
    $('#loadMore').click(function () {
      // $('#showLess').show();
      shown = $('.bloc:visible').size()+8;
      if(shown < items) {$('.bloc:lt('+shown+')').show();}
      else {$('.bloc:lt('+items+')').show();
        $('#loadMore').hide();
        }
      });
      // $('#showLess').click(function () {
      //   $('.bloc').not(':lt(3)').hide();
      // });
    });
