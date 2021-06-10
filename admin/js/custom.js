 

/* *****************************************Start of Memberdisplay Scripts **********************************/

$(document).ready(function(){

  /* *************************** Script for AddFlag Button's Modal  *******************************/

  $('.flagbtn').on('click',function(){

    $('#FlagModal').modal('show');

      $tr=$(this).closest('tr');

      var data=$tr.children("td").map(function(){

          return $(this).text();

      }).get();

      console.log(data);

      $('#reg').val(data[0]);

  });

  // To activate bulkFlags block when flag button is pressed
  $('#bulkFlags').on('click',function(){
    // alert('asd');
    $('#flagReason').show();
  });

   // memberdisplay.php multiple-select dropdown
   $("#memberdisplay .multiple-select").select2({
          placeholder: "Select Registration Number"
      });

  /* *************************** End of Script for AddFlag Button's Modal  *******************************/

  /* *************************** Script for Search Button  *******************************************/

    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();

      $("#myTable tr").filter(function() {

        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

       

      });

    });

  });

 /* *************************** End of Script for Search Button  *******************************************/

 /******************************Function to export table data into excel sheet ****************************/

  function exportData(){

 var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('mytable'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);

  }

  /******************************Function to export table data into excel sheet ****************************/
  
  /******************************Function to export TEAM Recruit table data Download into excel sheet ****************************/

  function exportteamData(){

    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('teamTable'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);


}

/******************************Function to export TEAM Recruit table data Download into excel sheet ****************************/


  /******************************************  End of Member display Scripts *******************************/