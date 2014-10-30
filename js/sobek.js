
google.load('search', '1');

tinyMCE.init({
     selector: "textarea.tinytext", 
     //mode : 'textareas',                                 
     width: '100%',
     height: '400',
     //relative_urls : false,
         plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
     setup : function(ed) {
          // Display an alert onclick
          ed.on('change',googleSearch);
     }
});


function googleSearch(e){	

     var text = '';
     var ed = tinyMCE.get('ClassPlan_objectives');

     text += $(ed.getContent()).text();

     ed = tinyMCE.get('ClassPlan_resources');
     text += $(ed.getContent()).text();

     ed = tinyMCE.get('ClassPlan_evaluation');
     text += $(ed.getContent()).text();

     ed = tinyMCE.get('ClassPlan_contents');
     text += $(ed.getContent()).text();

     console.log(text);

     $.post('/class_plans/sobek.php', {texto: text}, function(data){
          
          console.log("SEARCHING DATA: " + data);
          var params = {
               cx: '000801171867195628794:8oqdsykmvia',
               key: 'AIzaSyBEMQ6GHFqElquZKNkNkNVVAPBBX8GpOeo',
               q: data,
               //searchType: 'image'
          }

          $.getJSON('https://www.googleapis.com/customsearch/v1?', params, function(data){
               $('#searchcontrol').html('');

               for(var i in data.items){
                    
                     $('#searchcontrol').append(
               [    
                    "<div class='panel panel-info'>",
                    "<div class=\"panel-heading\">",
                    "<h3 class=\"panel-title\">",
                    "<a href='" + data.items[i].link + "' target='_blank'",
                    data.items[i].htmlTitle,
                    "</a>",
                    "</h3></div>",
                    "<div class=\"panel-body\">",
                    !data.items[i].pagemap ? data.items[i].htmlSnippet : [
                         "<a href=''><img ", 
                         " src='" + data.items[i].pagemap.cse_thumbnail[0].src + "' ",
                         " width='" + data.items[i].pagemap.cse_thumbnail[0].width/2 + "' ",
                         " height='" + data.items[i].pagemap.cse_thumbnail[0].height/2 + "' ",
                         " alt='" + data.items[i].htmlTitle + "' ",
                         " class='img-thumbnail'> </a><br>",
                         data.items[i].htmlSnippet
                         ].join(''), 
                    ,
                    "</div></div>"            
               ].join('')
               );

                    
               }
          });

     } );
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
     	console.log(data);
     	$('#searchcontrol').show('slow');
     	
     });

     // execute an inital search
     if(data != ''){
		searchControl.execute(data);
     }
	else
	    searchControl.execute($('#ClassPlan_objectives').val());

} 