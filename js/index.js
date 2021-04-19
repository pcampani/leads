$(document).ready(function(){
	$(".page-links").on("click", "a", function(e){
		e.preventDefault();
		var id = e.target.href.split("/").pop();
		$.get(`/leads/next/${id}`, function(data){
			$("tbody").html(data);
		})
	})

	$("#search").keyup($.debounce(250, function(e) {
		var searchTerm = $("#search").val();
		if(searchTerm) {
			$.post("/leads/search", {search:searchTerm}, function(data){
				$(".search-results").html(data);
			})
		}
	}));
		
})