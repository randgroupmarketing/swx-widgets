/*

  Pardot AJAX code

*/


function loadPardotForm(divId, url){

  var $ = jQuery;
  var divObj = $('#'+divId+' .pardot-scaffold');
  var emailHere = "ganalytics@randgroup.com";

  console.log([divId, url]);

      $.ajax({
        url: url,
        cache: false
      })
      .done(function( html ) {

          //divObj.append(html);
          divObj.html(html);

          setTimeout(function(){
            $('.pardot-form-loader').hide();
            $('.pardot-scaffold').removeClass('pardot-scaffold-hide');
          },1000);

          console.log('loaded pardot');

      })
      .fail(function( jqXHR, textStatus, errorThrown ){

          divObj.html("<p>Error loading form. Please reload page. </p>  <p> If error persists, contact administrator "+emailHere+"</p>");
      });


}





