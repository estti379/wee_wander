//{{-- JAVASCRIPT TO CREATE A NEW TRAIL IN create-event --}}

document
    .getElementById("another-trail-button")
    .addEventListener("click", function (e) {
        e.preventDefault();

        // Clone the 'trail' select input
        var trailInput = document.querySelector('select[name="trail"]');
        var clonedTrailInput = trailInput.cloneNode(true);

        // Create a span for the trail select
        var trailSpan = document.createElement("span");
        trailSpan.textContent = "Select your trail : ";

        // Clone the 'starting_date' input
        var startingDateInput = document.querySelector(
            'input[name="starting_date"]'
        );
        var clonedStartingDateInput = startingDateInput.cloneNode(true);

        // Create a span for the starting_date input
        var startingDateSpan = document.createElement("span");
        startingDateSpan.textContent = "Starting date : ";

        // Clone the 'start_time' input
        var startingTimeInput = document.querySelector(
            'input[name="start_time"]'
        );
        var clonedStartingTimeInput = startingTimeInput.cloneNode(true);

        // Create a label for the 'start_time' input
        var startingTimeLabel = document.createElement("label");
        startingTimeLabel.textContent = "Starting Hour:";

        // Clone the 'due_date' input
        var dueDateInput = document.querySelector('input[name="due_date"]');
        var clonedDueDateInput = dueDateInput.cloneNode(true);

        // Create a span for the due_date input
        var dueDateSpan = document.createElement("span");
        dueDateSpan.textContent = "Due date : ";

        // Clone the 'end_time' input
        var endTimeInput = document.querySelector('input[name="end_time"]');
        var clonedEndTimeInput = endTimeInput.cloneNode(true);

        // Create a label for the 'end_time' input
        var endTimeLabel = document.createElement("label");
        endTimeLabel.textContent = "End Hour:";

        // Get the form element
        var form = document.querySelector('form[action="/events"]');
        var submitButton = form.querySelector('input[type="submit"]');

        // Create a new trail title
        var newTrailTitle = document.createElement("h3");
        newTrailTitle.textContent = "Choose another trail";

        // Insert new trail title, spans, and cloned elements before the submit button
        form.insertBefore(document.createElement("br"), submitButton);
        form.insertBefore(newTrailTitle, submitButton);
        form.insertBefore(trailSpan, submitButton);
        form.insertBefore(clonedTrailInput, submitButton);
        form.insertBefore(document.createElement("br"), submitButton);
        form.insertBefore(startingDateSpan, submitButton);
        form.insertBefore(clonedStartingDateInput, submitButton);
        form.insertBefore(startingTimeLabel, submitButton);
        form.insertBefore(clonedStartingTimeInput, submitButton);
        form.insertBefore(document.createElement("br"), submitButton);
        form.insertBefore(dueDateSpan, submitButton);
        form.insertBefore(clonedDueDateInput, submitButton);
        form.insertBefore(endTimeLabel, submitButton);
        form.insertBefore(clonedEndTimeInput, submitButton);
        form.insertBefore(document.createElement("br"), submitButton);
    });
