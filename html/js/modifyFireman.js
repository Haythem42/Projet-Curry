function fillInformation(e) {

    var id = e.id;
    //Getting the data corresponding to the button.
    var data = $('#firemenTable').DataTable().row(id-1).data();

    // Filling input with existing informations
    document.getElementById('modifiedMatricule').value = data[1];
    document.getElementById('modifiedFirstName').value = data[2];
    document.getElementById('modifiedLastName').value = data[3];
    document.getElementById('modifiedChefAgret').value = data[4];
    document.getElementById('modifiedBirthDate').value = data[5];
    document.getElementById('modifiedNumberBarrack').value = data[6];
    document.getElementById('modifiedCodeGrade').value = data[7];
    document.getElementById('modifiedMatriculeResponsable').value = data[8];

}