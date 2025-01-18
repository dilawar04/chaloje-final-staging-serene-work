/*slider start*/
$(function () {
    $(".rslides").responsiveSlides();
});


$(".rslides").responsiveSlides({
    auto: true,             // Boolean: Animate automatically, true or false
    speed: 500,            // Integer: Speed of the transition, in milliseconds
    timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
    pager: false,           // Boolean: Show pager, true or false
    nav: false,             // Boolean: Show navigation, true or false
    random: false,          // Boolean: Randomize the order of the slides, true or false
    pause: false,           // Boolean: Pause on hover, true or false
    pauseControls: true,    // Boolean: Pause when hovering controls, true or false
    prevText: "Previous",   // String: Text for the "previous" button
    nextText: "Next",       // String: Text for the "next" button
    maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
    navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
    manualControls: "",     // Selector: Declare custom pager navigation
    namespace: "rslides",   // String: Change the default namespace used
    before: function () {
    },   // Function: Before callback
    after: function () {
    }     // Function: After callback
});
/*slider end*/

$(document).on('change', '[load-select]', function (e) {
    e.preventDefault();
    var _this = $(this);
    var next_select = $(_this.attr('load-select'));
    next_select.each(function (index, ele) {
        load_select(_this, $(ele));
    });
});

function load_select(ele, select_ele){

    var url = select_ele.attr('load-url');
    var selected_val = select_ele.val();
    var other_data = select_ele.find(select_ele.data('el')).serialize();
    select_ele.html('<option value="">Loading...</option>');

    $.get(url, {id : ele.val(), selected: selected_val, ...other_data})
    .done(function (data) {
        select_ele.html(data);
    })
    .fail(function () {
        //var notify = $.notify('Record not found!', {type: 'danger', newest_on_top: true, allow_dismiss: true,});
    });
}

let _search_values = {};
$(document).on('change', '.search-bar select', function () {
    if($(this).val() !== '') {
        _search_values = {..._search_values, [$(this).attr('name')]: $(this).val()}
    } else{
        delete _search_values[$(this).attr('name')];
    }
    //console.log(Object.values(_search_values).length, _search_values);
    $('.search-bar button').attr('disabled', !(Object.keys(_search_values).length === $(this).closest('.search-bar').find('select').length));

    console.log($(this).attr('name'));
    if($(this).attr('name') === 'block'){
        $('form.search-bar').attr('action', site_url + '/project/block/sector-' + $(this).val())
    }

    if(['type', 'category'].includes($(this).attr('name')))
    {
        let plot_el = $('[name="block"]');
        let url = plot_el.attr('load-url')

        console.log('block', _search_values);
        $.get(url, _search_values)
        .done(function (data) {
            plot_el.html(data);
        })
    }

    if($(this).attr('name') !== 'plot')
    {
        let plot_el = $('[name="plot"]');
        let url = plot_el.attr('load-url')

        $.get(url, _search_values)
        .done(function (data) {
            plot_el.html(data);
        })
    }
})

$('.select2, .m_select2').select2();

// tagging support
// $('.m_select2-tags').select2({
//     placeholder: "Add a tag",
//     tags: true
// });