/**
 * Created by Vaibhav on 2/27/2015.
 */
$(document).ready(function(){
    //checkCookie();

    /* nav panel toggle */
    navPanelToggle();

    $('#contactForm').on('submit', function(event){
        event.preventDefault();

        data = $(this).serialize();
        url = $(this).attr('action');

        $.ajax({
            url: url,
            type: "post",
            data: data
        })
            .done(function(data)
            {
                $('#jumbotron').empty();
                $('#jumbotron').html("<span class='bg-success'> "+ data + "</span>");
                //alert(data);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                e = jqXHR.responseJSON;
                //console.log(e.firstName);
            });

    });





    $('form').validate({



        rules: {
            firstName: {
                required: true
            },
            lastName: {
                required: true
            },
            message: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            subject: {
                required: true
            },
            name: {
                required: true
            },
            brand: {
                required: true
            },
            description: {
                required: true
            },
            address_one: {
                required: true,
                minlength: 10
            },
            address_two: {
                required: true,
                minlength: 10
            },
            landmark: {
                required: true,
                minlength: 10
            },
            moile: {
                required: true,
                minlength: 10,
                maxlength: 10
            },
            username: {
                required: true,
                minlength: 5
            },
            password: {
                required: true
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }


    });


    // BUY
    $('body').on('click','#cartShow', function (event) {
        event.preventDefault();

        url = $(this).attr("href");
        //console.log("CartController@Buy: " + url);
        url = encodeUrl(url, $.cookie("userID"));
        //alert(url);
        //console.log("CartController@Buy: " + url);
        window.location.href = url;
    });


    // ADD TO CART METHOD

    $('body').on('click','#cartAdd', function (event) {
        event.preventDefault();
        url = $(this).attr('href');

        url = encodeUrl(url, $.cookie("userID"));

        //console.log(url);
        //alert(url);
        $.ajax({
            url: url,
            type: "GET",
            success: function(data){
                badgeIncreement();
                alert(data.message);

                $.cookie("userID", data.userID, {
                    expires: 30,
                    path: "/"
                    //secure: true
                });
            },
            error: function(xhr,status,e){
                console.log(xhr.responseText);
            }
        });
    });

    // Insert Quantity into the database through ajax
    initQuantity();
    insertQuantity();

    // DELETE FROM CART
    $('body').on('click', '#deleteRow', function(event){
        event.preventDefault();

        //alert();
        var tr = $(this).closest("tr");
        url = $(this).attr('href');

        $.ajax({
            url: url,
            type: "GET",
            success: function(data){
                if(data.message === 'true'){
                    //alert("Reached");
                    tr.remove();
                    total();
                    badgeDecreement();
                }
            },
            error: function(xhr,status,msg){
                alert("ERROR: "+ xhr.response());
            }
        });
    });



$(document).on("change","#quantity", function(event){
    cart(this);
    total();
});

    total();



toggle("#addressForm", "#addressFormToggle", 200);


    $("body").on("click", "#reviewBtn", function(event){
        event.preventDefault();
        var reviewSection = $(this).parent().find("#view-review");
        console.log($(reviewSection).attr("class"));
        $(reviewSection).toggle();
    });

    $("body").on("submit", "#reviewForm", function(event){

        event.preventDefault();
        var url = $(this).attr("action");
        var data = $(this).serialize();
        var reviewSection = $(this).parent().parent().find("#view-review");
        $.ajax({
            url: url,
            data: data,
            type: "PUT",
            success: function(data){
                //console.log(data);
                data = $.parseJSON(data);
                $(reviewSection).append("<li>" + data[0].review + "</li>");

            },
            error: function(xhr,status,msg){
                alert("ERROR");
            }
        })
    });



});





var navPanelToggle = function () {
    $('#nav-btn').click(function(event){
        event.preventDefault();
       $('#nav-panel').slideToggle("slow", function () {
           
       });
    });
}


var cart = function(e)
{
    price = $(e).next().val();

    quantity = $( e).val();

    if(parseInt(quantity) < 1)
    {
        alert("can be below 0");
        $(e).val(1);
        subtotal = $( e )
            .parentsUntil( "#table-row").next().next().next();


        subtotal.html(parseInt(price)*parseInt($(e).val()));
        return;
    }

    if(parseInt(quantity) > 5)
    {
        alert("Sorry We only supply 5 at a time");
        $(e).val(5);
        subtotal = $( e )
            .parentsUntil( "#table-row").next().next().next();


        subtotal.html(parseInt(price)*parseInt($(e).val()));
        return;
    }

     subtotal = $( e )
        .parentsUntil( "#table-row").next().next().next();


    subtotal.html(parseInt(price)*parseInt(quantity));


}









// SetCookie Function For javascript
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

// GetCookie Function in javascript
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}

// CheckCookie Function in Javascript
function checkCookie(name) {
    var username=getCookie(name);
    if (username!="") {
        alert("Welcome again " + username);
    }else{
        username = prompt("Please enter your name:", "");
        if (username != "" && username != null) {
            setCookie("username", username, 365);
        }
    }
}

var total = function(){
    subtotal = document.querySelectorAll('#subtotal');
    grandTotal = 0;
    for(var i=0; i < subtotal.length; i++)
    {
        grandTotal = parseInt(subtotal[i].innerHTML) + grandTotal;
    }

    $('#amt').html(grandTotal);
    $('#amtInput').val(grandTotal);
}

var badgeIncreement = function(){
    curr = $("#badge").html();
    curr = parseInt(curr);

    $("#badge").html(curr + 1);
}

var badgeDecreement = function(){
    curr = $("#badge").html();
    curr = parseInt(curr);
    $("#badge").html(curr - 1);
}

var encodeUrl = function (url, userID) {
    if(typeof userID == 'undefined' || userID == null){
        userID = 'default';
        url = url + "/" + userID;
        return url;
    }else{
        url = url + "/" + userID;
        return url;
    }
}

var checkCookie = function(){
    url = "http://localhost:8000";
    url = url + "/" + $.cookie("userID");
    $.ajax({

        url: url,
        type: "GET",
        success: function(data){

        },
        error: function(xhr,status,msg){
            alert("ERROR: ");
        }
    });
}

var insertQuantity = function(){
    $('body').on("change","#quantity", function(){
        var quantity = $(this).val();
        var pid = $(this).prev().val();
        var csrf = $("#csrf").val();
        console.log(csrf);
        console.log("Quantity: "+quantity + " Product ID: "+ pid);
        url = $("#insertQuantity").attr("href");
        console.log("URL: "+ url);

        var dataString = {q: quantity, productID: pid, _token: csrf};

        $.ajax({
            url: url,
            type: "PUT",
            data: dataString,
            success: function(data){
                console.log("Message From the Server: " + data.message);
            },
            error: function(xhr,status,msg){
                alert("Error: "+ xhr.responseText);
            }
        }, "json");
    });
}

var initQuantity  = function(){
    var quantity = document.querySelectorAll("#quantity");
    for(var i=0; i < quantity.length; i++)
    {
        $( quantity ).trigger( "change", insertQuantity() );
    }
}

var toggle = function (target, clicker, speed) {
    $(clicker).on("click", function(event){
        event.preventDefault();
        $(target).toggle(speed);
    });
}

 var scrollToId = function(id) {
     $(window).load(function () {
         $("html, body").animate({scrollTop: $(id).scrollTop()}, 100);
     })
 }

