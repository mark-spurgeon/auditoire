/* exposed to buttons */
function toggleMenu() {
  (function ($) {
    var categoriesElement = $("#site-header-categories");
    if (categoriesElement.hasClass('menu')) {
      categoriesElement.removeClass('menu');
    } else {
      categoriesElement.addClass('menu');
    }
  })(jQuery);
}

(function ($) {

function addBlacklistClass() {
  $( 'a' ).each( function() {
    if ( this.href.indexOf('/wp-admin/') !== -1 || this.href.indexOf('/wp-login.php') !== -1 ) {
      $( this ).addClass( 'no-smoothstate' );
    }
  });
}

function closeLogo() {
  var w = window.innerWidth;
  if (w > 600) { 
    $("#site-header-logo-text").addClass("closed");
  }
}

function setClosingLogoAnimation() {
  setTimeout(function() {
    closeLogo();
  }, 2000);
}

function updateCategoryLinkColor() {
  let link = $('#active-category-link');
  let bg_color = link.css("border-top-color");
  link.css({
    "background-color": bg_color,
    "border-top-color": bg_color,
    color: 'black',
  });
}

// ONLOAD
$(function() {
  
  addBlacklistClass();
  setClosingLogoAnimation();
  updateCategoryLinkColor();
    
  let main = $('#page');
    
  let options = {
    prefetch: true,
    cacheLength: 4,
    blacklist: '.wpcf7-form, .no-smoothstate',
    debug: true,
    forms: 'form',
    onStart: {
      duration: (window.innerWidth > 600) ? 0 : 300,
      render: (url, $container) => {
        closeLogo();
        $('#site-header-categories').removeClass('menu');
      },
    },
    onReady: {
      duration: 0,
      render: function ($container, $newContent) {
        $container.html($newContent);
        closeLogo()
      }
    },
    onAfter: function ($container, $newContent) {
      updateCategoryLinkColor();
      var $hash = $( window.location.hash);
      if ( $hash.length !== 0 ) {
        var offsetTop = $hash.offset().top;
        $( 'body, html' ).animate( {
          scrollTop: ( offsetTop - 200 ),
        }, { duration: 400});
      };
    },
  };
  smoothState = main.smoothState(options).data('smoothState');
});

}) (jQuery)