var pathname = window.location.pathname + window.location.search;

$(".nav-pills li a").each(function() {
　　var href = $(this).attr("href");
　　if(pathname ==  href){
　　　
　　　　$(this).parent("li").addClass("active");
　　}
});