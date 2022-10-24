document.addEventListener('DOMContentLoaded', function() {

    let form = document.querySelector("form");

  var plannerContainer = document.getElementById('planner');

  var planner = new FullCalendar.Calendar(plannerContainer, {
    initialView: 'dayGridMonth',

    dateClick:function(data){
    $("#event").modal("show");
    }
  });

  planner.render("http://localhost/planner");



  events: "",



  document.getElementById("btnSave").addEventListener("click", function(){
    const formData = new FormData(form);
  });

});
