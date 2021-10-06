/**
 * Function triggered by button 'DELETE' which get the id of the fireman to delete.
 * 
 * @param {*} e 
 */
function deleteFireman(e) {
    var id = e.id;
    document.getElementById('deleteFireman').value = id;
}