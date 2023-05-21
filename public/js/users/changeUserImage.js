let changeImageFormTemplate = null;
window.addEventListener('load', setupImageEventListnerOnLoad);

function setupImageEventListnerOnLoad(){
    changeImageFormTemplate = checkIfImageButtonIsPresent();
}

function checkIfImageButtonIsPresent(){
    let buttonElement = document.getElementById('changeImageBtn');
    
    //do nothing if button does not exist!
    if(buttonElement == null){
        return null;
    }

    buttonElement.addEventListener('click', showImageForm );

    let changeImageFormTemplate = document.getElementById('changeImageForm');
    changeImageFormTemplate.remove();
    return changeImageFormTemplate;
}

function showImageForm(){
    let container = document.getElementById('changeImageFormContainer');
    container.append(changeImageFormTemplate);
    document.getElementById('changeImageBtn').remove()
}

