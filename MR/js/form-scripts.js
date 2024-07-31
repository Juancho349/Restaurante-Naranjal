$("#reservationForm").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "Please fill all required fields!");
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm();
    }
});
 
 
function submitForm(){
    // Initiate Variables With Form Content
    var name = $("#rname").val();
    var email = $("#remail").val();
    var phone = $("#rphone").val();
    var party = $("#party").val();
    var datetime = $("#datetimepicker1").val();
    var message = $("#rmessage").val();
 
 
    $.ajax({
        type: "POST",
        url: "php/form-process.php",
        data: "name=" + name + "&email=" + email + "&phone=" + phone + "&party=" + party + "&datetime=" + datetime + "&message=" + message,
        success : function(text){
            if (text == "success"){
                formSuccess();
            } else {
                formError();
                submitMSG(false,text);
            }
        }
    });
}
 
function formSuccess(){
    $("#contactForm");
    submitMSG(true, "Message Sent!")
}
 
function formError(){
    $("#contactForm").removeClass().addClass('animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        $(this).removeClass();
    });
}
 
function submitMSG(valid, msg){
    if(valid){
        var msgClasses = "h3 text-center fadeIn animated text-success";
    } else {
        var msgClasses = "h3 text-center text-danger";
    }
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}