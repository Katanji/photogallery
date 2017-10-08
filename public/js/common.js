$(document).ready(function() {
    
    $(".item").magnificPopup({
        type : 'image' , 
        gallery : {
            enabled : true
        },
        removalDelay: 300,
        mainClass: 'mfp-fade'
    });
    
    $("p").text("The DOM is now loaded and can be manipulated.");

});