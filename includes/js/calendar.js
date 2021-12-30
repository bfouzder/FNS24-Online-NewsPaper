// Click: Capturo StartDate
// Click: Capturo EndDate
//    Pinto las celdas intermedias
$(document).ready( function() {
   
   var startDate = null
   
   $('table.calendar tr td').click( function() {
      
      if(startDate==null) {
         
            // Limpio la tabla
            $('table.calendar tr td').removeClass('start in end');

            $(this).addClass('start');
            // Seteo el startDate
            startDate = new String($(this).attr('rel'));
            
            // Hover mayor a este pongo a las celdas intermedias como .in
            $('table.calendar tr td').click( function() {

               $(this).addClass('end');
               endDate = new String($(this).attr('rel'));

               $('table.calendar tr td').removeClass('in');
               for(i=startDate; i<endDate; i++) {
                  $('.day'+i).addClass('in');
               }
               
            } );

      } else {

      }
   
   } );

} );