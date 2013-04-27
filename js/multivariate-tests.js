var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-3186564-1']);

ABalytics.init({
        click_to_continue_vs_continue_reading_vs_click_to_continue_reading: [
          
          {
            name: 'click_to_continue',
            "more-link": "Click to continue <span class=\"meta-nav\">&rarr;</span>"
          },
          {
            name: 'continue_reading',
            "more-link": "Continue reading <span class=\"meta-nav\">&rarr;</span>"
          },
          {
            name: 'click_to_continue_reading',
            "more-link": "Click to continue reading <span class=\"meta-nav\">&rarr;</span>"
          }
        ]
        
        /*
         * experiment2_name: [
          {
            name: 'variant1_name',
            "experiment1_class1_name": "<strong>Html content for variant 1 class 1</strong>",
            "experiment1_class2_name": "Html content for variant 1 class 2"
          },
          {
            name: 'variant2_name',
            "experiment1_class1_name": "<strong>Html content for variant 2 class 1</strong>",
            "experiment1_class2_name": "Html content for variant 2 class 2"
          }
        ],
         
        */
        
      }, _gaq);

_gaq.push(['_trackPageview']);

window.onload = function() {
    ABalytics.applyHtml();
};