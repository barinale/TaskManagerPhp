console.log('tzing')
const ButtonTask = document.querySelectorAll('.ButtonTask')
ButtonTask.forEach(element => {
    element.addEventListener('click',(e)=>{
        UpdateButtons(e,element)
        //Calling Function To Affiche input and buttons for Update
        
    }) 
});

    
const UpdateButtons = (e,element)=>{
    var newInput = document.createElement("input");
    newInput.setAttribute("type", "text");
    let elemntTask = e.target.parentNode.parentNode.querySelector('#inputTask');
    newInput.value=elemntTask.textContent;
    elemntTask.insertAdjacentElement('afterend',newInput)
    element.style.display = "none";
    //Variable That Hold Id
    let Id = e.target.parentNode.parentNode.querySelector('#id');

    //Adding Button For Update And IGNORE
        // Adding Buttons
        let newButtonUpdate = document.createElement("button");
        newButtonUpdate.id="UpdateButtonAjx"
        newButtonUpdate.textContent = "Update"
        newInput.insertAdjacentElement('afterend',newButtonUpdate)
        //Ingonre Button
        let newButtonIgnore = document.createElement("button")
        newButtonIgnore.id="IgnoreButton"
        newButtonIgnore.textContent="Ignore"
        newButtonUpdate.insertAdjacentElement('afterend',newButtonIgnore)
        //variable For hold new bUtton in Array to pass to function so when upadte done we can remove them
        let buttons = [newInput,newButtonIgnore,newButtonUpdate]
         //it's a call back Funcition i passed To Updated fonction so when Ever it's UPDATE Don Change the value of elemtn That Hold Name of TaskName
       let UpdateFunctionName=(Name)=>{
        elemntTask.textContent = Name;
       }
        //add Event Listenner to button Update 
        newButtonUpdate.addEventListener('click',(e)=>{
            UpdateTrigger(Id.textContent,newInput.value,buttons,element,UpdateFunctionName,DisplayError);
        })
        //This Function Is For Error Display 
        let DisplayError = (Message)=>{
            let errorMessageDiv = document.createElement("p");
            errorMessageDiv.textContent = Message;
            errorMessageDiv.style.color = "red";
            errorMessageDiv.style.fontWeight = "bold"; 

          
          
            e.target.parentNode.parentNode.insertAdjacentElement('afterend',errorMessageDiv)
            setTimeout(()=>{
                errorMessageDiv.remove()
            },3000)
        }
       

}


//function Update Task
const UpdateTrigger =(id,newValue,buttons,element,UpdateFunctionName,DisplayError)=>{
    fetch('TaskHand.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'id=' + encodeURIComponent(id) +"&Task="+ encodeURIComponent(newValue)
    })
    .then((response) => {
         return response.json()
    })
    .then(data => {
       console.log(data)
        // Display the response
        if(data[0]=='Update'){
            //remove All buttons and input that resposable for updating
            HideInput(buttons,element);
            UpdateFunctionName(data[1])
        }else{
            HideInput(buttons,element);
            DisplayError(data[0])
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
} 

function HideInput(buttons,element){
    console.log("I'm Here")
    buttons.forEach(element => {
     element.remove();
    });
    element.style.display="block"
    console.log(element)
}
