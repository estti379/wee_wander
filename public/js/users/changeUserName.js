let changeNameFormTemplate = null;
window.addEventListener('load', setupNameEventListnerOnLoad);

function setupNameEventListnerOnLoad(){
    changeNameFormTemplate = checkIfNameButtonIsPresent();
}

function checkIfNameButtonIsPresent(){
    let buttonElement = document.getElementById('changeNameBtn');
    
    //do nothing if button does not exist!
    if(buttonElement == null){
        return null;
    }

    buttonElement.addEventListener('click', showNameForm );

    let changeNameFormTemplate = document.getElementById('changeNameForm');
    changeNameFormTemplate.remove();
    return changeNameFormTemplate;
}

function showNameForm(){
    let container = document.getElementById('changeNameFormContainer');
    container.append(changeNameFormTemplate);
    document.getElementById('changeNameBtn').remove()
}

