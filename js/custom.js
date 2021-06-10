$(document).ready(function () {



    /**********************************************CAROUSEL FUNCTION******************************* */



    $('.owl-carousel').owlCarousel({



        loop: false,



        margin: 20,



        nav: true,



        navText: ["<i class='fas fa-chevron-circle-left owl-prev'></i>",



            "<i class='fas fa-chevron-circle-right owl-next'></i>"],



        autoplay: true,



        stagePadding: 0,



        responsiveClass: true,



        responsive: {



            0: {



                items: 1



            },



            768: {



                items: 2



            },



            1000: {



                items: 3



            }



        }



    })



    /* **********************************************END OF CAROUSEL FUNCTION*************************** */

    // Project form team members select JS function
    $(".multiple-select").select2({
        placeholder: "Select your Teamates"
    });      
   

    // // Member Register stream and branch 
    //     $("#stream").change(function(){
    //     $(this).find("option:selected").each(function(){
    //         var optionValue = $(this).attr("value");
    //         if(optionValue){
    //             $(".box").not("." + optionValue).hide();
    //             $("." + optionValue).show();
    //         } else{
    //             $(".box").hide();
    //         }
    //     });
    // }).change();

    // member registration stream options

        let streamList = document.getElementById('stream').options;
        let options = [ 
          {     
            text: 'Choose Stream',
            disabled: true,
          },
          {     
            text: 'Bachelor of Technology (B.Tech)',
            value: 'B.Tech'
          },
          {
            text: 'Management',
            value: 'management',
            // selected: true
          },
          {
            text: 'Science',
            value: 'science'
          },
          {
            text: 'Masters of Technology (M.Tech)',
            value: 'M.Tech'
          },
          {
            text: 'Master of Business Administration (MBA)',
            value: 'MBA'
          },
          {
            text: 'Master of Science (M.Sc)',
            value: 'M.Sc'
          },   
          {
            text: 'Doctor of Philosophy (Phd)',
            value: 'Phd'
          },                  
        ];

        options.forEach(option =>
          streamList.add(
            new Option(option.text, option.value, option.disabled)
          )
        );

        

        // alert('streamOptions');

        $('#stream').change(function() {
        let branchList = document.getElementById('branch').options;
                streamOptions = this.value;
                let branchOptions=[];
                if (streamOptions == "B.Tech"){
                    alert(streamOptions);
                    $('#branch option').remove();
                    branchOptions = [ 
                    {     
                      text: 'Choose branch',
                      disabled: true,
                    },
                    {     
                      text: 'Computer Science Enginner',
                      value: 'cse'
                    },
                    {
                      text: 'Electrical and Electronics Engineering',
                      value: 'eee',
                      // selected: true
                    },
                    {
                      text: 'Mechanical Engineering',
                      value: 'me'
                    },
                    {
                      text: 'Electronics & Communication',
                      value: 'ece'
                    },
                    {
                      text: 'Civil Engineering',
                      value: 'ce'
                    },                  
                  ];
              }
              else if (streamOptions == "management"){
                    // alert(streamOptions);
                    $('#branch option').remove();
                    branchOptions = [ 
                    {     
                      text: 'Choose branch',
                      disabled: true,
                    },
                    {     
                      text: 'Bachelor of Business Administration (BBA)',
                      value: 'bba'
                    },
                    {
                      text: 'Electrical and Electronics Engineering',
                      value: 'eee',
                      // selected: true
                    },
                    {
                      text: 'Mechanical Engineering',
                      value: 'me'
                    },
                    {
                      text: 'Electronics & Communication',
                      value: 'ece'
                    },
                    {
                      text: 'Civil Engineering',
                      value: 'ce'
                    },                  
                  ];
              }
              else if (streamOptions == "science"){
                    alert(streamOptions);
                    $('#branch option').remove();
                    branchOptions = [ 
                    {     
                      text: 'Choose branch',
                      disabled: true,
                    },
                    {     
                      text: ' B. Sc. (Biochemistry, Microbiology, Bioinformatics) ',
                      value: 'bmb'
                    },
                    {
                      text: ' B. Sc.(Biotechnology, Chemistry, Microbiology) ',
                      value: 'bcm',
                      // selected: true
                    },                 
                  ];
              }
              else if (streamOptions == "M.Tech"){
                    alert(streamOptions);
                    $('#branch option').remove();
                    branchOptions = [ 
                    {     
                      text: 'Choose branch',
                      disabled: true,
                    },
                    {     
                      text: 'M.Tech. Computer Science And Engineering  ',
                      value: 'mcse'
                    },
                    {
                      text: 'M. Tech. Data Sciences',
                      value: 'mds',
                      // selected: true
                    },                 
                  ];
              }
              else if (streamOptions == "MBA"){
                    alert(streamOptions);
                    $('#branch option').remove();
                    branchOptions = [ 
                    {     
                      text: 'Choose branch',
                      disabled: true,
                    },
                    {     
                      text: 'M.Tech. Computer Science And Engineering  ',
                      value: 'mcse'
                    },
                    {
                      text: 'M. Tech. Data Sciences',
                      value: 'mds',
                      // selected: true
                    },                 
                  ];
              }
              else if (streamOptions == "M.Sc"){
                    alert(streamOptions);
                    $('#branch option').remove();
                    branchOptions = [ 
                    {     
                      text: 'Choose branch',
                      disabled: true,
                    },
                    {     
                      text: 'M.Tech. Computer Science And Engineering  ',
                      value: 'mcse'
                    },
                    {
                      text: 'M. Tech. Data Sciences',
                      value: 'mds',
                      // selected: true
                    },                 
                  ];
              }
              else if (streamOptions == "Phd"){
                    alert(streamOptions);
                    $('#branch option').remove();
                    branchOptions = [ 
                    {     
                      text: 'Choose branch',
                      disabled: true,
                    },
                    {     
                      text: 'M.Tech. Computer Science And Engineering  ',
                      value: 'mcse'
                    },
                    {
                      text: 'M. Tech. Data Sciences',
                      value: 'mds',
                      // selected: true
                    },                 
                  ];
              }

          branchOptions.forEach(option =>
          branchList.add(
            new Option(option.text, option.value, option.disabled)
          )
        );

        });
        
        

});



