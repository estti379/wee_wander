let changeBioFormTemplate = null;
window.addEventListener('load', setupBioEventListnerOnLoad);

function setupBioEventListnerOnLoad(){
    changeBioFormTemplate = checkIfBioButtonIsPresent();
}

function checkIfBioButtonIsPresent(){
    let buttonElement = document.getElementById('changeBioBtn');
    
    //do nothing if button does not exist!
    if(buttonElement == null){
        return null;
    }

    buttonElement.addEventListener('click', showBioForm );

    let changeBioFormTemplate = document.getElementById('changeBioForm');
    changeBioFormTemplate.remove();
    return changeBioFormTemplate;
}

function showBioForm(){
    let container = document.getElementById('changeBioFormContainer');
    container.append(changeBioFormTemplate);

    document.getElementById('changeBioBtn').remove();
    document.getElementById('descriptionParagraph').remove();
    document.getElementById('description2').remove();
}

