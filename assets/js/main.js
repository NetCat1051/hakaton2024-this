function LoadPage(Page)
{
    var URL = "/" + Page;
    $("mainpage").load(URL + "&loadpage");
    window.location.replace(URL);
}

function SetBackground(Image)
{
	$("body").css('background-image', 'url(https://ht.rzce.ru/img/' + Image + '.png)')
	$("body").css('background-size', 'cover')
}

function SendAuth(button)
{
	var login = $("#l").val()
	var pass = $("#p").val()
	console.log(login);
	console.log(pass);
    $.getJSON("/?auth&slogin=" + login + "&pass=" + pass, function(Data)
	{
		if(Data["return"] == 1001)
		{
			window.location.replace("/main");
		}
		else
		{
			Notify("Введен не правильный логин или пароль!", null, null, "danger");
		}
	});
}

function OpenPhone()
{
	$("#regblock").css("display", "none");
	$("#accessblock").css("display", "block");
	Notify("Код отправлен на ваш номер телефона!", null, null, "success");
}

function SendReg()
{
	if($("#c").val() != "000-000")
	{
		Notify("Код введен не верно, попробуйте заново!", null, null, "danger");
		return;
	}

	var email = $("#e").val()
	var fio = $("#f").val()
	var login = $("#l").val()
	var pass = $("#p").val()
    $.getJSON("api/reg&slogin=" + login + "&pass=" + pass + "&fio=" + fio + "&email=" + email, function(Data)
	{
		if(Data["return"] == 1001)
		{
			window.location.replace("/main");
		}
		else
		{
			Notify("Введен не правильный логин или пароль!", null, null, "danger");
		}
	});
}

Notify = function(text, callback, close_callback, style) {

	var time = '2000';
	var $container = $('#notifications');
 
	if (typeof style == 'undefined' ) style = 'warning'
  
	var html = $('<div class="alert alert-' + style + '  hide">' + text + '</div>');

	$container.prepend(html)
	html.removeClass('hide').hide().fadeIn('slow')

	function remove_notice() {
		html.stop().fadeOut('slow').remove()
	}
	
	var timer =  setInterval(remove_notice, time);

	$(html).hover(function(){
		clearInterval(timer);
	}, function(){
		timer = setInterval(remove_notice, time);
	});
	
	html.on('click', function () {
		clearInterval(timer)
		callback && callback()
		remove_notice()
	});
  
  
}