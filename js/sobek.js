google.load('search', '1');

var keyFunction = function(ed) {
     console.log(ed);
     ed.onKeyUp.remove(keyFunction);
     setTimeout(googleSearch,3000);     
};
tinyMCE.init({
     mode : 'textareas',                                    
     width: '100%',
     height: '400',
     relative_urls : false,
     setup : function(ed) {
          // Display an alert onclick
          ed.on('change',googleSearch);
     }
});


function googleSearch(){	
     var ed = tinyMCE.get('ClassPlan_objectives');
     var text = '';
     text += $(ed.getContent()).text();
     ed = tinyMCE.get('ClassPlan_resources');
     text += $(ed.getContent()).text();
     ed = tinyMCE.get('ClassPlan_evaluation');
     text += $(ed.getContent()).text();
     ed = tinyMCE.get('ClassPlan_contents');
     text += $(ed.getContent()).text();

     $.post('/planos/sobek.php', {texto: text}, sobekCallBack );
}

        
function sobekCallBack(data) {

     $('#ClassPlan_sobek_keywords').val(data);
     // Create a search control
     var searchControl = new google.search.SearchControl();

     // Add in a full set of searchers     
          
     searchControl.addSearcher(new google.search.WebSearch());
     searchControl.addSearcher(new google.search.ImageSearch());

     // tell the searcher to draw itself and tell it where to attach
     searchControl.draw(document.getElementById("searchcontrol"));

     searchControl.setSearchCompleteCallback(this, function(){
     	console.log('google callback');
     	$('#searchcontrol').show('slow');
     	
     });

     // execute an inital search
     if(data != '')
		searchControl.execute(data);
	else
	    searchControl.execute($('#ClassPlan_objectives').val());

} 