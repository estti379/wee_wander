let changeDetailsFormTemplate = null;
window.addEventListener('load', setupDetailsEventListnerOnLoad);

function setupDetailsEventListnerOnLoad(){
    changeDetailsFormTemplate = checkIfDetailsButtonIsPresent();
}

function checkIfDetailsButtonIsPresent(){
    let buttonElement = document.getElementById('changeDetailsBtn');
    
    //do nothing if button does not exist!
    if(buttonElement == null){
        return null;
    }

    buttonElement.addEventListener('click', showDetailsForm );

    let changeDetailsFormTemplate = document.getElementById('changeDetailsForm');
    changeDetailsFormTemplate.remove();
    return changeDetailsFormTemplate;
}

function showDetailsForm(){
    let container = document.getElementById('changeDetailsFormContainer');
    container.append(changeDetailsFormTemplate);
    document.getElementById('changeDetailsBtn').remove();

}