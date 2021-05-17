$(document).ready(function()
{
$('#add').click(function(){
$('.c').show();
$('.popup').show();
});

$('#close').click(function(){
$('.c').hide();
$('.popup').hide();
});

$('#close1').click(function(){
$('.c').hide();
$('.pass').hide();
});

$('#fp').click(function(){
$('.c').show();
$('.pass').show();
});

$('#addh').click(function(){
$('.c').show();
$('.addh').show();
});

$('#addrh').click(function(){
$('.c').show();
$('.addrh').show();
});

$('#close2').click(function(){
$('.c').hide();
$('.addh').hide();
});

$('#close3').click(function(){
$('.c').hide();
$('.addrh').hide();
});
('#logout').click(function(){
window.location.href='index.html';
});

$('#emp').click(function(){
window.location.href="aemployee.php";
});

$('#dep').click(function(){
window.location.href="dept.php";
});

});