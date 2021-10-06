/**
 * Function triggered by button 'MODIFY' which get data from table and fill input.
 * 
 * @param {*} e 
 */
function fillInformation(e) {

    //Get the ID of the button which triggered the function.
    var id = e.id;
    

    //Get the data corresponding to the row of the button.
    var data = $('#firemenTable').DataTable().row(id-1).data();


    // Fill input with existing information.
    document.getElementById('modifiedMatricule').value = data[1];

    document.getElementById('modifiedFirstName').value = data[2];

    document.getElementById('modifiedLastName').value = data[3];

    document.getElementById('modifiedChefAgret').value = data[4];

    document.getElementById('modifiedBirthDate').value = data[5];

    document.getElementById('modifiedNumberBarrack').value = data[6];

    document.getElementById('modifiedCodeGrade').value = data[7];

    document.getElementById('modifiedMatriculeResponsable').value = data[8];

}