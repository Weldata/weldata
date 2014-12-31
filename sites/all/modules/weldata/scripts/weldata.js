(function ($) {
    Drupal.behaviors.weldata =  {
        attach: function(context, settings) {
//******************************Begin my code

  $('form#weld-cost-estimator-node-form div#edit-field-unit input[type=radio]',context).click(function(){
      if($(this).val() == 'metric'){
          $('form#weld-cost-estimator-node-form span.field-suffix',context).each(function(){
              $(this).replaceText('inch','mm');
              $(this).replaceText('lb','kg');
              $(this).replaceText('CFH','CMH');
          });
      }else if($(this).val() == 'imperial'){
          $('form#weld-cost-estimator-node-form span.field-suffix',context).each(function(){
              $(this).replaceText('mm','inch');
              $(this).replaceText('kg','lb');
              $(this).replaceText('CMH','CFH');
          });
      }
  });


//******************************I'm done with my code
        }
    };
})(jQuery);