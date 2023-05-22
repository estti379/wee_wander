//{{-- JAVASCRIPT TO CREATE A NEW TRAIL IN create-event --}}


let newTrailInputTemplate;
window.addEventListener('load', setupNewTrailButtonOnLoad);

function setupNewTrailButtonOnLoad(){
    newTrailInputTemplate = document.getElementById("__0");
    newTrailInputTemplate.remove();
    document.getElementById("another-trail-button").addEventListener("click", addNewTrailInputs);
}

function addNewTrailInputs(event){
    event.preventDefault();
    let button = document.getElementById("another-trail-button");
    let newIndex = button.getAttribute("name").split("__")[1];
    let newTrailClone = newTrailInputTemplate.cloneNode(true);


    newTrailClone.id = "__" + newIndex;

    let fleetingElement = newTrailClone.querySelectorAll('label[for="trail__0"]');
    fleetingElement[0].setAttribute("for", "trail__" + newIndex);

    fleetingElement = newTrailClone.querySelectorAll('select[name="trail__0"]');
    fleetingElement[0].setAttribute("name", "trail__" + newIndex);

    fleetingElement = newTrailClone.querySelectorAll('label[for="starting_date__0"]');
    fleetingElement[0].setAttribute("for", "starting_date__" + newIndex);

    fleetingElement = newTrailClone.querySelectorAll('input[name="starting_date__0"]');
    fleetingElement[0].setAttribute("name", "starting_date__" + newIndex);

    fleetingElement = newTrailClone.querySelectorAll('label[for="start_time__0"]');
    fleetingElement[0].setAttribute("for", "start_time__" + newIndex);

    fleetingElement = newTrailClone.querySelectorAll('input[name="start_time__0"]');
    fleetingElement[0].setAttribute("name", "start_time__" + newIndex);

    fleetingElement = newTrailClone.querySelectorAll('label[for="due_date__0"]');
    fleetingElement[0].setAttribute("for", "due_date__" + newIndex);

    fleetingElement = newTrailClone.querySelectorAll('input[name="due_date__0"]');
    fleetingElement[0].setAttribute("name", "due_date__" + newIndex);

    fleetingElement = newTrailClone.querySelectorAll('label[for="end_time__0"]');
    fleetingElement[0].setAttribute("for", "end_time__" + newIndex);

    fleetingElement = newTrailClone.querySelectorAll('input[name="end_time__0"]');
    fleetingElement[0].setAttribute("name", "end_time__" + newIndex);


    document.getElementById("new-trail-inputs").append(newTrailClone);

    button.setAttribute("name", "__" + (parseInt(newIndex) + 1) );
}