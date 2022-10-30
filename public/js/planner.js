document.addEventListener("DOMContentLoaded", function () {

    let form = document.querySelector("form");
    var plannerContainer = document.getElementById("planner");

    var planner = new FullCalendar.Calendar(plannerContainer, {
        initialView: "dayGridMonth",

        headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth",
        },

        events: {
            url: baseURL + "/planner/tasks",
        },
        eventColor: '#ecefd2',
        eventTextColor:'#4b4a49',


    });

    planner.render(baseURL + "/planner");

});
