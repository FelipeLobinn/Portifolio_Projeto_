const INCLUDE_PATH = "http://localhost:8082/Projeto_Testes/";
// ATIVA E DESATIVA O MENU MOBILE
$(function () {
  $("nav.mobile").click(function () {
    var listaMenu = $("nav.mobile ul");

    listaMenu.slideToggle();
  });
});

//  CARREGAR 'CONTATO' SEM REFRESH
$(function () {
  $("[realtime]").click(function () {
    var pagina = $("[realtime]").attr("realtime");

    $(".conteudo-container").hide();
    $(".conteudo-container").html();

    if (pagina == "contato") {
      setTimeout(function () {
        initialize();
        addMarker(
          -29.071268059050087,
          -53.847078680992134,
          1,
          "Minha casa",
          undefined,
          true
        );
      }, 300);
    }

    $(".conteudo-container").load(INCLUDE_PATH + "pages/" + pagina + ".php");
    $(".conteudo-container").fadeIn(1500);
    return false;
  });
});

// FAZ O SCROLL DA PAGINA
if ($("target").length > 0) {
  var elemento = "#" + $("target").attr("target");

  var divScroll = $(elemento).offset().top;
  $("html, body").animate({ scrollTop: divScroll });
}

// FAZ O SLIDE DO BANNER
$(function () {
  var curSlide = 0;

  var maxSlide = $(".banner-image").length - 1;

  var delay = 5;

  function initSlider() {
    $(".banner-image").hide();
    $(".banner-image").eq(curSlide).show();

    for (var i = 0; i < maxSlide + 1; i++) {
      var content = $(".bullets").html();

      if (i == 0) content += "<span class='active-bullet'></span>";
      else content += "<span></span>";

      $(".bullets").html(content);
    }
  }

  // SLIDER AUTOMÁTICO INICIAL
  function changeSlider() {
    sliderInit = setInterval(function () {
      $(".banner-image").eq(curSlide).stop().fadeOut(2000);
      $(".bullets span").removeClass();
      curSlide++;
      if (curSlide > maxSlide) curSlide = 0;
      $(".banner-image").eq(curSlide).stop().fadeIn(2000);
      $(".bullets span").eq(curSlide).addClass("active-bullet");
    }, delay * 1000);
  }

  // SLIDER MANUAL
  $("body").on("click", ".bullets span", function () {
    clearInterval(sliderInit);

    var curBullet = $(this);

    $(".banner-image").eq(curSlide).stop().fadeOut(1300);
    curSlide = curBullet.index();
    $(".banner-image").eq(curSlide).stop().fadeIn(1300);

    $(".bullets span").removeClass();
    curBullet.addClass("active-bullet");

    changeSlider();
  });
});
