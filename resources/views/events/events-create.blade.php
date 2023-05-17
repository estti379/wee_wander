@extends('layouts.app')
@section('title', 'Create Events Page')

{{-- EXTENDS SECTION FROM resources\views\layouts\app.blade.php - NEEDS TO BE CHANGED TO A COMPONENT --}}
@section('content')
  <div class="create_event_container">
    {{-- Form to create a new user --}}
    <form action="/events" method="POST">
      @csrf
      <span>Title of the event : </span><input type="text" name="eventTitle"><br>
      <span>Select your trail : </span>
      <select name="trail" >
      <option value="Select a trail">Select a trail</option>
        @foreach ($trails as $trail)
          <option value="{{ $trail->id }}">{{ $trail->name }}</option>
        @endforeach
      </select><br>
      <span>Starting date : </span><input type="date" name="starting_date"><br>
      <span>Due date : </span><input type="date" name="due_date"><br>
      <input type="submit" name="" value="Create Event">
    </form>
  </div>

  <button id="another-trail-button">Add another trail</button>
  {{-- JAVASCRIPT TO CREATE A NEW TRAIL IN create-event --}}
  @section('createform')
  <script>
    // DEFINES THE JS TO RUN ON CLICK OF THE BUTTON
    //ITS SEPARATED BY FUNCTIONS INSIDE
    document.querySelector("#another-trail-button").addEventListener("click", function () {
      let body = document.querySelector('body');

      // Create a new div with the required class
      let formContainer = document.createElement('div');
      formContainer.className = "create_event_container";

      // Append the new div to the body (or wherever you want it)
      body.appendChild(formContainer);

      let newForm = createEventForm();

      formContainer.appendChild(newForm);
});

// CREATES A NEW FORM 
function createEventForm() {
  let newForm = document.createElement("form");
  newForm.action = "/events";
  newForm.method = "POST";


  newForm.appendChild(createInputElement("text", "eventTitle", "Title of the event : "));
  newForm.appendChild(createTrailSelect());
  newForm.appendChild(createInputElement("date", "starting_date", "Starting date : "));
  newForm.appendChild(createInputElement("date", "due_date", "Due date : "));
  newForm.appendChild(document.createElement("br"));

  return newForm;
}

//CREATE THE INPUTS AND GARANTIES THAT THE TITLE WILL BE THE SAME FOR THE NEW CREATIONS
function createInputElement(type, name, label) {
  let inputContainer = document.createElement("div");

  let labelElement = document.createElement("span");
  labelElement.textContent = label;
  inputContainer.appendChild(labelElement);

  let inputElement = document.createElement("input");
  inputElement.type = type;
  inputElement.name = name;

  // if the element type is text and the name is eventTitle
  if(type === 'text' && name === 'eventTitle') {
    let originalTitleElement = document.querySelector('[name="eventTitle"]');
    if(originalTitleElement) {
      inputElement.value = originalTitleElement.value;
      inputElement.readOnly = true;
    }
  }

  inputContainer.appendChild(inputElement);

  inputContainer.appendChild(document.createElement("br"));

  return inputContainer;
}

//CREATE THE ELEMENTS OF THE TRAILS
function createTrailSelect() {
    let selectContainer = document.createElement("div");

    let labelElement = document.createElement("span");
    labelElement.textContent = "Select your trail : ";
    selectContainer.appendChild(labelElement);

    let selectElement = document.createElement("select");
    selectElement.name = "trail";

    let trailOption = document.createElement("option");
    trailOption.value = "Select a trail";
    trailOption.textContent = "Select a trail";
    selectElement.appendChild(trailOption);

    @foreach ($trails as $trail)
      let option{{ $trail->id }} = document.createElement("option");
      option{{ $trail->id }}.value = "{{ $trail->id }}";
      option{{ $trail->id }}.textContent = "{{ $trail->name }}";
      selectElement.appendChild(option{{ $trail->id }});
    @endforeach

    selectContainer.appendChild(selectElement);
    selectContainer.appendChild(document.createElement("br"));

    return selectContainer;
}

  </script>
@endsection
@endsection

