let changeSensitiveFormTemplate = null;
window.addEventListener('load', setupSensitiveEventListnerOnLoad);

function setupSensitiveEventListnerOnLoad(){
    changeSensitiveFormTemplate = checkIfSensitiveButtonIsPresent();
}

function checkIfSensitiveButtonIsPresent(){
    let buttonElement = document.getElementById('changeSensitiveBtn');
    
    //do nothing if button does not exist!
    if(buttonElement == null){
        return null;
    }

    buttonElement.addEventListener('click', showSensitiveForm );

    let changeSensitiveFormTemplate = document.getElementById('changeSensitiveForm');
    changeSensitiveFormTemplate.remove();
    return changeSensitiveFormTemplate;
}

function showSensitiveForm(){
    let container = document.getElementById('changeSensitiveFormContainer');
    container.append(changeSensitiveFormTemplate);
    document.getElementById('changeSensitiveBtn').remove()
}

