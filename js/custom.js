(function($) {
"use strict";
/*********************************************************************************************************/
/* -------------------------------------- Back to top ------------------------------------------ */
/*********************************************************************************************************/
$(".logo").on("click", function() {
  $("html, body").animate({ scrollTop: 0 }, "easeInOutQuart");
});


/*********************************************************************************************************/
/* -------------------------------------- Menu sliding ------------------------------------------ */
/*********************************************************************************************************/
//Show menu
$("#btn-menu").on("click", function() {
	$(this).hide();
	$(".menu, .btn-menu-close").addClass("slide");
});

//Hide menu
$(".btn-menu-close").on("click", function() {
	$(this).removeClass("slide");
	$(".menu").removeClass("slide");
	$("#btn-menu").show();
});


/*********************************************************************************************************/
/* -------------------------------------- Discussion sliding ------------------------------------------ */
/*********************************************************************************************************/
$(".discussion-trigger").on("click", function() {
	$(this).find("i").toggleClass("fa-rotate-180");
	$(".discussion").slideToggle();
});


/*********************************************************************************************************/
/* -------------------------------------- Work - load more ------------------------------------------ */
/*********************************************************************************************************/
$(function(){
    $(".portfolio-content").slice(0, 6).show(); // select the first six
    $(".load-more-work .load-more").on("click", function(e) { // click event for load more
        e.preventDefault();
        $(".portfolio-content:hidden").slice(0, 6).show(); // select next six hidden divs and show them
		if($(".portfolio-content:hidden").length == 0){
           $(".load-more-work").fadeOut(800);
        }
    });
});


/*********************************************************************************************************/
/* -------------------------------------- Contact form ------------------------------------------ */
/*********************************************************************************************************/
(function(e) {
    function n(e, n) {
        this.$form = e;
        this.indexes = {};
        this.options = t;
        for (var r in n) {
            if (this.$form.find("#" + r).length && typeof n[r] == "function") {
                this.indexes[r] = n[r]
            } else {
                this.options[r] = n[r]
            }
        }
        this.init()
    }
    var t = {
        _error_class: "error",
        _onValidateFail: function() {}
    };
    n.prototype = {
        init: function() {
            var e = this;
            e.$form.on("submit", function(t) {
                e.process();
                if (e.hasErrors()) {
                    e.options._onValidateFail();
                    t.stopImmediatePropagation();
                    return false
                }
                return true
            })
        },
        notEmpty: function(e) {
            return e != "" ? true : false
        },
        isEmail: function(e) {
            return /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(e)
        },
        isUrl: function(e) {
            var t = new RegExp("(^(http[s]?:\\/\\/(www\\.)?|ftp:\\/\\/(www\\.)?|(www\\.)?))[\\w-]+(\\.[\\w-]+)+([\\w-.,@?^=%&:/~+#-]*[\\w@?^=%&;/~+#-])?", "gim");

            return t.test(e)
        },
        elClass: "",
        setClass: function(e) {
            this.elClass = e
        },
        process: function() {
            this._errors = {};
            for (var t in this.indexes) {
                this.$el = this.$form.find("#" + t);
                if (this.$el.length) {
                    var n = e.proxy(this.indexes[t], this, e.trim(this.$el.val()))();
                    if (this.elClass) {
                        this.elClass.toggleClass(this.options._error_class, !n);
                        this.elClass = ""
                    } else {
                        this.$el.toggleClass(this.options._error_class, !n)
                    }
                    if (!n) {
                        this._errors[t] = n
                    }
                }
                this.$el = null
            }
        },
        _errors: {},
        hasErrors: function() {
            return !e.isEmptyObject(this._errors)
        }
    };
    e.fn.isValid = function(t) {
        return this.each(function() {
            var r = e(this);
            if (!e.data(r, "is_valid")) {
                e.data(r, "is_valid", new n(r, t))
            }
        })
    }
})(jQuery)


/*********************************************************************************************************/
/* -------------------------------------- Ajax contact form ------------------------------------------ */
/*********************************************************************************************************/
$('#form').isValid({
    'name': function(data) {
        this.setClass(this.$el.parent());
        return this.notEmpty(data);
    },
    'email': function(data) {
        this.setClass(this.$el.parent());
        return this.isEmail(data);
    },
    'subject': function(data) {
        this.setClass(this.$el.parent());
        return this.notEmpty(data);
    },
    'message': function(data) {
        this.setClass(this.$el.parent());
        return this.notEmpty(data);
    }
}).submit(function(e) {
    e.preventDefault();

    var $this = $(this);
    $.ajax({
        'url': $(this).attr('action'),
        'type': 'POST',
        'dataType': 'html',
        'data': $(this).serialize()
    }).done(function(response) {
        $this.find('.notification').show();
        $this.find('input[type="text"], input[type="email"], textarea').val('');
    });
    return false;
});

$('.notification').on('click', function() {
    var $this = $(this);
    $this.hide();
});



$(document).ready(function() {

/*********************************************************************************************************/
/* -------------------------------------- Placeholder fix for IE  ------------------------------------------ */
/*********************************************************************************************************/
(function($) {       
	if (!Modernizr.csstransforms3d) {
		$('[placeholder]').focus(function() {
			var input = $(this);
			if (input.val() == input.attr('placeholder')) {
				input.val('');
				input.removeClass('placeholder');
			}
		}).blur(function() {
			var input = $(this);
			if (input.val() == '' || input.val() == input.attr('placeholder')) {
				input.addClass('placeholder');
				input.val(input.attr('placeholder'));
			}
		}).blur().parents('form').submit(function() {
			$(this).find('[placeholder]').each(function() {
				var input = $(this);
				if (input.val() == input.attr('placeholder')) {
					input.val('');
				}
			})
		});
	}
})

/*********************************************************************************************************/
/* -------------------------------------- Scroll to top and FadeOut  ------------------------------------------ */
/*********************************************************************************************************/
$(".fade-out, .logo a, .menu-list a, .prev-project, .next-project").on("click", function(event) {
	var newLocation = this.href;
	var container = $("html, body");
    event.preventDefault();
	
	if ((newLocation !== "" && $(this).attr('href').split('#')[0] === "") || (newLocation !== "" && $(this).attr('href').split('#')[0] !== "" && newLocation === window.location.hash) || ($(this).attr('href').split('#')[0] == window.location.href.split('#')[0])) {
		event.preventDefault();
	} 
	else
	{
		container.animate({
			scrollTop: 0
		}, '600', 'swing', function() {
			$("html").fadeOut(700, function() {
				window.location = newLocation;
			});
		});
	}
});
	 
	 
});


/*********************************************************************************************************/
/* -------------------------------------- Blog archive - load more ------------------------------------------ */
/*********************************************************************************************************/
$(function(){
    $(".blog-post-content").slice(0, 6).show(); // select the first six
    $(".load-more-work .load-more").on("click", function(e) { // click event for load more
        e.preventDefault();
        $(".blog-post-content:hidden").slice(0, 6).show(); // select next six hidden divs and show them
		if($(".blog-post-content:hidden").length == 0){
		   $(".load-more-work").fadeOut(800);
        }
    });
});


/*********************************************************************************************************/
/* -------------------------------------- Loader and Menu Scroll ------------------------------------------ */
/*********************************************************************************************************/
$(window).load(function() {
	//Loader
	$("#loader-container").delay(500).fadeOut(800);	
	
	// Menu scroll
	(function($){			
		$(".menu").mCustomScrollbar({
			scrollEasing:"linear"
		});		
	})(jQuery);
			
});


/*********************************************************************************************************/
/* -------------------------------------- Youtube video controls ------------------------------------------ */
/*********************************************************************************************************/
$('.player-controls a').on('click', function() {
	if($(this).hasClass('play-video')) {
		$('.player').playYTP();
		$(this).removeClass('play-video');
		$(this).addClass("pause-video");
		$(this).hide();
		$(this).find('i').removeClass('fa fa-play').addClass('fa fa-pause');
	} else if($(this).hasClass('pause-video')) {
		$('.player').pauseYTP();
		$(this).removeClass('pause-video');
		$(this).addClass("play-video");
		$(this).find('i').removeClass('fa fa-pause').addClass('fa fa-play');
	}
});


$('.video-overlay, .player-controls').on({
    mouseenter: function () {
       $(".player-controls a").show();	
    },
    mouseleave: function () {
		if($(".player-controls a").hasClass('pause-video')) {
		   $(".player-controls a").hide();
		}
    }
});


/*********************************************************************************************************/
/* -------------------------------------- Show and hide color-switcher  ------------------------------------------ */
/*********************************************************************************************************/ 
$(".color-switcher .switcher-button").on("click", function() {
	$( ".color-switcher" ).toggleClass("show-color-switcher", "hide-color-switcher", 800);
});	


/*********************************************************************************************************/
/* -------------------------------------- Color Skins  ------------------------------------------ */
/*********************************************************************************************************/
$('a.color').on("click", function() {
	var title = $(this).attr('title');
	$('#style-colors').attr('href', 'css/color-schemes/' + title + '.css');
	return false;
});

})(jQuery);

$('ul.translation-links li a').click(function(){    
	$(this).parent().addClass('active').siblings().removeClass('active');
	$('body').removeClass('modal-open');
	$('div#language-modal').removeClass('in');
	$('div#language-modal').hide();
});