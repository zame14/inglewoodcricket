jQuery(function($) {
    var $ = jQuery;
    $('.top').click(function(event){
        $('html, body').animate({
            scrollTop: 0
        }, 500);
        return false;
    });
    var waypoint = new Waypoint({
        element: document.getElementById('header'),
        handler: function() {
            $(".top").toggleClass('show');
        },
        offset: -500
    });
    $(".search").keyup(function () {
        var searchTerm = $(".search").val();
        var listItem = $('.results tbody').children('tr');
        var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

        $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
            return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
        }
        });

        $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
            $(this).attr('visible','false');
        });

        $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
            $(this).attr('visible','true');
        });

        var jobCount = $('.results tbody tr[visible="true"]').length;
        $('.counter').text(jobCount + ' item');

        if(jobCount == '0') {$('.no-result').show();}
        else {$('.no-result').hide();}
    });
    recordsSlick = $(".prem-stats").slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        arrows: true,
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
    gallerySlick = $(".gallery-wrapper").slick({
        dots:false,
        speed: 300,
        slidesToShow: 1,
        arrows: true,
        adaptiveHeight: true
    });
    if($('.player-inner-wrapper').length) {
        $('.player-inner-wrapper').click(function() {
            $(".loader",this).show();
            $('.player-inner-wrapper').removeClass('showMe');
            showStaffBio($(this).data('id'), $(this).data('colid'));
            $(this).addClass('showMe');
        });
    }
    partnersSlick = $(".sponsors").slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        arrows: true,
        nextArrow: '<i class="fa fa-angle-right"></i>',
        prevArrow: '<i class="fa fa-angle-left"></i>',
        responsive: [
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }
        ]
    });
    // load API data onto page
    if($("#single-batting-stats-wrapper").length) {
        $.ajax({
            url: "?ajax=get_career_batting_stats",
            success: function (response) {
                $(".career-batting-stats .stats-loader").hide();
                $(".career-batting-stats tbody").html(response);
            }
        });
        $.ajax({
            url: "?ajax=get_most_runs_in_season_stats",
            success: function (response) {
                $(".most-runs-in-season .stats-loader").hide();
                $(".most-runs-in-season tbody").html(response);
            }
        });
        $.ajax({
            url: "?ajax=get_top_batting_ave_stats",
            success: function (response) {
                $(".top-batting-average .stats-loader").hide();
                $(".top-batting-average tbody").html(response);
            }
        });
        $.ajax({
            url: "?ajax=get_most_sixes",
            success: function (response) {
                $(".most-sixes-in-career .stats-loader").hide();
                $(".most-sixes-in-career tbody").html(response);
            }
        });
        $.ajax({
            url: "?ajax=get_most_fours",
            success: function (response) {
                $(".most-fours-in-career .stats-loader").hide();
                $(".most-fours-in-career tbody").html(response);
            }
        });
        $.ajax({
            url: "?ajax=get_highest_score",
            success: function (response) {
                $(".highest-scores .stats-loader").hide();
                $(".highest-scores tbody").html(response);
            }
        });
        $.ajax({
            url: "?ajax=get_most_tons",
            success: function (response) {
                $(".most-tons .stats-loader").hide();
                $(".most-tons tbody").html(response);
            }
        });
        $.ajax({
            url: "?ajax=get_most_tons",
            success: function (response) {
                $(".most-tons .stats-loader").hide();
                $(".most-tons tbody").html(response);
            }
        });
        $.ajax({
            url: "?ajax=get_most_fifties",
            success: function (response) {
                $(".most-fifties .stats-loader").hide();
                $(".most-fifties tbody").html(response);
            }
        });
        $.ajax({
            url: "?ajax=get_highest_batting_partnership",
            success: function (response) {
                $(".top-batting-partnerships .stats-loader").hide();
                $(".top-batting-partnerships tbody").html(response);
            }
        });
        $.ajax({
            url: "?ajax=get_batting_partnership_records",
            success: function (response) {
                $(".record-partnerships .stats-loader").hide();
                $(".record-partnerships tbody").html(response);
            }
        });
    }
    if($("#single-bowling-stats-wrapper").length) {
        $.ajax({
            url: "?ajax=get_career_bowling_stats",
            success: function (response) {
                $(".career-bowling .stats-loader").hide();
                $(".career-bowling tbody").html(response);
            }
        });
        $.ajax({
            url: "?ajax=get_top_wickets_in_season",
            success: function (response) {
                $(".top-wickets-in-season .stats-loader").hide();
                $(".top-wickets-in-season tbody").html(response);
            }
        });
        $.ajax({
            url: "?ajax=get_top_bowling_ave",
            success: function (response) {
                $(".top-bowling-averages .stats-loader").hide();
                $(".top-bowling-averages tbody").html(response);
            }
        });
        $.ajax({
            url: "?ajax=get_top_bowling_sr",
            success: function (response) {
                $(".top-bowling-sr .stats-loader").hide();
                $(".top-bowling-sr tbody").html(response);
            }
        });
        $.ajax({
            url: "?ajax=get_top_bowling_rpo",
            success: function (response) {
                $(".top-bowling-rpo .stats-loader").hide();
                $(".top-bowling-rpo tbody").html(response);
            }
        });
        $.ajax({
            url: "?ajax=get_top_bowling_figures_match",
            success: function (response) {
                $(".top-bowling-figures-match .stats-loader").hide();
                $(".top-bowling-figures-match tbody").html(response);
            }
        });
        $.ajax({
            url: "?ajax=get_top_bowling_figures_innings",
            success: function (response) {
                $(".top-bowling-figures-innings .stats-loader").hide();
                $(".top-bowling-figures-innings tbody").html(response);
            }
        });
    }
    if($("#single-fielding-stats-wrapper").length) {
        $.ajax({
            url: "?ajax=get_career_fielding_stats",
            success: function (response) {
                $(".career-fielding-stats .stats-loader").hide();
                $(".career-fielding-stats tbody").html(response);
            }
        });
        $.ajax({
            url: "?ajax=get_most_dismissals_match",
            success: function (response) {
                $(".most-dismissals-match .stats-loader").hide();
                $(".most-dismissals-match tbody").html(response);
            }
        });
        $.ajax({
            url: "?ajax=get_most_catches_season",
            success: function (response) {
                $(".most-catches-in-season .stats-loader").hide();
                $(".most-catches-in-season tbody").html(response);
            }
        });
        $.ajax({
            url: "?ajax=get_most_stumpings",
            success: function (response) {
                $(".most-stumpings .stats-loader").hide();
                $(".most-stumpings tbody").html(response);
            }
        });
    }
    if($("#single-all-round-stats-wrapper").length) {
        $.ajax({
            url: "?ajax=get_runs_wickets",
            success: function (response) {
                $(".most-runs-wickets .stats-loader").hide();
                $(".most-runs-wickets tbody").html(response);
            }
        });
        $.ajax({
            url: "?ajax=get_runs_wickets_catches",
            success: function (response) {
                $(".most-runs-wickets-catches .stats-loader").hide();
                $(".most-runs-wickets-catches tbody").html(response);
            }
        });
        $.ajax({
            url: "?ajax=get_runs_dismissals",
            success: function (response) {
                $(".most-runs-dismissals .stats-loader").hide();
                $(".most-runs-dismissals tbody").html(response);
            }
        });
        $.ajax({
            url: "?ajax=get_runs_wickets_innings",
            success: function (response) {
                $(".most-runs-wickets-innings .stats-loader").hide();
                $(".most-runs-wickets-innings tbody").html(response);
            }
        });
    }
    if($("#single-stats-wrapper").length) {
        $.ajax({
            url: "?ajax=get_current_batting_stats",
            success: function (response) {
                $(".this-season-batting .stats-loader").hide();
                $(".this-season-batting tbody").html(response);
            }
        });
        $.ajax({
            url: "?ajax=get_current_bowling_stats",
            success: function (response) {
                $(".this-season-bowling .stats-loader").hide();
                $(".this-season-bowling tbody").html(response);
            }
        });
    }
    if($(".stats-home-wrapper").length) {
        $.ajax({
            url: "?ajax=get_stats_for_home_page",
            success: function (response) {
                $(".current-prem-stats .stats-loader").hide();
                $(".current-prem-stats").html(response);
            }
        });
        $.ajax({
            url: "?ajax=get_prem_records",
            success: function (response) {
                $(".prem-records .stats-loader").hide();
                $(".prem-records").html(response);
            }
        });
    }
});

var curStaffId = 0;
var curDisplayRow = 0;
function showStaffBio(id, colid) {
    var $ = jQuery;
    var staffid = id;
    var row = 1;
    var curRowTop = 0;
    var staffRow = 0;
    var lastRowStaff = null;
    // If current staff profile then reset everything.
    if (id == curStaffId) {
        closeStaffBio();
        return;
    }
    // Find out position of staff within the site responsively
    $(".player").each(function () {
        var top = $(this).offset().top;
        if (!curRowTop) curRowTop = top;
        // If greater than we just started a new row
        if (top > curRowTop) {
            row++;
            curRowTop = top;
        }
        // Check to see if this is the staff profile we're looking for
        if ($(this).attr("id") == "player-" + id) {
            staffRow = row;
        }
        // Record the last profile in the row so we know where to insert the section containing the content
        if (row == staffRow) {
            lastRowStaff = $(this);

        }
    });
    // Load bio from database
    $.ajax({
        url: "?ajax=show_player_bio&playerid=" + staffid + "&colid=" + colid,
        success: function (response) {
            $(".loader").hide();
            // Check if the section row needs to appear.
            if (staffRow != curDisplayRow) {
                // Slide out the current row if still there
                if (curDisplayRow) {
                    $(".player-bio-wrapper").css('height','0px').addClass("remove");
                    //setTimeout(function() {
                    $(".remove.player-bio-wrapper").remove();
                    // }, 1000);
                }
                // Add the new bio and slide it in
                var html = '<article class="player-bio-wrapper" style="width: 100%;clear:both;"><div class="player-bio-inner-wrapper">' + response + '</div></article>';

                $(lastRowStaff).after(html);
                //var newheight = $('.strategy-content.col2').height();
                var newheight = '100%';
                $(".player-bio-wrapper").not(".remove").css('height',newheight);
            } else {
                // Fade out existing bio and fade in the new one
                $(".player-bio-wrapper .bio-content").css('opacity','0');
                $(".player-bio-wrapper .bio-content").attr('id','');
                $(".player-bio-wrapper").html('<div class="bio-content" style="opacity:0">' + response + '</div>');
                $(".player-bio-wrapper .bio-content").css('opacity','1');

                var newheight = '100%';
                $(".player-bio-wrapper").css('height',newheight);
            }
            //var minus = parseInt($('.fixed').height());
            setTimeout(function() {
                $("html, body").animate({scrollTop: (0, $('.player-bio-wrapper').offset().top)}, 1000);
            },100);
            // Set currentStrategy to this id
            curDisplayRow = staffRow;
            curStaffId = staffid;
        }
    });
}

function closeStaffBio() {
    var $ = jQuery;
    $(".player-bio-wrapper").css('height','0px').addClass("remove");
    //setTimeout(function() {
    $(".remove.player-bio-wrapper").remove();
    //}, 1000);
    curStaffId = 0;
    curDisplayRow  = 0;
}