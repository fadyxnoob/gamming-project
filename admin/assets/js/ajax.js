$(docment).ready(function(){
    $(document).on("click", "#eventid", function(){
        var eventid = $(this).data("id")
        console.log(eventid)
    } )
})